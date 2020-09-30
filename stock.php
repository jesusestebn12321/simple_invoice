<?php
	$widget_active=["producto"=>true];
	$title="Productos";
 
	include("head.php");
	include("modal/registro_productos.php");
	include("modal/editar_productos.php");
?>

<div class="content">
	<div class="box box-info">
		<div class="box-header">
			<div class="container-fluid">
			<div class="col-md-2 btn-group pull-right">
				<button type='button' class="btn btn-info" id='imprimir'><span class="glyphicon glyphicon-print" ></span> Imprimir</button>
			</div>
		    <div class="col-md-2 btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoProducto"><span class="glyphicon glyphicon-plus" ></span> Nuevo Producto</button>
			</div>
			<h4 class="box-title"><i class='glyphicon glyphicon-search'></i> Consultar inventario</h4>
			</div>
		</div>
		<div class="box-body">
		
			
			
						<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
					<div class='col-md-6'>
						<label>Buscar por Nombre, Codigo, Descripcion o Proveedor</label>
						<input type="text" class="form-control" id="q" placeholder="Código, Nombre, Descripcion o Proveedor del producto" onkeyup='load(1);'>
					</div>
					<div class='col-md-4'>
						<label>Filtrar por categoría</label>
						<select class='form-control' name='id_categoria' id='id_categoria' onchange="load(1);">
							<option value="">Selecciona una categoría</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>			
								<?php
							}
							?>
						</select>
					</div>
		
					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div>
				<hr>
				<div class='row-fluid'>
					<div id="resultados"></div><!-- Carga los datos ajax -->
				</div>	
				<div class='row'>
					<div class='outer_div'></div><!-- Carga los datos ajax -->
				</div>
			</form>
				
			
			
			
			
  </div>
</div>
		 
	</div>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
<script>
function eliminar (id){
		var q= $("#q").val();
		var id_categoria= $("#id_categoria").val();
		$.ajax({
			type: "GET",
			url: "./ajax/buscar_productos.php",
			data: "id="+id,"q":q+"id_categoria="+id_categoria,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados").html(datos);
			load(1);
			}
		});
	}
		
	$(document).ready(function(){
			
		<?php 
			if (isset($_GET['delete'])){
		?>
			eliminar(<?php echo intval($_GET['delete'])?>);	
		<?php
			}
		
		?>	
	});
		
$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_productos").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

</script>
  </div>
  </body>
</html>