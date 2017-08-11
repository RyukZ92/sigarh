<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 //periodo académico

require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
#Consultando Períodos Académicos
$tabla = "periodo_academico";
$condicion = "estatus = '1'";

$_periodo = $objCrudGenerica->contarFilas($tabla, $condicion);
if ($_periodo == 0){
    $notificacion = $alerta["no_extraordinario"];
    
} else {
    $tabla = "semestre";
    $datos = null;
    $condicion = null;
    $orden = "anio_escolar ASC, id ASC";
    $_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
    $_SESSION["continuar"] = null;
    if ($_POST["continuar"]) {
        $_SESSION["dni"] = $_POST["dni"];
        $_SESSION["semestre"] = $_POST["semestre"];
        if (AsistenteBasico::validarCamposVacios(array($_POST["dni"], $_POST["semestre"]))) {
           $notificacion = $alerta["campos_vacios"];
        } else {
            header("location:" . URLBASE . "registrar-notas-recuperativo");
        }
    }   
}
require "views/calificacion/seleccionarEstudianteRecuperativoView.phtml";