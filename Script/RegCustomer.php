<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$nombre = $_POST['first'];
	$apellidos = $_POST['last'];
	$docIdentidad = $_POST['dni'];
	$telefono = $_POST['phone'];
	$correo = $_POST['email'];
	$password = $_POST['pwd'];
	$repeatpwd = $_POST['repeatpwd'];

	// Validaciones internas en el servidor

	if ($nombre == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el nombre.','input'=>'#first']);
		return;
	}

	if ($apellidos == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el apellido.', 'input'=>'#last']);
		return;
	}

	if ($docIdentidad == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el dni.','input'=>'#dni']);
		return;
	}

	if ($telefono == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el telefono.','input'=>'#phone']);
		return;
	}

	if ($correo == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el email.', 'input'=>'#email']);
		return;
	}

	if ($password == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la contraseña.', 'input'=>'#password']);
		return;
	}

	if ($repeatpwd == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario repetir la contraseña.', 'input'=>'#repeatpwd']);
		return;
	}

	if (strlen($password) < 4 ){
		echo json_encode(['error' => true, 'message' => 'La contraseña debe tener más de 4 caracteres.', 'input'=>'#password']);
		return;
	}

	if ($repeatpwd != $password) {
		echo json_encode(['error' => true, 'message' => 'La contraseñas no coinciden.', 'input'=>'#repeatpwd']);
		return;
	}

	if (strlen($docIdentidad) < 8) {
		echo json_encode(['error' => true, 'message' => 'Es necesario que el dni tenga 8 digitos.', 'input'=>'#dni']);
		return;
	}

	if (strlen($telefono) < 9) {
		echo json_encode(['error' => true, 'message' => 'Es necesario el telefono tenga 9 digitos.','input'=>'#phone']);
		return;
	}

	if (!filter_var($correo, FILTER_VALIDATE_EMAIL) ) {
		echo json_encode(['error' => true, 'message' => 'La direccion de correo no es valida.','input'=>'#email']);
		return;
	}

	$acceso = mysqli_query($conexion, "SELECT * FROM cliente WHERE correo = '".$correo."'");
	$numero = mysqli_num_rows($acceso);

	if ($numero > 0) {
		echo json_encode(['error' => true, 'message' => 'Este email ya fue registrado', 'input'=>'#email']);
		return;
	} 

	$encrippwd = md5($password);

	$registro = mysqli_query($conexion, " INSERT INTO cliente(nombre, apellidos, docIdentidad, telefono, idTipoCliente, correo, password, enable) 
			VALUES ('".$nombre."','".$apellidos."','".$docIdentidad."','".$telefono."','2','".$correo."','".$encrippwd."','1')");

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha registrado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}


 ?>