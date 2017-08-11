<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$vista = strtolower(trim($_GET["vista"]));
if(!$_SESSION["sesion"] 
        && $vista != "recuperar-contrasenia"
        && $vista != "recuperacion-por-pregunta-y-respuesta-secreta"
        && $vista != "recuperacion-por-correo-electronico") {
    $tema = "Inicio de Sesión";
    require "controllers/inicioSesionController.php";
}else {
    switch ($vista) {
        case "registrar-usuario":
            $tema = "Registro de Usuario";
            require "controllers/registrarUsuarioController.php";
        break;
        case "consultar-usuario":
            $tema = "Usuarios del Sistema";
            require "controllers/consultarUsuarioController.php";
        break;
        case "editar-usuario":
            $tema = "Edición de Usuario";
            require "controllers/editarUsuarioController.php";
        break;
        case "eliminar-usuario":
            $tema = "Eliminación del Usuario";
            require "controllers/eliminarUsuarioController.php";
        break;
        case "restaurar-usuario":
            $tema = "Restauración del Usuario";
            require "controllers/restaurarUsuarioController.php";
        break;
        case "papelera-usuario":
            $tema = "Usuarios Eliminados";
            require "controllers/papeleraUsuarioController.php";
        break;
        case "consultar-historial-de-usuario":
            $tema = "Historial de Usuarios";
            require "controllers/consultarHistorialDeUsuarioController.php";
        break;
        case "consultar-mi-historial-de-usuario":
            $tema = "Mi Historial de Usuario";
            require "controllers/consultarMiHistorialDeUsuarioController.php";
        break;
        case "consultar-mi-historial-de-usuario-por-fecha":
            $tema = "Historial de Usuarios";
            require "controllers/consultarMiHistorialDeUsuarioPorFechaController.php";
        break;
        case "consultar-historial-de-usuario-por-fecha":
            $tema = "Historial de Usuarios";
            require "controllers/consultarHistorialDeUsuarioPorFechaController.php";
        break;
    
        case "recuperar-contrasenia":
            $tema = "Recuperación de Contraseña";
            require "controllers/recuperarContraseniaController.php";
        break;
        case "recuperacion-por-pregunta-y-respuesta-secreta":
            $tema = "Recuperación de Contraseña por Pregunta y Respuesta Secreta";
            require "controllers/recuperarContraseniaPorPreguntaYRespuestaSecretaController.php";
        break;
        case "recuperacion-por-correo-electronico":
            $tema = "Recuperación de Contraseña por Correo Electrónico";
            require "controllers/recuperarContraseniaPorEmailController.php";
        break;
        case "mi-cuenta":
            $tema = "Mi Cuenta de Usuario";
            require "controllers/miCuentaController.php";
        break;
    
        case "registrar-estudiante":
            $tema = "Registro de Estudiante";
            require "controllers/registrarEstudianteController.php";
        break;  
        case "consultar-estudiante":
            $tema = "Estudiantes Registrados";
            require "controllers/consultarEstudianteController.php";
        break;  
        case "editar-estudiante":
            $tema = "Edición de Estudiante";
            require "controllers/editarEstudianteController.php";
        break; 
        case "eliminar-estudiante":
            $tema = "Eliminación del Estudiante";
            require "controllers/eliminarEstudianteController.php";
        break;
        case "papelera-estudiante":
            $tema = "Estudiante Eliminados";
            require "controllers/papeleraEstudianteController.php";
        break;
        case "restaurar-estudiante":
            $tema = "Restauración del Estudiante";
            require "controllers/restaurarEstudianteController.php";
        break;
        case "consultar-responsable":
            $tema = "Responsable de la Inscripción";
            require "controllers/consultarResponsableController.php";
        break;  
    
        case "registrar-inscripcion-estudiante":
            $tema = "Inscripcion de Estudiante";
            require "controllers/registrarInscripcionEstudianteController.php";
        break;  
        case "seleccionar-institucion-para-certificacion-de-notas":
            $tema = "Seleccionar Institución Escolar";
            require "controllers/seleccionarInstitucionCertificacionController.php";
        break;
        case "registrar-certificacion-de-notas":
            $tema = "Registrar las Notas Certificadas";
            require "controllers/registrarCertificacionDeNotasController.php";
        break;
        case "continuar-inscripcion":
            $tema = "Continuar Inscripción";
            require "controllers/continuarInscripcionController.php";
        break;
        case "registrar-inscripcion-asignatura":
            $tema = "Inscripcion de las Asignaturas del Estudiante";
            require "controllers/registrarInscripcionAsignaturaController.php";
        break;
        case "consultar-inscripcion":
            $tema = "Inscripciones Estudiantiles";
            require "controllers/consultarInscripcionController.php";
        break;
        case "generar-inscripcion":
            $tema = "Inscripción de Estudiante - ";
            require "controllers/generarInscripcionController.php";
        break;
    
        case "registrar-asignatura":
            $tema = "Registro de Asignaturas";
            require "controllers/registrarAsignaturaController.php";
        break;
        case "consultar-asignatura":
            $tema = "Asignaturas Registradas";
            require "controllers/consultarAsignaturaController.php";
        break;    
        case "editar-asignatura":
            $tema = "Edición de Asignatura";
            require "controllers/editarAsignaturaController.php";
        break;  
        case "asignar-horario":
            $tema = "Asignar Datos a la  Asignatura";
            require "controllers/asignarHorarioAsignaturaController.php";
        break; 
        case "asignar-horas":
            $tema = "Asignar Horas a la  Asignatura";
            require "controllers/asignarHorasAsignaturaController.php";
        break; 
        case "consultar-horario-de-asignatura":
            $tema = "Consultar Horas asignada de la Asignatura";
            require "controllers/consultarHorarioAsignaturaController.php";
        break; 
        case "consultar-horario-por-asignatura":
            $tema = "Consultar Horario";
            require "controllers/consultarHorarioPorAsignaturaController.php";
        break;
        case "editar-horario-por-docente":
            $tema = "Edición de Horario";
            require "controllers/editarHorarioPorDocenteController.php";
        break;
        case "horario-de-clases-estudiantil":
            $tema = "Horario de Clases";
            require "controllers/generarHorarioEstudiantilController.php";
        break;
        case "carga-horaria-de-docente":
            $tema = "Carga Horaria";
            require "controllers/generarCargaHorariaDocenteController.php";
        break;

        case "registrar-seccion":
            $tema = "Registro de Sección";
            require "controllers/registrarSeccionController.php";
        break;
        case "consultar-seccion":
            $tema = "Secciones Registradas";
            require "controllers/consultarSeccionController.php";
        break;    
        case "editar-seccion":
            $tema = "Edición de Sección";
            require "controllers/editarSeccionController.php";
        break;  
    
       case "registrar-docente":
            $tema = "Registro del Docente";
            require "controllers/registrarDocenteController.php";
        break; 
       case "consultar-docente":
            $tema = "Docentes Registrados";
            require "controllers/consultarDocenteController.php";
        break;  
       case "editar-docente":
            $tema = "Edición del Docente";
            require "controllers/editarDocenteController.php";
        break;
       case "eliminar-docente":
            $tema = "Eliminación del Docente";
            require "controllers/eliminarDocenteController.php";
        break;
       case "restaurar-docente":
            $tema = "Restauración del Docente";
            require "controllers/restaurarDocenteController.php";
        break;
       case "papelera-docente":
            $tema = "Docentes Eliminados";
            require "controllers/papeleraDocenteController.php";
        break;
       case "carga-horaria":
            $tema = "Carga Horaria del Docente";
            require "controllers/consultarCargaHorariaDocenteController.php";
        break;  
    
       case "registrar-personal-secretariado":
            $tema = "Registro del Personal Secretariado";
            require "controllers/registrarPersonalSecretariadoController.php";
        break; 
       case "consultar-personal-secretariado":
            $tema = "Personal Secretariado Registrado";
            require "controllers/consultarPersonalSecretariadoController.php";
        break;  
       case "editar-personal-secretariado":
            $tema = "Edición del Personal Secretariado";
            require "controllers/editarPersonalSecretariadoController.php";
        break;
       case "eliminar-personal-secretariado":
            $tema = "Eliminación del Personal Secretariado";
            require "controllers/eliminarPersonalSecretariadoController.php";
        break;
       case "restaurar-personal-secretariado":
            $tema = "Restauracón del Personal Secretariado";
            require "controllers/restaurarPersonalSecretariadoController.php";
        break;
       case "papelera-personal-secretariado":
            $tema = "Personal Secretariado Eliminados";
            require "controllers/papeleraPersonalSecretariadoController.php";
        break; 
    
        case "seleccionar-tipo-de-calificacion":
            $tema = "Selección del Tipo de Calificación";
            require "controllers/seleccionarTipoDeCalificacionController.php";
        break;
 
        case "consultar-notas-de-estudiante-por-asignatura":
            $tema = "Notas de Estudiantes";
            require "controllers/consultarNotasDeEstudiantePorAsignaturaController.php";
        break;
        case "actualizar-notas-estudiante":
            $tema = "Actualización de Notas de Estudiante";
            require "controllers/actualizarNotasEstudianteController.php";
        break;
    
        case "registrar-periodo":
            $tema = "Registro de Nuevo Período Escolar";
            require "controllers/registrarPeriodoAcademicoController.php";
        break;
        case "consultar-periodo":
            $tema = "Períodos Escolares";
            require "controllers/consultarPeriodoAcademicoController.php";
        break;
        case "cerrar-periodo":
            $tema = "Período Escolar";
            require "controllers/cerrarPeriodoAcademicoController.php";
        break; 
        case "cerrar-periodo-de-notas":
            $tema = "Cerrar Período de Notas";
            require "controllers/cerrarPeriodoDeNotasController.php";
        break;
    
        case "seleccionar-estudiante-extraordinario":
            $tema = "Selección del Estudiante";
            require "controllers/seleccionarEstudianteExtraordinarioController.php";
        break;
        case "seleccionar-estudiante-recuperativo":
            $tema = "Selección del Estudiante";
            require "controllers/seleccionarEstudianteRecuperativoController.php";
        break; 
        case "registrar-notas-extraordinario":
            $tema = "Registro de Notas del Extraordinario";
            require "controllers/registrarNotasExtraordinarioController.php";
        break; 
        case "registrar-notas-recuperativo":
            $tema = "Registro de Notas del Proceso de Revisión";
            require "controllers/registrarNotasRecuperativoController.php";
        break; 
    
        case "registrar-institucion-escolar":
            $tema = "Registro de Instituciones Escolares";
            require "controllers/registrarInstitucionEscolarController.php";
        break; 
        case "consultar-institucion-escolar":
            $tema = "Instituciones Escolares Registradas";
            require "controllers/consultarInstitucionEscolarController.php";
        break;
        case "editar-institucion-escolar":
            $tema = "Edición de la Institución Escolar";
            require "controllers/editarInstitucionEscolarController.php";
        break;

        case "seleccionar-reporte":
            $tema = "Selección del Reporte";
            require "controllers/seleccionarReporteController.php";
        break; 
            case "confirmacion-del-reporte":
            $tema = "Confirmación del Reporte";
            require "controllers/confirmacionDelReporteController.php";
        break; 
        case "consultar-constancia-de-estudio":
            $tema = "Constancia de Estudio";
            require "controllers/consultarConstanciaDeEstudioController.php";
        break;  
        case "record-estudiantil":
            $tema = "Record de Notas";
            require "controllers/generarRecordEstudiantilController.php";
        break;
        case "seleccionar-certificacion-de-notas":
            $tema = "Selección del la Certificación de Calificaciones";
            require "controllers/seleccionarCertificacionDeNotasController.php";
        break;
        case "certificacion-de-notas-media-general":
            $tema = "Certificación de Calificaciones";
            require "controllers/generarCertificacionDeNotasGeneralController.php";
        break;
        case "certificacion-de-notas-media-profesional":
            $tema = "Certificación de Calificaciones";
            require "controllers/generarCertificacionDeNotasProfesionalController.php";
        break;
        
        case "configuracion":
            $tema = "Configuración";
            require "controllers/configuracionController.php";
        break;
    
        case "acerca-del-producto":
            $tema = "Acerca del Producto";
            require "controllers/acercaDelProductoController.php";
        break;
        case "inicio":
            //$tema = "Acerca del Producto";
            require "controllers/inicioController.php";
        break;
    
        case "cerrar-sesion":
            require "controllers/cerrarSesionController.php";
        break;
    	  default:
    	  		require "controllers/inicioController.php";
    	  break;	
 
    }
}
