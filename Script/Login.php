<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$correo = $_POST['email'];
	$password = $_POST['pwd'];

	if ($correo == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el email.', 'input'=>'#email']);
		return;
	}

	if ($password == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la contraseña.', 'input'=>'#password']);
		return;
	}

	if (!filter_var($correo, FILTER_VALIDATE_EMAIL) ) {
		echo json_encode(['error' => true, 'message' => 'La direccion de correo no es valida.','input'=>'#email']);
		return;
	}

	$encrippwd = md5($password);

	$acceso = mysqli_query($conexion, "SELECT * FROM cliente WHERE correo = '".$correo."' AND password = '".$encrippwd."'");
	$numero = mysqli_num_rows($acceso);

	if ($numero <= 0) {
		echo json_encode(['error' => true, 'message' => 'No existe un usuario con estas credenciales.']);
		return;
	} 

	else{
		if ($fila = mysqli_fetch_row($acceso)) {
			// Creamos sesión
			session_start();  

		            // Almacenamos el nombre de usuario en una variable de sesión usuario
			$_SESSION['id'] = $fila["0"];
			$_SESSION['user'] = $fila["1"];
			$_SESSION['role'] = $fila["6"];
			echo json_encode(['error' => false, 'message' =>	'Bienvenido a Edesce Store. Redireccionando...', "role" => $fila["6"] ]);
		          return;
		}
	}
 ?>