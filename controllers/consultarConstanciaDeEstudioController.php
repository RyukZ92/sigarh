<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "config/institucion.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
require "librarys/html2pdf_v4.03/html2pdf.class.php";
require "librarys/crudGenerica/crudGenerica.php";
$objCrudGenerica = new CrudGenerica();



$dni = $_SESSION["dni_estudiante"];
$_periodoAcademico = $objCrudGenerica->consultar("periodo_academico", null, "estatus = '1'", null);

$tabla = "datos_personales dp JOIN estudiante e ON(dp.dni = e.dni) JOIN inscripcion i ON (e.dni = i.dni_estudiante) JOIN inscripcion_asignatura ia ON (i.id = ia.id_inscripcion) JOIN horario_asignatura ha ON (ia.id_horario_asignatura = ha.id) JOIN asignatura a ON (ha.codigo_asignatura = a.codigo) JOIN semestre s ON (a.id_semestre = s.id)";
$datos = array("tipo_dni", "dp.dni", "dp.nombre", "apellido", "sexo", "a.codigo", "s.nombre AS semestre", "anio_escolar");
$condicion = "i.periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "' AND e.dni = '$dni'";
$orden = "anio_escolar DESC, s.id DESC";
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$especialidad = $institucion["tipo_especialidad"];
$director = $institucion["nombre_director"] . " " . $institucion["apellido_director"];
$dniDirector =  $institucion["tipo_dni"] . "-" . $institucion["dni_director"];
$nombre_institucion = $institucion["institucion"];
$codigoInstitucion = $institucion["codigo_dea"];
$ciudad = $institucion["ciudad"];
$parroquia = $institucion["parroquia"];
$municipio = $institucion["municipio"];
$estado = $institucion["estado"];
$telefono = $institucion["telefono_director"];
$email = $institucion["email"];
$direccion = $institucion["ubicacion"];
$sexoDirector = $institucion['sexo_director'] == "F" ? "a": "o";
$especialidad = $institucion["tipo_especialidad"] != "TSU" ? $institucion["tipo_especialidad"].$sexoDirector : $institucion["tipo_especialidad"];;


$periodoAcademico = $_periodoAcademico[0]["periodo_academico"];
$dniEstudiante = $_estudiante[0]["tipo_dni"] . "-" . $_estudiante[0]["dni"];
$estudiante = $_estudiante[0]["nombre"] . " " . $_estudiante[0]["apellido"];
$semestre = $_estudiante[0]["semestre"];


if ($_estudiante[0]["anio_escolar"] > 0 && $_estudiante[0]["anio_escolar"] < 7) {
    $tipoEducacion = "Media General";
} else {
    $tipoEducacion = "Media Profesional";
}


$usuario = $_SESSION["usuario"];

$sexo = trim(strtolower($_estudiante[0]["sexo"]));
$ciudadano = $sexo == "femenino" ? "la ciudadana":"el ciudadano";

$mes = AsistenteBasico::obtenerMesDelAnio(date('m'));	

//if ($_SESSION["emision_de_constancia"] == null) {
    /*$datos = array("accion"     => "Emitió una constancia de estudio al estudiante : <b>".$_estudiante[0]["tipo_dni"]."-$dni</b>",
                   "usuario"    => $_SESSION["usuario"]);

    $objCrudGenerica->guardar("historial", $datos, null, null);
//}*/

require "views/reporte/consultarConstanciaDeEstudioView.phtml";