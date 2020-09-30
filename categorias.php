<?php

	$widget_active=["categoria"=>true];
	$title="Categorias";
    include("head.php");
	include("modal/registro_categorias.php");
	include("modal/editar_categorias.php");
?>
<div class="content">
	<div class="box box-info">
		<div class="box-header">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCategoria"><span class="glyphicon glyphicon-plus" ></span> Nueva Categoría</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Categorías</h4>
		</div>
		<div class="box-body">
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Nombre</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre de la categoría" onkeyup='load(1);'>
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
	<script type="text/javascript" src="js/categorias.js"></script>

	</div>
  </body>
</html>
