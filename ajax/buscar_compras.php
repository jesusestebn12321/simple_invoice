<?php
/*LISTO*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_historial=intval($_GET['id']); 
		$sql_buscar_productos="SELECT products.id_producto FROM historial_compras, compra_productos, products where historial_compras.id=$id_historial  and compra_productos.id_historial_compra=$id_historial and products.id_producto=compra_productos.id_producto";
		$quey_buscar_productos=mysqli_query($con,$sql_buscar_productos);
		while($item=mysqli_fetch_array($quey_buscar_productos)){
			/*var_dump($item['id_producto']);*/
			$id=$item['id_producto'];
			$delete_producto="DELETE FROM products WHERE id_producto=$id";
			/*echo $delete_producto;*/
			$query_delete_producto=mysqli_query($con,$delete_producto);
		}
		$del1="DELETE FROM historial_compras WHERE id=$id_historial";
		$delete1=mysqli_query($con,$del1);
		if (true){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php 
		}else { 
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
        $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sTable = "historial_compras, users";
		$sWhere = "";
		$sWhere.=" WHERE historial_compras.id_user=users.user_id";
		$sWhere.=" order by historial_compras.id desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './compras_historial.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Compra N°</th>
					<th>Proveedor</th>
					<th>Fecha</th>
					<th>Usuario</th>
					<th>Neto</th>
					<th>IVA</th>
					<th class='text-right'>Total</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id'];
						$proveedor=$row['proveedor'];
						$fecha=date("d/m/Y", strtotime($row['fecha']));
						$usuario=$row['firstname']." ".$row['lastname'];;
						$neto=$row['neto'];
						$iva=$row['iva'];
						$total_iva=($neto * $iva )/100;

					?>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $proveedor;?></td>
						<td><?php echo $fecha; ?></td>
						<td><?php echo $usuario;?></td>
						<td><?php echo $neto; ?>$</td>
						<td><?php echo $iva; ?></td>
						<td class='text-right'><?php echo $total_iva+$neto ?>$</td>					
					<td class="text-right">
						<a href="editar_compra.php?id_historial=<?php echo $id;?>" class='btn btn-default' title='Editar factura' ><i class="glyphicon glyphicon-edit"></i></a>
						<a href="#" class='btn btn-default' title='Borrar factura' onclick="eliminar('<?php echo $id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
					</td>
						
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>