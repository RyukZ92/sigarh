<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

if(!empty($_GET["eliminar"]) || $_GET["eliminar"] == '0') {
    $_SESSION["dia"][$_GET["eliminar"]] = null;
} 

if (isset($_POST["pre_asignar"])) {
    if (AsistenteBasico::validarCamposVacios(array($_POST["dia"], 
                                                   $_POST["hora_inicio"], 
                                                   $_POST["hora_salida"], 
                                                   $_POST["aula"]))) {
        $notificacion = $alerta["campos_vacios"];

   } elseif(((in_array($_POST["dia"], $_SESSION["dia"]))
           && (in_array($_POST["horario_inicio"], $_SESSION["horario_inicio"]))
           && (in_array($_POST["horario_salida"], $_SESSION["horario_salida"]))
           && (in_array($_POST["aula"], $_SESSION["aula"])))
            ) {
            $notificacion = $alerta["verifique_horario"];

    } else {

        $_SESSION["dia"][] = $_POST["dia"];
        $_SESSION["hora_inicio"][] = $_POST["hora_inicio"];
        $_SESSION["hora_salida"][] = $_POST["hora_salida"];
        $_SESSION["aula"][] = $_POST["aula"];
        $notificacion = $alerta["hora_pre_asignada_exitosamente"];
        unset($_POST);

    }
}
$totalHorario = 0;
for ($i=0; $i<count($_SESSION["dia"]); $i++) {
    if ($_SESSION["dia"][$i] != null) {   
        $totalHorario++;
    }
}

//Consultando período académico actual
$tabla = "periodo_academico";
$datos = array("periodo_academico");
$condicion = "estatus = '1'";
$orden = null;
$_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
$periodoAcademico = $_periodoAcademico[0]["periodo_academico"];
        
if (isset($_POST["asignar_horas"])) {

    $tabla = "horario_asignatura";
    $datos = (array('codigo_asignatura' =>  $_SESSION["codigo_asignatura"],
                    'cupos'             =>  $_SESSION["cupos"],
                    'codigo_seccion'    =>  $_SESSION["seccion"],
                    'periodo_academico' =>  $periodoAcademico));
    $condicion = null;
    $ultimoId = $objCrudGenerica->guardar($tabla, $datos, $condicion, true);
    if($ultimoId > 0) {
        $tabla = "docente_asignatura";
        $datos = (array('dni_docente'            =>  $_SESSION["docente"], 
                        'id_horario_asignatura'  =>  $ultimoId));
        $condicion = null;
        $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, false);
  
        if ($result) { 
            for ($i=0; $i<count($_SESSION["dia"]);$i++) {
            if($_SESSION["dia"][$i] != null) {
                $tabla = "horas_asignatura";
                $datos = (array('dia'                   =>  $_SESSION["dia"][$i],
                                'hora_inicio'          =>  AsistenteBasico::convertirHoraA24H($_SESSION["hora_inicio"][$i]),
                                'hora_salida'          =>  AsistenteBasico::convertirHoraA24H($_SESSION["hora_salida"][$i]),
                                'aula'                  =>  $_SESSION["aula"][$i],
                                'id_horario_asignatura' =>  $ultimoId));
                $condicion = null;
                $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, false);

                }
            }
        }
        if ($result) {
            $notificacion = $alerta["registro_exitoso"];
            header("refresh:2;" . URLBASE . "consultar-asignatura/pagina/" . $_SESSION["pagina_referencia"]);
            unset($_SESSION["dia"], $_SESSION["hora_inicio"], $_SESSION["hora_salida"], $_SESSION["aula"], 
                  $_SESSION["docente"], $_SESSION["codigo_asignatura"], $_SESSION["cupos"], $_SESSION["seccion"], 
                  $_SESSION["semestre"], $_SESSION["veces_por_semana"]);
        } else {
            $notificacion = $alerta["registro_error"];
        }
    }
} 
require "views/asignatura/asignarHorasAsignaturaView.phtml";
