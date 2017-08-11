<!DOCTYPE html>
<html>
    <head>
        
        <title>Sistema Integral de Gestión Académica</title>
        <meta charset='UTF-8'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="<?php echo URLBASE; ?>views/layouts/default/css/default.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>views/layouts/default/css/menu.css">     
        <link rel="stylesheet" href="<?php echo URLBASE; ?>views/layouts/default/css/usuario.css">     
        <link rel="stylesheet" href="<?php echo URLBASE; ?>views/layouts/default/css/menu-top.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/css/global.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/bootstrap-3.3.4-dist/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">  
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/pure-release-0.6.0/pure.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/css/paginador.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/css/autocompletado.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/css/ventana-emergente.css"> 
        <script src="<?php echo URLBASE; ?>public/js/jquery-min.js" type="text/javascript"></script>
        <script src="<?php echo URLBASE; ?>public/js/autocompletado.js" type="text/javascript"></script>
        <script src="<?php echo URLBASE; ?>views/layouts/default/js/menu-top.js"></script>
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo URLBASE; ?>public/js/scripts.css">
        <script src="<?php echo URLBASE; ?>public/js/jquery-ui.min.js"></script>
        <script src="<?php echo URLBASE; ?>public/js/jquery.ui.datepicker-es.js.js"></script>
        <script src="<?php echo URLBASE; ?>public/js/jquery.plugin.min.js"></script>
        <script src="<?php echo URLBASE; ?>public/js/jquery.timeentry.js"></script>
        <script src="<?php echo URLBASE; ?>public/js/ventana-emergente.js"></script>
        <script src="<?php echo URLBASE; ?>public/js/scripts.js"></script>
        <script>
        //$.datepicker.setDefaults($.datepicker.regional['es']); //Poner fecha español
        $(function() {
        $( ".fecha" ).datepicker({ //Campo de Fecha
          changeMonth: true,
          changeYear: true
        });
        
        $('.hora').timeEntry(); //Campo de hora
        });
        
        $(document).ready(function() {
            $('.sub-cuerpo').css({'height':$(".vista").height()+20});
        });
        </script>
        
    </head>
    <body id="body">
        <!-- Configuración del servidor del lado del cliente -->
        <input type="hidden" id="URLBASE" value="<?php echo URLBASE; ?>">
        
     <?php $tam = ($_SESSION["sesion"]) ?"auto":"85%"; ?>
    <div class="cuerpo" style="min-height:<?php echo $tam; ?>">  
        <?php include "views/layouts/default/cabecera.php"; ?>
        <?php include "views/layouts/default/menu-top.php"; ?>
        
        <div class="sub-cuerpo" >
            <?php 
            if ($_SESSION["sesion"]) {
            include "views/layouts/default/usuario.php";
            include "views/layouts/default/menu.php"; 
 
            $estilo = ($_SESSION["sesion"]) ?"vista":"vista-sesion";
            }
        ?>
        
            <div class="<?php echo $estilo; ?>">  
                <?php include "controllers/generalController.php"; ?>
            </div>    
        
        </div>
       
    </div>
     <?php include "views/layouts/default/pie-de-pagina.php";?>    
    
    </body>
</html>
