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
	$id_compra= intval($_GET['id_compra']);
	$ultima_compra= intval($_GET['id_compra']);
	$id_proveedor= intval($_GET['id_proveedor']);
	$sql_count=mysqli_query($con,"SELECT * FROM historial_compras WHERE id=".$id_compra."");
	$count=mysqli_num_rows($sql_count);

	if ($count==0){
		echo "<script>alert('Compra no encontrada')</script>";
		echo "<script>window.close();</script>";
		exit;
	}

	$sql_compra=mysqli_query($con,"SELECT historial_compras.id as historial_id, historial_compras.fecha as historial_fecha, compra_productos.id as compra_id, products.* FROM historial_compras, compra_productos, products where historial_compras.id=$id_get  and compra_productos.id_historial_compra=$id_get and products.id_producto=compra_productos.id_producto");
	
	$rw_compra=mysqli_fetch_array($sql_compra);

	$fecha_compra=$rw_compra['historial_fecha'];

	$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_compra_html.php');
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
        $html2pdf->Output('Compra.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
