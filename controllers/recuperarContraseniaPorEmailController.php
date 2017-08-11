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
$datos = array("usuario", "email", "nombre", "apellido");
$condicion =  "lower(email) = '" . $_POST["email"] ."'";
$_usuario = $objCrudGenerica->consultar("usuario JOIN datos_personales ON dni_persona = dni", $datos, $condicion, null);
if (isset($_POST["enviar"])) {
    if (AsistenteBasico::validarCamposVacios(array($_POST["email"]))) {        
        $notificacion = $alerta["campos_vacios"];
    } else if (count($_usuario) == 0) {
        $notificacion = $alerta["email_no_existe"];        
    } else {
        $nombre = explode(" ", $_usuario[0]["nombre"]);
        $apellido = explode(" ", $_usuario[0]["apellido"]);
        $usuario = $_usuario[0]["usuario"];
        $nuevaContrasenia = AsistenteBasico::generarContraseniaAleatorio();
        $recuperacion = 1;
        $tabla = "usuario";
        $datos = array("contrasenia" => md5($nuevaContrasenia));
        $condicion =  "lower(usuario) = '" . strtolower($_usuario[0]["usuario"]) ."'";
        $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
        
        smtpmailer(strtolower($_POST['email']),'cearepublicadehaiti@hotmail.com','Sistema Automatizado SIGARH',
                                        'Recuperación de Contraseña'  ,
                                        "<font FACE='roman' size='3'>Hola " . $nombre[0] . " " . $apellido[0] . ",
                                        <br><br>Sus credenciales de acceso son:<br> <b>Usuario: </b>".$usuario."
                                        <br><b>Contraseña: </b>" . trim($nuevaContrasenia) . "
                                        <br><br><br>
                                        <font size='2'><b>Nota:</b> No responda este correo electrónico, no está siendo monitoreado.</font></font>");
        
        $datos = array("accion"     => "Recuperó contraseña mediante su correo electrónico",
                       "usuario"    => $_usuario[0]["usuario"]);
        $objCrudGenerica->guardar("historial", $datos, null, null);
        unset($_POST);
        unset($_SESSION);
        
    }
}
require "views/usuario/recuperarContraseniaPorEmailView.phtml";