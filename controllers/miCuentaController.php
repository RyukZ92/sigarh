<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
$tabla = "usuario";
$datos = null;
$condicion = "usuario = '" . $_SESSION["usuario"] . "'";
$orden = null;
$_usuario = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
$guardar = null;
if ($_POST["actualizar"]) {
    if (AsistenteBasico::validarCamposVacios(array($_POST["email"]))) {
        $notificacion = $alerta["campos_vacios"];
    } else if (md5($_POST["contrasenia_actual"]) != $_usuario[0]["contrasenia"]) {
        $notificacion = $alerta["contrasenia_actual_incorrecta"];        
    } else if (strlen($_POST["nueva_contrasenia"]) > 0) {
        if (AsistenteBasico::validarContrasenia($_POST["nueva_contrasenia"])) {
            $notificacion = $alerta["contrasenia_incorrecta"];
        } else if ($_POST["nueva_contrasenia2"] != $_POST["nueva_contrasenia"]) {
            $notificacion = $alerta["contrasenias_no_coinciden"];
        } else {
            $guardar = true;
        }
    }
    if (strlen($_POST["pregunta"]) > 0 && empty($_POST["respuesta"])) { 
        $notificacion = $alerta["rellene_respuesta_secreta"];
        $guardar = null;
    } else if (strlen($_POST["respuesta"]) > 0 && empty($_POST["pregunta"])) { 
        $notificacion = $alerta["rellene_pregunta_secreta"];
        $guardar = null;
    } else {
        $guardar = true;
    }
    
    if ($guardar == true) {
        $email = strtolower($_POST["email"]);
        $contrasenia = empty($_POST["nueva_contrasenia"]) ? $_usuario[0]["contrasenia"] : md5($_POST["nueva_contrasenia"]);
        $pregunta = empty($_POST["pregunta"]) ? $_usuario[0]["pregunta_secreta"] : $_POST["pregunta"];
        $respuesta = empty($_POST["respuesta"]) ? $_usuario[0]["respuesta_secreta"] : md5(strtolower($_POST["respuesta"]));
        $tabla = "usuario";
        $datos = array('email'          =>  $email,
                       'contrasenia'    =>  $contrasenia,
                       'pregunta_secreta'       =>  $pregunta,
                       'respuesta_secreta'      =>  $respuesta);
        $condicion = "usuario = '" . $_SESSION["usuario"] . "'";

        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion); 
        if ($result) {
            $notificacion = $alerta["actualizacion_exitosa"];
            $datos = array("accion"     => "Actualizó su cuenta de usuario",
                            "usuario"   => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            header("refresh:2;mi-cuenta");
        } else {
            $notificacion = $alerta["actualizacion_error"];
        }
    }
}

require "views/usuario/miCuentaView.phtml";