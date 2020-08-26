<?php


	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		if ($delete1=mysqli_query($con,"DELETE FROM products WHERE id_producto='".$id_producto."'")){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		 
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
         $id_categoria =intval($_REQUEST['id_categoria']);
		 $aColumns = array('codigo_producto', 'nombre_producto','proveedor_producto','cantidad');//Columnas de busqueda
		 $sTable = "products";
		 $sWhere = "";
		
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
			if ($id_categoria>0){
			$sWhere .=" and id_categoria='$id_categoria'";
		}
		
	
		$sWhere.=" order by id_producto desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 18; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './productos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			  <div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Código</th>
					<th>Producto</th>
					<th>Descripcion</th>
					<th>Proveedor</th>
					<th>Cantidad</th>
					<th>Agregado</th>
					<th class='text-right'>Precio</th>
					<th class='text-right'>Editar Producto</th>
					
				</tr>
				<?php
				$nums=1;
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id_producto'];
						$codigo_producto=$row['codigo_producto'];
						$nombre_producto=$row['nombre_producto'];
						$descripcion_producto=$row['descripcion_producto'];
						$proveedor_producto=$row['proveedor_producto'];
						$cantidad=$row['cantidad'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$precio_producto=$row['precio_producto'];
					?>

		<input type="hidden" value="<?php echo $codigo_producto;?>" id="codigo_producto<?php echo $id_producto;?>">

		<input type="hidden" value="<?php echo $nombre_producto;?>" id="nombre_producto<?php echo $id_producto;?>">

		<input type="hidden" value="<?php echo $descripcion_producto;?>" id="descripcion_producto<?php echo $id_producto;?>">
		<input type="hidden" value="<?php echo $proveedor_producto;?>" id="proveedor_producto<?php echo $id_producto;?>">
		<input type="hidden" value="<?php echo number_format($cantidad,0);?>" id="cantidad<?php echo $id_producto;?>">
	
		<input type="hidden" value="<?php echo number_format($precio_producto,2);?>" id="precio_producto<?php echo $id_producto;?>">
					<tr>
						
						<td><?php echo $codigo_producto; ?></td>
						<td ><?php echo $nombre_producto; ?></td>
						<td ><?php echo $descripcion_producto; ?></td>
						<td ><?php echo $proveedor_producto; ?></td>
						<td ><?php echo $cantidad; ?></td>
						<td><?php echo $date_added;?></td>
						<td>$<span class='pull-right'><?php echo number_format($precio_producto,2);?></span></td>
					

					<td ><span class="pull-right">
					 <a class='btn btn-default' title='Stock' onclick="obtener_datos('<?php echo $id_producto;?>');" href="producto.php?id=<?php echo $id_producto;?>"><span class="glyphicon glyphicon-edit"></span>Editar</a> 
					</td>
					</tr>
					</div>
					<?php
					if ($nums%6==0){
						echo "<div class='clearfix'></div>";
					}
					$nums++;
				}
				?><tr><td colspan="10">
					
				<div class="clearfix"></div>
				<div class='row text-right'>
					<div ><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></div>
				</td></tr></table>
				</div>
			
			<?php
		}
  }
?>
