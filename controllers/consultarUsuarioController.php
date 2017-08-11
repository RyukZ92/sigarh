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
$_usuario = $objPaginador->paginar_5("SELECT * FROM usuario
                                    WHERE eliminado != '1'
                                    ORDER BY usuario ASC",
                                    $pagina);
$params = $objPaginador->getPaginacion();

require "views/usuario/consultarUsuarioView.phtml";