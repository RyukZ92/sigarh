<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
$objCrudGenerica = new CrudGenerica();

$datos = array("accion"     => "Cerró Sesión",
               "usuario"    => $_SESSION["usuario"]);

$objCrudGenerica->guardar("historial", $datos, null, null);
unset($_POST, $_SESSION);
session_destroy();
header("location:" . URLBASE);

