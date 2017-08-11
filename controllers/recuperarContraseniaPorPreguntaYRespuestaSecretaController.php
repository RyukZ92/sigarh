<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
$datos = array("usuario","pregunta_secreta", "respuesta_secreta");
$condicion =  "lower(usuario) = '" . $_SESSION["usuario"] ."'";
$_usuario = $objCrudGenerica->consultar("usuario", $datos, $condicion, null);
if (isset($_POST["enviar"])) {
    if (AsistenteBasico::validarCamposVacios(array($_POST["respuesta"]))) {
        
        $notificacion = $alerta["campos_vacios"];
    } else if (md5(strtolower ($_POST["respuesta"])) != $_usuario[0]["respuesta_secreta"]) {
        $notificacion = $alerta["respuesta_secreta_incorrecta"];        
    } else {

        $nuevaContrasenia = AsistenteBasico::generarContraseniaAleatorio();
        $recuperacion = 1;
        $tabla = "usuario";
        $datos = array("contrasenia" => md5($nuevaContrasenia));
        $condicion =  "lower(usuario) = '" . strtolower($_SESSION["usuario"]) ."'";
        $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
        
        $datos = array("accion"     => "Recuperó contraseña mediante pregunta y respuesta secreta",
                       "usuario"    => $_usuario[0]["usuario"]);
        $objCrudGenerica->guardar("historial", $datos, null, null);
        unset($_POST);
        unset($_SESSION);
        
    }
}
require "views/usuario/recuperarContraseniaPorPreguntaYRespuestaSecretaView.phtml";