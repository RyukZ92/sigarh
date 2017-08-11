<?php
require "../db/dbPdo.php";
require "../config/config.php";
require "../librarys/crudGenerica/crudGenerica.php";
require "../librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "datos_personales dp JOIN estudiante e ON(dp.dni = e.dni) 
		JOIN inscripcion i ON (e.dni = i.dni_estudiante)";
$datos = array("tipo_dni", "e.dni", "dp.nombre", "dp.apellido", "periodo_academico", "sexo", "fecha_natal", "direccion", "telefono", "lugar_nacimiento");
$condicion = "e.dni = '" . $_GET["dni"] . "'";
$orden = null;
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
if(count($_estudiante) > 0) {
    $tabla = "inscripcion i JOIN inscripcion_asignatura ia ON (i.id = ia.id_inscripcion) 
	JOIN horario_asignatura ha ON (ha.id = ia.id_horario_asignatura) 
	JOIN asignatura a ON (ha.codigo_asignatura = a.codigo) 
	JOIN semestre s ON (a.id_semestre = s.id)";
    $datos = array("s.nombre AS semestre");
    $condicion = "i.periodo_academico = '" . $_estudiante[0]["periodo_academico"] . "'";
    $orden = "anio_escolar DESC, s.id DESC";
    $_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
} else {
    $tabla = "datos_personales dp JOIN estudiante e ON(dp.dni = e.dni)";
    $datos = array("tipo_dni", "e.dni", "dp.nombre", "dp.apellido", "sexo", "fecha_natal", "direccion", "telefono", "lugar_nacimiento");
    $condicion = "e.dni = '" . $_GET["dni"] . "'";
    $orden = null;
    $_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);  
}
require "../views/estudiante/consultarDetalleEstudianteView.phtml";
?>

