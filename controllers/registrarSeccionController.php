<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "semestre";
$datos = null;
$condicion = null;
$orden = "anio_escolar ASC, id ASC";
$_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
if ($_POST['registrar']) {
   
    if (AsistenteBasico::validarCamposVacios(array($_POST["semestre"], $_POST["codigo"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("seccion", "upper(codigo) = '" . strtoupper($_POST["codigo"]) . "'") > 0)) {
            $notificacion = $alerta["registro_existente"];
    } else {
        $tabla = "seccion";
        $datos = (array('codigo'        =>  $_POST["codigo"], 
                        'id_semestre'  	=>  $_POST["semestre"]));
        $condicion = null;
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);        
        if($result) {   
            $datos = array("accion"     => "Registró la Sección: <b>" . $_POST["codigo"] . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            unset($_POST);
            $notificacion = $alerta["registro_exitoso"];           
        } else {
            $notificacion = $alerta["registro_error"];  
        }
    }
}


require "views/seccion/registrarSeccionView.phtml";
