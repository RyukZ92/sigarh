<div id="usuario">
    <img src="<?php echo URLBASE; ?>public/img/default.png"/>
        <span id="descripcion">
            <b><?php echo $_SESSION["usuario"]; ?></b>
            <label style="font-size:13px;"><?php echo $_SESSION["tipo_usuario"]; ?></label>
            <br/>
            <span style="font-size:12px; margin-top:0px;"><b>Hoy: </b><?php echo date("d-m-Y"); ?></span>
        </span>
    
</div>