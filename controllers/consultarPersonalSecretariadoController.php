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
$_secretariado = $objPaginador->paginar_5("SELECT * FROM datos_personales dp JOIN secretariado s ON (dp.dni = s.dni)
                                          WHERE eliminado != '1'
                                          ORDER BY s.dni ASC",
                                        $pagina);
$params = $objPaginador->getPaginacion();
require "views/secretariado/consultarPersonalSecretariadoView.phtml";