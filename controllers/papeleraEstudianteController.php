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
    $_estudiante = $objCrudGenerica->consultar("datos_personales d JOIN estudiante e ON (d.dni = e.dni)", null, "e.dni = '" . $_REQUEST["buscar"] . "'  AND eliminado = '1'", null);
} else {        
    $_estudiante = $objPaginador->paginar_5("SELECT * FROM datos_personales d JOIN estudiante e ON (d.dni = e.dni)  WHERE eliminado = '1' ORDER BY d.dni ASC",
                                        $pagina);
    $params = $objPaginador->getPaginacion();
}
require "views/estudiante/papeleraEstudianteView.phtml";