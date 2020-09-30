<?php

/*LISTO*/
	$widget_active=["compra"=>ture];
	$title="Nueva Compra";
    include("head.php");
	include("modal/buscar_productos.php");
	include("modal/crear_proveedor.php");
	
	
?>
    <div class="content">
	<div class="box box-info">
		<div class="box-header">
			<h4 class="box-title"><i class='glyphicon glyphicon-edit'></i> Nueva Compra</h4>
		</div>
		<div class="box-body">
		<?php 
		?>
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="container-fluid">
					<div class="form-group row">
						<div class="col-md-5">
	                        <label>Proveedor</label>
							<div class="input-group">
								<div id="select_proveedor"></div>
								<span class="input-group-btn">
									<a href="#" class="btn btn-success" data-target='#crear_proveedor' data-toggle='modal'>Nuevo</a>		  
								</span>
							  </div>
	                    </div>
						<div class="col-md-3">
							<label>Fecha</label>
							<input type="text" class="form-control" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>							
						</div>
						<div class="col-md-4">
							<label>Agregar producto</label><br>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
							 <span class="glyphicon glyphicon-search"></span> Buscar Productos
							</button>
						</div>
					</div>
				</div>
			
		<div id="resultados" class='col-md-12' style="margin-top:10px">

		</div>
			<!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
			</div>	
		 </div>
	</div>
			</form>	
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_compra.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  </div>
  </body>
</html>