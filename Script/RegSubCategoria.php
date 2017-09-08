<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$categoria = $_POST['categoria'];
	$subcategoria = $_POST['subcategoria'];

	if ($categoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la categoria.']);
		return;
	}

	if ($subcategoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la sub-categoria.']);
		return;
	}

	$acceso = mysqli_query($conexion, "SELECT * FROM subcategoria
									   WHERE nombre = '".$subcategoria."' 
									   AND idCategoria = '".$categoria."'");
	$numero = mysqli_num_rows($acceso);

	if ($numero > 0) {
		echo json_encode(['error' => true, 'message' => 'Ya existe esta categoria']);
		return;
	} 

	$registro = mysqli_query($conexion, " INSERT INTO subcategoria(idCategoria, nombre, enable) 
			VALUES ('".$categoria."','".$subcategoria."','1')");

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha registrado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

?>