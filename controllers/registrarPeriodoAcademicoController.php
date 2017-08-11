<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "periodo_academico";
$condicion = "estatus = '1'";
$_filas= $objCrudGenerica->contarFilas($tabla, $condicion);
if ($_filas > 0) {
     $notificacion = $alerta["no_periodo"];
     
} else {

    if ($_POST['registrar']) {

        if (AsistenteBasico::validarCamposVacios(array($_POST["periodo"], $_POST["fecha_desde"], $_POST["fecha_hasta"]))) {
           $notificacion = $alerta["campos_vacios"];
        } elseif(($objCrudGenerica->contarFilas("periodo_academico", "upper(periodo_academico) = '" . strtoupper($_POST["periodo"]) . "'") > 0)) {
                $notificacion = $alerta["registro_existente"];
        } else {
            $tabla = "periodo_academico";
            $datos = (array('periodo_academico' =>  $_POST["periodo"], 
                            'fecha_desde'       =>  AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_desde"]),
                            'fecha_hasta'       =>  AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_hasta"])));
            $condicion = null;
            $objCrudGenerica->guardar("periodo_academico", array("estatus" => 0), "estatus = '1'", null); 
            $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);        
            if($result) {      
            $datos = array("accion"     => "Registró el Período Académico: <b>" . $_POST["periodo"] . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
                unset($_POST);
                $notificacion = $alerta["registro_exitoso"];
                header("refresh:2;" . URLBASE . "consultar-periodo");
            } else {
                $notificacion = $alerta["registro_error"];  
            }
        }
    }    
}
require "views/periodoAcademico/registrarPeriodoAcademicoView.phtml";

