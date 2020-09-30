 <?php 
/*conexion a base de datos*/
$conexion=  new mysqli ('localhost', 'root', 'deadpool25237118' ,'factura');
if ($conexion->connect_error) {
	die('Error en la conexion' . $conexion->connect_error);
}

?>