<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
$objCrudGenerica = new CrudGenerica();
#Consultando Período Académico
$tabla = "periodo_academico";
$condicion = "estatus = '1'";

$_periodo = $objCrudGenerica->contarFilas($tabla, $condicion);

    //Consultando Semestres
    $tabla = "semestre";
    $datos = null;
    $orden = "id ASC";
    $condicion = null;
    $_semestre = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);
    if(!empty($_POST["pagina_referencia"])) {
        $_SESSION["pagina_referencia"] = $_POST["pagina_referencia"];
    }


    //Consultando los datos de la Asignatura
    $tabla = "asignatura, semestre";
    $datos = array("codigo","asignatura.nombre AS nombre_asignatura","asignatura.nombre AS nombre_asignatura", "semestre.nombre AS nombre_semestre", "semestre.id AS id_semestre");
    $orden = null;
    $condicion = "codigo = '" . $_POST["codigo_asignatura"] . "' AND id = id_semestre";
    $_asignatura = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

    //Consultando Secciones
    $tabla = "seccion";
    $datos = array("codigo");
    $orden = "codigo ASC";
    $condicion = "id_semestre = '" . $_asignatura[0]["id_semestre"] . "'";
    $_seccion = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

    //Consultando Profesores
    $tabla = "datos_personales dp JOIN docente d ON (dp.dni = d.dni)";
    $datos = array("d.dni","(tipo_dni||'-'||d.dni||' '||nombre||' '||apellido) docente");
    $orden = "dni ASC";
    $condicion = null;
    $_docente = $objCrudGenerica->consultar($tabla, $datos, $condicion, $orden);

    if (isset($_POST["enviar"])) {
            $_SESSION["veces_por_semana"] = $_POST["veces_por_semana"];
            $_SESSION["seccion"] = $_POST["seccion"];
            $_SESSION["docente"] = $_POST["docente"];
            $_SESSION["cupos"] = $_POST["cupos"]; 
            $_SESSION["asignatura"] = $_asignatura[0]["nombre_asignatura"];
            $_SESSION["codigo_asignatura"] = $_POST["codigo_asignatura"];
            $_SESSION["semestre"] = $_POST["semestre"];
            $_SESSION["seccion"] = $_POST["seccion"];
            if (AsistenteBasico::validarCamposVacios(array($_POST["veces_por_semana"], 
                                                           $_POST["docente"], 
                                                           $_POST["cupos"], 
                                                           $_POST["seccion"]))) {
                $notificacion = $alerta["campos_vacios"];
                $_SESSION["asignarHoras"] = null;
           } else {
                header("location:asignar-horas");
           }
    }
    require "views/asignatura/asignarHorarioAsignaturaView.phtml";
