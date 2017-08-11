<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = 'datos_personales dp JOIN docente d ON (dp.dni = d.dni)';
$datos = array("tipo_dni, dp.dni, nombre, apellido, sexo, fecha_natal, cargo");
$condicion = "dp.dni = '" . $_POST["dni_docente"] . "'";
$orden = null;
$_docente = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['confirmar']) {

    $tabla = 'datos_personales';  
    $datos = array('eliminado' =>  0);
    $condicion = "dni = '" . $_POST["dni_docente"] . "'";

    $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
    if ($result) {
        $notificacion = $alerta["restauracion_exitosa"];
        $datos = array("accion"    => "Restauró al Docente: <b>" . $_docente[0]["tipo_dni"] . "-" .$_POST["dni_docente"] . "</b>",
                       "usuario"   => $_SESSION["usuario"]);
        $objCrudGenerica->guardar("historial", $datos, null, null);
        header("refresh:2;consultar-docente/pagina/" . $_POST["pagina_referencia"]);
    } else {
        $notificacion = $alerta["restauracion_error"];
    }
}

require "views/docente/restaurarDocenteView.phtml";
