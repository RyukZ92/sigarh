<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = 'datos_personales dp JOIN secretariado s ON (dp.dni = s.dni)';
$datos = array("tipo_dni, dp.dni, nombre, apellido, sexo, fecha_natal, cargo");
$condicion = "dp.dni = '" . $_POST["dni_secretariado"] . "'";
$orden = null;
$_secretariado = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['confirmar']) {

    $tabla = 'datos_personales';  
    $datos = array('eliminado' =>  1);
    $condicion = "dni = '" . $_POST["dni_secretariado"] . "'";

    $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
    if ($result) {
        $notificacion = $alerta["eliminacion_exitosa"];
        $datos = array("accion"     => "Eliminó al Secretariado: <b>" . $_secretariado[0]["tipo_dni"] . "-" .$_POST["dni_secretariado"] . "</b>",
                        "usuario"   => $_SESSION["usuario"]);
        $objCrudGenerica->guardar("historial", $datos, null, null);
        header("refresh:2;consultar-personal-secretariado/pagina/" . $_POST["pagina_referencia"]);
    } else {
        $notificacion = $alerta["eliminacion_error"];
    }
}

require "views/secretariado/eliminarPersonalSecretariadoView.phtml";
