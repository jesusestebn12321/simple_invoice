<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
th    { vertical-align: top; }
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
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial">
	<page_footer>
		<table class="page_footer">
		    <tr>

		        <td style="width: 50%; text-align: left">
		            P&aacute;gina [[page_cu]]/[[page_nb]]
		        </td>
		        <td style="width: 45%; text-align: right">
		            &copy; <?php echo ""; echo  $anio=date('m/d/Y'); ?>
		        </td>
		    </tr>
		</table>
	</page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tbody>
        <tr>
           <td style="width: 100%; color: #444444;font-family: Helvetica;text-align:center">
                <img style="width: 20%;" src="../../img/logo.jpg" alt="Logo">                
                <br>
                <br>
                <span style="font-size:14px;font-weight:bold;font-family: Helvetica"><?php echo "FERNANDEZ IBARRA ELSA CATALINA";?></span>
                <br>
                <span style="font-size:14px;font-weight:bold;font-family: Helvetica"><?php echo "COMERCIAL'SARITA'";?></span>
				<br>
				<span style="font-size:9.5px;font-weight:bold;font-family: Helvetica"><?php echo "VENTA AL POR MENOR DE COMISIONISTAS(NO DEPENDIENTES DE COMERCIOS), INCLUYE ACTIVIDADES DE CASAS DE SUBASTAS(AL POR MENOR)** VENTA LA POR MENOR DE ARTICULOS DE FERRETERIA: MARTILLOS, SIERRAS, DESTORNILLADORES Y PEQUEÑAS HERRAMIENTAS EN GENERAL, EQUIPO Y MATERIALES DE PREFABRICADOS PARA ARMADO CASERO(EQUIPO DE BRICOLAJE)";?></span>
	
            </td>
        </tr>
        </tbody>	
    </table>
	<hr>
	<table cellspacing="1" style="width: 76%; text-align: left; font-size: 10pt;">
        <thead>
			<tr>
				<th style="text-align:center;font-size: 8pt;" class='midnight-blue'>R.U.C</th>
				<th style="text-align:center;font-size: 8pt;" class='midnight-blue'>Nombre</th>
				<th style="text-align:center;font-size: 8pt;" class='midnight-blue'>Ciudad</th>
				<th style="text-align:center;font-size: 8pt;" class='midnight-blue'>Telefono</th>
				<th style="text-align:center;font-size: 8pt;" class='midnight-blue'>Direccion</th>
				<th style="text-align:center;font-size: 8pt;" class='midnight-blue'>Agregado</th>
			</tr>
		</thead>
		<tbody style="width: 100% !important; text-align: left; font-size: 9pt;">
		<?php
     
				$aColumns = array('RUC_cliente', 'nombre_cliente','ciudad_cliente','telefono_cliente', 'direccion_cliente');
				$sTable = "clientes";
				
				$sWhere=" order by id_cliente desc";
				$sql="SELECT * FROM  clientes";
				$query = mysqli_query($con, $sql);
				$nConfig = mysqli_num_rows ($query);  
          
		        if ($nConfig > 0)  
		        {  
		            for($i=0; $i<$nConfig; $i++)  
		            {  
		                $verConfig = mysqli_fetch_array($query);  
		               	
		                $CargaConfig[$i] = array('id_cliente'=>$verConfig['id_cliente'],
						'RUC_cliente'=>$verConfig['RUC_cliente'],
						'nombre_cliente'=>$verConfig['nombre_cliente'],
						'ciudad_cliente'=>$verConfig['ciudad_cliente'],
						'telefono_cliente'=>$verConfig['telefono_cliente'],
						'descripcion_cliente'=>$verConfig['descripcion_cliente'],
						'date_added'=> date('d/m/Y', strtotime($verConfig['date_added'])));
		            }  
		            foreach ($CargaConfig as $key=>$item) {
		            	$cadena=$item['RUC_cliente'].'-id'.$item['id_cliente'];
		            	$array_tmp[$key]=$cadena;
		            }
		            //setlocale(LC_COLLATE, 'es_ES.utf8');
					asort($array_tmp, SORT_LOCALE_STRING);
					foreach($array_tmp as $item) {
						# code...
						//echo $item.'<br>';
						$split=explode('-id', $item);
						//var_dump($split);
						//echo '<br>';
						$cont=0;
						foreach ($CargaConfig as $value) {
							# code...
							$count++;
							if($value['id_cliente']==$split[1]){
								$obj[$count]=$value;

							}
						}
					} 
		        }
				
			foreach ($obj as $key => $row) {
			 	
						$RUC_cliente=$row['RUC_cliente'];
						$nombre_cliente=$row['nombre_cliente'];
						$ciudad_cliente=$row['ciudad_cliente'];
						$telefono_cliente=$row['telefono_cliente'];
						$direccion_cliente=$row['direccion_cliente'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));

	
					?>
			<tr>
				<td style="width: 1%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $RUC_cliente; ?>		
				</td>
				
				<td style="width: 30%;text-align:center; font-size: 8pt;" class="silver">
					<?php echo $nombre_cliente; ?>		
				</td>
				<td style="width: 25%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $ciudad_cliente; ?>		
				</td>
				<td style="width: 15%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo  $telefono_cliente;?>		
				</td>
				<td style="width: 1%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $direccion_cliente; ?>		
				</td>
				<td style="width: 5%;text-align: center;font-size: 8pt;" class="silver">
					<?php echo $date_added; ?>		
				</td>
			</tr>
		<?php
		}
		?>
		</tbody>
    </table>
	<hr>

</page>