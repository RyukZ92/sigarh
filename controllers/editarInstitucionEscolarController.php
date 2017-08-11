<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "institucion_escolar ie JOIN ciudad c ON (id_ciudad = c.id) JOIN estado e ON(id_estado = e.id)";
$datos = array("ie.id", "nombre", "ciudad", "c.id AS id_ciudad", "estado", "e.id AS id_estado");
$condicion = "ie.id = '" . $_POST["id"] . "'";
$orden = null;
$_institucion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
print_r($_institucion);
$_estado = $objCrudGenerica->consultar("estado", null, null, "estado ASC");
$_ciudad = $objCrudGenerica->consultar("ciudad", null, "id_estado = '" . $_institucion[0]["id_estado"] . "'", "ciudad ASC");

if (isset($_POST['editar'])) {
    if (AsistenteBasico::validarCamposVacios(array($_POST["institucion"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("institucion_escolar", "upper(" . AsistenteBasico::limpiarEspacios('nombre') . ") = '" . strtoupper(AsistenteBasico::limpiarEspacios($_POST["institucion"])) . "'") > 0)) {
            $notificacion = $alerta["registro_existente"];
    } else {
        $tabla = "institucion_escolar";
        $datos = (array('nombre'  =>  $_POST["institucion"],
                        'id_ciudad' => $_POST["ciudad"]));
        $condicion = "id = '" . $_POST["id"] . "'";
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);        
        if($result) {            
            $notificacion = $alerta["actualizacion_exitosa"]; 
            
            $datos = array("accion"     => "Editó la Institución Escolar: <b>" . $_POST["institucion"]. "</b>",
                           "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);   
            
            header("refresh:2;consultar-institucion-escolar/pagina/" . $_POST["pagina_referencia"]);
        } else {
            $notificacion = $alerta["actualizacion_error"];  
        }
    }
}

require "views/institucion/editarInstitucionEscolarView.phtml";
