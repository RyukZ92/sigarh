<?php
if ($_SESSION["tipo_usuario"] != "Administrador")
    $estiloUsuario = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] == "Docente")
    $estiloEstudiante = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] != "Administrador")
    $estiloDocente = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] == "Docente")
    $estiloInscripcion = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] == "Docente")
    $estiloInscripcion = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] != "Administrador")
    $estiloAsignatura = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] == "Secretariado")
    $estiloCalificacion = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] == "Docente")
    $estiloInstitucion = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] != "Administrador")
    $estiloPeriodo = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] == "Docente")
    $estiloConstancia = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] != "Administrador")
    $estiloHistorial = "style='color:gray; cursor:default;'";
if($_SESSION["tipo_usuario"] != "Administrador")
    $estiloConfiguracion = "style='color:gray; cursor:default;'";
?>
<div id='cssmenu'>
<ul>
   <li class='active has-sub'><a href='#' <?php echo $estiloUsuario; ?><span>Gestión de Usuarios</span></a>
    <?php if ($_SESSION["tipo_usuario"] == "Administrador"): ?>
      <ul>
          <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-usuario'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Registrar</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-usuario'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li> 
   <li class='active has-sub'><a href='#' <?php echo $estiloEstudiante; ?>><span>Gestión de Estudiantes</span></a>
    <?php if ($_SESSION["tipo_usuario"] != "Docente"): ?>
      <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-estudiante'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Registrar</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-estudiante'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
     <?php endif; ?>   
   </li>
  
   <li class='active has-sub'><a href='#' <?php echo $estiloDocente; ?>><span>Gestión de Docentes</span></a>
    <?php if ($_SESSION["tipo_usuario"] == "Administrador"): ?> 
       <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-docente'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Registrar</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-docente'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
     <?php endif; ?>
   </li>   
   <li class='active has-sub'><a href='#' <?php echo $estiloInscripcion; ?>><span>Gestión de Inscripciones</span></a>
    <?php if ($_SESSION["tipo_usuario"] != "Docente"): ?>   
       <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-inscripcion-estudiante'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Inscribir</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-inscripcion'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>
   <!--<li class='active has-sub'><a href='#'><span>Gestión de Secciones</span></a>
      <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-seccion'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Registrar</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-seccion'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
   </li>-->   
   <li class='active has-sub'><a href='#' <?php echo $estiloAsignatura; ?>><span>Gestión de Asignaturas</span></a>
    <?php if ($_SESSION["tipo_usuario"] == "Administrador"): ?>       
       <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-asignatura'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Registrar</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-asignatura'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>  
   <li class='active has-sub'><a href='#' <?php echo $estiloCalificacion; ?>><span>Gestión de Calificaciones</span></a>
    <?php if ($_SESSION["tipo_usuario"] != "Secretariado"): ?>       
       <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>seleccionar-tipo-de-calificacion'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Notas del Estudiante</span></a></li>
      </ul>
    <?php endif; ?>
   </li>
   <li class='active has-sub'><a href='#' <?php echo $estiloPeriodo; ?>><span>Períodos Escolares</span></a>
    <?php if ($_SESSION["tipo_usuario"] == "Administrador"): ?>  
       <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-periodo'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Nuevo Período</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-periodo'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>
   <li class='active has-sub'><a href='#' <?php echo $estiloInstitucion; ?>><span>Instituciones Escolares</span></a>
    <?php if ($_SESSION["tipo_usuario"] != "Docente"): ?>   
       <ul>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>registrar-institucion-escolar'><img src="<?php echo URLBASE; ?>public/img/add.png" class="icono-menu"><span>Registrar</span></a></li>
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-institucion-escolar'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>
   <li class='active has-sub'><a href='#' <?php echo $estiloConstancia; ?>><span>Reportes</span></a>
    <?php if ($_SESSION["tipo_usuario"] != "Docente"): ?>        
      <ul>      
         <li class='has-sub'><a href='<?php echo URLBASE; ?>seleccionar-reporte'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>
   <li class='active has-sub'><a href='#' <?php echo $estiloHistorial; ?>><span>Historial de Usuarios</span></a>
    <?php if ($_SESSION["tipo_usuario"] == "Administrador"): ?>   
       <ul>      
         <li class='has-sub'><a href='<?php echo URLBASE; ?>consultar-historial-de-usuario'><img src="<?php echo URLBASE; ?>public/img/search.png" class="icono-menu"><span>Consultar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>
   <li class='active has-sub'><a href='#' <?php echo $estiloConfiguracion; ?>><span>Configuración</span></a>
    <?php if ($_SESSION["tipo_usuario"] == "Administrador"): ?>  
       <ul>      
         <li class='has-sub'><a href='<?php echo URLBASE; ?>configuracion'><img src="<?php echo URLBASE; ?>public/img/gear.png" class="icono-menu"><span>Configurar</span></a></li>
      </ul>
    <?php endif; ?>
   </li>   
</ul>
</div>