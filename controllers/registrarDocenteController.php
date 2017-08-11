<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
    
if ($_POST['registrar']) {
    ##Paso 1.1: Verificar registro existente
    $tabla = 'datos_personales';
    $condicion = "dni = '" . $_POST["dni"] ."'";
    
    if (AsistenteBasico::validarCamposVacios(array($_POST["tipo_dni"],
                                                    $_POST["dni"],
                                                    $_POST["nombre"],                                                    
                                                    $_POST["apellido"],
                                                    $_POST["sexo"],
                                                    $_POST["cargo"],                                                  
                                                    $_POST["fecha_natal"]))
    ) {
       $notificacion = $alerta["campos_vacios"];
      ## Paso 1.2: Verificando registro existente 
    } elseif($objCrudGenerica->contarFilas($tabla, $condicion) > 0) {  
	$notificacion = $alerta["registro_existente"];
    } else {        
        $datos = array('tipo_dni'      =>  $_POST["tipo_dni"],
                       'dni'           =>  $_POST["dni"],
                       'nombre'        =>  $_POST["nombre"],
                       'apellido'      =>  $_POST["apellido"],
                       'sexo'          =>  $_POST["sexo"],
                       'fecha_natal'   =>  AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_natal"]));
        $condicion = null;
        
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);
        
        if ($result) {
            $tabla = 'docente';  
            $datos = array('dni'    =>  $_POST["dni"],
                           'cargo'  =>  $_POST["cargo"]);
            $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
            $condicion = null;
            if ($result) {
                $datos = array("accion"     => "Registró Al Docente: <b>" . $_POST["tipo_dni"] . "-" . $_POST["dni"] . "</b>",
                                "usuario"    => $_SESSION["usuario"]);
                $objCrudGenerica->guardar("historial", $datos, null, null);
                unset($_POST);
                $notificacion = $alerta["registro_exitoso"];
            } else {
                $notificacion = $alerta["registro_error"];
            }
        } else {
            $notificacion = $alerta["registro_error"];
        }
    }
}

require "views/docente/registrarDocenteView.phtml";
