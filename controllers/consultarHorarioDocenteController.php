<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "../db/dbPdo.php";
require "../librarys/crudGenerica/crudGenerica.php";
require "../config/config.php";
require "../librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
#Consultando Períodos Académicos
$tabla = "periodo_academico";
$datos = array("periodo_academico");
$condicion = "estatus = '1'";
$orden = null;
$_periodoAcademico = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

$tabla = "datos_personales dp JOIN docente d ON(dp.dni = d.dni) JOIN docente_asignatura da ON (d.dni = da.dni_docente) JOIN horario_asignatura ha ON(da.id_horario_asignatura = ha.id) JOIN asignatura a ON(ha.codigo_asignatura = a.codigo)JOIN horas_asignatura hha ON (ha.id = hha.id_horario_asignatura)";
$datos = array("tipo_dni", "d.dni", "dp.nombre", "dp.apellido", "dia", "codigo_seccion", "a.nombre AS nombre_asignatura", "hora_inicio", "hora_salida", "aula");
$condicion = "d.dni = '" . $_GET["dni"] . "' AND ha.periodo_academico = '" . $_periodoAcademico[0]["periodo_academico"] . "'";
$orden = "dia ASC, hora_inicio ASC";
$_cargaHoraria = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
$lun = $mar = $mie= $jue = $vie = $sab = $dom = 0;
for($i=0;$i<COUNT($_cargaHoraria);$i++) {
    
    switch ($_cargaHoraria[$i]["dia"]) {
        case 1:            
            $_horarioDocente["lunes"]["nombre_asignatura"][$lun] = $_cargaHoraria[$i]["nombre_asignatura"];
            $_horarioDocente["lunes"]["seccion"][$lun] = $_cargaHoraria[$i]["codigo_seccion"];
            $_horarioDocente["lunes"]["hora_inicio"][$lun] = $_cargaHoraria[$i]["hora_inicio"];
            $_horarioDocente["lunes"]["hora_salida"][$lun] = $_cargaHoraria[$i]["hora_salida"];
            $_horarioDocente["lunes"]["aula"][$lun] = $_cargaHoraria[$i]["aula"];            
            $_horarioDocente["lunes"]["dia"][$lun] = $_cargaHoraria[$i]["dia"];
            $lun++;
        break;
        case 2:
            $_horarioDocente["martes"]["nombre_asignatura"][$mar] = $_cargaHoraria[$i]["nombre_asignatura"];
            $_horarioDocente["martes"]["seccion"][$mar] = $_cargaHoraria[$i]["codigo_seccion"];
            $_horarioDocente["martes"]["hora_inicio"][$mar] = $_cargaHoraria[$i]["hora_inicio"];
            $_horarioDocente["martes"]["hora_salida"][$mar] = $_cargaHoraria[$i]["hora_salida"];
            $_horarioDocente["martes"]["aula"][$mar] = $_cargaHoraria[$i]["aula"];            
            $_horarioDocente["martes"]["dia"][$mar] = $_cargaHoraria[$i]["dia"];
            $mar++;
        break;
        case 3:
            $_horarioDocente["miercoles"]["nombre_asignatura"][$mie] = $_cargaHoraria[$i]["nombre_asignatura"];
            $_horarioDocente["miercoles"]["seccion"][$mie] = $_cargaHoraria[$i]["codigo_seccion"];
            $_horarioDocente["miercoles"]["hora_inicio"][$mie] = $_cargaHoraria[$i]["hora_inicio"];
            $_horarioDocente["miercoles"]["hora_salida"][$mie] = $_cargaHoraria[$i]["hora_salida"];
            $_horarioDocente["miercoles"]["aula"][$mie] = $_cargaHoraria[$i]["aula"];            
            $_horarioDocente["miercoles"]["dia"][$mie] = $_cargaHoraria[$i]["dia"];
            $mie++;
        break;            
        case 4:
            $_horarioDocente["jueves"]["nombre_asignatura"][$jue] = $_cargaHoraria[$i]["nombre_asignatura"];
            $_horarioDocente["jueves"]["seccion"][$jue] = $_cargaHoraria[$i]["codigo_seccion"];
            $_horarioDocente["jueves"]["hora_inicio"][$jue] = $_cargaHoraria[$i]["hora_inicio"];
            $_horarioDocente["jueves"]["hora_salida"][$jue] = $_cargaHoraria[$i]["hora_salida"];
            $_horarioDocente["jueves"]["aula"][$jue] = $_cargaHoraria[$i]["aula"];            
            $_horarioDocente["jueves"]["dia"][$jue] = $_cargaHoraria[$i]["dia"];
            $jue++;
        break;         
        case 5:
            $_horarioDocente["viernes"]["nombre_asignatura"][$vie] = $_cargaHoraria[$i]["nombre_asignatura"];
            $_horarioDocente["viernes"]["seccion"][$vie] = $_cargaHoraria[$i]["codigo_seccion"];
            $_horarioDocente["viernes"]["hora_inicio"][$vie] = $_cargaHoraria[$i]["hora_inicio"];
            $_horarioDocente["viernes"]["hora_salida"][$vie] = $_cargaHoraria[$i]["hora_salida"];
            $_horarioDocente["viernes"]["aula"][$vie] = $_cargaHoraria[$i]["aula"];            
            $_horarioDocente["viernes"]["dia"][$vie] = $_cargaHoraria[$i]["dia"];
            $vie++;
        break;

        case 6:
            $sab++;
        break;

        case 7:
            $dom++;
        break;
        default:
            return "Error";
        break;        
    }
}         

require "../views/docente/consultarCargaHorariaDocenteView.phtml";



?>