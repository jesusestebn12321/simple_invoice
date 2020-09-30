<?php
	$widget_active=["facturas"=>true];
	$title="Facturas";
 
	include("head.php");
	include("modal/print_factura.php");

?>
    <!-- Main content -->
    <section class="content">
		<div class="box box-info">
		<div class="box-header">
		    <div class="container-fluid">
				<div class="col-md-2 btn-group pull-right">
					<a href="#!" class="btn btn-info" data-toggle='modal' data-target='#print_factura'><span class="glyphicon glyphicon-print" ></span> Imprimir</a>
				</div>

			    <div class="col-md-2 btn-group pull-right">
					<a  href="nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
				</div>

				<h4 class="box-title"><i class='glyphicon glyphicon-search'></i> Buscar Facturas</h4>
		    </div>
		</div>
			<div class="box-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente o # de factura</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="R.U.C del cliente o # de factura" onkeyup='load(1);'>
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
		
	</section>
	

	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/facturas.js"></script>
	<script>
		var date = new Date();
		var month=date.getMonth()+1;
		var date_now = date.getFullYear()+"-0"+month+"-" +date.getDate();
		$('#btn_print_factura').click(function(e){
			var print_after=$('#print_after').val();
			var print_before=$('#print_before').val();
			console.log(print_after);
			/*debugger;*/
			if(print_before>print_after){
				toastr['error']('El rango de fecha es incorrecto. "Desde tiene que ser menor que hasta" ','Error');
				//$('#print_before').focus();
				e.preventDefault();
				return false;
			}else{
				
					VentanaCentrada('./pdf/documentos/all_facturas.php?&print_after='+print_after+'&print_before='+print_before+'?Factura','','1024','768','true');
					
					
				
			}
		});
	</script>
	
	</div>
  </body>
</html>