<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "periodo_academico";
$datos = array("periodo_academico");
$condicion = "estatus = '1'";
$orden = null;
$_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);


$cantidadNotas = 5;
if ($_POST['confirmar']) {
    $tabla = "estudiante e JOIN datos_personales dp ON (e.dni = dp.dni) "
            . " JOIN inscripcion i ON (e.dni = i.dni_estudiante) "
            . " JOIN inscripcion_asignatura ia ON (i.id = ia.id_inscripcion) "
            . " JOIN horario_asignatura ha ON (ia.id_horario_asignatura = ha.id)";
    $datos = array("tipo_dni", "dp.dni", "nombre", "apellido", "ha.codigo_asignatura", "i.periodo_academico");    
    
    $condicion = "i.periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "'";
    $orden = "dp.dni ASC";
    $_inscripcionEstudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

    for ($i=0; $i<count($_inscripcionEstudiante);$i++) {
        $tabla = "calificacion c JOIN inscripcion i ON (c.id_inscripcion = i.id)";
        $datos = array("c.id");
        $condicion = "i.periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "' "
                . " AND c.codigo_asignatura = '" . $_inscripcionEstudiante[$i]["codigo_asignatura"] . "' "
                . " AND i.dni_estudiante = '" . $_inscripcionEstudiante[$i]["dni"] . "'";
        $orden = null;
		
        $_calificacion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);    
        $_nota = $objCrudGenerica->consultar("nota", null, "id_calificacion = '" . $_calificacion[0]["id"] . "'", "id ASC");
        $_promedio = $objCrudGenerica->consultar("nota", array("round(AVG(nota)) AS promedio"), "id_calificacion = '" . $_calificacion[0]["id"] . "' AND nota > 0", null);
        
        $promedio = $_promedio[0]["promedio"];
        $promedio = ($promedio == 0 || (empty($promedio))) ? 1 : $promedio;
        $_institucion = $objCrudGenerica->consultar("institucion_escolar", array("id"), "estatus = '1'", null);

        $datos = array("dni_estudiante"     => $_inscripcionEstudiante[$i]["dni"],
                       "codigo_asignatura"  => $_inscripcionEstudiante[$i]["codigo_asignatura"],
                       "nota"               => $promedio,
                       "periodo_academico"  => $_periodoAcademico[0]["periodo_academico"],
                       "fecha"              => date("Y-m-d"),
                       "tipo"               => "F",
                       "id_institucion"     => $_institucion[0]["id"]);
        if ($objCrudGenerica->contarFilas("record_academico", "codigo_asignatura = '" . $_inscripcionEstudiante[$i]["codigo_asignatura"] ."' AND dni_estudiante = '" .  $_inscripcionEstudiante[$i]["dni"] . "' AND nota < 10") > 0) {
            $condicion = "codigo_asignatura = '" . $_inscripcionEstudiante[$i]["codigo_asignatura"] . "'"
                    . " AND dni_estudiante = '" .  $_inscripcionEstudiante[$i]["dni"] . "'";
            
        } else {
            $condicion = null;
        }
        /*echo 
          "<br>INSERT INTO (dni_estudiante, codigo_asignatura, nota, periodo_academico, id_institucion)"
        . "VALUES ('".$_inscripcionEstudiante[$i]["dni"]."', "
        . "'".$_inscripcionEstudiante[$i]["codigo_asignatura"]."', "
        . "'". $promedio, $_periodoAcademico[0]["periodo_academico"]."', "
        . "'" .$_institucion[0]["id"]."');";*/
        //echo "<br>Cédula: ".$_inscripcionEstudiante[$i]["dni"];
        $result = $objCrudGenerica->guardar("record_academico", $datos, $condicion, null);
        
    }
    if($result) {
       
        $result = $objCrudGenerica->guardar("periodo_academico", array("periodo_nota" => 0), "estatus = '1'", null); 

        if($result) {
            $datos = array("accion"     => "Cerró el Período De Notas <b>" . $_POST["periodo"] ."</b>",
                           "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null); 
            unset($_POST);
            $notificacion = $alerta["periodo_cerrado_con_exito"];
            header("refresh:2;" .URLBASE . "seleccionar-tipo-de-calificacion");
        } else {
            $notificacion = $alerta["actualizacion_error"]; 
        }
    } else {
        $notificacion = $alerta["actualizacion_error"];   
    }
}
require "views/periodoAcademico/cerrarPeriodoDeNotasView.phtml";
