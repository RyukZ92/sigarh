<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "config/institucion.php";
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
require "librarys/html2pdf_v4.03/html2pdf.class.php";
$objCrudGenerica = new CrudGenerica();
if (!empty($_POST["dni_estudiante"])) {
    $_SESSION["dni_estudiante"] = $_POST["dni_estudiante"];
}

$tabla = "datos_personales";
$datos = array("nombre||' '||apellido AS estudiante","tipo_dni", "dni", "fecha_natal");
$condicion = "dni = '" . $_SESSION["dni_estudiante"] . "'";
$orden = null;
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("dp.nombre||' '||apellido AS estudiante", "tipo_dni", "ra.dni_estudiante", "nota", 
			   "codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre asignatura", "s.nombre AS semestre", "s.nombre AS semestre");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND i.estatus ='1'";
$orden = "anio_escolar ASC, s.id ASC";
$_recordEstudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

require "views/reporte/generarRecordEstudiantilView.phtml";