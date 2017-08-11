<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "semestre";
$datos = null;
$orden = "id ASC";
$condicion = null;
$_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$tabla = "seccion, semestre";
$datos = array("codigo", "semestre.nombre AS nombre_semestre");
$orden = null;
$condicion = "codigo = '" . $_POST["codigo_seccion"] . "' AND id = id_semestre";
$_seccion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['editar']) {
   
    if (AsistenteBasico::validarCamposVacios(array($_POST["codigo"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("seccion", "upper(codigo) = '" . strtoupper($_POST["codigo"]) . "'") > 0)
             && ($_POST["codigo_seccion"] != $_POST["codigo"])) {
            $notificacion = $alerta["registro_existente"];
    } else {
        $tabla = "seccion";
        $datos = (array('codigo'  =>  $_POST["codigo"]));
        $condicion = "codigo = '" . $_POST["codigo_seccion"] . "'";
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);        
        if($result) {
            $notificacion = $alerta["actualizacion_exitosa"];
            $datos = array("accion"     => "Editó a la Sección: <b>" . $_POST["codigo_seccion"] . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            header("refresh:2;consultar-seccion/pagina/" . $_POST["pagina_referencia"]);
        } else {
            $notificacion = $alerta["actualizacion_error"];  
        }
    }
}


require "views/seccion/editarSeccionView.phtml";
