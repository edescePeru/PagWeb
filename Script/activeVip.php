<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	$id = $_POST['dato'];

	// Revisar que la cantidad de VIPs sea menor a 6
	$query = "SELECT count(*) as cantidad FROM producto WHERE vip=1 AND enable=1";
	$result = mysqli_query($conexion, $query);
	$data = mysqli_fetch_assoc($result);

	if ($data['cantidad']<6) {
		# Hacemos el update
		$query2 = "UPDATE producto SET vip=1 WHERE idProducto=".$id;
		$result2 = mysqli_query($conexion, $query2);
		if ($result2) { 
			echo json_encode(['error' => false, 'message' => 'El producto ahora es VIP.']);
			return;
		} else {
			echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
			return;
		}
	} else {
		echo json_encode(['error' => true, 'message' => 'La cantidad de productos VIPs solo puede ser 6']);
		return;
	}
	
 ?>