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
$_periodo = $objCrudGenerica->consultar("periodo_academico", array("periodo_academico"), "estatus = '1'", null);

$tabla = "datos_personales dp JOIN estudiante e ON dp.dni = e.dni
         JOIN inscripcion i ON i.dni_estudiante = e.dni
         JOIN inscripcion_asignatura ia ON i.id = ia.id_inscripcion
         JOIN horario_asignatura ha ON ha.id = ia.id_horario_asignatura
         JOIN horas_asignatura haa ON ha.id = haa.id_horario_asignatura
         JOIN asignatura a ON ha.codigo_asignatura = a.codigo
         JOIN semestre s ON s.id = a.id_semestre";
$datos = array("tipo_dni || '-' || dp.dni AS dni_estudiante, dp.nombre || ' ' || apellido AS estudiante", 
                "a.nombre AS asignatura", "dia", "hora_inicio","hora_salida", "aula", 
                "codigo_seccion AS seccion", "s.nombre AS semestre");
$condicion = "e.dni = '" . $_SESSION["dni_estudiante"] . "'
              AND i.periodo_academico = '" . $_periodo[0]["periodo_academico"] . "'";
$orden = "dia ASC, anio_escolar ASC";
$_horarioEstudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

require "views/reporte/generarHorarioEstudiantilView.phtml";