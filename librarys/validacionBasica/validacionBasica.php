<?php
/* @Descripcion: Librería que permite validar campos de formularios
 * @Autor: Miguel Salazar
 */
class ValidacionBasica
    {
        public static function validarCamposVacios($datos)
                {
                    $vacio = false;
                    foreach ($datos as $valor) {
                        if(empty($valor))
                            $vacio = true;
                    }
                    return $vacio;
                }
        public static function validarContrasenia($contrasenia)
                {
                    if(!preg_match('`[a-z]`',$contrasenia) 
                        || !preg_match('`[A-Z]`',$contrasenia) 
                        || !preg_match('`[0-9]`',$contrasenia) 
                        || strlen($contrasenia)<8) {
                        return true;
                    } else {
                        return false;
                    }
                }

        public static function limpiarCampo($campo) 
            {
                $campo = htmlspecialchars(trim(addslashes(stripslashes(strip_tags($campo)))));
                $campo = str_replace(chr(160),'',$campo);
                return $campo;
            }
        public static function validarFecha($fecha1, $fecha2) 
            {
                if (strtotime($fecha1) > strtotime($fecha2)) {
                    return 1;
                } else {
                    return 0;
                }
            }                
    }
?>