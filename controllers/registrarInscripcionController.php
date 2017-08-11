<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();


if ($_POST['continuar']) {
 print_r($_POST);  
    $_SESSION["responsable"] = $_POST["responsable"];
    $_SESSION["dni"] = $_POST["dni"];
    $_SESSION["copia_dni"] = $_POST["copia_dni"];
    $_SESSION["copia_partida_nac"] = $_POST["copia_partida_nac"];
    $_SESSION["certificado_primaria"] = $_POST["certificado_primaria"];
    $_SESSION["notas_certificadas"] = $_POST["notas_certificadas"];
    $_SESSION["foto_carnet"] = $_POST["foto_carnet"];
    ## Verificando registro existente
    $tabla = 'estudiante';
    $condicion = "dni = '" . $_SESSION["dni"] ."'";
    
    if (AsistenteBasico::validarCamposVacios(array($_POST["dni"], $_POST["responsable"]))) {
       $notificacion = $alerta["campos_vacios"];
    } elseif($objCrudGenerica->contarFilas($tabla, $condicion) < 1) {
	$notificacion = $alerta["registo_no_existe"];
    } else {
        $_SESSION["continuar"]  = 1;
        echo "<br>Aqui";
        //header("refresh:3;" . $_GET["vista"]);
        
       /* $datos = array('tipo_dni'      =>  $_POST["tipo_dni"],
                       'dni'           =>  $_POST["dni"],
                       'nombre'        =>  $_POST["nombre"],
                       'apellido'      =>  $_POST["apellido"],
                       'sexo'          =>  $_POST["sexo"],
                       'direccion'     =>  $_POST["direccion"],
                       'fecha_natal'   => AsistenteBasico::convertirFechaAaaaMmDd($_POST["fecha_natal"]));
        $condicion = null;
        
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
        
        if ($result) {
            $tabla = 'estudiante';  
            $datos = array('dni'                =>  $_POST["dni"],
                           'telefono'           =>  $_POST["telefono"]);
            $result = $objCrudGenerica->guardar($tabla, $datos, $condicion);
            $condicion = null;
            if ($result) {
                
                unset($_POST);
                $notificacion = $alerta["registro_exitoso"];
            } else {
                $notificacion = $alerta["registro_error"];
            }
        } else {
            $notificacion = $alerta["registro_error"];
        }*/
    }
}
if ($_SESSION['responsable'] == "S" && $_SESSION["continuar"] == 1) {
    $_SESSION["responsable"] = "registrar";
} 
if(isset($_POST["continuar"]) && $_SESSION["continuar"] == 1) {
    $_SESSION["responsable"] = null;
    $notificacion = $alerta["registro_exitoso"];
}


require "views/inscripcion/registrarInscripcionView.phtml";
