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

if(empty($_POST["semestre"])) {
    $_asignatura = $objPaginador->paginar_5("SELECT codigo,a.nombre AS nombre_asignatura, s.nombre AS nombre_semestre
                                          FROM asignatura a, semestre s
                                          WHERE a.id_semestre = s.id
                                          ORDER BY anio_escolar ASC, s.id ASC",
                                        $pagina);
    $params = $objPaginador->getPaginacion();
} else {
    $datos = array("codigo", "a.nombre AS nombre_asignatura", "s.nombre AS nombre_semestre");
    $orden = "anio_escolar ASC, s.id ASC";
    $condicion = "a.id_semestre = '" . $_POST["semestre"] . "'";
    $_asignatura = $objCrudGenerica->consultar("asignatura a JOIN semestre s ON a.id_semestre = s.id", $datos, $condicion, $orden);   
}
require "views/asignatura/consultarAsignaturaView.phtml";