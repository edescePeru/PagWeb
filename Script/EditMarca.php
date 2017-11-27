<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$subcategoria = $_POST['subcategoria'];
	$marca = $_POST['id'];
	$nombre = $_POST['marca'];

	if ($subcategoria <= 0) {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar la subcategoria']);
		return;
	}

	if ($nombre == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar el nombre de marca']);
		return;
	}

	if ($marca == "undefined") {
		echo json_encode(['error' => true, 'message' =>  'La marca no esta definida']);
		return;
	}
	
	$edicion = mysqli_query($conexion, "UPDATE marca 
											SET nombre = '".$nombre."',
											idSubcategoria = '".$subcategoria."'
											WHERE idMarca = '".$marca."'");

	if ($edicion) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente']);
		return;
		
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

	
	
	


 ?>