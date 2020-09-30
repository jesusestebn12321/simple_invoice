<?php
	$widget_active=["configuracion"=>ture];	
	$title="Configuración";
	include("head.php");
	$query_empresa=mysqli_query($con,"select * from perfil where id_perfil=1");
	$row=mysqli_fetch_array($query_empresa);
?>
<div class="content">
    <form method="post" id="perfil">
        <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><i class='glyphicon glyphicon-cog'></i> Configuración</h3>
            </div>
        	<div class="box-body" >
                <div class="col-md-12 col-lg-12"> 
                  	<table class="table table-condensed">
                    	<tbody>
	                      	<tr> 
		                        <td>IVA (%):</td>
		                        <td><input type="text" class="form-control input-sm" required name="impuesto" value="<?php echo $row['impuesto']?>"></td>
	                      	</tr>
							<tr>
		                        <td>Simbolo de moneda:</td>
		                        <td>
									<select class='form-control input-sm' name="moneda" required>
												<?php 
													$sql="select name, symbol from  currencies group by symbol order by name ";
													$query=mysqli_query($con,$sql);
													while($rw=mysqli_fetch_array($query)){
														$simbolo=$rw['symbol'];
														$moneda=$rw['name'];
														if ($row['moneda']==$simbolo){
															$selected="selected";
														} else {
															$selected="";
														}
														?>
														<option value="<?php echo $simbolo;?>" <?php echo $selected;?>><?php echo ($simbolo);?></option>
														<?php
													}
												?>
									</select>
								</td>
		                    </tr>
                       		<tr>
                        		<td>Descuento:</td>
                        		<td>
									<select class='form-control input-sm' name="descuento" required>
												<?php 
													$sql="select name, symbol from  currencies1 group by symbol order by name ";
													$query=mysqli_query($con,$sql);
													while($rw=mysqli_fetch_array($query)){
														$descuento1=$rw['symbol'];
														$descuento=$rw['name'];
														if ($row['descuento']==$descuento1){
															$selected="selected";
														} else {
															$selected="";
														}
														?>
														<option value="<?php echo $descuento1;?>" <?php echo $selected;?>><?php echo ($descuento1);?></option>
														<?php
													}
												?>
									</select>
								</td>
                      		</tr>
                    	</tbody>
                  	</table>
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
            </div>
	        <div class="box-footer text-center">              
	            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Actualizar datos</button>
	        </div>
        </div>
	</form>
</div>
	
	<?php
	include("footer.php");
	?>
	</div>
  </body>
</html>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
<script>
$( "#perfil" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_perfil.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('.guardar_datos').attr("disabled", false);

		  }
	});
  event.preventDefault();
})





		
</script>

<script>
		function upload_image(){
				
				var inputFileImage = document.getElementById("imagefile");
				var file = inputFileImage.files[0];
				if( (typeof file === "object") && (file !== null) )
				{
					$("#load_img").text('Cargando...');	
					var data = new FormData();
					data.append('imagefile',file);
					
					
					$.ajax({
						url: "ajax/imagen_ajax.php",        // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
							$("#load_img").html(data);
							
						}
					});	
				}
				
				
			}
    </script>

