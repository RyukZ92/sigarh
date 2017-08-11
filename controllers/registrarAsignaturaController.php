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
$condicion = null;
$orden = "anio_escolar ASC, id ASC";
$_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
if ($_POST['registrar']) {
   
    if (AsistenteBasico::validarCamposVacios(array($_POST["semestre"], $_POST["codigo"], $_POST["asignatura"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("asignatura", "upper(codigo) = '" . strtoupper($_POST["codigo"]) . "'") > 0)) {
            $notificacion = $alerta["registro_existente"];
    } else {
        $tabla = "asignatura";
        $datos = (array('codigo'  => strtoupper($_POST["codigo"]), 
                        'nombre'  =>  $_POST["asignatura"],
                        'id_semestre'  =>  $_POST["semestre"]));
        $condicion = null;
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);        
        if($result) {
            $datos = array("accion"     => "Registró la Asignatura: <b>" . $_POST["codigo"] . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            
            unset($_POST);
            $notificacion = $alerta["registro_exitoso"];           
        } else {
            echo $result;
            $notificacion = $alerta["registro_error"];  
        }
    }
}


require "views/asignatura/registrarAsignaturaView.phtml";
