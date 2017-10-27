<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$idprod = $_POST['idprod'];
	$puntos = $_POST['puntos'];
	$recomendar = $_POST['recomendar'];
	$alias = $_POST['alias'];
	$email = $_POST['email'];
	$titulo = $_POST['title'];
	$descripcion = $_POST['description'];

	if ($puntos == "") {
		echo json_encode(['error' => true, 'message' => "No ha calificado su experiencia"]);
		return;
	}

	if ($alias == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar su alias.']);
		return;
	}

	if ($email == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el correo electronico.']);
		return;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		echo json_encode(['error' => true, 'message' => 'El correo electrónico introducido no es correcto.']);
		return;
	}

	if ($recomendar == "" || $recomendar == 'undefined') {
		echo json_encode(['error' => true, 'message' => 'Debe seleccionar una opcion']);
		return;
	}

	setlocale(LC_ALL,"es_ES");
	$fecha = date("Y")."-".date("m")."-".date("d");

	$registro = mysqli_query($conexion, " INSERT INTO comentario(idProducto, alias, email, puntaje, titulo, descripcion, recomendar, fechaCreacion, valido, enable) 
			VALUES ('".$idprod."','".$alias."','".$email."','".$puntos."','".$titulo."','".$descripcion."','".$recomendar."','".$fecha."','1','1')");

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha registrado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

?>