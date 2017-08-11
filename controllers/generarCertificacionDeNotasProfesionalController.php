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

$tabla = "datos_personales dp JOIN estudiante e ON e.dni = dp.dni JOIN estado ON id_estado = estado.id";
$datos = array("nombre" ,"apellido","tipo_dni", "dp.dni", "fecha_natal", "estado", "lugar_nacimiento");
$condicion = "dp.dni = '" . $_SESSION["dni_estudiante"] . "'";
$orden = null;
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);


$tabla = "record_academico ra JOIN  institucion_escolar ie ON id_institucion = ie.id
			 JOIN ciudad c ON id_ciudad = c.id
			 JOIN estado e ON id_estado = e.id";
$datos = array("ie.id", "nombre", "ciudad", "estado");
$condicion = "dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 GROUP BY ie.id, nombre, ciudad, estado ";
$orden = "ie.id ASC";
$_institucion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
$nroInstitucion[] = 0;
for($i=0; $i<count($_institucion); $i++) {
	$nroInstitucion[$i] = $i + 1;
}


$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre AS asignatura", "s.nombre AS semestre", "s.nombre AS semestre", "id_institucion", "nota");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 AND anio_escolar='7'";
$orden = "codigo ASC";
$_semestre1 = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$condicion = "anio_escolar = '7'";
for ($i=0; $i<count($_semestre1); $i++) { 
	$condicion .= " AND codigo != '" . $_semestre1[$i]["codigo_asignatura"] . "'";
}
$_asignatura1 = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON id_semestre = s.id", array("a.nombre AS asignatura", "codigo"), $condicion, "codigo ASC");

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre AS asignatura", "s.nombre AS semestre", "s.nombre AS semestre", "id_institucion", "nota");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 AND anio_escolar='8'";
$orden = "codigo ASC";
$_semestre2 = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$condicion = "anio_escolar = '8'";
for ($i=0; $i<count($_semestre2); $i++) { 
	$condicion .= " AND codigo != '" . $_semestre2[$i]["codigo_asignatura"] . "'";
}
$_asignatura2 = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON id_semestre = s.id", array("a.nombre AS asignatura", "codigo"), $condicion, "codigo ASC");

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre AS asignatura", "s.nombre AS semestre", "s.nombre AS semestre", "id_institucion", "nota");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 AND anio_escolar='9'";
$orden = "codigo ASC";
$_semestre3 = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$condicion = "anio_escolar = '9'";
for ($i=0; $i<count($_semestre3); $i++) { 
	$condicion .= " AND codigo != '" . $_semestre3[$i]["codigo_asignatura"] . "'";
}
$_asignatura3 = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON id_semestre = s.id", array("a.nombre AS asignatura", "codigo"), $condicion, "codigo ASC");

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre AS asignatura", "s.nombre AS semestre", "s.nombre AS semestre", "id_institucion", "nota");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 AND anio_escolar='10'";
$orden = "codigo ASC";
$_semestre4 = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$condicion = "anio_escolar = '10'";
for ($i=0; $i<count($_semestre4); $i++) { 
	$condicion .= " AND codigo != '" . $_semestre4[$i]["codigo_asignatura"] . "'";
}
$_asignatura4 = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON id_semestre = s.id", array("a.nombre AS asignatura", "codigo"), $condicion, "codigo ASC");

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre AS asignatura", "s.nombre AS semestre", "s.nombre AS semestre", "id_institucion", "nota");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 AND anio_escolar='11'";
$orden = "codigo ASC";
$_semestre5 = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$condicion = "anio_escolar = '11'";
for ($i=0; $i<count($_semestre5); $i++) { 
	$condicion .= " AND codigo != '" . $_semestre5[$i]["codigo_asignatura"] . "'";
}
$_asignatura5 = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON id_semestre = s.id", array("a.nombre AS asignatura", "codigo"), $condicion, "codigo ASC");

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni"
		. " JOIN record_academico ra ON e.dni = ra.dni_estudiante" 
		. " JOIN institucion_escolar i ON (ra.id_institucion = i.id)"
        . " JOIN asignatura a ON (ra.codigo_asignatura = a.codigo)"
		. " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("codigo_asignatura", "periodo_academico", "tipo", "fecha", "i.nombre AS institucion", 
			   "a.nombre AS asignatura", "s.nombre AS semestre", "s.nombre AS semestre", "id_institucion", "nota");
$condicion = "ra.dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND nota > 9 AND anio_escolar='12'";
$orden = "codigo ASC";
$_semestre6 = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$condicion = "anio_escolar = '12'";
for ($i=0; $i<count($_semestre6); $i++) { 
	$condicion .= " AND codigo != '" . $_semestre6[$i]["codigo_asignatura"] . "'";
}
$_asignatura6 = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON id_semestre = s.id", array("a.nombre AS asignatura", "codigo"), $condicion, "codigo ASC");

$cabecera = $institucion['img_certificacion'];
$ciudad = $institucion["ciudad"];
$municipio = $institucion["municipio"];
$estado = $institucion["estado"];
$nombreInstitucion = $institucion["institucion"];
$codigoDea = $institucion["codigo_dea"];
$ubicacion = $institucion["ubicacion"];
$telefono = $institucion["telefono"];
$zonaEducativa = $institucion["zona_educativa"];
$director = $institucion["nombre_director"] . " " . $institucion["apellido_director"];
$dniDirector = $institucion["tipo_dni"] . "-" . $institucion["dni_director"];

require "views/reporte/generarCertificacionDeNotasProfesionalView.php";
