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

if (isset($_POST["continuar"])) {
    if ($_POST["respuesta"] == "S") {
        header("location:". URLBASE . "seleccionar-institucion-para-certificacion-de-notas");
    } else {
        header("location:". URLBASE . "registrar-inscripcion-asignatura");
    }
}
 require "views/inscripcion/continuarInscripcionView.phtml";