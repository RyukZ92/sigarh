<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
require "librarys/paginador/paginador.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "estudiante e JOIN datos_personales dp ON (e.dni = dp.dni) "
        . " JOIN inscripcion i ON (e.dni = i.dni_estudiante) "
        . " JOIN inscripcion_asignatura ia ON (i.id = ia.id_inscripcion) "
        . " JOIN horario_asignatura ha ON (ia.id_horario_asignatura = ha.id)";
$datos = array("tipo_dni", "dp.dni", "nombre", "apellido");
$condicion = "ha.periodo_academico = '" . $_SESSION["periodo"] . "' AND ha.id = '" . $_SESSION["asignatura"] . "'";
$orden = "dp.dni ASC";
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if (isset($_POST["actualizar"])) {

    for ($i=0 ;$i<count($_SESSION["id_calificacion"]); $i++) {
        $c = $_SESSION["id_calificacion"][$i];
        $_nota = $objCrudGenerica->consultar("nota", null, "id_calificacion = '$c'", "id ASC");
        for ($j=0; $j<count($_nota); $j++) {
            $idNota = $_nota[$j]["id"];
            $tabla = "nota";
            $datos = array("nota" => $_POST["nota$c"][$j]);
            $condicion = "id_calificacion = '$c' AND id = '$idNota'";
            $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);            
        } 
    }     
    
    if ($result) {

        unset($_SESSION["id_calificacion"]);
        $notificacion = $alerta["actualizacion_exitosa"];

        header("refresh:0;" . URLBASE . "consultar-notas-de-estudiante-por-asignatura");
    } else {

        $notificacion = $alerta["actualizacion_error"];
    }
}
require "views/calificacion/actualizarNotasEstudianteView.phtml";