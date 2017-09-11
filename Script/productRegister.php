<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$name = $_POST['name'];
	$descriptionShort = $_POST['description-short'];
	$descriptionLong = $_POST['description-long'];
	$contentBox = $_POST['content-box'];
	$color = $_POST['color'];
	$price = $_POST['price'];
	$subcategoria = $_POST['subcategorias'];
	$marca = $_POST['marcas'];

	if ($name == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el nombre del producto.']);
		return;
	}

	if ($descriptionShort == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la descripción corta.']);
		return;
	}

	if ($descriptionLong == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la descripción larga.']);
		return;
	}

	if ($contentBox == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el contenido de la caja.']);
		return;
	}

	if ($color == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el color del producto.']);
		return;
	}

	if ($price == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el precio del producto.']);
		return;
	}

	if ($price <= 0) {
		echo json_encode(['error' => true, 'message' => 'Monto de precio del incorrecto.']);
		return;
	}

	if ($subcategoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la sub categoria.']);
		return;
	}

	if ($marca == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la marca.']);
		return;
	}

	$query = "INSERT INTO producto(nombrePortada, descripcionCorta, descripcionLarga, contenidoCaja, color, precio, idSubCategoria, idMarca, enable) 
	VALUES ('".$name."','".$descriptionShort."','".$descriptionLong."','".$contentBox."','".$color."',".$price.",".$subcategoria.",".$marca.",1)";

	$registro = mysqli_query($conexion, $query);

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha registrado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

?>