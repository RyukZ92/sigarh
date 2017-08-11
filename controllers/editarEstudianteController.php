<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = 'datos_personales d, estudiante e';
$datos = array("tipo_dni, d.dni, nombre, apellido, sexo, fecha_natal, telefono, direccion", "lugar_nacimiento", "id_estado");
$condicion = "d.dni = '" . $_POST["dni_estudiante"] . "' AND e.dni = d.dni";
$orden = null;
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
$_estado = $objCrudGenerica->consultar("estado", null, null, "estado ASC");
if ($_POST['editar']) {
    if (AsistenteBasico::validarCamposVacios(array($_POST["tipo_dni"],
                                                    $_POST["dni"],
                                                    $_POST["nombre"],                                                    
                                                    $_POST["apellido"],
                                                    $_POST["sexo"],
                                                    $_POST["lugar_nacimiento"],
                                                    $_POST["estado"],
                                                    $_POST["fecha_natal"]))
    ) {
       $notificacion = $alerta["campos_vacios"];
    } elseif(($objCrudGenerica->contarFilas("estudiante", "dni = '" . $_POST["dni"] ."'")) > 0 && $_POST["dni_estudiante"] != $_POST["dni"]) {	  
	$notificacion = $alerta["registo_existente"];
    } else {
        $tabla = 'datos_personales';  
        $datos = array('tipo_dni'         =>  $_POST["tipo_dni"],
                       'dni'              =>  $_POST["dni"],
                       'nombre'           =>  $_POST["nombre"],
                       'apellido'         =>  $_POST["apellido"],
                       'sexo'             =>  $_POST["sexo"],
                       'lugar_nacimiento' =>  $_POST["lugar_nacimiento"],
                       'direccion'        =>  $_POST["direccion"],
                       'fecha_natal'      => AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_natal"]));
        $condicion = "dni = '" . $_POST["dni_estudiante"] . "'";
        
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
        if ($result) {
            $tabla = 'estudiante';  
            $datos = array('telefono'   =>  $_POST["telefono"], 'id_estado'   =>  $_POST["estado"]);
            $condicion = "dni = '" . $_POST["dni_estudiante"] . "'";
            $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
           
            if ($result) {
                $notificacion = $alerta["actualizacion_exitosa"];
                
                $datos = array("accion"     => "Editó al Estudiante: <b>" . $_POST["tipo_dni"] . "-" .$_POST["dni"] . "</b>",
                                "usuario"    => $_SESSION["usuario"]);
                $objCrudGenerica->guardar("historial", $datos, null, null);

                header("refresh:2;consultar-estudiante/pagina/" . $_POST["pagina_referencia"]);
            } else {
                $notificacion = $alerta["actualizacion_error"];
            }
        } else {
            $notificacion = $alerta["actualizacion_error"];
        }
    }
}

require "views/estudiante/editarEstudianteView.phtml";
