<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_compras="active";
	$title="Centro Ferretero 'Bacilio'";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<?php include("head.php");?>

  </head>
  <body>
	<?php
	include("navbar.php");
	include("modal/print_factura.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="container-fluid">
				<!-- <div class="col-md-2 btn-group pull-right">
					<a href="#!" class="btn btn-info" data-toggle='modal' data-target='#print_factura'><span class="glyphicon glyphicon-print" ></span> Imprimir</a>
				</div> -->

			    <div class="col-md-2 btn-group pull-right">
					<a  href="nueva_compra.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Compra</a>
				</div>

				<h4><i class='glyphicon glyphicon-shopping-cart'></i> Compras</h4>
		    </div>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Numero de compra</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="" onkeyup='load(1);'>
							</div>
							
							
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/compras.js"></script>
  </body>
</html>