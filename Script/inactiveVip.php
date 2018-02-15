<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	$id = $_POST['dato'];

	# Hacemos el update
	$query2 = "UPDATE producto SET vip=0 WHERE idProducto=".$id;
	$result2 = mysqli_query($conexion, $query2);
	if ($result2) { 
		echo json_encode(['error' => false, 'message' => 'El producto ahora no es VIP.']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}


 ?>