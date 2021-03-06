<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
		require ("htmlCertificacionDeNotasGeneralView.php");
     $contenido = ob_get_clean();
     $salida = "Certificacion_de_Notas_Media_General_" . $_estudiante[0]["tipo_dni"] . "-" . $_estudiante[0]["dni"] . ".pdf";
ob_clean();
    try
    {
    $html2pdf = new HTML2PDF('P', 'Legal', 'es', true, 'UTF-8', 10);
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($contenido, isset($_GET['vuehtml']));
    $html2pdf->Output($salida);


    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
    
    
