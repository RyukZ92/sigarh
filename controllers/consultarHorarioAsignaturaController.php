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


$pagina = $_GET['pagina'];
$_horarioAsignatura = $objPaginador->paginar_5("SELECT tipo_dni, d.dni, a.nombre,codigo_seccion, cupos
                                        FROM datos_personales dp JOIN docente d ON(dp.dni = d.dni) 
                                        JOIN docente_asignatura da ON (d.dni = da.dni_docente) 
                                        JOIN horario_asignatura ha ON(da.id_horario_asignatura = ha.id) 
                                        JOIN asignatura a ON(ha.codigo_asignatura = a.codigo)
                                        ORDER BY d.dni ASC",
                                    $pagina);
$params = $objPaginador->getPaginacion();

require "views/asignatura/consultarHorarioAsignaturaView.phtml";