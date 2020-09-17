<?php

/*LISTO*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_compras="active";
	$title="Centro Ferretero'Bacilio'";
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Compra</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");
			include("modal/crear_proveedor.php");
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
  </body>
</html>