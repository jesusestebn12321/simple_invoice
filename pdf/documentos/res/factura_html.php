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
    <?php include("encabezado_factura.php");?>
    <br>
    

	
         <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%;" class='midnight-blue'>DATOS DEL CLIENTE</td>
        </tr>
		<tr>
           <td style="width:100%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo "<br>R.U.C: ";
				echo $rw_cliente['RUC_cliente'];
				echo "<br>CLIENTE: ";
				echo $rw_cliente['nombre_cliente'];
				echo "<br>CIUDAD: ";
				echo $rw_cliente['ciudad_cliente'];
				echo "<br>DIRECCION: ";
				echo $rw_cliente['direccion_cliente'];
				echo "<br> TELF: ";
				echo $rw_cliente['telefono_cliente'];
			?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>VENDEDOR</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA</td>
		   <td style="width:40%;" class='midnight-blue'>FORMA DE PAGO</td>
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users where user_id='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['firstname']." ".$rw_user['lastname'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>
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
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CODIGO</th>
            <th style="width: 25%" class='midnight-blue'>PRODUCTO</th>
            <th style="width: 10%;text-align:left;" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align:left;" class='midnight-blue'>PROVEEDOR</th>
             <th style="width:10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from products, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$id_producto=$row["id_producto"];
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
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

         <tr>
         	<td class='<?php echo $clase;?>' style="width: 10%; text-align: left"><?php echo $codigo_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 25%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 20%; text-align: left;"><?php echo $descripcion_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: left;"><?php echo $proveedor_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>

	<?php 
	//Insert en la tabla detalle_cotizacion
	$insert_detail=mysqli_query($con, "INSERT INTO detalle_factura VALUES ('','$numero_factura','$id_producto','$cantidad','$precio_venta_r')");
	
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
	  
        <tr>
            <td colspan="6" style="widtd: 85%; text-align: right;">SUBTOTAL <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
		<tr>
            <td colspan="6" style="widtd: 85%; text-align: right;">IVA (<?php echo $impuesto; ?>)% <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_iva,2);?></td>
        </tr>
        <tr>
            <td colspan="6" style="widtd: 85%; text-align: right;">TOTAL DESCUENTO (<?php echo $descuento; ?>)% <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_descuento,2);?></td>
        </tr>
        <tr>
            <td colspan="6" style="widtd: 85%; text-align: right;">TOTAL <?php echo $simbolo_moneda;?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_factura,2);?></td>
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
	<div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>
	
	
	  

</page>

<?php
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO facturas VALUES (NULL,'$numero_factura','$date','$id_cliente','$id_vendedor','$condiciones','$total_factura','1')");
$delete=mysqli_query($con,"DELETE FROM tmp WHERE session_id='".$session_id."'");
?>