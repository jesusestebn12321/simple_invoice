<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST["nombre_empresa"]) || empty($_POST["numero_impusto"]) || empty($_POST["nombre_contacto"]) || empty($_POST["apellido_contacto"]) || empty($_POST["email"]) || empty($_POST["direccion"])) {
           $errors[] = "Complete el formulario para poder crear un proveedor";
    }else if (!empty($_POST["nombre_empresa"]) || 
    	!empty($_POST["numero_impusto"]) || 
		!empty($_POST["nombre_contacto"]) || 
		!empty($_POST["apellido_contacto"]) || 
		!empty($_POST["email"]) || 
		!empty($_POST["direccion"])
	){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre_empresa=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_empresa"],ENT_QUOTES)));
		$numero_impusto=mysqli_real_escape_string($con,(strip_tags($_POST["numero_impusto"],ENT_QUOTES)));
		$sitio_web=mysqli_real_escape_string($con,(strip_tags($_POST["sitio_web"],ENT_QUOTES)));
		$telefono_empresa=mysqli_real_escape_string($con,(strip_tags($_POST["telefono_empresa"],ENT_QUOTES)));
		$nombre_contacto=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_contacto"],ENT_QUOTES)));
		$apellido_contacto=mysqli_real_escape_string($con,(strip_tags($_POST["apellido_contacto"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		
		



		$sql="INSERT INTO proveedores (nombre_empresa, numero_impusto, sitio_web, telefono_empresa, nombre_contacto, apellido_contacto, email, telefono, direccion) VALUES ('$nombre_empresa', '$numero_impusto', '$sitio_web', '$telefono_empresa','$nombre_contacto','$apellido_contacto','$email','$telefono','$direccion')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Proveedor ha sido ingresada satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			
			<?php
			}
			if (isset($messages)){
				
			
				
			}

?>