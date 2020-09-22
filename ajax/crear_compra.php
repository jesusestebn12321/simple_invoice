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

			$sql_new_historial="INSERT INTO historial_compras (fecha, neto, iva, id_user, proveedor) VALUES ('$fecha', '$neto', '$iva','$id_user','$proveedor')";
			$query_new_historial = mysqli_query($con,$sql_new_historial);

			$sql_show_historial="SELECT MAX(ID) AS ultimo_registro FROM historial_compras";
			$query_show_historial= mysqli_query($con,$sql_show_historial);
			$id_historial_compra=mysqli_fetch_array($query_show_historial)['ultimo_registro'];

			
			$contador=$_POST['cont'];
			for ($i=0; $i < $contador; $i++) { 
				# code...
				$id_producto=$_POST['id_productos'][$i];
				$show_producto="SELECT * FROM products WHERE id_producto=$id_producto";
				$query_productos=mysqli_query($con, $show_producto);
				$productos= mysqli_fetch_array($query_productos);
				$date_added=date("Y-m-d H:i:s");
				$codigo=$productos['codigo_producto'].$i.rand(0,10);
				$nombre=$productos['nombre_producto'];
				$descripcion=$productos['descripcion_producto'];
				$proveedor=$proveedor_array['nombre_empresa'];
				$precio=$productos['precio_producto'];
				$cantidad=$productos['cantidad'];
				$id_categoria=$productos['id_categoria'];

				$sql_producto="INSERT INTO products (codigo_producto, nombre_producto, descripcion_producto, proveedor_producto, date_added, precio_producto, cantidad, id_categoria) VALUES ('$codigo', '$nombre', '$descripcion', '$proveedor', '$date_added', '$precio', '$cantidad', '$id_categoria')";
				$query_producto=mysqli_query($con,$sql_producto);
				/*falta pasar la cantidad de cada producto para la compra y saber cuales son los ultimos datos insertados*/
				$sql_show_products="SELECT id_producto as id FROM products WHERE codigo_producto='".$codigo."'";
				$query_show_producto=mysqli_query($con,$sql_show_products);
				$id_new_product=mysqli_fetch_array($query_show_producto)['id'];
				/*var_dump($id_new_product);*/
				$sql_compra="INSERT INTO compra_productos (id_producto, id_historial_compra, cantidad) VALUES ('$id_new_product', '$id_historial_compra', '$cantidad')";
				$query_compra=mysqli_query($con,$sql_compra);
			}
		} catch (Exception $e) {
			echo $e;
		}

		if ($query_compra){
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