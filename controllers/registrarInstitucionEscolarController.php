<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "estado";
$datos = null;
$condicion = null;
$orden = "id ASC";
$_estado = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
if ($_POST['registrar']) {
   
    if (AsistenteBasico::validarCamposVacios(array($_POST["ciudad"], $_POST["estado"], $_POST["institucion"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("institucion_escolar", "upper(" . AsistenteBasico::limpiarEspacios('nombre') . ") = '" . strtoupper(AsistenteBasico::limpiarEspacios($_POST["institucion"])) . "'") > 0)) {
            $notificacion = $alerta["registro_existente"];
    } else {
        $tabla = "institucion_escolar";
        $datos = (array('nombre'    =>  $_POST["institucion"], 
                        'id_ciudad' =>  $_POST["ciudad"]));
        $condicion = null;
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);        
        if($result) {    
            $datos = array("accion"     => "Registró a la Institución Escolar: <b>" . $_POST["institucion"] . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            unset($_POST);
            
            $notificacion = $alerta["registro_exitoso"];           
        } else {
            $notificacion = $alerta["registro_error"];  
        }
    }
}

require "views/institucion/registrarInstitucionEscolarView.phtml";
