<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	
	
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	//Archivo de funciones PHP
	include("../../funciones.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"SELECT * FROM products");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
		echo "<script>toart['error']('No hay productos','Error')</script>";
		echo "<script>window.close();</script>";
		exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
    ob_start();
    include(dirname('__FILE__').'/res/all_products_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Productos.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
