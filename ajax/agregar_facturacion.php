<?php
	/*LISTO*/
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	
if (!empty($id) and !empty($cantidad) and !empty($precio_venta)){

	$pro = mysqli_query($con, "SELECT cantidad from products where id_producto = '$id'");
	$cant =0;

	while ($rows = mysqli_fetch_array($pro)) {
		$cant = $rows['cantidad'];
	}

	if($cant >= $cantidad){
		
		$insert_tmp=mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");

		mysqli_query($con, "UPDATE products SET cantidad = cantidad - '$cantidad' where id_producto = '$id'");
	}

}else{
	echo "<script>toastr['error']('Al momento de agregar el producto no se selecciono la cantidad', 'Error')</script>";
}

if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$getid = mysqli_query($con, "SELECT * FROM tmp WHERE id_tmp='$id_tmp'");
$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");

while ($rows = mysqli_fetch_array($getid)) {

	$id = $rows['id_producto'];
	$cant = $rows['cantidad_tmp'];
	mysqli_query($con, "UPDATE products SET cantidad = cantidad + '$cant' where id_producto = '$id' and cantidad > 1");
}
}
$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
?>
<table class="table">
<tr>
	<th class='text-center'>CODIGO</th><br>
	<th>PRODUCTO</th>
	<th>DESCRIPCION</th>
	<th>PROVEEDOR</th>
	<th class='text-center'>CANT.</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	$descripcion_producto=$row['descripcion_producto'];
	$proveedor_producto=$row['proveedor_producto'];
	$precio_venta=$row['precio_tmp'];
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
			<td><?php echo $proveedor_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	$descuento=get_row('perfil','descuento', 'id_perfil', 1);
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_descuento=($subtotal * $descuento)/100;
	$total_descuento=number_format($total_descuento,2,'.','');
	$total_factura=($subtotal-$total_descuento)+$total_iva;
?>
<tr>
	<td class='text-right' colspan=6>SUBTOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=6>IVA (<?php echo $impuesto;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=6>TOTAL DESCUENTO (<?php echo $descuento;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_descuento,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=6>TOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
