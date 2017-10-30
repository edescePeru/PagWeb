<?php 
	header('Content-type: application/json');
	session_start();
	include '../BaseDatos/conexion.php'; 

	$carrito = $_POST['carrito'];
	$producto = $_POST['producto'];

	$query = "SELECT * FROM detacarrito WHERE idCarrito=".$carrito." AND idProducto=".$producto;
	$result = mysqli_query($conexion, $query);
	$row = mysqli_fetch_array($result);
	
	if (mysqli_num_rows($result)<=0) {
		echo json_encode(['error' => true, 'message' => 'No se encuentra el detalle del carrito especificado.']);
		return;
	}

	
	$queryDelete = "DELETE FROM detacarrito WHERE idCarrito=".$carrito." AND idProducto=".$producto;
	$resultDelete = mysqli_query($conexion, $queryDelete);
	if ($resultDelete) { 
		echo json_encode(['error' => false, 'message' => 'Se ha eliminado correctamente']);
		return;
	}
	return;
 ?>