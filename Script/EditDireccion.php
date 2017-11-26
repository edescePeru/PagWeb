<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	//valores
	$iduser = $_POST['iduser'];
	$telef_uno = $_POST['phone1'];
	$telef_dos = $_POST['phone2'];
	$tipo_direccion = $_POST['typeaddress'];
	$direccion = $_POST['address'];
	$numero = $_POST['number'];
	$dpto = $_POST['dpto'];
	$urbanizacion = $_POST['street'];
	$referencia = $_POST['referencia'];
	$departamento = $_POST['departamento'];
	$provincia = $_POST['provincia'];
	$distrito = $_POST['distrito'];

	if ($iduser == "" || $iduser == "undefined") {
		echo json_encode(['error' => true, 'message' =>  'El usuario no esta definido']);
		return;
	}

	if ($telef_uno == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar un telefono.']);
		return;
	}

	if ($tipo_direccion == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el tipo de direccion']);
		return;
	}

	if ($direccion == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la direccion.']);
		return;
	}

	if ($numero == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el numero de la direccion.']);
		return;
	}

	if ($departamento <= 0) {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el departamento.']);
		return;
	}

	if ($provincia <= 0) {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la provincia.']);
		return;
	}

	if ($distrito <= 0) {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el distrito.']);
		return;
	}

	$edicion= mysqli_query($conexion, "UPDATE direccioncliente SET  
										telefono1 = '".$telef_uno."',
										telefono2 = '".$telef_dos."',
										tipoDireccion = '".$tipo_direccion."',
										direccion = '".$direccion."',
										numero = '".$numero."',
										dpto = '".$dpto."',
										urbanizacion = '".$urbanizacion."',
										referencia = '".$referencia."',
										idDistrito = '".$distrito."'
										WHERE idCliente ='".$iduser."'");

	if ($edicion) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

?>