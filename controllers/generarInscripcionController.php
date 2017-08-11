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
if (!empty($_POST["id"])) {
    $_SESSION["id_inscripcion"] = $_POST["id"];
}
$tabla = "inscripcion i JOIN estudiante e ON(i.dni_estudiante = e.dni) JOIN datos_personales dp ON(e.dni = dp.dni)"
        . " JOIN inscripcion_asignatura ia ON(i.id = ia.id_inscripcion)"
        . " JOIN horario_asignatura ha ON (ia.id_horario_asignatura = ha.id)"
        . " JOIN asignatura a ON (ha.codigo_asignatura = a.codigo)"
        . " JOIN semestre s ON (a.id_semestre = s.id)";
$datos = array("i.id", "i.fecha_inscripcion", "dp.nombre", "apellido", "tipo_dni", 
    "e.dni", "dni_responsable", "fecha_natal", "direccion", "lugar_nacimiento", "telefono", 
    "s.nombre AS semestre", "a.nombre AS asignatura", "anio_escolar", "i.periodo_academico");
$condicion = "i.id = '" . $_SESSION["id_inscripcion"] . "'";
$orden = "s.anio_escolar ASC, s.id ASC";
$_inscripcionEstudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$tabla = "inscripcion i JOIN datos_personales dp ON(dni_responsable = dp.dni)";
$datos = array("nombre", "apellido", "tipo_dni", "dp.dni", "fecha_natal");
$condicion = "i.id = '" . $_SESSION["id_inscripcion"] ."' AND dni_responsable = '" . $_inscripcionEstudiante[0]["dni_responsable"] . "'";
$orden = null;
$_inscripcionResponsable = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$ultimoSemestre = count($_inscripcionEstudiante) - 1;

if ($_inscripcionEstudiante[$ultimoSemestre]["anio_escolar"] > 0 && $_inscripcionEstudiante[$ultimoSemestre]["anio_escolar"] < 7) {
    $tipoEducacion = "Media General";
} else {
    $tipoEducacion = "Media Profesional";
}

require "views/reporte/generarInscripcionView.phtml";