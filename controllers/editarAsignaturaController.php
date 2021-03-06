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

$tabla = "asignatura, semestre";
$datos = array("codigo","asignatura.nombre AS nombre_asignatura", "semestre.nombre AS nombre_semestre");
$orden = null;
$condicion = "codigo = '" . $_POST["codigo_asignatura"] . "' AND id = id_semestre";
$_asignatura = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['editar']) {
   
    if (AsistenteBasico::validarCamposVacios(array($_POST["semestre"], $_POST["codigo"], $_POST["asignatura"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("asignatura", "upper(codigo) = '" . strtoupper($_POST["codigo"]) . "'") > 0)
             && ($_POST["codigo_asignatura"] != $_POST["codigo"])) {
            $notificacion = $alerta["registro_existente"];
    } else {
        $tabla = "asignatura";
        $datos = (array('codigo'  =>  strtoupper($_POST["codigo"]), 
                        'nombre'  =>  $_POST["asignatura"]));
        $condicion = "codigo = '" . $_POST["codigo_asignatura"] . "'";
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);        
        if($result) {
            $notificacion = $alerta["actualizacion_exitosa"];
            
            $datos = array("accion"     => "Editó la Asignatura: <b>" . $_POST["codigo_asignatura"] . "</b>",
               "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            
            header("refresh:2;" . URLBASE . "consultar-asignatura/pagina/" . $_POST["pagina_referencia"]);
        } else {
            $notificacion = $alerta["actualizacion_error"];  
        }
    }
}


require "views/asignatura/editarAsignaturaView.phtml";
