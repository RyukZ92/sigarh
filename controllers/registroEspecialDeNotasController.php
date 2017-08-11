<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

if (isset($_POST['cargar_notas'])) {
    $_asignatura = $objCrudGenerica->consultar("asignatura", null, "id_semestre = '" . $_POST["semestre"] . "'", null);
   
    for ($i=0; $i<count($_asignatura); $i++) {
         $j = $_SESSION["incremento"];
        if (isset($_POST["checkbox_" . $_asignatura[$i]["codigo"]])
            &&($_POST["nota_" . $_asignatura[$i]["codigo"]] > 9)) {
            $_SESSION["nombre_asignatura"][$j] = $_POST["nombre_asignatura_" . $_asignatura[$i]["codigo"]];
            $_SESSION["asignatura"][$j] = $_POST["checkbox_" . $_asignatura[$i]["codigo"]];
            $_SESSION["nota"][$j] = $_POST["nota_" . $_asignatura[$i]["codigo"]];
            $_SESSION["fecha"][$j] = $_POST["fecha_" . $_asignatura[$i]["codigo"]];
            $_SESSION["semestre"][$j] = $_POST["semestre"];
            $_SESSION["incremento"]++;
            $_SESSION["continuar"] = true;
        } 
    }
}

$tabla = "semestre";
$datos = null;
$condicion = "1 = 1";
$orden = "anio_escolar ASC, id ASC";
if (isset($_SESSION["semestre"])) {
    for($i=0; $i<$_SESSION["incremento"]; $i++) {
        
        if ($_SESSION["semestre"][$i] != null) {
            $condicion .= " AND id != '" . $_SESSION["semestre"][$i] . "'";
        }
    }
}



$_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

    if (isset($_POST["registrar"])) {
        for ($i=0; $i<count($_SESSION["nota"]); $i++) {
            //echo "INSERT INTO record_academico (".$_SESSION["dni"].", ".$_SESSION["nota"][$i].", ".$_SESSION["asignatura"][$i].", Cert, ".AsistenteBasico::convertirFechaAaaaMmDd($_SESSION["fecha"][$i]).")";
            $tabla = "record_academico";
            $datos = (array('dni_estudiante'    =>  $_SESSION["dni"], 
                            'nota'              =>  $_SESSION["nota"][$i],
                            'codigo_asignatura' =>  $_SESSION["asignatura"][$i],
                            'tipo'              =>  'C',
                            'id_institucion'    =>  $_SESSION["institucion"],
                            'fecha'             =>  AsistenteBasico::convertirFechaAaaaMmDd($_SESSION["fecha"][$i])));
        
        $condicion = null;
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, null);     
        }
              
        if($result) {           
            

            $_SESSION["incremento"] = 0;
            $_SESSION["institucion_seleccionada"] = $_SESSION["institucion"];
            
            $datos = array("accion"     => "Registró Certificación de Notas del Estudiante: <b>" . $_SESSION["dni"] . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            
            unset($_POST);
            unset($_SESSION["nota"], $_SESSION["nombre_asignatura"], $_SESSION["asignatura"], $_SESSION["fecha"], 
                    $_SESSION["semestre"]);
            $notificacion = $alerta["registro_exitoso"];
            header("refresh:2;" . URLBASE . "continuar-inscripcion");
        } else {
            $notificacion = $alerta["registro_error"];  
        }
    }
require "views/inscripcion/registrarCertificacionDeNotasView.phtml";
