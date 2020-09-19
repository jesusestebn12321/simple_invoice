$(document).ready(function(){
	load(1);
});
function load(page){
	var q= $("#q").val();
	var id_categoria=$('#id_categoria').val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./ajax/buscar_productos_compras.php?action=ajax&page='+page+'&q='+q+'&id_categoria='+id_categoria,
		 beforeSend: function(objeto){
		 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
			
		}
	});
	$.ajax({
		url:'./ajax/buscar_proveedores.php',
    	success: function(datos){
			$("#select_proveedor").html(datos);
		}
	});
}







function agregar (id,stock){
	var precio_venta=document.getElementById('precio_venta_'+id).value;
	var cantidad=$('#cantidad_'+id).val();
	//Inicia validacion
	if(stock==0){
		console.log('el stock es menor a la cantidad');
		toastr['error']('El producto no tiene stock.','Error');
		document.getElementById('cantidad_'+id).focus();
		return false;
	}
	if(cantidad==0){
		document.getElementById('cantidad_'+id).focus();
		toastr['error']('No tiene una cantidad asignada.','Error');
		return false;
	}
	if(isNaN(cantidad)){
		toastr['error']('Esto no es un numero','Error');
		document.getElementById('cantidad_'+id).focus();
		return false;
	}
	if(isNaN(precio_venta)){
		toastr['error']('Esto no es un numero','Error');
		document.getElementById('precio_venta_'+id).focus();
		return false;
	//Fin validacion
	}		
	$.ajax({
        type: "POST",
        url: "./ajax/agregar_compra.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
        success: function(datos){
			$("#resultados").html(datos);
			toastr['success']('Se agrego un producto con exito.','Exito');
		}
	});
		
}	
function eliminar(id){
	$.ajax({
        type: "GET",
        url: "./ajax/agregar_compra.php",
        data: "id="+id,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
	  	},
    	success: function(datos){
			$("#resultados").html(datos);
		}
	});
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
	var direccion='adads';
	console.log(nombre_contacto.val() + ' ' + numero_impusto.val()+ ' ' +sitio_web.val()+ ' ' +telefono_empresa.val()+ ' ' +nombre_contacto.val()+ ' ' +apellido_contacto.val()+ ' ' +email.val()+ ' ' +telefono.val()+ ' ' +calle.val()+ ' ' +ciudad.val()+ ' ' +region.val()+ ' ' +pais.val());
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
			toastr['success']('Se a creado un proveedor con exito','Exito');
			
			/*$().val('')*/
		}
	});
}
function crear_compra(){
	var cont=$('#contador').val();
	var id_proveedor=$('#proveesor_id').val();
	var array_productos=new Array();
	var total_compra=$('#total').val();
	var iva=$('#iva').val();
	var fecha=$('#fecha').val();
	for (var i = 0; i < cont; i++) {
		array_productos[i]= $('#id_producto_compra'+i ).val();
	}
	console.log(id_proveedor);
	console.log(array_productos);
	console.log(cont);
	$.ajax({
		type:'POST',
		url:'./ajax/crear_compra.php',
		data:{
			'id_productos':array_productos,
			'id_proveedor':id_proveedor,
			'total_compra':total_compra,
			'fecha':fecha,
			'cont':cont,
			'iva':iva,
		},
		success:function(data){
			toastr['success']('Se a comprado con exito los productos','Exito');
		}
	});
	alert();

};