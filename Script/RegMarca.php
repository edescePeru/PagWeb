<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$categoria = $_POST['categoria'];
	$subcategoria = $_POST['subcategoria'];
	$marca = $_POST['marca'];

	if ($categoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la categoria.']);
		return;
	}

	if ($subcategoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la sub-categoria.']);
		return;
	}

	if ($marca == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la marca.']);
		return;
	}

	$acceso = mysqli_query($conexion, "SELECT * FROM marca
									   WHERE nombre = '".$marca."' 
									   AND idSubcategoria = '".$subcategoria."'");
	$numero = mysqli_num_rows($acceso);

	if ($numero > 0) {
		echo json_encode(['error' => true, 'message' => 'Ya existe esta marca']);
		return;
	} 

	$nombremarca = ucfirst(strtolower($marca));

	$registro = mysqli_query($conexion, " INSERT INTO marca(idSubcategoria, nombre, enable) 
			VALUES ('".$subcategoria."','".$nombremarca."','1')");

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha registrado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

?>