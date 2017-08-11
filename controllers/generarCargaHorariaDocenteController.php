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
if (!empty($_POST["dni_docente"])) {
    $_SESSION["dni_docente"] = $_POST["dni_docente"];
}
$_periodo = $objCrudGenerica->consultar("periodo_academico", array("periodo_academico"), "estatus = '1'", null);

$tabla = "datos_personales dp JOIN docente d ON dp.dni = d.dni
         JOIN docente_asignatura da ON d.dni = da.dni_docente
         JOIN horario_asignatura ha ON ha.id = da.id_horario_asignatura
         JOIN horas_asignatura haa ON ha.id = haa.id_horario_asignatura
         JOIN asignatura a ON ha.codigo_asignatura = a.codigo
         JOIN semestre s ON s.id = a.id_semestre";
$datos = array("tipo_dni || '-' || dp.dni AS dni_docente, dp.nombre || ' ' || apellido AS docente", 
                "a.nombre AS asignatura", "dia", "hora_inicio","hora_salida", "aula", 
                "codigo_seccion AS seccion", "s.nombre AS semestre");
$condicion = "d.dni = '" . $_SESSION["dni_docente"] . "'
              AND ha.periodo_academico = '" . $_periodo[0]["periodo_academico"] . "'";
$orden = "dia ASC, anio_escolar ASC";
$_horarioDocente = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

require "views/reporte/generarCargaHorariaDocenteView.phtml";