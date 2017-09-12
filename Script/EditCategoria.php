<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	$categoria = $_POST['categoria'];
	$id = $_POST['id'];

	if ($categoria == "") {
		echo json_encode(['error' => true, 'message' =>  'Es necesario especificar la categoria.']);
		return;
	}

	if ($id == "undefined") {
		echo json_encode(['error' => true, 'message' =>  "La categoria no esta definido"]);
		return;
	}

	$registro = mysqli_query($conexion, "UPDATE categoria SET nombre = '".$categoria."' WHERE idCategoria = '".$id."'");

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

	
	


 ?>