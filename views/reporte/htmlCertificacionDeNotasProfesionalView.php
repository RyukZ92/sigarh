<style type="text/css">

b{
font-size:12pt;
font-family: Arial, Helvetica, sans-serif;
font-weight: bold;	
}
b.letra
{
font-size:9pt;
text-align:right;
font-family: Arial, Helvetica, sans-serif;
font-weight: bold;
}
label.letra
{
font-size:9pt;
text-align:right;
font-family: Arial, Helvetica, sans-serif;
font-weight: bold;
margin-left:80px;
}
font
{
font-size:8pt;
text-align:center;
font-family: Arial, Helvetica, sans-serif;
}
td font {font-size:6.5pt;}
font.letra1
{
font-size:8pt;
text-align:right;
font-family: Arial, Helvetica, sans-serif;
}
hr
{
border:0.3px solid #000;
noshade:noshade;
color:black;
margin:0;
background: #000;

}


</style>
<page backtop="1mm" backbottom="-10mm" backleft="-4mm" backright="-4mm">
 <?php //print_r($_estudiante); ?>
<!-------------------------------------------------------------------------tabla header ----------------------------------------------------------------------------------->
        <table border="0" style="width: 100%; height:20%;"  align="center" >
            <tr >
                <td rowspan="2" style="text-align:center; width: 50%; height:10%;">
                <img style="width:360px; height:40px; margin-bottom:30px;" src="<?php echo URLBASE; ?>/public/img/<?php echo $cabecera; ?>" /> </td>
                
			<td style="text-align: center; font-size:12pt;  width: 50%; height:10%;" valign="top"><b><u><?php echo mb_strtoupper($tema,'UTF-8'); ?></u> </b><br />
				<label class="letra">C&oacute;digo de Formato: EA-DEA-02-03 </label>			
				</td>			
            </tr>
			<tr>
				<td align="right" style="width: 50%; height:10%;">
					<font class="letra1"> I. Plan de estudio: </font>
						<font><u> MEDIA PROFESIONAL </u></font>
					<font class="letra1"> COD:</font>
						<font> <u> 46057 </u> </font>
				<br>
					<font class="letra1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Menci&oacute;n : &nbsp; &nbsp; </font>
						<font> 
							<u> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
									CONTABILIDAD 
								   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							</u> 
						</font>
				<br />
					<font class="letra1"> Lugar y Fecha de expedici&oacute;n : </font>
						<font> 
							<u>   
								<?php echo mb_strtoupper($ciudad, 'UTF-8') . ", " . date('d/m/Y'); ?> 
								&nbsp;
							</u> 
						</font>
				</td>
			</tr>
        </table>
<!--------------------------------------------------------------------------fin tabla header ------------------------------------------------------------------------------->		
<!------------------------------------------------------------------------ tabla boddy -------------------------------------------------------------------------------------->		
<font class="letra1">&nbsp; II. Datos del plantel o Zona educativa que emite la certificaci&oacute;n </font><br />		
<table style="width: 100%; height:2%;"  align="center">
	<tr>
		<td style="width:10%; height:2%; ";><font class="letra1"> C&oacute;d. DEA: </font> </td>
		<td style="width:20%; height:2%; text-align:center; border-bottom:1px;" ><font><?php echo mb_strtoupper($codigoDea, 'UTF-8'); ?></font></td>
		<td style="width:10%; height:2%; text-align:center"> <font class="letra1"> Nombre: </font></td>
		<td style="width:40%; height:2%; text-align:Center; border-bottom:1px;"><font><?php echo mb_strtoupper($nombreInstitucion, 'UTF-8'); ?></font></td>
		<td style="width:10%; height:2%;"><font class="letra1"> Dtto.Esc.: </font></td>
		<td style="width:10%; height:2%; text-align:center;border-bottom:1px;"><font> 05 </font></td>
	</tr>
</table>		

<table border="0" style="width: 100%; height:2%;" align="center">

	<tr>
		<td style="width:10%; height:2%;"><font class="letra1"> Direcci&oacute;n: </font> </td>
		<td style="width:60%; height:2%;border-bottom:1px;border-bottom:1px;"> <font> <?php echo mb_strtoupper($ubicacion, 'UTF-8'); ?></font> </td>
		<td style="width:12%; height:2%; text-align:center"> <font class="letra1"> Tel&eacute;fono: </font></td>
		<td style="width:18%; height:2%; text-align:center;border-bottom:1px;"><font> <?php echo $telefono = $telefono ? $telefono : "* &nbsp; * &nbsp; * &nbsp; * &nbsp; * &nbsp; * &nbsp; * &nbsp; *"; ?>"</font></td>
	</tr>
