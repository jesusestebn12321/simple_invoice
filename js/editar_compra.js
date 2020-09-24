$(document).ready(function(){
	load(1);
	$( "#resultados" ).load( "ajax/editar_compra_tabla.php?id_historial="+$('#id_get').val() );
	$.ajax({
		url:'./ajax/buscar_proveedores.php',
		success: function(datos){
			$("#select_proveedor").html(datos);
			
		}
	});
});
function load(page){
	var q= $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./ajax/buscar_productos_compras.php?action=ajax&page='+page+'&q='+q,
		 beforeSend: function(objeto){
		 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
			
		}
	});
}

function agregar (id){
	var precio_venta=document.getElementById('precio_venta_'+id).value;
	var cantidad=document.getElementById('cantidad_'+id).value;
	var proveesor_id= $('#proveesor_id').val();
	
	//Inicia validacion
	if (isNaN(cantidad)){
		toastr['error']('Esto no es un numero','Error');
		document.getElementById('cantidad_'+id).focus();
		return false;
	}
	if (proveesor_id==0){
		toastr['error']('Selecciona un proveedor','Error');
		document.getElementById('cantidad_'+id).focus();
		return false;
	}
	if (isNaN(precio_venta)){
		toastr['error']('Esto no es un numero','Error');
		document.getElementById('precio_venta_'+id).focus();
		return false;
	}
	//Fin validacion
	$.ajax({
        type: "POST",
        url: "./ajax/editar_compra_tabla.php?id_historial="+$('#id_get').val(),
        data: {
        	"precio_venta":precio_venta,
        	"cantidad":cantidad,
        	"id_producto":id,
        	"id_proveedor":proveesor_id,
        },
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
        success: function(datos){
			$("#resultados").html(datos);


		}
	});
}
		
function eliminar (id){
	$.ajax({
        type: "GET",
        url: "./ajax/editar_compra_tabla.php",
        data: {
        	"id_compra_producto_delete":id,
        	"id_historial":$('#id_get').val(),
        	"precio_total":$('#precio_total'+id).val()
        },
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
			$("#resultados").html(datos);
		}
	});
}

$("#datos_compra").submit(function(event){
  	var parametros = $(this).serialize();
	 $.ajax({
		type: "POST",
		url: "ajax/editar_compra_tabla.php",
		data: parametros,
		 beforeSend: function(objeto){
			$(".editar_compra").html("Mensaje: Cargando...");
		  },
		success: function(datos){
			$(".editar_compra").html(datos);
		}
	});
	event.preventDefault();
});
		

function imprimir_compra(id_compra){
	var id_proveedor=$('#proveesor_id').val();
	VentanaCentrada('./pdf/documentos/ver_compra.php?id_compra='+id_compra+'&id_proveedor='+id_proveedor,'Compra','','1024','768','true');
}

function create_proveedor(){
	var nombre_empresa=$('#nombre_empresa');
	var numero_impusto=$('#numero_impusto');
	var sitio_web=$('#sitio_web');
	var telefono_empresa=$('#telefono_empresa');
	var nombre_contacto=$('#nombre_contacto');
	var apellido_contacto=$('#apellido_contacto');
	var email=$('#email');
	var telefono=$('#telefono');
	var calle=$('#calle');
	var ciudad=$('#ciudad');
	var region=$('#region');
	var pais=$('#pais');
	var codigo_postal=$('#codigo_postal');
	var direccion= pais.val() +', '+region.val() +', '+ciudad.val() +', '+calle.val() +', '+'('+codigo_postal.val()+')';
	$.ajax({
		type:"POST",
		url:"./ajax/crear_proveedor.php",
		data:{
			'nombre_empresa':nombre_empresa.val(),
			'numero_impusto':numero_impusto.val(),
			'sitio_web':sitio_web.val(),
			'telefono_empresa':telefono_empresa.val(),
			'nombre_contacto':nombre_contacto.val(),
			'apellido_contacto':apellido_contacto.val(),
			'email':email.val(),
			'telefono':telefono.val(),
			'direccion':direccion
		},
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
	  	},
    	success: function(datos){
			toastr['success'](datos,'Exito');
			
			/*$().val('')*/
			$.ajax({
				url:'./ajax/buscar_proveedores.php',
				success: function(datos){
					$("#select_proveedor").html(datos);
					
				}
			});
		}
	});
}