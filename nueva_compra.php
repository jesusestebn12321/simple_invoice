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
		?>
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="container-fluid">
					
					<div class="form-group row">
						<label for="proveedor" class="col-md-1 control-label">Proveedor</label>
						<div class="col-md-3">
							<input type="text" name="proveedor" class="form-control input-sm" id="proveedor" placeholder="Selecciona proveedor" required>
						</div>
						<label for="tel2" class="col-md-1 control-label">Fecha</label>
						<div class="col-md-3">
							<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
							 <span class="glyphicon glyphicon-plus"></span> Agregar producto
							</button>
						</div>
					</div>
				</div>
			</form>	
			
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
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_compra.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  </body>
</html>