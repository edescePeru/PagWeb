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
		if ($fila = mysqli_fetch_array($acceso)) {
			// Creamos sesión
			session_start();  

			// Almacenamos el nombre de usuario en una variable de sesión usuario
			$_SESSION['id'] = $fila["idCliente"];
			$_SESSION['user'] = $fila["nombre"].' '.$fila["apellidos"];
			$_SESSION['email'] = $fila["correo"];
			$_SESSION['role'] = $fila["idTipoCliente"];

			if ($fila["idTipoCliente"] == '1') {
				$links = 'panel.php';
			}
			if ($fila["idTipoCliente"] == '2') {
				$links = 'index.php';
			}

			echo json_encode(['error' => false, 'message' =>'Bienvenido a Edesce Store. Redireccionando...', 'user'=> $fila["idTipoCliente"], 'links'=> $links]);
		    return;
		}
	}
 ?>