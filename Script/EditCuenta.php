<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';
	session_start();

	//valores
	$iduser = $_SESSION['id'];
	$nombre = $_POST['first'];
	$apellido = $_POST['last'];
	$dni = $_POST['docIdentity'];
	$telefono = $_POST['phone'];


	if ($iduser == "" || $iduser == "undefined") {
		echo json_encode(['error' => true, 'message' =>  'El usuario no esta definido']);
		return;
	}

	if ($nombre == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar su nombre completo']);
		return;
	}

	if ($apellido == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar su apellido completo']);
		return;
	}

	if ($dni == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar su documento de identidad']);
		return;
	}

	if (strlen($dni) < 8) {
		echo json_encode(['error' => true, 'message' => 'Es necesario que el dni tenga 8 digitos.']);
		return;
	}

	if ($telefono == "") {
		echo json_encode(['error' => true, 'message' =>  'Tiene que especificar su telefono']);
		return;
	}

	if (strlen($telefono) < 9) {
		echo json_encode(['error' => true, 'message' => 'Es necesario el telefono tenga 9 digitos.']);
		return;
	}
	
	$edicion = mysqli_query($conexion, "UPDATE cliente
											SET nombre = '".$nombre."',
											apellidos = '".$apellido."',
											docIdentidad = '".$dni."',
											telefono = '".$telefono."'
											WHERE idCliente = '".$iduser."'");

	if ($edicion) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente']);
		return;
		
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

	
	
	


 ?>