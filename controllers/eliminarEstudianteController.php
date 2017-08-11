<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
if (empty($_SESSION["dni_estudiante"])) {
    $_SESSION["dni_estudiante"] = $_POST["dni_estudiante"];
}

$tabla = 'datos_personales d, estudiante e';
$datos = array("tipo_dni, d.dni, nombre, apellido, sexo, fecha_natal, telefono, direccion", "lugar_nacimiento");
$condicion = "d.dni = '" . $_SESSION["dni_estudiante"] . "' AND e.dni = d.dni";
$orden = null;
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['confirmar']) {
    $tabla = 'datos_personales';  
    $datos = array('eliminado' =>  1);
    $condicion = "dni = '" . $_SESSION["dni_estudiante"] . "'";

    $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
    if ($result) {
        $notificacion = $alerta["eliminacion_exitosa"];
        $datos = array("accion"     => "Eliminó al Estudiante: <b>" . $_estudiante[0]["tipo_dni"] . "-" . $_estudiante[0]["dni"] . "</b>",
                        "usuario"    => $_SESSION["usuario"]);
        $objCrudGenerica->guardar("historial", $datos, null, null);
        unset($_SESSION["dni_estudiante"]);
        header("refresh:2;consultar-estudiante/pagina/" . $_POST["pagina_referencia"]);
    } else {
        $notificacion = $alerta["eliminacion_error"];
    }
    
}

require "views/estudiante/eliminarEstudianteView.phtml";
