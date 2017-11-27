<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';
	session_start();

	//valores
	$iduser = $_SESSION['id'];
	$passnow = $_POST['passnow'];
	$passnew = $_POST['passnew'];
	$repeatpassnew = $_POST['repeatpassnew'];

	$acceso = mysqli_query($conexion, "SELECT password FROM cliente
                                       WHERE idCliente = '".$iduser."' ");

    $fecha = mysqli_fetch_row($acceso);
    $password = $fecha[0];

	if ($iduser == "" || $iduser == "undefined") {
		echo json_encode(['error' => true, 'message' =>  'El usuario no esta definido']);
		return;
	}

	if ($passnow == "") {
		echo json_encode(['error' => true, 'message' =>  'Es necesario especificar la contraseñana actual']);
		return;
	}

	if ($passnew == "") {
		echo json_encode(['error' => true, 'message' =>  'Es necesario especificar la contraseña nueva']);
		return;
	}

	if (strlen($passnew) < 4 ){
		echo json_encode(['error' => true, 'message' => 'La contraseña debe tener más de 4 caracteres.']);
		return;
	}

	$encrippwdnow = md5($passnow);

	if ($encrippwdnow != $password) {
		echo json_encode(['error' => true, 'message' =>  'La contraseña actual no es la correcta']);
		return;
	}

	if ($passnew != $repeatpassnew) {
		echo json_encode(['error' => true, 'message' =>  'No coinciden las contraseñas nuevas']);
		return;
	}

	$editar = mysqli_query($conexion, "UPDATE cliente SET 
                                                Password = '".$encrippwdnow."'
                                                WHERE idCliente = '".$iduser."' ");


	if ($editar) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente, vuelva a iniciar sesion']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}
	


 ?>