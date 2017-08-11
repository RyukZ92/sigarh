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

if(!empty($_POST["fecha_desde"]) 
        && !empty($_POST["fecha_desde"])) {
    $_SESSION["desde"] = AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_desde"]);
    $_SESSION["hasta"] = AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_hasta"]);
}
    
$pagina = $_GET['pagina'];

$_historial = $objPaginador->paginar_5("SELECT * FROM historial "
                                    . "WHERE fecha BETWEEN '" . $_SESSION["desde"] . "' AND '" . $_SESSION["hasta"] . "' "                                  
                                    . "ORDER BY fecha ASC, hora ASC", $pagina);
$params = $objPaginador->getPaginacion();

require "views/historial/consultarHistorialDeUsuarioView.phtml";