<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

if (isset($_POST["enviar"])) {
	if ($_POST["tipo_certificacion"] == "general") {
		$_SESSION["url_constancia"] = URLBASE . "certificacion-de-notas-media-general";
	} else {
		$_SESSION["url_constancia"] = URLBASE . "certificacion-de-notas-media-profesional";
	}
	header("location:" . URLBASE . "confirmacion-del-reporte");
}

require "views/reporte/seleccionarCertificacionDeNotasView.phtml";
