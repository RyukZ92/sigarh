<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

$tabla = "periodo_academico";
$datos = array("periodo_academico");
$condicion = "estatus = '1'";
$orden = null;
$_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);


$cantidadNotas = 5;
if ($_POST['confirmar']) {    
        $tabla = "periodo_academico";
        $datos = (array('estatus' =>  0, 'fecha_cierre' => 'now()'));
        $condicion = "estatus = '1' OR periodo_academico ='" . $_POST["periodo"] . "'";
        //$objCrudGenerica->guardar("periodo_academico", array("estatus" => 0), "estatus = '1'", null); 
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);        
        if($result) {
            $datos = array("accion"     => "Cerró el Período Académico <b>" . $_POST["periodo"] ."</b>",
                           "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null); 
            unset($_POST);
            $notificacion = $alerta["periodo_cerrado_con_exito"];
            header("refresh:2;" .URLBASE . "consultar-periodo");
        } else {
            $notificacion = $alerta["actualizacion_error"]; 
        }
}
require "views/periodoAcademico/cerrarPeriodoAcademicoView.phtml";
