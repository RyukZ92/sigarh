<?php
/* @Descripcion: Librería que permite validar campos de formularios
 * @Autor: Miguel Salazar
 */
class AsistenteBasico
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
        public static function generarContraseniaAleatorio() 
          {
            //Se define una cadena de caractares. Te recomiendo que uses esta.
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            //Obtenemos la longitud de la cadena de caracteres
            $longitudCadena=strlen($cadena);

            //Se define la variable que va a contener la contraseña
            $pass = "";
            //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
            $longitudPass = 10;

            //Creamos la contraseña
            for($i=1; $i <= $longitudPass; $i++) {
                //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
                $pos=rand(0, $longitudCadena - 1);

                //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
                $pass .= substr($cadena, $pos, 1);
            }
            return $pass;
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
        public static function convertirFechaDdMmAaaa($fecha)	
        {
            $nueva_fecha = explode('-', $fecha);
            return $nueva_fecha = $nueva_fecha[2] . "/" . $nueva_fecha[1] . "/" . $nueva_fecha[0];
        }
        public static function convertirFechaAaaaMmDd($fecha) 
        {
            $nueva_fecha = explode('/',$fecha);
            return $nueva_fecha = $nueva_fecha[2] . "/" . $nueva_fecha[1] . "/" . $nueva_fecha[0];
        }   
        public static function obtenerEdad($fecha) 
        {
           list($Y,$m,$d) = explode("-", $fecha);
           return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
        }    
        public static function convertirHoraA12H($hora)	
        {
            return date("h:i:s A", strtotime($hora));
        }   
        public static function convertirHoraA24H($hora)	
        {
            $hora = new DateTime($hora);
            return $hora->format('H:i:s');
        }
        public static function limpiarEspacios($cadena)
        {
            $cadena = preg_replace('/\s+/', ' ', $cadena);
            return $cadena;
        }
        public static function obtenerDiaDeLaSemana($dia)	
        {
            switch ($dia) {
                case 1:
                    return "Lunes";
                break;
                case 2:
                    return "Martes";
                break;
                case 3:
                    return "Miércoles";
                break;            
                case 4:
                    return "Jueves";
                break;         
                case 5:
                    return "Viernes";
                break;
     
                case 6:
                    return "Sábado";
                break;

                case 7:
                    return "Domingo";
                break;
                default:
                    return "Error";
                break;        
            }
        } 
        public static function obtenerMesDelAnio($mes) {
            switch ($mes) {
                case 1:
                    return 'Enero';
                break;
                case 2:
                    return 'Febrero';
                break;
                case 3:
                    return 'Marzo';
                break;
                case 4:
                    return 'Abril';
                break;
                case 5:
                    return 'Mayo';
                break;
                case 6:
                    return 'Junio';
                break;
                case 7:
                    return 'Julio';
                break;
                case 8:
                    return 'Agosto';
                break;
                case 9:
                    return 'Septiembre';
                break;
                case 10:
                    return 'Octubre';
                break;
                case 11:
                    return 'Noviembre';
                break;
                case 12:
                    return 'Diciembre';
                break;
            }
        }
        public static function obtenerNotaEnLetras($nota) {
            switch ($nota) {
                case 10:
                    return 'DIEZ';
                break;
                case 11:
                    return 'ONCE';
                break;
                case 12:
                    return 'DOCE';
                break;
                case 13:
                    return 'TRECE';
                break;
                case 14:
                    return 'CATORCE';
                break;
                case 15:
                    return 'QUINCE';
                break;
                case 16:
                    return 'DIESISEIS';
                break;
                case 17:
                    return 'DIESISITE';
                break;
                case 18:
                    return 'DIESIOCHO';
                break;
                case 19:
                    return 'DIESINUEVE';
                break;
                case 20:
                    return 'VEINTE';
                break;
            }
        }        
    }
?>