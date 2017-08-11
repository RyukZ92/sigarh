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
$objPaginador = new Paginador();
$_semestre = $objCrudGenerica->consultar("semestre", null, null, "anio_escolar ASC, id ASC");
$pagina = $_GET['pagina'];
if(!empty($_POST["semestre"])) {
    $tabla = "semestre s JOIN seccion a ON s.id = id_semestre";
    $datos = array("codigo", "s.nombre AS nombre_semestre");
    $condicion = "id_semestre = '" . $_POST["semestre"] . "'";
    $orden = "codigo ASC";
    $_seccion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
} else { 
    $_seccion = $objPaginador->paginar_5("SELECT codigo, s.nombre AS nombre_semestre
                                          FROM seccion a, semestre s
                                          WHERE a.id_semestre = s.id
                                          AND estatus = '1'
                                          ORDER BY anio_escolar ASC, s.id ASC",
                                        $pagina);
    $params = $objPaginador->getPaginacion();
}
require "views/seccion/consultarSeccionView.phtml";