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
    $datos = array("periodo_academico");
    $condicion = "estatus = '1'";
    $orden = null;
    $_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if (count($_periodoAcademico) == 0) {
    $notificacion = $alerta["no_inscripcion"];
} else {

    $tabla = "semestre";
    $datos = null;
    $condicion = null;
    $orden = "id ASC";
    $_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

    if ($_POST['continuar']) {

        $_SESSION["equivalencia"] = $_POST["equivalencia"]; 
        $_SESSION["dni"] = $_POST["dni"];

        if (AsistenteBasico::validarCamposVacios(array($_POST["dni"], $_POST["equivalencia"]))) {
           $notificacion = $alerta["campos_vacios"];
        } elseif ($objCrudGenerica->contarFilas("estudiante", "dni = '" . $_SESSION["dni"] ."'") < 1) {
            $notificacion = $alerta["registro_no_existe"];
        } elseif ($objCrudGenerica->contarFilas("inscripcion", "dni_estudiante = '" . $_SESSION["dni"] . "'AND periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "'") > 0) {
            $notificacion = $alerta["inscripcion_existente"]; 
        } else {
            if($_SESSION["equivalencia"] == "N") {
               header("location: " . URLBASE . "registrar-inscripcion-asignatura");
            } else {            
                header("location: " . URLBASE . "seleccionar-institucion-para-certificacion-de-notas");
            }
            //
        }
    }
}
require "views/inscripcion/registrarInscripcionEstudianteView.phtml";
