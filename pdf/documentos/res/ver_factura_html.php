<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}

}
-->
</style>
<page backtop="1.5mm" backbottom="mm" backleft="10mm" backright="10mm" style="font-size: 12pt; font-family: Helvetica" >
      
	<?php include("encabezado_factura.php");?>
 

	<div style="font-size:11pt;text-align:left;font-weight:bold">***************************************************</div>
 <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:40%;font-weight:bold;">DATOS DEL CLIENTE</td>
        </tr>
		<tr>
           <td style="width:40%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo "R.U.C: ";
				echo $rw_cliente['RUC_cliente'];
				echo "<br>CLIENTE: ";
				echo $rw_cliente['nombre_cliente'];
				echo "<br>CIUDAD: ";
				echo $rw_cliente['ciudad_cliente'];
				echo "<br>DIRECCION:";
				echo $rw_cliente['direccion_cliente'];
				echo "<br> TELF: ";
				echo $rw_cliente['telefono_cliente'];
			?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <div style="font-size:11pt;text-align:left;font-weight:bold">***************************************************</div>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:40%;font-weight:bold;">VENDEDOR</td>
            </tr>
             <tr>
           <td style="width:40%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users where user_id='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['firstname']." ".$rw_user['lastname'];
			?>
		   </td>
		   </tr>
		   </table>
<div style="font-size:11pt;text-align:left;font-weight:bold">***************************************************</div>
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:40%;font-weight:bold;">FECHA</td>
            </tr>
             <tr>
           <td style="width:40%;">
           	<?php 
           	echo date("d/m/Y", strtotime($fecha_factura));
           	?>
		   </td>
		   </tr>
		   </table>
		  
		   <div style="font-size:11pt;text-align:left;font-weight:bold">***************************************************</div>
		   <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
     <td style="width:40%;font-weight:bold;">FORMA DE PAGO</td>
              </tr>
               <tr> 
		   <td style="width:40%;" >
				<?php 
				if ($condiciones==1){echo "Efectivo";}
				elseif ($condiciones==2){echo "Cheque";}
				elseif ($condiciones==3){echo "Transferencia bancaria";}
				elseif ($condiciones==4){echo "Crédito";}
				?>
		   </td>
		   </tr>
		   </table>

  <div style="font-size:11pt;text-align:left;font-weight:bold">***************************************************</div>


    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
    	  <tr>
     <td style="width:40%;font-weight:bold;">DATOS DE PRODUCTOS</td> <br>
              </tr>
     </table>
     <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
    	  
           <tr>
     <td style="width:40%;font-weight:bold;">CODIGO PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	?>	
	 <tr>
         	<td ><?php echo $codigo_producto;?></td>
         </tr>
	
		<?php 

	}

?>
   </table>

 <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
   
           <tr>
     <td style="width:40%;font-weight:bold;">NOMBRE PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$nombre_producto=$row['nombre_producto'];
	?>	
	 <tr>
         	<td ><?php echo $nombre_producto;?></td>
         </tr>
	
		<?php 

	

	}
	
?>
   </table>
   <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
   
           <tr>
     <td style="width:40%;font-weight:bold;">DESCRIPCION PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$descripcion_producto=$row['descripcion_producto'];
	?>	
	 <tr>
         	<td ><?php echo $descripcion_producto;?></td>
         </tr>
	
		<?php 

	
	$nums++;
	}
	
?>
   </table>
   <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
   
           <tr>
     <td style="width:40%;font-weight:bold;">PROVEEDOR PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$proveedor_producto=$row['proveedor_producto'];
	?>	
	 <tr>
         	<td ><?php echo $proveedor_producto;?></td>
         </tr>
	
		<?php 

	
	$nums++;
	}
	
?>
   </table>
   <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
   
           <tr>
     <td style="width:40%;font-weight:bold;">CANTIDAD PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$cantidad=$row['cantidad'];
	?>	
	 <tr>
         	<td ><?php echo $cantidad;?></td>
         </tr>
	
		<?php 

	
	$nums++;
	}
	
?>
   </table>
    
   <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
   
           <tr>
     <td style="width:40%;font-weight:bold;">PRECIO UNITARIO PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$cantidad=$row['cantidad'];
	$precio_venta=$row['precio_venta'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>	
	 <tr>
            <td ><?php echo $precio_venta_f;?></td>
           
         </tr>
	
		<?php 

	
	$nums++;
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
   </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
   
           <tr>
     <td style="width:40%;font-weight:bold;">PRECIO TOTAL PRODUCTOS</td> 
              </tr>
<?php
$nums=1;
$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detalle_factura, facturas where products.id_producto=detalle_factura.id_producto and detalle_factura.numero_factura=facturas.numero_factura and facturas.id_factura='".$id_factura."'");

	while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$cantidad=$row['cantidad'];
	$precio_venta=$row['precio_venta'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>	
	 <tr>
            <td ><?php echo $precio_total_f;?></td>
           
         </tr>
	
		<?php 

	
	$nums++;
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
   </table>
   
   <br>
  <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
<tr>
	<td class='text-right' colspan=1>SUBTOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=1>IVA (<?php echo $impuesto;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=1>TOTAL DESCUENTO (<?php echo $descuento;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_descuento,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=1>TOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>

<div style="font-size:11pt;text-align:left;font-weight:bold">*************************************************</div>
	
	
	
	<div style="font-size:11pt;text-align:left;font-weight:bold">     ________________</div>
	<div style="font-size:11pt;text-align:left;font-weight:bold">     Firma Autorizada</div>
	<br>
	<div style="font-size:11pt;text-align:left;font-weight:bold">     ________________</div>
	<div style="font-size:11pt;text-align:left;font-weight:bold">     Recibe Conforme</div>

	<div style="font-size:11pt;text-align:left;font-weight:bold">Gracias por su compra!</div>
	  

</page> 

