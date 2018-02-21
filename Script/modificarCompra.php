<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	$idCompra = $_POST['idCompra'];
	$estado = $_POST['estado'];

	// $eliminar = mysqli_query($conexion, "DELETE FROM categoria WHERE idCategoria = '".$id."'");

	$query = "UPDATE FROM compra SET estado = ".$estado." WHERE idCompra = ".$idCompra;
	$modificar = mysqli_query($conexion, $query);
	if ($modificar) { 
		echo json_encode(['error' => false, 'message' => 'Se ha modificado el estado.']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}


 ?>