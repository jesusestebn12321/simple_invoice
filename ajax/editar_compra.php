<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	$id_historial= $_SESSION['id_historial'];
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id_proveedor'])) {
           $errors[] = "Selecciona un proveedor";
        }else if (empty($_POST['id_vendedor'])) {
           $errors[] = "Selecciona el vendedor";
        } else if (empty($_POST['condiciones'])){
			$errors[] = "Selecciona forma de pago";
		} else if ($_POST['estado_factura']==""){
			$errors[] = "Selecciona el estado de la factura";
		} else if (
			!empty($_POST['condiciones']) &&
			$_POST['estado_factura']!="" 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
	
		
		$sql="UPDATE facturas SET id_cliente='".$id_cliente."', id_vendedor='".$id_vendedor."', condiciones='".$condiciones."', estado_factura='".$estado_factura."' WHERE id_factura='".$id_factura."'";
		
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Compra ha sido actualizada satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			foreach ($errors as $error) {
					echo $error;
				}
		}
		if (isset($messages)){
			foreach ($messages as $message) {
				echo $message;
			}
		}

?>