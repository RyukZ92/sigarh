/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
	setTimeout(function() {
            $("#alertas").fadeOut(2000);
		
        },4000);
    jQuery('.solo-numero-entero').keypress(function(tecla) {
        if(tecla.charCode > 47 
                && tecla.charCode < 58 
                || tecla.charCode == 0
                || tecla.charCode == 32) 
                return true;
            else 
                return false;
    });   
    jQuery('.solo-albabeto-espaniol-con-espacio').keypress(function(tecla) {
            if((tecla.charCode > 47
                    && tecla.charCode < 58) 
                    || (tecla.charCode > 64 
                    && tecla.charCode < 123) 
                    || tecla.charCode == 0 
                    || tecla.charCode == 32) 
                return true;
            else 
                return false;
            });		
    jQuery('.alfanumerico-sin-espacio').keypress(function(tecla) {
            if((tecla.charCode > 47 
                    && tecla.charCode < 58) 
                    || (tecla.charCode > 64 
                    && tecla.charCode < 123) 
                    || tecla.charCode == 0) 
                return true;
            else 
                return false;
            });
    jQuery('.solo-letras-con-espacio-y-acentos').keypress(function(e) {
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = [8, 37 ,39 ,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }			
			
    });
    jQuery('#telefono').keypress(function(tecla) {
            if($(this).val().length == 4 && tecla.charCode != 0)
                $(this).val($(this).val()+"-");
            else 
                return true;
            });
    jQuery('#telefono_director').keypress(function(tecla) {
            if($(this).val().length == 4 && tecla.charCode != 0)
                $(this).val($(this).val()+"-");
            else 
                return true;
            });
    $(".notas").keyup(function(){
                if ($(this).val() > 20){
            $(this).val("");
            return false;
        } else {
                return true;
        }
    })
    $(".notas").keypress(function(tecla){
        if($(this).val().length == 2 && tecla.charCode != 0) {
            $(this).val($(this).val()+".");
                    }
        else {
            return true;
                    }
    });
});
function soloNumeroEntero(e)
{
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "1234567890";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }			
}
function desactivarNota(checkbox,nota)
{
    //alert(nota1.checked);
    if (checkbox.checked == false) {
        document.getElementById(nota).disabled = true;
        document.getElementById(nota).value = "";
    } else {
        document.getElementById(nota).disabled = false;
        
    }
}
function desactivarNotaFecha(checkbox, nota, fecha){
    
    //alert("Entrando a la función chimba => " + checkbox.checked);

    if (checkbox.checked == false) {
        document.getElementById('nota_'+checkbox.value).disabled = true;
        document.getElementById('fecha_'+checkbox.value).disabled = true;
        document.getElementById('nota_'+checkbox.value).value = "";
        document.getElementById('fecha_'+checkbox.value).value = "";
    } else {
        document.getElementById('nota_'+checkbox.value).disabled = false;
        document.getElementById('fecha_'+checkbox.value).disabled = false;
        
    }
}
function validarComboxDireccion()
{
    var form = document.form;
    if (form.estado.value == 0) {
        form.estado.focus();
        return false;
    } else if (form.ciudad.value == 0) {
        form.ciudad.focus();
        return false;
    } else if (form.municipio.value == 0) {
        form.municipio.focus();
        return false;
    }
}
function validarCampoBuscar(campo) 
{
    if(document.getElementById(campo).value == 0) {
        document.getElementById(campo).focus(); 
        return false;
    } 
    else {
        return true
    };
}
function validarInscripcionDeAsignatura()
{
    if(document.getElementById('semestre').value==0) {document.getElementById('semestre').focus(); return false;} else if(document.getElementById('codigo_asignatura').value==0) {document.getElementById('codigo_asignatura').focus(); return false;} else {return true;}
}
function validarRangodeFecha(desde, hasta) 
{
    if(document.getElementById(desde).value == 0) {
        document.getElementById(desde).focus(); 
        return false;
    } else if (document.getElementById(hasta).value == 0) {
        document.getElementById(hasta).focus(); 
        return false;
    } else {
        return true;
    }
}
