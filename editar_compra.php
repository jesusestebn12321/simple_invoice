<?php
	$widget_active=['compra'=>ture];
	$title="Editar Compra";
    include("head.php");	
	
	if (isset($_GET['id_historial'])){
		$id_get=intval($_GET['id_historial']);
		$sql_compra=mysqli_query($con,"SELECT historial_compras.fecha as historial_fecha, historial_compras.id as id_historial, compra_productos.id as compra_id, products.* FROM historial_compras, compra_productos, products where historial_compras.id=$id_get  and compra_productos.id_historial_compra=$id_get and products.id_producto=compra_productos.id_producto");

		$count=mysqli_num_rows($sql_compra);
		if ($count){
			while ($row=mysqli_fetch_array($sql_compra)){
				$historial_fecha= $row['historial_fecha'];
				$id_historial= $row['id_historial'];

			}
		}else{
			header("location: compras_historial.php");
			exit;	
		}
	}else{
		header("location: compras_historial.php");
		exit;
	}
	include("modal/buscar_productos.php");
	include("modal/crear_proveedor.php");
?>
    <div class="content">
	<div class="box box-info">
		<div class="box-header">
			<h4 class="box-title"><i class='glyphicon glyphicon-edit'></i> Editar Compra</h4>
		</div>
		<div class="box-body">
			<input type="hidden" id='id_get' value="<?php echo $id_get;?>">
			<form class="form-horizontal" role="form" id="datos_compra">
		  		<div class="form-group row">
					<div class="col-md-5">
                        <label>Proveedor</label>
						<div class="input-group">
							<?php
							$sql="SELECT * FROM  proveedores ";
							$query = mysqli_query($con, $sql);
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
							<span class="input-group-btn">
								<a href="#" class="btn btn-success" data-target='#crear_proveedor' data-toggle='modal'>Nuevo</a>		  
							</span>
						  </div>
                    </div>
	                <div class="col-md-3">
						<label>Fecha</label>
						<input type="text" class="form-control" id="fecha" value="<?php echo $historial_fecha;?>" readonly>							
					</div>
					<div class="col-md-3">
						<label>Compra N°</label>
						<input type="text" class="form-control" id="id_historial" value="<?php echo $id_historial;?>" readonly>							
					</div>   
				</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default">
						  <span class="glyphicon glyphicon-refresh"></span> Actualizar datos
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button type="button" class="btn btn-default" onclick="imprimir_compra('<?php echo $id_get;?>')">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			<div class="clearfix"></div>
				<div class="editar_compra" class='col-md-12' style="margin-top:10px"></div> <!-- Carga los datos ajax	-->
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div> <!-- Carga los datos ajax	-->
			
		</div>
	</div>		
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/editar_compra.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	</div>
  </body>
</html>