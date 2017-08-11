<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
##Notificaciones exitosas
$alerta["registro_exitoso"] = '<div class="alert alert-success" role="alert" id="alertas">
                                <strong>¡Muy bien!</strong> Registro realizado con éxito.
                            </div>';
$alerta["inscripción_exitosa"] = '<div class="alert alert-success" role="alert" id="alertas">
                                <strong>¡Muy bien!</strong> Inscripción realizada con éxito.
                            </div>';

$alerta["actualizacion_exitosa"] = '<div class="alert alert-success" role="alert" id="alertas">
                                <strong>¡Muy bien!</strong> Actualización realizada con éxito.
                            </div>';
$alerta["eliminacion_exitosa"] = '<div class="alert alert-success" role="alert" id="alertas">
                                <strong>¡Muy bien!</strong> Eliminación realizada con éxito.
                            </div>';
$alerta["restauracion_exitosa"] = '<div class="alert alert-success" role="alert" id="alertas">
                                <strong>¡Muy bien!</strong> Restauración realizada con éxito.
                            </div>';
$alerta["periodo_cerrado_con_exito"] = '<div class="alert alert-success" role="alert" id="alertas">
                                <strong>¡Muy bien!</strong> Período cerrado exitosamente.
                            </div>';
## Exitosos con 98% de ancho para configuración
$alerta["actualizacion_de_configuracion_exitosa"] = '<div class="alert alert-success" role="alert" id="alertas" style="width:98%">
                                <strong>¡Muy bien!</strong> Configuración actualiada con éxito.
                            </div>';
##Notificaciones de información
$alerta["informacion_espere"] = '<div class="alert alert-info" role="alert" id="alertas">
                                <strong>¡Información!</strong> Espere un momento, redireccionando la página.
                            </div>';
$alerta["hora_pre_asignada_exitosamente"] = '<div class="alert alert-info" role="alert" id="alertas">
                                <strong>¡Información!</strong> Registro pre-cargado con éxito.
                            </div>';
##Notificaciones de error
 $alerta["registro_error"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Problemas al intenter realizar el registro.
                           </div>';
$alerta["actualizacion_error"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Problemas al intenter realizar la edición.
                           </div>';
$alerta["eliminacion_error"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Problemas al intenter realizar la eliminación.
                           </div>';
$alerta["restauracion_error"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Problemas al intenter realizar la eliminación.
                           </div>';
$alerta["registro_no_existe"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Registro no encontrado.
                           </div>';
$alerta["respuesta_secreta_incorrecta"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Respuesta secreta incorrecta.
                           </div>';    
$alerta["campos_vacios"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Rellene los campos obligatorios.
                           </div>';
$alerta["contrasenia_incorrecta"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Contraseña incorrecta.
                           </div>';
$alerta["contrasenias_no_coinciden"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Las contraseñas no coinciden.
                           </div>';
$alerta["contrasenia_actual_incorrecta"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> La contraseña actual es incorrecta.
                           </div>';
$alerta["rellene_pregunta_secreta"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Rellene la pregunta secreta.
                           </div>';
$alerta["rellene_respuesta_secreta"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Rellene la respuesta secreta.
                           </div>';
$alerta["emails_nos_coinciden"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Los correos electrónicos no coinciden.
                           </div>';
$alerta["email_no_existe"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> El correo electrónico es incorrecto.
                           </div>';
$alerta["registro_existente"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Registro existente.
                           </div>';
$alerta["inscripcion_existente"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> El estudiante ya se encuentra inscrito en éste período escolar.
                           </div>';
$alerta["verifique_horario"] = '<div class="alert alert-danger" role="alert" id="alertas">
                                <strong>¡ERROR!</strong> Inconsistencia de horas. Por favor verifique las horas a asignar.
                           </div>'; 
$alerta["formato_img_invalido"] = '<div class="alert alert-danger" role="alert" id="alertas" style="width:98%;">
                                <strong>¡ERROR!</strong> Formato de imagen invalido.
                           </div>'; 
#Otros mensaje de errores
$alerta["credenciales_ivalidas"] = "<span><font color=red><center><b>Credenciales de acceso incorrecto</b></center></font></span>";

$alerta["no_extraordinario"] = "<center><h4><font color=blue><u>No puede acceder a los Extraordinarios/Recuperativos porque no hay un Período Escolar Activo</u></font></h4></center>";

$alerta["no_periodo"] = "<center><h4><font color=blue><u>No puede registrar un nuevo Período Escolar, porque encuentra uno Activo</u></font></h4></center>";

$alerta["no_inscripcion"] = "<center><h4><font color=blue><u>No se puede realizar inspcriones porque, no existe un Período Escolar Activo</u></font></h4></center>";

$alerta["estudiante_no_inscrito"] = "<center><h4><font color=blue><u>El estudiante no posee inscripción actualmente</u></font></h4></center>";
$alerta["no_asignatura_disponible"] = "<center><h4><font color=blue><u>No posee asignaturas disponibles</u></font></h4></center>";