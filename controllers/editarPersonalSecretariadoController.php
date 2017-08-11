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
$datos = array("tipo_dni", "dp.dni", "nombre", "apellido", "sexo", "fecha_natal", "telefono");
$condicion = "dp.dni = '" . $_POST["dni_docente"] . "'";
$orden = null;
$_secretariado = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

if ($_POST['editar']) {
    ##Paso 1.1: Verificar registro existente
    
    $condicion = "d.dni = '" . $_POST["dni_docente"] ."'";
    
    if (AsistenteBasico::validarCamposVacios(array($_POST["tipo_dni"],
                                                    $_POST["dni"],
                                                    $_POST["nombre"],                                                    
                                                    $_POST["apellido"],
                                                    $_POST["sexo"],
                                                    $_POST["fecha_natal"]))
    ) {
       $notificacion = $alerta["campos_vacios"];
    } elseif($filas > 0) {	
        ## Paso 1.2: Verificando registro existente
        $filas = $objCrudGenerica->contarFilas($tabla, $condicion);       
	$notificacion = $alerta["registo_existente"];
    } else {
        $tabla = 'datos_personales';  
        $datos = array('tipo_dni'      =>  $_POST["tipo_dni"],
                       'dni'           =>  $_POST["dni"],
                       'nombre'        =>  $_POST["nombre"],
                       'apellido'      =>  $_POST["apellido"],
                       'sexo'          =>  $_POST["sexo"],
                       'fecha_natal'   => AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_natal"]));
        $condicion = "dni = '" . $_POST["dni_docente"] . "'";
        
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
        if ($result) {
            $tabla = 'secretariado';  
            $datos = array('telefono'   =>  $_POST["telefono"]);
            $condicion = "dni = '" . $_POST["dni"] . "'";
            $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
           
            if ($result) {
                $notificacion = $alerta["actualizacion_exitosa"];
                
                $datos = array("accion"     => "Editó al Secretariado: <b>" . $_POST["tipo_dni"] . "-" .$_POST["dni"] . "</b>",
                                "usuario"    => $_SESSION["usuario"]);
                $objCrudGenerica->guardar("historial", $datos, null, null);
                
                header("refresh:2;consultar-personal-secretariado/pagina/" . $_POST["pagina_referencia"]);
            } else {
                $notificacion = $alerta["actualizacion_error"]." 1";
            }
        } else {
            $notificacion = $alerta["actualizacion_error"]." 2";
        }
    }
}

require "views/secretariado/editarPersonalSecretariadoView.phtml";
