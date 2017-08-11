<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "config/institucion.php";
require "librarys/AsistenteBasico/AsistenteBasico.php";
//$objCrudGenerica = new CrudGenerica();
$rutaRaiz = $_SERVER["DOCUMENT_ROOT"];

if(isset($_POST['actualizar'])) {	
    //Asignando variable locales a la imagen subida (si se sube)
    $tamanio_img_reporte = $_FILES['img_reporte']['size'];
    $tipo_img_reporte = explode('/',$_FILES['img_reporte']['type']);
    $tipo_img_reporte =  strtolower($tipo_img_reporte[1]);
    $tamanio_img_reporte/=1024;	
    $nombre_img_reporte = $_FILES['img_reporte']['name'];
    $ruta_img_reporte = $_FILES['img_reporte']['tmp_name'];
    $destino_img_reporte = "$rutaRaiz/sigarh/public/img/img_reporte.".$tipo_img_reporte;

    $tamanio_img_certificacion = $_FILES['img_certificacion']['size'];
    $tipo_img_certificacion = explode('/',$_FILES['img_certificacion']['type']);
    $tipo_img_certificacion =  strtolower($tipo_img_certificacion[1]);
    $tamanio_img_certificacion/=1024;	
    $nombre_img_certificacion = $_FILES['img_certificacion']['name'];
    $ruta_img_certificacion = $_FILES['img_certificacion']['tmp_name'];
    $destino_img_certificacion = "$rutaRaiz/sigarh/public/img/img_certificacion.".$tipo_img_certificacion;

    
    if ($tamanio_img_reporte > 0
        && $tipo_img_reporte != 'png'
        && $tipo_img_reporte != 'jpeg'
        && $tipo_img_reporte != 'jpg'
        && $tipo_img_reporte != 'gif'
            ) {
            $notificacion = $alerta['formato_img_invalido'];
    } else if ($tipo_img_certificacion > 0
        && $tipo_img_certificacion != 'png'
        && $tipo_img_certificacion != 'jpeg'
        && $tipo_img_certificacion != 'jpg'
        && $tipo_img_certificacion != 'gif'
            ) {
            $notificacion = $alerta['formato_img_invalido'];
    }
    else if ($tamanio_img_certificacion > 1024 || $tamanio_img_reporte > 1024) {
            echo $mensaje['no_size_img'];
    }        
    else {
	    $imagen_reporte = ($tamanio_img_reporte > 0) ? "img_reporte.".$tipo_img_reporte : $institucion['img_reporte'];
        $imagen_certificacion = ($tamanio_img_certificacion > 0) ? "img_certificacion.".$tipo_img_certificacion : $institucion['img_certificacion'];
        // El contenido del archivo
        $contenido .= "<?php\n##-----------------------------------##\n## ..::Datos del la Institución Escolar::.. ##\n##-----------------------------------##\n";
        $contenido .= "\$institucion['codigo_dea'] = '".$_POST['codigo_dea']."';\n";
        $contenido .= "\$institucion['institucion'] = '".$_POST['institucion']."';\n";
        $contenido .= "\$institucion['ubicacion'] = '".$_POST['ubicacion']."';\n";
        $contenido .= "\$institucion['ciudad'] = '".$_POST['ciudad']."';\n";
        $contenido .= "\$institucion['municipio'] = '".$_POST['municipio']."';\n";
        $contenido .= "\$institucion['estado'] = '".$_POST['estado']."';\n";
        $contenido .= "\$institucion['parroquia'] = '".$_POST['parroquia']."';\n";
        $contenido .= "\$institucion['telefono'] = '".$_POST['telefono']."';\n";
        $contenido .= "\$institucion['zona_educativa'] = '".$_POST['zona_educativa']."';\n";        
        $contenido .= "\$institucion['codigo_plan_estudio'] = '".$_POST['codigo_plan_estudio']."';\n";
        $contenido .= "\$institucion['email'] = '".$_POST['email']."';\n";
        $contenido .= "\$institucion['nombre_director'] = '".$_POST['nombre']."';\n";
        $contenido .= "\$institucion['apellido_director'] = '".$_POST['apellido']."';\n";
        $contenido .= "\$institucion['tipo_dni'] = '".$_POST['tipo_dni']."';\n";
        $contenido .= "\$institucion['dni_director'] = '".$_POST['dni_director']."';\n";
        $contenido .= "\$institucion['telefono_director'] = '".$_POST['telefono_director']."';\n";
        $contenido .= "\$institucion['img_reporte'] = '".$imagen_reporte."';\n";
        $contenido .= "\$institucion['img_certificacion'] = '".$imagen_certificacion."';\n";
        $contenido .= "\$institucion['tipo_especialidad'] = '".$_POST['tipo_especialidad']."';\n";
        $contenido .= "\$institucion['sexo_director'] = '".$_POST['sexo']."';\n";
        $contenido .= "?>";
        
       

        //Historial::Movimiento($_SESSION['codigo'],"Actualizó la configuración del consejo comunal");
        $error = 0;
        
        move_uploaded_file($ruta_img_reporte, $destino_img_reporte);
        move_uploaded_file($ruta_img_certificacion, $destino_img_certificacion);

        $archivo = fopen('config/institucion.php','w+');        
        if (!isset($archivo)) {
                $error = 1;
                print "No se ha podido crear/abrir el archivo.<br/>";
        }
        else if (!fwrite($archivo, $contenido)) {
                $error = 1;
                print "No se ha podido escribir en el archivo.<br/>";
        }
        fclose($archivo);
        if ($error == 0) {
            $notificacion = $alerta["actualizacion_de_configuracion_exitosa"];
        }
        header("refresh:2;" . URLBASE . $vista);
    }
}


require "views/configuracion/configuracionView.phtml";
