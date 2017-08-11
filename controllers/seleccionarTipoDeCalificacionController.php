<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

unset( $_SESSION["idNota"], $_SESSION["id_calificacion"]); //Eliminado variables de sisón
##Consultando Semestres
$tabla = "semestre";
$datos = null;
$condicion = null;
$orden = "id ASC";
$_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);


#Consultando Períodos Académicos
$tabla = "periodo_academico";
$datos = array("periodo_academico", "periodo_nota");
$condicion = "estatus = '1'";
$orden = null;
$_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['continuar']) {
   
    if (empty($_POST["cambio_nota"]) && empty($_POST["asignatura"]) && empty($_POST["registro_especial"])) {
       $notificacion = $alerta["campos_vacios"];
    } else {
            if ($_POST["opcion_nota"] == "extraordinario") {
                unset($_SESSION["asignatura"], $_SESSION["dni"]);
                header("location:" . URLBASE . "seleccionar-estudiante-extraordinario");
            } else if($_POST["opcion_nota"] == "recuperativo") {
                unset($_SESSION["asignatura"], $_SESSION["dni"]);
                header("location:" . URLBASE . "seleccionar-estudiante-recuperativo");
            } else if($_POST["opcion_nota"] == "cambio_nota") {
                unset($_SESSION["asignatura"], $_SESSION["dni"]);
                header("location:" . URLBASE . "cambio-de-notas");
            } else if($_POST["asignatura"] != 0){
                $_SESSION["periodo"] = $_periodoAcademico[0]["periodo_academico"];
                $_SESSION["asignatura"] = $_POST["asignatura"];
                header("location:" . URLBASE . "consultar-notas-de-estudiante-por-asignatura");
            } else {
                header("location:" . URLBASE . "registro-especial-de-notas");
            }
        }
}
if ($_SESSION["tipo_usuario"] == "Administrador") {
    $tabla = "datos_personales dp JOIN docente d ON(dp.dni = d.dni) "
            . " JOIN docente_asignatura da ON (d.dni = da.dni_docente) "
            . " JOIN horario_asignatura ha ON(da.id_horario_asignatura = ha.id) "
            . " JOIN asignatura a ON(ha.codigo_asignatura = a.codigo)"
            . " JOIN semestre s ON a.id_semestre = s.id";
    $datos = array("ha.id", "a.codigo", "a.nombre AS asignatura", "codigo_seccion", "s.nombre AS semestre");
    $condicion = "ha.periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "'";
    $orden = "a.nombre ASC, codigo_seccion ASC";
    $_asignatura = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
} else {
    $tabla = "datos_personales dp JOIN docente d ON(dp.dni = d.dni) "
            . " JOIN docente_asignatura da ON (d.dni = da.dni_docente) "
            . " JOIN horario_asignatura ha ON(da.id_horario_asignatura = ha.id) "
            . " JOIN asignatura a ON(ha.codigo_asignatura = a.codigo)"
            . " JOIN semestre s ON a.id_semestre = s.id";
    $datos = array("ha.id", "a.codigo", "a.nombre AS asignatura", "codigo_seccion", "s.nombre AS semestre");
    $condicion = "d.dni = '" . $_SESSION["dni_sesion"] . "' AND ha.periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "'";
    $orden = "a.nombre ASC, codigo_seccion ASC";
    $_asignatura = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
}

require "views/calificacion/seleccionarTipoDeCalificacionView.phtml";
