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

$tabla = "estudiante e JOIN datos_personales dp ON (e.dni = dp.dni) JOIN inscripcion i ON (e.dni = i.dni_estudiante) JOIN inscripcion_asignatura ia ON (i.id = ia.id_inscripcion) JOIN horario_asignatura ha ON (ia.id_horario_asignatura = ha.id)";
$datos = array("tipo_dni", "dp.dni", "nombre", "apellido");
$condicion = "ha.periodo_academico = '" . $_SESSION["periodo"] . "' AND ha.id = '" . $_SESSION["asignatura"] . "' AND eliminado != '1'";
$orden = "dp.dni ASC";
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

require "views/calificacion/consultarEstudiantePorAsignaturaView.phtml";