</table>
<table border="0" style="width: 100%; height:2%;" align="center">
	<tr>
		<td style="width:10%; height:2%" ><font class="letra1"> Municipio: </font> </td>
		<td style="width:23%; height:2%; text-align:center;border-bottom:1px;"> <font>&nbsp; <?php echo mb_strtoupper($municipio, 'UTF-8'); ?> &nbsp;</font> </td>
		<td style="width:10%; height:2%; text-align:center;"> <font class="letra1"> Ent. Federal: </font></td>
		<td style="width:27%; height:2%;border-bottom:1px;"><font> <?php echo mb_strtoupper($estado, 'UTF-8'); ?> </font></td>
		<td style="width:12%; height:2%;"><font class="letra1"> Zona Educativa: </font></td>
		<td style="width:18%; height:2%; text-align:center;border-bottom:1px;"><font> <?php echo mb_strtoupper($zonaEducativa, 'UTF-8'); ?> </font></td>
	</tr>
</table>
<font class="letra1">&nbsp; III. Datos de identificaci&oacute;n del alumno </font><br />
<table border="0" style="width: 100%; height:2%;" align="center">
	<tr>
		<td style="width:15%; height:2%" ><font class="letra1"> C&eacute;dula de Identidad: </font> </td>
		<td style="width:53%; height:2%; text-align:LEFT;border-bottom:1px;"> <font>&nbsp; <?php echo $_estudiante[0]["tipo_dni"] . "-" . $_estudiante[0]["dni"]; ?> &nbsp;</font> </td>
		<td > <font class="letra1"> Fecha de Nacimiento: </font></td>
		<td style="width:17%; height:2%; text-align:center;border-bottom:1px;"><font> <?php echo AsistenteBasico::convertirFechaDdMmAaaa($_estudiante[0]["fecha_natal"]); ?></font></td>
	</tr>
</table>		
<table border="0" style="width: 100%; height:2%;" align="center">
	<tr>
		<td style="width:10%; height:2%" ><font class="letra1"> Apellidos: </font> </td>
		<td style="width:40%; height:2%; text-align:left;border-bottom:1px;"> <font>&nbsp; <?php echo mb_strtoupper($_estudiante[0]["apellido"], 'UTF-8'); ?> &nbsp;</font> </td>
		<td style="width:10%; height:2%; text-align:center"> <font class="letra1"> Nombres: </font></td>
		<td style="width:40%; height:2%; text-align:left;border-bottom:1px;"><font> <?php echo mb_strtoupper($_estudiante[0]["nombre"], 'UTF-8'); ?> </font></td>
	</tr>
</table>		
<table border="0" style="width: 100%; height:2%;" align="center">
	<tr>
		<td style="width:15%; height:2%" ><font class="letra1"> Lugar de Nacimiento: </font> </td>
		<td style="width:35%; height:2%; text-align:left;border-bottom:1px;"> <font>&nbsp; <?php echo mb_strtoupper($_estudiante[0]["lugar_nacimiento"], 'UTF-8'); ?> &nbsp;</font> </td>
		<td style="width:15%; height:2%; text-align:center"> <font class="letra1"> Ent. Federal o Pais: </font></td>
		<td style="width:35%; height:2%; text-align:left;border-bottom:1px;"><font> <?php echo mb_strtoupper($_estudiante[0]["estado"], 'UTF-8'); ?> </font></td>
	</tr>
</table>
		
<table style="width: 100%;" align="left">
               
                <td  style="width: 49%; text-align: left;">
                    <font class="letra1">IV. Planteles donde curs&oacute; estos estudios:</font>

                </td>
			
</table>			
				
<table cellspacing="0" style="width: 100%; border-left:1px;" align="right" >
		<tr>
                <td style="width: 4%; text-align:center; border-top:1px; border-right:1px;">
                    <font>N &deg;</font>

                </td>
				<td style="width: 25%; text-align: Left; border-top:1px; border-right:1px;">
                    <font> Nombre del Plantel: </font>

                </td>
				<td style="width: 15%; text-align: Left; border-top:1px; border-top:1px; border-right:1px;">
                    <font> Localidad: </font>

                </td>
				<td style="width: 6%; text-align:center; border-top:1px; border-right:1px; ">
                    <font> E.F </font>
                </td>
				</tr>
            
