<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();




if ($_POST["entrar"]) {
	$tabla = "usuario u JOIN datos_personales ON(dni = dni_persona)";
	$datos = array("usuario", "email", "tipo_usuario", "datos_personales.eliminado", "dni_persona", "nombre", "apellido");
	$condicion = "u.eliminado = '0' AND lower(usuario) = '" . AsistenteBasico::limpiarCampo(strtolower($_POST["usuario"])) . "' AND contrasenia = '" . AsistenteBasico::limpiarCampo(MD5($_POST["contrasenia"])) . "'";
	$_usuario = $objCrudGenerica->consultar($tabla, $datos, $condicion, null);
	
	if (count($_usuario) > 0) {
		$_SESSION["sesion"] = true;
		$_SESSION["usuario"] =  $_usuario[0]["usuario"];
		$_SESSION["tipo_usuario"] =  $_usuario[0]["tipo_usuario"];
                $_SESSION["dni_sesion"] = $_usuario[0]["dni_persona"];
                $_SESSION["nombre_sesion"] = $_usuario[0]["nombre"];
                $_SESSION["apellido_sesion"] = $_usuario[0]["apellido"];
                $_SESSION["incremento"] = 0;
                $datos = array("accion"     => "Inició Sesión",
                               "usuario"    => $_SESSION["usuario"]);
                $objCrudGenerica->guardar("historial", $datos, null, null);
		
                header("location:" . URLBASE . "inicio");
	} else {
		$notificacion = $alerta["credenciales_ivalidas"];
	}
}
require "views/usuario/inicioSesionView.phtml";