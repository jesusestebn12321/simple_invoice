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
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo ""; echo  $anio=date('m/d/Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <?php include("head_compra.php");?>
    <br>
        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%;" class='midnight-blue'>DATOS DEL PROVEEDOR</td>
        </tr>
		<tr>
           <td style="width:100%;" >
			<?php 
				$sql_proveedor=mysqli_query($con,"SELECT * FROM proveedores where id='$id_proveedor'");
				$rw_proveedor=mysqli_fetch_array($sql_proveedor);
				echo "<br>Proveedor: ";
				echo $rw_proveedor['nombre_empresa'];
				echo "<br>Numero de Impuesto: ";
				echo $rw_proveedor['numero_impusto'];
				echo "<br>Sitio web: ";
				echo $rw_proveedor['sitio_web'];
				echo "<br>Telefono de la Empresa: ";
				echo $rw_proveedor['telefono_empresa'];
				echo "<br>E-mail: ";
				echo $rw_proveedor['email'];
				echo "<br>Direccion: ";
				echo $rw_proveedor['direccion'];
			?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>COMPRADOR</td>
		  <td style="width:50%;" class='midnight-blue'>FECHA</td>
        </tr>
		<tr>
           <td style="width:50%;">
			<?php  
				$sql_user='SELECT * FROM users WHERE user_email="'.$_SESSION['user_email'] .'"';
				$query_user=mysqli_query($con,$sql_user);
				$array_user=mysqli_fetch_array($query_user);
				echo $array_user['firstname'] .' '. $array_user['lastname'];

			?>
		   </td>
		  <td style="width:50%;"><?php echo date("d/m/Y");?></td>
        </tr>
		
        
   
    </table>
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 25%;text-align:center" class='midnight-blue'>CODIGO</th>
            <th style="width: 25%" class='midnight-blue'>PRODUCTO</th>
            <th style="width: 10%;text-align:left;" class='midnight-blue'>DESCRIPCION</th>
             <th style="width:10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "SELECT historial_compras.id as historial_id, historial_compras.fecha as historial_fecha, compra_productos.id as compra_id, compra_productos.cantidad as cantidad_compra, products.* FROM historial_compras, compra_productos, products where historial_compras.id=$id_compra  and compra_productos.id_historial_compra=$id_compra and products.id_producto=compra_productos.id_producto");
while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_compra'];
	$nombre_producto=$row['nombre_producto'];
	$descripcion_producto=$row['descripcion_producto'];
	$precio_venta=$row['precio_producto'];
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
         	<td class='<?php echo $clase;?>' style="width: 25%; text-align: left"><?php echo $codigo_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 25%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 20%; text-align: left;"><?php echo $descripcion_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_total_f;?></td>
            
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
	$total_compra=$subtotal+$total_iva;




?>
	  <tr><td><br></td></tr>
        <tr>
            <td colspan="5" style="widtd: 85%; text-align: right;">SUBTOTAL <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
		<tr>
            <td colspan="5" style="widtd: 85%; text-align: right;">IVA (<?php echo $impuesto; ?>)% <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_iva,2);?></td>
        </tr>
        <tr>
            <td colspan="5" style="widtd: 85%; text-align: right;">TOTAL <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_compra,2);?></td>
        </tr>
    </table>
	
	
<br>
	<div style="font-size:11pt;text-align:center;font-weight:bold">________________</div>
	<div style="font-size:11pt;text-align:center;font-weight:bold">Firma Autorizada</div>
	<br>
	<br>
	<div style="font-size:11pt;text-align:center;font-weight:bold">_______________</div>
	<div style="font-size:11pt;text-align:center;font-weight:bold">Recibe Conforme</div>
	<br>	

</page>