</table>		
<table border="1" cellspacing="0" style="width: 100%; border-collapse: collapse;" align="center">
	
			 <tr>
                
                <td style="width: 4%; text-align: center;">
                    <font> N &deg; </font>

                </td>
				    <td style="width: 25%; text-align: left;">
                    <font> Nombre del Plantel: </font>
                </td>
                <td style="width: 15%; text-align: left;">
                    <font> Localidad: </font>

                </td>
					<td style="width: 6%; text-align: center;">
                    <font> E.F </font>
                </td>
                
                <td style="width: 4%; text-align: center;">
                    <font> 3 </font>

                </td>
				<td style="width: 25%; text-align: center;">
                    <font > <?php echo mb_strtoupper($_institucion[2]["nombre"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 15%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[2]["ciudad"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 6%; text-align: center;">
                    <font> <?php echo mb_strtoupper(substr($_institucion[2]["estado"], 0, 2), 'UTF-8'); ?> </font>
                </td>
            </tr>
			<tr>
			    
                <td style="width: 4%; text-align: center;">
                    <font> 1 </font>

                </td>
				<td style="width: 25%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[0]["nombre"], 'UTF-8'); ?>  </font>
                </td>
                <td style="width: 15%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[0]["ciudad"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 6%; text-align: center;">
                    <font> <?php echo mb_strtoupper(substr($_institucion[0]["estado"], 0, 2), 'UTF-8'); ?> </font>
                </td>
                <td style="width: 4%; text-align: center;">
                    <font> 4 </font>

                </td>
				<td style="width: 25%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[3]["nombre"], 'UTF-8'); ?>  </font>

                </td>
				<td style="width: 15%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[3]["ciudad"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 6%; text-align: center;">
                    <font> <?php echo mb_strtoupper(substr($_institucion[3]["estado"], 0, 2), 'UTF-8'); ?> </font>
                </td>
            </tr>
			<tr>
                
                <td style="width: 4%; text-align: center;">
                    <font> 2 </font>
                </td>
				<td style="width: 25%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[1]["nombre"], 'UTF-8'); ?> </font>
                </td>
                <td style="width: 15%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[1]["ciudad"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 6%; text-align: center;">
                    <font> <?php echo mb_strtoupper(substr($_institucion[1]["estado"], 0, 2), 'UTF-8'); ?> </font>
                </td>
                <td style="width: 4%; text-align: center;">
                    <font> 5 </font>

                </td>
				<td style="width: 25%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[4]["nombre"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 15%; text-align: center;">
                    <font> <?php echo mb_strtoupper($_institucion[4]["ciudad"], 'UTF-8'); ?> </font>

                </td>
				<td style="width: 6%; text-align: center;">
                    <font> <?php echo mb_strtoupper(substr($_institucion[4]["estado"], 0, 2), 'UTF-8'); ?> </font>
                </td>
            </tr>
			        
    </table>
<table border="0" cellspacing="0" style="width: 100%;">
		<tr>
            <td style="width:49%;">
				<font class="letra1"> V. Pensum de Estudios:  </font><br />
				<font class="letra1"> Semestre: &nbsp; &nbsp; &nbsp; &nbsp;  I </font>
			</td>
			<td style="width:2%"></td>
			<td style="width:49%">
				<br /><font class="letra1"> Semestre: &nbsp; &nbsp; &nbsp; &nbsp; II  </font>

			</td>
			
       	</tr>
<!-------------------------------------------------------------------- PRINCIPIO TABLA SEMESTRE 1 ----------------------------------------------------------------------->		
		<tr>
            <td style="width:49%;">
                <table cellspacing="0" border="1" style="width: 100%; border-collapse: collapse;" align="center">
			 		<tr>
                
                		<td rowspan="2" style="width: 36%; height:0;text-align: center; ">
                    		<font> Asignaturas: </font>
                		</td>
						<td colspan="2" style="width: 28%; height:0;text-align:  center; ">
                    		<font> Calificaci&oacute;n </font>
                		</td>
                		
						<td rowspan="2" style="width: 6%; height:0;text-align: center; ">
                    		<font>T.E</font>
                		</td>
                		<td colspan="2" style="width: 20%; height:0;text-align: center; ">
                    		<font> Fecha </font>
                		</td>
					
						<td style="width: 10%; height:0;text-align: center; ">
                    		<font>Plantel</font>
						</td>
						
            		</tr>
					<tr>
                		
						<td style="width: 10%; height:0;text-align: center; ">
                    		<font>En.N&deg;</font>
                		</td>
                		<td style="width: 18%; height:0;text-align:  center; ">
                    		<font>En Letras</font>
                		</td>
						
                		<td style="width: 10%; height:0;text-align: center; ">
                    		<font>Mes</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center; ">
                    		<font >A&ntilde;o</font>
						</td>
						<td style="width:10%; height:0;text-align: center; ">
                    		<font>N&deg;</font>
						</td>			
            		</tr>
<?php for ($i=0; $i<count($_semestre1); $i++): 

		if ($_semestre1[$i]["codigo_asignatura"] != null && $_semestre1[$i]["nota"] > 9):
						$fecha = explode("-", $_semestre1[$i]["fecha"]);
			$mes = $fecha[1];
			$anio = substr($fecha[0], 2, 2);
 

?>
					<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($_semestre1[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
                    		<font><?php echo round($_semestre1[$i]["nota"]); ?></font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font><?php echo AsistenteBasico::obtenerNotaEnLetras($_semestre1[$i]["nota"]); ?></font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
						<font><?php echo mb_strtoupper($_semestre1[$i]["tipo"], 'UTF-8'); ?></font>
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font><?php echo $mes; ?></font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font ><?php echo $anio; ?></font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font><?php for ($j=0; $j<count($_institucion); $j++) { 
                    					if($_semestre1[$i]["id_institucion"] == $_institucion[$j]["id"])
                    						echo $nroInstitucion[$j];
                    				} 

                    				?> 
                    		</font>
						</td>			
            		</tr>
<?php endif;
endfor;
for ($i=0; $i<12 - count($_semestre1); $i++): 
	if(empty($_asignatura1[$i]["asignatura"])):

			
?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font>  </font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>  </font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>  </font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>  </font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >  </font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>  </font>
						</td>			
            		</tr>

<?php	

		
else:

?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font><?php echo mb_strtoupper($_asignatura1[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>

						<td style="width: 10%; height:0; text-align: center;">
								<font>*</font>
                		</td>
						

                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>*******</font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	

						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>*</font>
                		</td>

						<td style="width: 10%; height:0;text-align: center;">
                    		<font >*</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>*</font>
						</td>			
            		</tr>
<?php
		endif;			
	endfor; 
?>          				
				</table>	
		                
			</td>
			<td style="width:2%"></td>
<!-------------------------------------------------------------------- FIN TABLA SEMESTRE 1 ----------------------------------------------------------------------->		
<!-------------------------------------------------------------------- PRINCIPIO TABLA SEMESTRE 2 ----------------------------------------------------------------------->		
			
			<td style="width:49%">
<table cellspacing="0" border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		<tr>
                
                		<td rowspan="2" style="width: 36%; height:0;text-align: center;">
                    		<font> Asignaturas: </font>
                		</td>
						<td colspan="2" style="width: 28%; height:0;text-align:  center;">
                    		<font> Calificaci&oacute;n </font>
                		</td>
                		
						<td rowspan="2" style="width: 6%; height:0;text-align: center;">
                    		<font>T.E</font>
                		</td>
                		<td colspan="2" style="width: 20%; height:0;text-align: center;">
                    		<font> Fecha </font>
                		</td>
					
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>Plantel</font>
						</td>
						
            		</tr>
					<tr>
                		
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>En.N&deg;</font>
                		</td>
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font>En Letras</font>
                		</td>
						
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>Mes</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >A&ntilde;o</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>N&deg;</font>
						</td>			
            		</tr>
<?php for ($i=0; $i<count($_semestre2); $i++): 

		if ($_semestre2[$i]["codigo_asignatura"] != null && $_semestre2[$i]["nota"] > 9):
						$fecha = explode("-", $_semestre2[$i]["fecha"]);
			$mes = $fecha[1];
			$anio = substr($fecha[0], 2, 2);
 

?>
					<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($_semestre2[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
                    		<font><?php echo round($_semestre2[$i]["nota"]); ?></font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font><?php echo AsistenteBasico::obtenerNotaEnLetras($_semestre2[$i]["nota"]); ?></font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
						<font><?php echo mb_strtoupper($_semestre2[$i]["tipo"], 'UTF-8'); ?></font>
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font><?php echo $mes; ?></font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font ><?php echo $anio; ?></font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font><?php for ($j=0; $j<count($_institucion); $j++) { 
                    					if($_semestre2[$i]["id_institucion"] == $_institucion[$j]["id"])
                    						echo $nroInstitucion[$j];
                    				} 

                    				?> 
                    		</font>
						</td>			
            		</tr>
<?php endif;
endfor;
for ($i=0; $i<12 - count($_semestre2); $i++): 
	if(empty($_asignatura2[$i]["asignatura"])):

			
?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font>  </font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>  </font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>  </font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>  </font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >  </font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>  </font>
						</td>			
            		</tr>

<?php	

		
else:

?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font><?php echo mb_strtoupper($_asignatura2[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>*</font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>*******</font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>*</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >*</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>*</font>
						</td>			
            		</tr>
<?php
		endif;			
	endfor; 
?>
				</table>			
			</td>
	   	</tr>
<!-------------------------------------------------------------------- FIN TABLA SEMESTRE 2 ----------------------------------------------------------------------->		
<!-------------------------------------------------------------------- PRINCIPIO TABLA SEMESTRE 3 ----------------------------------------------------------------------->		
		
		<tr>
			<td style="height:1%;" align="left"><font class="letra1">Semestre: &nbsp; &nbsp; &nbsp; &nbsp; III  </font></td>
			<td>&nbsp;</td>
			<td style="height:1%;" align="left"><font class="letra1">Semestre: &nbsp; &nbsp; &nbsp; &nbsp; IV  </font></td>
		</tr>
		<tr>
<td style="width:49%;">
                <table cellspacing="0" border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		<tr>
                
                		<td rowspan="2" style="width: 36%; height:0;text-align: center;">
                    		<font> Asignaturas: </font>
                		</td>
						<td colspan="2" style="width: 28%; height:0;text-align:  center;">
                    		<font> Calificaci&oacute;n </font>
                		</td>
                		
						<td rowspan="2" style="width: 6%; height:0;text-align: center;">
                    		<font>T.E</font>
                		</td>
                		<td colspan="2" style="width: 20%; height:0;text-align: center;">
                    		<font> Fecha </font>
                		</td>
					
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>Plantel</font>
						</td>
						
            		</tr>
					<tr>
                		
						<td style="width: 10%; height:0;text-align: center">
                    		<font>En.N&deg;</font>
                		</td>
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font>En Letras</font>
                		</td>
						
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>Mes</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >A&ntilde;o</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>N&deg;</font>
						</td>			
            		</tr>
<?php for ($i=0; $i<count($_semestre3); $i++): 

		if ($_semestre3[$i]["codigo_asignatura"] != null && $_semestre3[$i]["nota"] > 9):
						$fecha = explode("-", $_semestre3[$i]["fecha"]);
			$mes = $fecha[1];
			$anio = substr($fecha[0], 2, 2);
 

?>
					<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($_semestre3[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
                    		<font><?php echo round($_semestre3[$i]["nota"]); ?></font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font><?php echo AsistenteBasico::obtenerNotaEnLetras($_semestre3[$i]["nota"]); ?></font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
						<font><?php echo mb_strtoupper($_semestre3[$i]["tipo"], 'UTF-8'); ?></font>
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font><?php echo $mes; ?></font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font ><?php echo $anio; ?></font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font><?php for ($j=0; $j<count($_institucion); $j++) { 
                    					if($_semestre3[$i]["id_institucion"] == $_institucion[$j]["id"])
                    						echo $nroInstitucion[$j];
                    				} 

                    				?> 
                    		</font>
						</td>			
            		</tr>
<?php endif;
endfor;
for ($i=0; $i<12 - count($_semestre3); $i++): 
	if(empty($_asignatura3[$i]["asignatura"])):

			
?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font>  </font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>  </font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>  </font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>  </font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >  </font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>  </font>
						</td>			
            		</tr>

<?php	

		
else:

?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font><?php echo mb_strtoupper($_asignatura2[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>

						<td style="width: 10%; height:0; text-align: center;">
								<font>*</font>
                		</td>
						

                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>*******</font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	

						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>*</font>
                		</td>

						<td style="width: 10%; height:0;text-align: center;">
                    		<font >*</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>*</font>
						</td>			
            		</tr>
<?php
		endif;			
	endfor; 
?>
				</table>	
		                
			</td>
			<td style="width:2%"></td>
<!------------------------------------------------------------------------------ FIN TABLA SEMESTRE 3 ------------------------------------------------------------------->
<!------------------------------------------------------------------------------ PRINCIPIO TABLA SEMESTRE 4 ------------------------------------------------------------------->			
			
			<td style="width:49%">
<table cellspacing="0" border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		<tr>
                
                		<td rowspan="2" style="width: 36%; height:0;text-align: center;">
                    		<font> Asignaturas: </font>
                		</td>
						<td colspan="2" style="width: 28%; height:0;text-align:  center;">
                    		<font> Calificaci&oacute;n </font>
                		</td>
                		
						<td rowspan="2" style="width: 6%; height:0;text-align: center;">
                    		<font>T.E</font>
                		</td>
                		<td colspan="2" style="width: 20%; height:0;text-align: center;">
                    		<font> Fecha </font>
                		</td>
					
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>Plantel</font>
						</td>
						
            		</tr>
					<tr>
                		
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>En.N&deg;</font>
                		</td>
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font>En Letras</font>
                		</td>
						
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>Mes</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >A&ntilde;o</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>N&deg;</font>
						</td>			
            		</tr>
<?php for ($i=0; $i<count($_semestre4); $i++): 

		if ($_semestre4[$i]["codigo_asignatura"] != null && $_semestre4[$i]["nota"] > 9):
						$fecha = explode("-", $_semestre4[$i]["fecha"]);
			$mes = $fecha[1];
			$anio = substr($fecha[0], 2, 2);
 

?>
					<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($_semestre4[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
                    		<font><?php echo round($_semestre4[$i]["nota"]); ?></font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font><?php echo AsistenteBasico::obtenerNotaEnLetras($_semestre4[$i]["nota"]); ?></font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
						<font><?php echo mb_strtoupper($_semestre4[$i]["tipo"], 'UTF-8'); ?></font>
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font><?php echo $mes; ?></font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font ><?php echo $anio; ?></font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font><?php for ($j=0; $j<count($_institucion); $j++) { 
                    					if($_semestre4[$i]["id_institucion"] == $_institucion[$j]["id"])
                    						echo $nroInstitucion[$j];
                    				} 

                    				?> 
                    		</font>
						</td>			
            		</tr>
<?php endif;
endfor;
for ($i=0; $i<12 - count($_semestre4); $i++): 
	if(empty($_asignatura4[$i]["asignatura"])):

			
?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font>  </font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>  </font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>  </font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>  </font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >  </font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>  </font>
						</td>			
            		</tr>

<?php	

		
else:

?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font><?php echo mb_strtoupper($_asignatura4[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>

						<td style="width: 10%; height:0; text-align: center;">
								<font>*</font>
                		</td>
						

                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>*******</font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	

						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>*</font>
                		</td>

						<td style="width: 10%; height:0;text-align: center;">
                    		<font >*</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>*</font>
						</td>			
            		</tr>
<?php
		endif;			
	endfor; 
?>			
						
				</table>		
			</td>
		</tr>
<!--------------------------------------------------------------------- FIN TABLA SEMESTRE 4 --------------------------------------------------------------------------->
<!----------------------------------------------------------------- PRINCIPIO TABLA SEMESTRE 5 -------------------------------------------------------------------------->		
		
				<tr>
			<td style="height:1%;"><font class="letra1"> Semestre: &nbsp; &nbsp; &nbsp; &nbsp; V  </font></td>
			<td>&nbsp;</td>
			<td style="height:1%;"><font class="letra1"> Semestre: &nbsp; &nbsp; &nbsp; &nbsp; VI  </font></td>
		</tr>
		<tr>
<td style="width:49%;">
                <table border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		<tr>
                
                		<td rowspan="2" style="width: 36%; height:0;text-align: center;">
                    		<font> Asignaturas: </font>
                		</td>
						<td colspan="2" style="width: 28%; height:0;text-align:  center;">
                    		<font> Calificaci&oacute;n </font>
                		</td>
                		
						<td rowspan="2" style="width: 6%; height:0;text-align: center;">
                    		<font>T.E</font>
                		</td>
                		<td colspan="2" style="width: 20%; height:0;text-align: center;">
                    		<font> Fecha </font>
                		</td>
					
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>Plantel</font>
						</td>
						
            		</tr>
					<tr>
                		
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>En.N&deg;</font>
                		</td>
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font>En Letras</font>
                		</td>
						
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>Mes</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >A&ntilde;o</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>N&deg;</font>
						</td>			
            		</tr>
<?php for ($i=0; $i<count($_semestre5); $i++): 

		if ($_semestre5[$i]["codigo_asignatura"] != null && $_semestre5[$i]["nota"] > 9):
						$fecha = explode("-", $_semestre5[$i]["fecha"]);
			$mes = $fecha[1];
			$anio = substr($fecha[0], 2, 2);
 

?>
					<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($_semestre5[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
                    		<font><?php echo round($_semestre5[$i]["nota"]); ?></font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font><?php echo AsistenteBasico::obtenerNotaEnLetras($_semestre5[$i]["nota"]); ?></font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
						<font><?php echo mb_strtoupper($_semestre5[$i]["tipo"], 'UTF-8'); ?></font>
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font><?php echo $mes; ?></font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font ><?php echo $anio; ?></font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font><?php for ($j=0; $j<count($_institucion); $j++) { 
                    					if($_semestre5[$i]["id_institucion"] == $_institucion[$j]["id"])
                    						echo $nroInstitucion[$j];
                    				} 

                    				?> 
                    		</font>
						</td>			
            		</tr>
<?php endif;
endfor;
for ($i=0; $i<12 - count($_semestre5); $i++): 
	if(empty($_asignatura5[$i]["asignatura"])):

			
?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font>  </font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>  </font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>  </font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>  </font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >  </font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>  </font>
						</td>			
            		</tr>

<?php	

		
else:

?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font><?php echo mb_strtoupper($_asignatura2[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>

						<td style="width: 10%; height:0; text-align: center;">
								<font>*</font>
                		</td>
						

                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>*******</font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	

						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>*</font>
                		</td>

						<td style="width: 10%; height:0;text-align: center;">
                    		<font >*</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>*</font>
						</td>			
            		</tr>
<?php
		endif;			
	endfor; 
?>												
				</table>	
		              
			</td>
			<td style="width:2%"></td>
<!----------------------------------------------------------------- FIN TABLA SEMESTRE 5 -------------------------------------------------------------------------->		
<!----------------------------------------------------------------- PRINCIPIO TABLA SEMESTRE 6 -------------------------------------------------------------------------->					
			<td style="width:49%">
<table border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		<tr>
                
                		<td rowspan="2" style="width: 36%; height:0;text-align: center;">
                    		<font> Asignaturas: </font>
                		</td>
						<td colspan="2" style="width: 28%; height:0;text-align:  center;">
                    		<font> Calificaci&oacute;n </font>
                		</td>
                		
						<td rowspan="2" style="width: 6%; height:0;text-align: center;">
                    		<font>T.E</font>
                		</td>
                		<td colspan="2" style="width: 20%; height:0;text-align: center;">
                    		<font> Fecha </font>
                		</td>
					
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>Plantel</font>
						</td>
						
            		</tr>
					<tr>
                		
						<td style="width: 10%; height:0;text-align: center;">
                    		<font>En.N&deg;</font>
                		</td>
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font>En Letras</font>
                		</td>
						
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>Mes</font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >A&ntilde;o</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>N&deg;</font>
						</td>			
            		</tr>
<?php for ($i=0; $i<count($_semestre6); $i++): 

		if ($_semestre6[$i]["codigo_asignatura"] != null && $_semestre6[$i]["nota"] > 9):
						$fecha = explode("-", $_semestre6[$i]["fecha"]);
			$mes = $fecha[1];
			$anio = substr($fecha[0], 2, 2);
 

?>
					<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($_semestre6[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
                    		<font><?php echo round($_semestre6[$i]["nota"]); ?></font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
                    		<font><?php echo AsistenteBasico::obtenerNotaEnLetras($_semestre6[$i]["nota"]); ?></font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
						<font><?php echo mb_strtoupper($_semestre6[$i]["tipo"], 'UTF-8'); ?></font>
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font><?php echo $mes; ?></font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font ><?php echo $anio; ?></font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font><?php for ($j=0; $j<count($_institucion); $j++) { 
                    					if($_semestre6[$i]["id_institucion"] == $_institucion[$j]["id"])
                    						echo $nroInstitucion[$j];
                    				} 

                    				?> 
                    		</font>
						</td>			
            		</tr>
<?php endif;
endfor;
for ($i=0; $i<12 - count($_semestre6); $i++): 
	if(empty($_asignatura6[$i]["asignatura"])):

			
?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font>  </font>
						</td>
						<td style="width: 10%; height:0; text-align: center;">
								<font>  </font>
                		</td>
						
                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>  </font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	
						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>  </font>
                		</td>
						<td style="width: 10%; height:0;text-align: center;">
                    		<font >  </font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>  </font>
						</td>			
            		</tr>

<?php	

		
else:

?>
						<tr>
                		<td style=" width:36%; height:0;text-align:left;" >
								<font><?php echo mb_strtoupper($_asignatura6[$i]["asignatura"], 'UTF-8'); ?></font>
						</td>

						<td style="width: 10%; height:0; text-align: center;">
								<font>*</font>
                		</td>
						

                		<td style="width: 18%; height:0;text-align:  center;">
   							<font>*******</font>
                		</td>
						<td style=" width:6%; height:0;text-align:center;" >
	

						</td>
                		<td style="width: 10%; height:0;text-align: center;">
                    		<font>*</font>
                		</td>

						<td style="width: 10%; height:0;text-align: center;">
                    		<font >*</font>
						</td>
						<td style="width:10%; height:0;text-align: center;">
                    		<font>*</font>
						</td>			
            		</tr>
<?php
		endif;			
	endfor; 
?>
				</table>		
			</td>
		</tr>
    </table>
	
<!------------------------------------------------------------- FIN DE TABLA SEMESTRE 6 ------------------------------------------------------------------------------------->
<table border="0" style="width: 100%;" align="left" cellspacing="0">
         <tr>
            <td  style="width:15%; text-align: left; ">
                    <font class="letra1">VI. Observaciones:</font>
            </td>
            <td  style="width:85%; margin:auto;" align="right">
        					
           	</td>
			</tr>
         <tr>
             <td colspan="2" style="width:85%; margin:auto;" align="right">
        					<hr />
           	</td>
			</tr>	
         <tr>
            <td colspan="2" style="width:85%; margin:auto;" align="right">
        					<hr />
           	</td>
			</tr>	
         <tr>
            <td colspan="2" style="width:85%; margin:auto;" align="right">
        					<hr />
           	</td>
			</tr>							
         <tr>
            <td colspan="2" style="width:85%; margin:auto;" align="right">
        					<hr />
           	</td>
	</tr>	
         <tr>
            <td colspan="2" style="width:85%; margin:auto;" align="right">
        					<hr />
           	</td>
           </tr>
</table>
<!---------------------------------------------------------------------------- fin tabla boddy ------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------- tabla fhother ------------------------------------------------------------------------------->
<table border="0" cellspacing="0" style="width: 100%;">
<tr>
<td style="width:49%;">
                <table cellspacing="0" border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		
					<tr>
                		<td colspan="2" style=" width:100%; height:0;text-align:center;" >
							<font style="font-weight:bold;"> VII. DIRECTOR(A) DEL PLANTEL </font>
						</td>
							
            		</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font>Apellidos y Nombres: </font>
						</td>
						<td rowspan="7" style="width: 50%; height:0;text-align: center;">
                    		&nbsp;
                		</td>
								
            		</tr>
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font><?php echo mb_strtoupper($director, 'UTF-8'); ?>  </font>
						</td>
					</tr>				
				
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font>N&uacute;mero de C.l: </font>
						</td>
					</tr>
					 
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font><?php echo $dniDirector; ?> </font>
						</td>
					</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font>Firma: </font>
						</td>
					</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<br /><br />
						</td>
					</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:center;" >
							<font style="font-size:10px" >Para efecto de su validez a nivel estadal </font>
						</td>
					</tr>
					<br /> &nbsp;
							
				</table>	
		              
			</td>
			<td style="width:2%"></td>
			<td style="width:49%">
	 		
			<table cellspacing="0" border="1" style="width: 100%; border: solid 1px #000000; border-collapse: collapse;" align="center">
			 		
					<tr>
                		<td colspan="2" style=" width:100%; height:0;text-align:center;" >
							<font style="font-weight:bold;"> VIII. DIRECTOR(A) DE LA ZONA EDUCATIVA </font>
						</td>
							
            		</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font>Apellidos y Nombres: </font>
						</td>
						<td rowspan="7" style="width: 50%; height:0;text-align: center;">
                    		&nbsp;
                		</td>
								
            		</tr>
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font> </font>
						</td>
					</tr>				
				
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font>N&uacute;mero de C.l: </font>
						</td>
					</tr>
					 
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font> </font>
						</td>
					</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<font>Firma: </font>
						</td>
					</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align:left;" >
							<br /><br />
						</td>
					</tr>
					
					<tr>
                		<td style=" width:50%; height:0;text-align: center;" >
							<font style="font-size:9px"> &nbsp;Para efectos de su validez a nivel nacional e internacional y cuando se trate de estudios libres y equivalentes sin escaloridad &nbsp; &nbsp; </font>
						</td>
					</tr>
							
				</table>			
						
			</td>
		</tr>
    </table>
		
<!---------------------------------------------------------------------- fin tabla fother ----------------------------------------------------------------------------------->		

</page>
