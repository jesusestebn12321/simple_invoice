<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST["id_proveedor"]) ) {
           $errors[] = "Complete el formulario ";
    }else if (!empty($_POST["id_proveedor"])  ){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
			
		/*mysqli_query($con,$query_producto);*/


		try {
			
			$id_proveedor=intval($_POST['id_proveedor']);
			$query_proveedor="SELECT * FROM proveedores WHERE id=$id_proveedor";
			$show_proveedor=mysqli_query($con,$query_proveedor);
			$proveedor_array=mysqli_fetch_array($show_proveedor);
			$proveedor=$proveedor_array['nombre_empresa'];

			
			$fecha=date("Y-m-d H:i:s");
			$neto=mysqli_real_escape_string($con,(strip_tags($_POST["total_compra"],ENT_QUOTES)));
			$iva=mysqli_real_escape_string($con,(strip_tags($_POST["iva"],ENT_QUOTES)));
			$id_user=$_SESSION['user_id'];

			$query_historial="INSERT INTO historial_compras (fecha, neto, iva, id_user, proveedor) VALUES ('$fecha', '$neto', '$iva','$id_user','$proveedor')";
			$query_new_insert = mysqli_query($con,$query_historial);
			
			$contador=$_POST['cont'];
			for ($i=0; $i < $contador; $i++) { 
				# code...
				$id_producto=$_POST['id_productos'][$i];
				$show_producto="SELECT * FROM products WHERE id_producto=$id_producto";
				$query_productos=mysqli_query($con, $show_producto);
				$productos= mysqli_fetch_array($query_productos);
				$date_added=date("Y-m-d H:i:s");
				$codigo=$productos['codigo_producto'].$i.rand(0,100);
				$nombre=$productos['nombre_producto'];
				$descripcion=$productos['descripcion_producto'];
				$proveedor=$proveedor_array['nombre_empresa'];
				$precio=$productos['precio_producto'];
				$cantidad=$productos['cantidad'];
				$id_categoria=$productos['id_categoria'];

				$sql_producto="INSERT INTO products (codigo_producto, nombre_producto, descripcion_producto, proveedor_producto, date_added, precio_producto, cantidad, id_categoria) VALUES ('$codigo', '$nombre', '$descripcion', '$proveedor', '$date_added', '$precio', '$cantidad', '$id_categoria')";
				$query_producto=mysqli_query($con,$sql_producto);
				
				/*falta pasar la cantidad de cada producto para la compra y saber cuales son los ultimos datos insertados*/		
				/*$query_compra="INSERT INTO compra_productos (id_producto, id_historial_compra, cantidad) VALUES ('$id_producto', '$id_historial_compra', '$cantidad')";
				*/

				
			}
		
		
		
		
		
		/*$query_compra="INSERT INTO compra_productos (id_producto, id_historial_compra, cantidad) VALUES ('$id_producto', '$id_historial_compra', '$cantidad')";
		*/
		
		} catch (Exception $e) {
			
			echo $e;
		}


		/*$query_new_insert = mysqli_query($con,$query_proveedor);*/

		if (true){
			$messages[] = "Proveedor ha sido ingresada satisfactoriamente.";
		} else{
			$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
		}
	} else {
		$errors []= "Error desconocido.";
	}
		
	if (isset($errors)){
		foreach ($errors as $value) {
			    echo $value;
			}	
	}
	if (isset($messages)){
		foreach ($messages as $value) {
		    echo $value;
		}
	}
?>