<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/phpmailer/enviar_email.php";
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

if (isset($_POST['registrar'])) {
	$tabla = 'usuario';	
	$condicion = "lower(usuario) = '" . strtolower($_POST["usuario"]) ."'";
    if (AsistenteBasico::validarCamposVacios(array($_POST["usuario"],
                                                    $_POST["dni"],
                                                    //$_POST["contrasenia"],
                                                    //$_POST["contrasenia2"],                                                    
                                                    $_POST["email"],
                                                    $_POST["email2"],   
                                                    //$_POST["pregunta"],
                                                    //$_POST["respuesta"],
                                                    $_POST["tipo_usuario"]))
    ) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas($tabla, $condicion)) > 0) {
		$notificacion = $alerta["registro_existente"];
    } elseif(($objCrudGenerica->contarFilas("usuario", "dni_persona = '" . $_POST["dni"] . "'")) > 0) {
		$notificacion = $alerta["registro_existente"];      
    } elseif(($objCrudGenerica->contarFilas("datos_personales", "dni = '" . $_POST["dni"] . "'")) == 0) {
		$notificacion = $alerta["registro_no_existe"];            
    /*} elseif (AsistenteBasico::validarContrasenia($_POST["contrasenia"])) {
        $notificacion = $alerta["contrasenia_incorrecta"];*/
    } elseif ($_POST["contrasenia"] != $_POST["contrasenia2"]) {
        $notificacion = $alerta["contrasenias_nos_coinciden"];
    } elseif (strtolower($_POST["email"]) != strtolower($_POST["email2"])) {
        $notificacion = $alerta["emails_nos_coinciden"];
    } else {        
        $contrasenia = AsistenteBasico::generarContraseniaAleatorio(); 
        $datos = array('dni_persona'        =>  trim($_POST["dni"]),
                       'usuario'            =>  trim($_POST["usuario"]),
                       'contrasenia'        =>  md5($contrasenia),
                       'email'              =>  trim(strtolower($_POST["email"])),
                       //'pregunta_secreta'   =>  trim($_POST["pregunta"]),
                       //'respuesta_secreta'  =>  md5(trim($_POST["respuesta"])),
                       'tipo_usuario'      =>  $_POST["tipo_usuario"]);
        $condicion = null;
        
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
        if ($result) {
            $_usuario = $objCrudGenerica->consultar("datos_personales", array("nombre", "apellido"), "dni = '" . $_POST["dni"] . "'", null);
            $nombre = explode(" ", $_usuario[0]["nombre"]);
            $apellido = explode(" ", $_usuario[0]["apellido"]);
                   
            $usuario = $_POST["usuario"]; 
        smtpmailer(strtolower($_POST['email']),'cearepublicadehaiti@hotmail.com','Sistema Automatizado SIGARH',
                                        'Bienvenido a SIGARH'  ,
                                        "<font FACE='roman' size='3'>Hola " . $nombre[0] . " " . $apellido[0] . ", se le creado un usuario y contraseña de acceso en nuestro sistema de información SIGARH.
                                        <br><br>Sus credenciales son:<br> <b>Usuario: </b>" . $usuario . "
                                        <br><b>Contraseña: </b>" . trim($contrasenia) . "
                                        <br><br><br>
                                        <font size='2'><b>Nota:</b> No responda este correo electrónico, no está siendo monitoreado.</font></font>");
        
            $datos = array("accion"     => "Registró al Usuario: <b>" . $_POST["usuario"] . "</b>",
                           "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            unset($_POST);
            $notificacion = $alerta["registro_exitoso"];
        } else {
            $notificacion = $alerta["registro_error"];
        }
    }
}

require "views/usuario/registrarUsuarioView.phtml";
