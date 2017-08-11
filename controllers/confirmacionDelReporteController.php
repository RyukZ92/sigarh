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
$_periodo = $objCrudGenerica->consultar("periodo_academico", null, "estatus = '1'", null);
$inscrito = $objCrudGenerica->contarFilas("inscripcion", "dni_estudiante = '" . $_SESSION["dni_estudiante"] . "' AND periodo_academico = '" . $_periodo[0]["periodo_academico"] . "'");

$_estudiante = $objCrudGenerica->consultar("datos_personales d JOIN estudiante e ON (d.dni = e.dni)", null, "e.dni = '" . $_SESSION["dni_estudiante"] . "'", null);

    if ($_SESSION["url_constancia"] == URLBASE . "consultar-constancia-de-estudio") {
         $tema = "Generar Constancia de Estudio";
    } else if ($_SESSION["url_constancia"] == URLBASE . "certificacion-de-notas") { 
        $tema = "Generar Certificación de Notas";
    } else if ($_POST["tipo_constancia"] == URLBASE . "horario-de-clases-estudiantil") { 
        $tema = "Generar Horario de Clases";
    } else if ($_SESSION["url_constancia"] == URLBASE . "record-estudiantil") { 
        $tema = "Generar Record de Notas";
    }
require "views/reporte/confirmacionDelReporteView.phtml";