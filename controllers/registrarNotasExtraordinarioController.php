<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
$_recordNota = $objCrudGenerica->consultar("record_academico", array("codigo_asignatura"), "dni_estudiante = '" . $_SESSION["dni"] . "' AND nota > 9", null);
$tabla = "asignatura a JOIN semestre s ON a.id_semestre = s.id";
$datos = array("a.codigo", "s.nombre AS semestre", "a.nombre");
$condicion = "a.id_semestre = '" . $_SESSION["semestre"] . "'";
$orden = "a.nombre ASC";
for($i=0; $i<count($_recordNota);$i++) {
    $condicion .= " AND a.codigo != '" . $_recordNota[$i]["codigo_asignatura"] . "'"; 
}
$_asignatura = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
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
            //echo "<br>".$_SESSION["asignatura"][$j]." = ".$_POST["asignatura_$i"];
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
    $_periodo = $objCrudGenerica->consultar("periodo_academico", array("periodo_academico"), "estatus = '1'", "id DESC LIMIT 1");
    for ($i=0;$i<count($_SESSION["asignatura"]); $i++) {
        $_institucion = $objCrudGenerica->consultar("institucion_escolar", array("id"), "estatus = '1'", null);
        $tabla = "record_academico";
        $datos = array("dni_estudiante"    => $_SESSION["dni"], 
                       "nota"              => $_SESSION["nota"][$i], 
                       "codigo_asignatura" => $_SESSION["asignatura"][$i], 
                       "periodo_academico" => $_periodo[0]["periodo_academico"], 
                       "tipo"              => "E",
                       "fecha"             => date("Y-m-d"),    
                       "id_institucion"    => $_institucion[0]["id"]);
        $condicion = null;
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
        
    }
    if ($result) {
        unset ($_SESSION["dni"], $_SESSION["nota"], $_SESSION["asignatura"], $_SESSION["nombre_asignatura"], $_SESSION["semestre"], $_SESSION["nombre_semestre"]);
        $notificacion = $alerta["registro_exitoso"];
        header("refresh:2;" . URLBASE . "seleccionar-tipo-de-calificacion");
    } else {
        $notificacion = $alerta["registro_error"];
    }
    
 }
require "views/calificacion/registrarNotasExtraordinarioView.phtml";
