<?php
	$widget_active=['cliente'=>ture];
	$title="Clientes";
    include("head.php");
	include("modal/registro_clientes.php");
	include("modal/editar_clientes.php");
?>
<div class="content">
	<div class="box box-info">
		<div class="box-header">
				<div class="col-md-2 btn-group pull-right">
				<button type='button' class="btn btn-info" id='cliente'><span class="glyphicon glyphicon-print" ></span> Imprimir</button>
			</div>
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Cliente</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Clientes</h4>
		</div>
		<div class="box-body">
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				<div class="form-group row">
					<label for="q" class="col-md-2 control-label">Cliente</label>
					<div class="col-md-5">
						<input type="text" class="form-control" id="q" placeholder="RUC del cliente" onkeyup='load(1);'>
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
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/clientes.js"></script>
  </div>
  </body>
</html>
