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

$tabla  = "estudiante e JOIN datos_personales dp ON (e.dni = dp.dni)"
        . " JOIN inscripcion i ON (e.dni = i.dni_estudiante)"
        . " JOIN inscripcion_asignatura ia ON (i.id = ia.id_inscripcion)"
        . " JOIN horario_asignatura ha ON (ia.id_horario_asignatura = ha.id)"
        . " JOIN asignatura a ON ha.codigo_asignatura = a.codigo"
        . " JOIN semestre s ON a.id_semestre = s.id";
$datos = array("tipo_dni", "dp.dni", "dp.nombre", "apellido", "a.nombre AS asignatura", "s.nombre AS semestre");

$condicion = "ha.periodo_academico = '" . $_SESSION["periodo"] . "' "
        . " AND ha.id = '" . $_SESSION["asignatura"] . "' "
        . " AND eliminado != '1'";
$orden = "dp.dni ASC";
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

require "views/calificacion/consultarNotasDeEstudiantePorAsignaturaView.phtml";