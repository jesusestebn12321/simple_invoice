<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		$sql="SELECT * FROM  proveedores ";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		
?>
	<select name="proveesor_id" class="form-control" id="proveesor_id">
		<option value="0">Selecciona un proveedor</option>
		<option value="0">Empresa - Contacto</option>
		<?php
			while ($row=mysqli_fetch_array($query)){
					$id=$row['id'];
					$nombre_empresa=$row['nombre_empresa'];
					$nombre_contacto=$row['nombre_contacto'];
					$apellido_contacto= $row['apellido_contacto'];
			?>
				<option value="<?php echo $id; ?>"><?php echo $nombre_empresa.' - '.$nombre_contacto.' '.$apellido_contacto; ?></option>
		<?php
		}
		?>
	</select>
<?php
		
