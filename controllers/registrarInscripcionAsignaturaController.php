<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 //periodo académico

require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();

##Consultando Período Académico Actual
$tabla = "periodo_academico";
$datos = array("periodo_academico", "fecha_desde", "fecha_hasta", "estatus");
$condicion = "estatus = '1'";
$orden = null;
$_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
$periodoAcademico = $_periodoAcademico[0]["periodo_academico"];

##Seleccionando asignatura por asignatura
if (isset($_POST['inscribir']) && $_POST["id_horario"] != null) {
    if (empty($_POST["codigo_asignatura"])) {
        $notificacion = $alerta["campos_vacios"];
    } else {        
        $tabla = "horario_asignatura h JOIN horas_asignatura a ON (h.id = a.id_horario_asignatura)";
        $datos = array("dia", "hora_inicio", "hora_salida", "aula");
        $condicion = "id_horario_asignatura = '" . $_POST["id_horario"] . "'";
        $orden = null;
        $_horario = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

        $_SESSION["id_horario"][] = $_POST["id_horario"];
    }
}

##Eliminado materia seleccionada
if (is_numeric($_GET["eliminar"]) ) {
    $eliminar = $_GET["eliminar"];
    for($i=0;$i<count($_SESSION["id_horario"]); $i++) {
        if($_SESSION["id_horario"][$i] == $eliminar) {         
            $_SESSION["id_horario"][$i] = null;           
        }
    }
    header("refresh:0;" . URLBASE . $_GET["vista"]);    
}
##Obtener recor académico
$tabla = "record_academico ra JOIN estudiante e ON e.dni = dni_estudiante
        JOIN datos_personales dp ON e.dni = dp.dni";
$datos = array("codigo_asignatura", "tipo_dni||'-'||e.dni||' '||dp.nombre||' '||apellido AS estudiante");
$condicion = "dni_estudiante = '" . $_SESSION["dni"] . "'";
$orden = null;
$_recordAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

##obtener datos del estudiante
$tabla = "estudiante e JOIN datos_personales dp ON e.dni = dp.dni";
$datos = array("tipo_dni||'-'||e.dni||' '||dp.nombre||' '||apellido AS estudiante");
$condicion = "e.dni= '" . $_SESSION["dni"] . "'";
$orden = null;
$_estudiante = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

##obtener Semestre Seleccionado
$tabla = "semestre";
$datos = null;
$condicion = null;
$orden = "anio_escolar ASC, id ASC";
$_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$rowspan = null;
##Registrando datos del responsable
if (isset($_POST['continuar'])) {
    $dniResponsable = $_SESSION["dni_sesion"];

    #Registrando datos de inscripción
    $tabla = 'inscripcion';  
    $datos = array('dni_estudiante'         =>  $_SESSION["dni"],
                   'dni_responsable'        =>  $dniResponsable,
                   'periodo_academico'      =>  $periodoAcademico);
    $condicion = null;
    $ultimoIdInscripcion = $objCrudGenerica->guardar($tabla, $datos, $condicion, true);
    
    #Registrando las asginaturas
    if ($ultimoIdInscripcion > 0) {
        for ($i=0; $i < count($_SESSION["id_horario"]); $i++) {
            $tabla = 'inscripcion_asignatura';
            if ($_SESSION["id_horario"][$i] != null) {

                $datos = array('id_inscripcion'          =>  $ultimoIdInscripcion,
                               'id_horario_asignatura'   =>  $_SESSION["id_horario"][$i]);
                $condicion = null;
                $result = $objCrudGenerica->guardar($tabla, $datos, $condicion, false);

                if ($result) {
                    //print_r($_asignatura);
                    $tab = 'horario_asignatura h JOIN horas_asignatura ha ON (h.id = ha.id_horario_asignatura)';
                    $dat = array("h.codigo_asignatura AS asignatura");
                    $cond = "id_horario_asignatura = '" . $_SESSION["id_horario"][$i] . "' LIMIT 1";
                    $ord = null;
                    $_horario = $objCrudGenerica->consultar($tab, $dat, $cond, $ord);
                    for ($j=0; $j<count($_horario); $j++) {
                        $tabla = 'calificacion';
                        $datos = array( 'id_inscripcion'    =>  $ultimoIdInscripcion,
                                        'dni_estudiante'    =>  $_SESSION["dni"],
                                        'codigo_asignatura' =>  $_horario[$j]["asignatura"]);
                        $condicion = null;
                        $ultimoIdCalificacion = $objCrudGenerica->guardar($tabla, $datos, $condicion, true);
                            for($k=0; $k<5; $k++) {
                                $datos = array("nota"            => 0, 
                                               "id_calificacion" => $ultimoIdCalificacion);
                                //echo "<br>[$k] = INSERT nota (nota, id_calificacion) VALUES ('0', '$ultimoIdCalificacion'};";
                                $result = $objCrudGenerica->guardar("nota", $datos, null, null);
                            }
                            //echo "[$j]<br>";
                            
                    }     
                }
            }
            //echo "<br>[$i]";
        }
        if ($result) {
            $datos = array("accion"     => "Registró Inscripción del Estudiante: <b>" . $_SESSION["dni"] . "</b> del Período Escolar: <b>" . $periodoAcademico . "</b>",
                            "usuario"    => $_SESSION["usuario"]);
            $objCrudGenerica->guardar("historial", $datos, null, null);
            unset($_POST);
            unset($_SESSION["id_horario"], $_SESSION["dni"], $_SESSION["dni_responsable"], $_SESSION["nombre"], 
                    $_SESSION["apellido"], $_SESSION["sexo"], $_SESSION["disabled"], $_SESSION["equivalencia"], 
                    $_SESSION["fecha_natal"], $_SESSION["semestre"], $_SESSION["responsable_inscripto"], $_SESSION["dia"], 
                    $_SESSION["institucion"], $_SESSION["institucion_seleccionada"], $_SESSION["asignatura"], $_SESSION["respuesta"]);
            $notificacion = $alerta["registro_exitoso"];
            header("refresh:2;" . URLBASE . "registrar-inscripcion-estudiante");
        } else {
            $notificacion = $alerta["registro_error"];
        }       
    }
    
}
require "views/inscripcion/registrarInscripcionAsignaturaView.phtml";