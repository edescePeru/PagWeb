<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$categoria = $_POST['categoria'];
	$subcategoria = $_POST['id'];
	$nombre = $_POST['subcategoria'];

	if ($categoria == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar la categoria']);
		return;
	}

	if ($nombre == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar el nombre de la subcategoria']);
		return;
	}

	if ($subcategoria == "undefined") {
		echo json_encode(['error' => true, 'message' =>  'La subcategoria no esta definida']);
		return;
	}
	
	$edicion = mysqli_query($conexion, "UPDATE subcategoria 
											SET nombre = '".$nombre."',
											idCategoria = '".$categoria."'
											WHERE idSubCategoria = '".$subcategoria."'");

	if ($edicion) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente']);
		return;
		
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

	
	
	


 ?>