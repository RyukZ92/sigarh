<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
#Consultando Período Académico
$tabla = "periodo_academico";
$condicion = "estatus = '1'";

$_periodo = $objCrudGenerica->contarFilas($tabla, $condicion);

$tabla =  " datos_personales dp JOIN docente d ON d.dni = dp.dni"
        . " JOIN docente_asignatura da ON da.dni_docente = d.dni"
        . " JOIN horario_asignatura ha ON da.id_horario_asignatura = ha.id "
        . " JOIN horas_asignatura haa ON ha.id = haa.id_horario_asignatura"
        . " JOIN asignatura a ON codigo_asignatura = a.codigo"
        . " JOIN semestre s ON s.id = id_semestre";
$datos = array("dni_docente", "codigo_asignatura", "codigo_seccion AS seccion", 
    "cupos", "dia", "hora_inicio", "hora_salida", "aula", "a.nombre AS asignatura", "s.nombre AS semestre",
    "s.id AS id_semestre", "d.dni AS docente", "haa.id AS id_horas");
$condicion = "ha.id ='" . $_POST["id_horario"] . "'";
$orden = "dia ASC";
$_horario = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$_seccion = $objCrudGenerica->consultar("seccion", null, "id_semestre = '" . $_horario[0]["id_semestre"] . "'", "id_semestre ASC");
$_docente = $objCrudGenerica->consultar("datos_personales dp JOIN docente d ON d.dni = dp.dni", array("d.dni", "(tipo_dni||'-'||d.dni||' '||nombre||' '||apellido) docente"), null, "d.dni ASC");
$_asignatura = $objCrudGenerica->consultar("asignatura", null, "id_semestre = '" . $_horario[0]["id_semestre"] . "'", "nombre ASC");

if (isset($_POST["editar"])) {
	if (AsistenteBasico::validarCamposVacios(array($_POST["cupos"], $_POST["hora_inicio"], $_POST["hora_salida"], $_POST["aula"]))) {
		$notificacion = $alerta["campos_vacios"];
	} else {
		$tabla = "horario_asignatura";
		$datos = array("codigo_asignatura"	=>	$_POST["asignatura"],
					   "codigo_seccion"		=>	$_POST["seccion"],
					   "cupos"				=>	$_POST["cupos"]);
		$condicion = "id = '" . $_POST["id_horario"] . "'";
		$result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
		for($i=0; $i<count($_horario); $i++) {
			if ($result) {
				$tabla = "horas_asignatura";
				$datos = array("dia"			=>	$_POST["dia"][$i],
							   "hora_inicio"	=>	AsistenteBasico::convertirHoraA24H($_POST["hora_inicio"][$i]),
							   "hora_salida"	=>	AsistenteBasico::convertirHoraA24H($_POST["hora_salida"][$i]),
							   "aula"			=>	$_POST["aula"][$i]);
				$condicion = "id = '" . $_horario[$i]["id_horas"] . "'";
				$result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
			}
		}
		if ($result) {
			$tabla = "docente_asignatura";
			$datos = array("dni_docente" => $_POST["docente"]);
			$condicion = "id_horario_asignatura = '" . $_POST["id_horario"] . "'";
			$result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
		}
		if ($result){
			$notificacion = $alerta["actualizacion_exitosa"];
			header("refresh:2;consultar-horario-por-asignatura/pagina/" . $_POST["pagina_referencia"]);
		} else {
			$notificacion = $alerta["actualizacion_error"];
		}
	}
}
require "views/asignatura/editarHorarioPorDocenteView.phtml";
