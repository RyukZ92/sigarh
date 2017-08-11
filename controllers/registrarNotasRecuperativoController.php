<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
$_periodo = $objCrudGenerica->consultar("periodo_academico", array("periodo_academico"), "estatus = '1'", null);
$tabla = "inscripcion i JOIN calificacion c ON i.id = c.id_inscripcion "
        . " JOIN asignatura a ON c.codigo_asignatura = a.codigo "
        . " JOIN semestre s ON a.id_semestre = s.id";
$condicion =  "i.periodo_academico = '" . $_periodo[0]["periodo_academico"] . "' "
            . "AND i.dni_estudiante = '" . $_SESSION["dni"] . "'"
            . "";
$datos = array("c.id","a.codigo", "s.nombre AS semestre", "a.nombre");
$_calificacion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$tabla = "inscripcion i JOIN inscripcion_asignatura ia ON i.id = ia.id_inscripcion"
        . " JOIN horario_asignatura ha ON ia.id_horario_asignatura = ha.id"
        . " JOIN asignatura a ON a.codigo = ha.codigo_asignatura"
        . " JOIN semestre s ON a.id_semestre = s.id ";
$datos = array("a.codigo", "s.nombre AS semestre", "a.nombre");
$condicion = " a.id_semestre = '" . $_SESSION["semestre"] . "' "
        . " AND i.dni_estudiante = '" . $_SESSION["dni"] . "'"
        . " AND i.periodo_academico = '". $_periodo[0]["periodo_academico"] . "'";
$orden = "a.nombre ASC";

for ($i=0;$i<count($_calificacion); $i++) {
    $_nota = $objCrudGenerica->consultar("nota n JOIN calificacion c ON id_calificacion = c.id", array("codigo_asignatura", "round(AVG(nota)) AS promedio"), "id_calificacion = '" . $_calificacion[$i]["id"] ."' AND nota > 0 GROUP BY codigo_asignatura", null);
    if ($_nota[0]["promedio"] > 9) {
        $condicion .= " AND a.codigo != '" . $_nota[0]["codigo_asignatura"] . "'";
    }
}
$_recordAcademico = $objCrudGenerica->consultar("record_academico", array("codigo_asignatura"),"dni_estudiante = '" . $_SESSION["dni"] . "' AND nota > 9", null);
for ($i=0;$i<count($_recordAcademico); $i++) {
        $condicion .= " AND a.codigo != '" . $_recordAcademico[$i]["codigo_asignatura"] . "'";
}
$_asignatura = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
/*
echo "SESSION:<pre>";
print_r($_SESSION);
echo "</pre>";
echo "POST:<pre>";
print_r($_POST);
echo "</pre>";
*/
if (empty($_SESSION["nombre_semestre"])) {
    $_SESSION["nombre_semestre"] = $_asignatura[0]["semestre"];
}
if (isset($_POST["continuar"])) {
    $j=0;
    for ($i=0; $i<count($_asignatura); $i++) {
        if (isset($_POST["check_$i"]) 
            &&($_POST["nota_$i"] > 9)) {
            $_SESSION["nombre_asignatura"][$j] = $_POST["nombre_asignatura_$i"];
            $_SESSION["asignatura"][$j] = $_POST["asignatura_$i"];
            $_SESSION["nota"][$j] = $_POST["nota_$i"];
            $j++;
            $_SESSION["continuar"] = true;
        }
    }
    $tabla = "estudiante e JOIN datos_personales dp ON (e.dni = dp.dni)";
    $datos = array("dp.dni", "tipo_dni", "nombre", "apellido");
    $condicion = "e.dni = '" . $_SESSION["dni"] . "'";
    $orden = null;
    $_estudiante= $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
} else if (isset($_POST["confirmar"])) {
    $_periodoAcademico = $objCrudGenerica->consultar("periodo_academico", array("periodo_academico"), "estatus = '0'", "id DESC LIMIT 1");
    for ($i=0;$i<count($_SESSION["asignatura"]); $i++) {
        $_institucion = $objCrudGenerica->consultar("institucion_escolar", array("id"), "estatus = '1'", null);
        $tabla = "record_academico";
        $datos = array("nota"   => $_SESSION["nota"][$i], 
                       "tipo"   => "R");
        $condicion = "codigo_asignatura = '" . $_SESSION["asignatura"][$i] . "'"
                . " AND dni_estudiante = '" . $_SESSION["dni"] . "'";
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
        //echo "INSERT INTO record_academico (dni_estudiante, nota, codigo_asignatura, periodo_academico, tipo, fecha, id_institucion) "
        //. "VALUES (".$_SESSION["dni"].", ".$_SESSION["nota"][$i].", ".$_SESSION["asignatura"][$i].", ".$_periodo[0]["periodo_academico"].", Rec, ".date("Y-m-d").", ".$_institucion[0]["id"].")";
    }
    if ($result) {
        unset ($_SESSION["dni"], $_SESSION["nota"], $_SESSION["asignatura"], $_SESSION["nombre_asignatura"], $_SESSION["semestre"], $_SESSION["nombre_semestre"]);
        $notificacion = $alerta["registro_exitoso"];
        header("refresh:2;" . URLBASE . "seleccionar-tipo-de-calificacion");
    } else {
        $notificacion = $alerta["registro_error"];
    }
    
 }
require "views/calificacion/registrarNotasRecuperativoView.phtml";
