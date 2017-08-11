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

$_institucion = $objPaginador->paginar_5("SELECT ie.id, nombre, ciudad, estado
                                      FROM institucion_escolar ie JOIN ciudad c ON(id_ciudad = c.id) JOIN estado e ON (id_estado = e.id)
                                      ORDER BY ie.id ASC",
                                    $pagina);
$params = $objPaginador->getPaginacion();

require "views/institucion/consultarInstitucionEscolarView.phtml";