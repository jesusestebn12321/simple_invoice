<?php

include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}
if (isset($_POST['id_producto'])){$id_producto=$_POST['id_producto'];}
if (isset($_POST['id_proveedor'])){$id_proveedor=$_POST['id_proveedor'];}
$id_historial=$_GET['id_historial'];
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	
if (!empty($cantidad) and !empty($precio_venta) and !empty($id_producto) and !empty($id_proveedor)){
	if(true){
		try {			
			$sql_show_proveedor="SELECT * FROM proveedores WHERE id=$id_proveedor";
			$query_show_proveedor=mysqli_query($con,$sql_show_proveedor);
			$proveedor_array=mysqli_fetch_array($query_show_proveedor);
			$show_producto="SELECT * FROM products WHERE id_producto=$id_producto";
			$query_productos=mysqli_query($con, $show_producto);
			$productos= mysqli_fetch_array($query_productos);
			$date_added=date("Y-m-d H:i:s");
			$codigo=$productos['codigo_producto'].rand(0,10);
			$nombre=$productos['nombre_producto'];
			$descripcion=$productos['descripcion_producto'];
			$proveedor=$proveedor_array['nombre_empresa'];
			$precio=$productos['precio_producto'];
			$id_categoria=$productos['id_categoria'];
			
			$sql_crear_producto="INSERT INTO products (codigo_producto, nombre_producto, descripcion_producto, proveedor_producto, date_added, precio_producto, cantidad, id_categoria) VALUES ('$codigo', '$nombre', '$descripcion', '$proveedor', '$date_added', '$precio', '$cantidad', '$id_categoria')";
			$query_producto=mysqli_query($con,$sql_crear_producto);
			
			$sql_show_products="SELECT id_producto as id FROM products WHERE codigo_producto='".$codigo."'";
			$query_show_producto=mysqli_query($con,$sql_show_products);
			$id_new_product=mysqli_fetch_array($query_show_producto)['id'];

			$insert_compra=mysqli_query($con, "INSERT INTO compra_productos(id_historial_compra, id_producto,cantidad) VALUES ('$id_historial','$id_new_product','$cantidad')");
			
			$sql_buscar_productos="SELECT products.precio_producto as productos_precio, compra_productos.cantidad as cantidad  FROM historial_compras, compra_productos, products where historial_compras.id=$id_historial  and compra_productos.id_historial_compra=$id_historial and products.id_producto=compra_productos.id_producto";
			$quey_buscar_productos=mysqli_query($con,$sql_buscar_productos);
			$neto_total=0;
			while($row=mysqli_fetch_array($quey_buscar_productos)){
				/*var_dump($row);*/
				$total=$row['productos_precio']*$row['cantidad'];
				$neto_total=$neto_total+$total;
			}
			$neto_total=number_format($neto_total,2,'.','');
			$sql_update_historial_compra="UPDATE historial_compras SET neto=$neto_total WHERE id=$id_historial";
			$query_update_historial=mysqli_query($con,$sql_update_historial_compra);
		} catch (Exception $e) {
			$message='Error '.$e;
		}
	}
}

if (isset($_GET['id_compra_producto_delete'])){
	$id_compra_producto_delete=intval($_GET['id_compra_producto_delete']);	
	$precio_total=intval($_GET['precio_total']);	
	
	$buscar_producto=mysqli_query($con, "SELECT * FROM compra_productos WHERE id=".$id_compra_producto_delete."");

	$sql_historial="SELECT neto FROM historial_compras WHERE id=$id_historial";
	$query_historial=mysqli_query($con,$sql_historial);
	$array_historial=mysqli_fetch_array($query_historial);
	$total=$array_historial['neto']-$precio_total;
	var_export($total);
	
	$neto_total=number_format($total,2,'.','');

	$sql_update_historial_compra="UPDATE historial_compras SET neto=$neto_total WHERE id=$id_historial";
	$query_update_historial=mysqli_query($con,$sql_update_historial_compra);
	/*var_dump($query_update_historial);
*/

	$id_producto_array=mysqli_fetch_array($buscar_producto)['id_producto'];
	$delete_producto=mysqli_query($con,"DELETE FROM products WHERE id_producto=$id_producto");
	$delete=mysqli_query($con, "DELETE FROM compra_productos WHERE id=".$id_compra_producto_delete."");
}
$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
?>
<table class="table">
<tr>
<th class='text-center'>CODIGO</th>
	<th>PRODUCTO</th>
	<th>DESCRIPCION</th>
	<th class='text-center'>CANT.</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "SELECT historial_compras.id as historial_id, compra_productos.id as compra_id, compra_productos.cantidad as compra_productos_cantidad, products.* FROM historial_compras, compra_productos, products where historial_compras.id=$id_historial  and compra_productos.id_historial_compra=$id_historial and products.id_producto=compra_productos.id_producto");

	while ($row=mysqli_fetch_array($sql)){
		/*var_dump($row);*/
		$id_compra_producto=$row["compra_id"];
		$codigo_producto=$row['codigo_producto'];
		$nombre_producto=$row['nombre_producto'];
		$descripcion_producto=$row['descripcion_producto'];
		$cantidad=$row['compra_productos_cantidad'];
		$precio_venta=$row['precio_producto'];
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
		$precio_total=$precio_venta_r*$cantidad;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$sumador_total+=$precio_total_r;//Sumador
		
		?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td><?php echo $descripcion_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><input type="hidden" value='<?php echo $precio_total_f;?>' id='precio_total<?php echo $id_compra_producto ?>'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_compra_producto ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	$descuento=get_row('perfil','descuento', 'id_perfil', 1);
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
	
?>
<tr>
	<td class='text-right' colspan=5>SUBTOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=5>IVA (<?php echo $impuesto;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=5>TOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>