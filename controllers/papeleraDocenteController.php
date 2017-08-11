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
if(!empty($_REQUEST["buscar"])) {
    $_docente = $objCrudGenerica->consultar("datos_personales dp JOIN docente d ON (dp.dni = d.dni)", null, "d.dni = '" . $_REQUEST["buscar"] . "'", null);
} else {        
    $_docente = $objPaginador->paginar_5("SELECT * FROM datos_personales dp JOIN docente d ON (dp.dni = d.dni) WHERE eliminado = '1'
                                          ORDER BY d.dni ASC",
                                        $pagina);
    $params = $objPaginador->getPaginacion();
}
require "views/docente/papeleraDocenteView.phtml";