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

$pagina = $_GET['pagina'];
$_inscripcion = $objPaginador->paginar_5("SELECT * FROM inscripcion
                                        ORDER BY fecha_inscripcion ASC",
                                        $pagina);
$params = $objPaginador->getPaginacion();
$_periodo = $objCrudGenerica->consultar("periodo_academico", array("periodo_academico"), "estatus = '1'", null);
$inscritos = $objCrudGenerica->contarFilas("inscripcion", "periodo_academico = '" . $_periodo[0]["periodo_academico"] . "'");

require "views/inscripcion/consultarInscripcionView.phtml";