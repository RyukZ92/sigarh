

<div id='cssmenu-top'>
<ul>
   <li class='active' style="width:200px; text-align: center;"><a href="<?php echo $r = $_SESSION["sesion"] ?  URLBASE . "inicio":URLBASE; ?>"><span>Inicio</span></a></li>

<?php if($_SESSION["sesion"]): ?>   
   <li class='last' style="float:right;"><a href="<?php echo URLBASE; ?>cerrar-sesion"><span>Cerrar Sesión</span></a></li>
   <li class='last' style="float:right;"><a href="<?php echo URLBASE; ?>mi-cuenta"><span>Mi Cuenta</span></a></li>
   <li class='last' style="float:right;"><a href="<?php echo URLBASE; ?>consultar-mi-historial-de-usuario"><span>Mi Historial</span></a></li>  
   <li class='last' style="float:right;"><a href='<?php echo URLBASE; ?>acerca-del-producto'><span>Acerca de</span></a></li>  
   <!--<li class='last'style="float:right;"><a href='<?php echo URLBASE; ?>#'><span>Visión</span></a></li>
   <li class='last' style="float:right;"><a href='<?php echo URLBASE; ?>#'><span>Mision</span></a></li>-->
   
    
<?php endif;?>
</ul>
</div>
