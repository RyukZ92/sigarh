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
$datos = array("usuario, email, tipo_usuario");
$condicion = "usuario = '" . $_POST["usuario"] . "'";
$orden = null;
$_usuario = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
if ($_POST["confirmar"]) {

    $tabla = "usuario";
    $datos = array('eliminado' =>  0);
    $condicion = "usuario = '" . $_POST["usuario"] . "'";

    $result = $objCrudGenerica->guardar($tabla, $datos, $condicion); 
    if ($result) {
        $notificacion = $alerta["restauracion_exitosa"];
        $datos = array("accion"     => "Restauró al Usuario: <b>" . $_POST["usuario"] . "</b>",
                        "usuario"   => $_SESSION["usuario"]);
        $objCrudGenerica->guardar("historial", $datos, null, null);
        header("refresh:3;consultar-usuario/pagina/" . $_POST["pagina_referencia"]);
    } else {
        $notificacion = $alerta["restaurar_error"];
    }
    
}

require "views/usuario/restaurarUsuarioView.phtml";