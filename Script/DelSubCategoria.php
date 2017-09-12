<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	$id = $_POST['dato'];

	// $eliminar = mysqli_query($conexion, "DELETE FROM categoria WHERE idCategoria = '".$id."'");

	$eliminar = mysqli_query($conexion, "UPDATE subcategoria SET enable = 0 WHERE idSubCategoria = '".$id."'");


	if ($eliminar) { 
		echo json_encode(['error' => false, 'message' => 'Se ha eliminado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}


 ?>