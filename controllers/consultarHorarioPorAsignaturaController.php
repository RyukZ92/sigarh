<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "librarys/crudGenerica/crudGenerica.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
require "librarys/paginador/paginador.php";
$objCrudGenerica = new CrudGenerica();
$objPaginador = new Paginador();

$_periodo = $objCrudGenerica->consultar("periodo_academico", null, "estatus = '1'", null);
$pagina = $_GET['pagina'];
$_horarioAsignatura = $objPaginador->paginar_5("SELECT ha.id, tipo_dni, d.dni, a.nombre,codigo_seccion, cupos, s.nombre AS semestre
                                        FROM datos_personales dp JOIN docente d ON(dp.dni = d.dni) 
                                        JOIN docente_asignatura da ON (d.dni = da.dni_docente) 
                                        JOIN horario_asignatura ha ON(da.id_horario_asignatura = ha.id) 
                                        JOIN asignatura a ON(ha.codigo_asignatura = a.codigo)
                                        JOIN semestre s ON s.id = id_semestre
					WHERE periodo_academico = '" . $_periodo[0]["periodo_academico"] . "'
                                        ORDER BY anio_escolar ASC, d.dni ASC",
                                    $pagina);
$params = $objPaginador->getPaginacion();

require "views/asignatura/consultarHorarioPorAsignaturaView.phtml";