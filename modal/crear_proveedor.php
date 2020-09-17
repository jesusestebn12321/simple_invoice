<form action="#" method="post" class="form-horizontal">
<div id="crear_proveedor" class="modal fade" role="dialog">
  	<div class="modal-dialog">	
		<div class="modal-content">
		    <div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title">Nuevo Proveedor</h4>
		    </div>
		    <div class="modal-body">
				<div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Empresa</a></li>
		              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Contacto</a></li>
		              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Dirección</a></li>
		            </ul>
		            <div class="tab-content">
		              	<div class="tab-pane active" id="activity">
		              		<br>
		                	<div class="form-group">
			                    <label for="nombre_empresa" class="col-sm-3 control-label">Nombre</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required="">
			                    </div>
		                  	</div>
							<div class="form-group">
			                    <label for="numero_impusto" class="col-sm-3 control-label">Número de Impuesto</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="numero_impusto" name="numero_impusto">
			                    </div>
			                </div>
							<div class="form-group">
			                    <label for="sitio_web" class="col-sm-3 control-label">Sitio Web</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="sitio_web" name="sitio_web">
			                    </div>
			                </div>
							<div class="form-group">
			                    <label for="telefono_empresa" class="col-sm-3 control-label">Teléfono</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa" required="">
			                    </div>
			                </div>
		              	</div><!-- /.tab-pane -->

		            	<div class="tab-pane" id="timeline">
		              		<br>
							<div class="form-group">
								<label for="nombre_contacto" class="col-sm-3 control-label">Nombres</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="apellido_contacto" class="col-sm-3 control-label">Apellidos</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" id="apellido_contacto" name="apellido_contacto" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-3 control-label">Correo Electrónico</label>
								<div class="col-sm-9">
								  <input type="email" class="form-control" id="email" name="email">
								</div>
							</div>
							<div class="form-group">
								<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" id="telefono" name="telefono" required="">
								</div>
							</div>
		              	</div><!-- /.tab-pane -->

		              	<div class="tab-pane" id="settings">
		                	<br>
			                <div class="form-group">
			                    <label for="calle" class="col-sm-3 control-label">Calle</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="calle" name="calle">
			                    </div>
			                </div>
							<div class="form-group">
			                    <label for="ciudad" class="col-sm-3 control-label">Ciudad</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="ciudad" name="ciudad">
			                    </div>
			                </div>
							<div class="form-group">
			                    <label for="region" class="col-sm-3 control-label">Región/Provincia</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="region" name="region">
			                    </div>
			                </div>
							<div class="form-group">
			                    <label for="codigo_postal" class="col-sm-3 control-label">Código Postal</label>
			                    <div class="col-sm-9">
			                      <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
			                    </div>
			                </div>
							<div class="form-group">
			                    <label for="pais" class="col-sm-3 control-label">País</label>
			                    <div class="col-sm-9">
			                     	<input type="text" id="pais" name="pais" class="form-control">
			                    </div>
			                </div>
		              	</div><!-- /.tab-pane -->
		            </div><!-- /.tab-content -->
		        </div><!-- /.nav-tabs-custom -->
		    </div>

		    <div class="modal-footer">
		       	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    	<a href="#" onclick='create_proveedor()' id="btn_crear_proveedor" class="btn btn-primary">Registrar</a>
		    </div>
	    </div>
	</div>
</div>
</form>
