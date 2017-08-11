<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "config/institucion.php";
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

$director = "Andrés R. Cedeño B.";
$dniDirector = "V-5.877.455";
$institucion = 'Centro de Educación de Adultos "República de Haiti"';
$codigoInstitucion = "ON02271905";
$ciudad = "Carúpano";
$parroquia = "Santa Rosa";
$municipio = "Bermúdez";
$estado = "Sucre";
$telefono = "0416-0818131";
$email = "cearepublicadehaiti@hotmail.com";
$direccion = "Av- Principal de San Mart&iacute;n, sector villa Jardín";



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
$sexo = $_estudiante[0]["sexo"];
$ciudadano = $sexo == "Fenemino" ? "la ciudadana":"el ciudadano";




	$ano_hoy = date("Y");
	$mes_hoy = date("m");
	if(Date('m') == 01) $mes_hoy = 'Enero'; 
	if(Date('m') == 02) $mes_hoy = 'Febrero';
	if(Date('m') == 03) $mes_hoy = 'Marzo'; 
	if(Date('m') == 04) $mes_hoy = 'Abril'; 
	if(Date('m') == 05) $mes_hoy = 'Mayo';
	if(Date('m') == 06) $mes_hoy = 'Junio';
	if(Date('m') == 07) $mes_hoy = 'Julio';
	if(Date('m') == 08) $mes_hoy = 'Agosto';
	if(Date('m') == 09) $mes_hoy = 'Septiembre';
	if(Date('m') == 10) $mes_hoy = 'Obtubre';
	if(Date('m') == 11) $mes_hoy = 'Noviembre';
	if(Date('m') == 12) $mes_hoy = 'Diciembre';
	$dia_hoy=date("d");
	

require "views/reporte/consultarConstanciaDeInscripcionView.phtml";