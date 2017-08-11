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
    $dni = empty($_POST["dni"]) ? 1 :$_POST["dni"];
    $usuario = empty($_POST["usuario"]) ? 1 : strtolower($_POST["usuario"]);
    if (AsistenteBasico::validarCamposVacios(array($_POST["opcion_recuperacion"]))) {
        $notificacion = $alerta["campos_vacios"];
    } else if((AsistenteBasico::validarCamposVacios(array($_POST["dni"], $_POST["usuario"])) 
            && $_POST["opcion_recuperacion"] != "email")
            ) {
        $notificacion = $alerta["campos_vacios"];
    }
        else if ($objCrudGenerica->contarFilas("usuario", "dni_persona = '" . $dni . "' AND lower(usuario) = '" . $usuario . "'") == 0
                && $_POST["opcion_recuperacion"] != "email") {
        $notificacion = $alerta["registro_no_existe"];
    } else {
        $_SESSION["dni"] = $_POST["dni"];
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["opcion_recuperacion"] = $_POST["opcion_recuperacion"];
        $_SESSION["recuperacion_contrasenia"] = true;
        if ($_POST["opcion_recuperacion"] == "pregunta") {
            header("location:" . URLBASE . "recuperacion-por-pregunta-y-respuesta-secreta");
        } else {
            header("location:" . URLBASE . "recuperacion-por-correo-electronico");
        }
    }
}
require "views/usuario/recuperarContraseniaView.phtml";