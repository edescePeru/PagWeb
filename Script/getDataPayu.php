<?php 
	header('Content-type: application/json');
	
	include '../BaseDatos/conexion.php';
	session_start();
	$monto = $_GET["monto"];
	$data = [];

	// Si no ha iniciado sesion no se mostrará nada
	if (!isset($_SESSION['id'])) {
		echo json_encode(['error' => true, 'message' =>'Es necesario iniciar sesión', 'clave'=>'login' ]);
		return;
	} else {
		$data['accountId'] = "701175";
		$data['buyerEmail'] = $_SESSION['email'];
	}
	$query = "SELECT idCarrito FROM carrito WHERE idCliente = ".$_SESSION['id']." AND sold = 1";
	$result = mysqli_query($conexion, $query);
	$idCarrito = "";
	if (mysqli_num_rows($result)>0) {
		while ($fila = mysqli_fetch_array($result)) {
			$data['referenceCode'] = $fila[0]."a".microtime(true);
			$idCarrito = $fila[0];
		}
	}
	$query1 = "SELECT idDistrito FROM direccioncliente WHERE idCliente = ".$_SESSION['id'];
	$result1 = mysqli_query($conexion, $query1);
	if (mysqli_num_rows($result1)>0) {
		$fila1 = mysqli_fetch_array($result1);
		$idDistrito = $fila1[0];
		$query2 = "SELECT DE.Descripcion, DC.direccion, DC.numero FROM direccioncliente DC
					INNER JOIN distrito D ON DC.idDistrito = D.IdDistrito
					INNER JOIN provincia P ON D.idProvincia = P.IdProvincia
					INNER JOIN departamento DE ON P.idDepartamento = DE.IdDepartamento
					WHERE D.IdDistrito = ".$idDistrito;
		$result2 = mysqli_query($conexion, $query2);
		if (mysqli_num_rows($result2)>0) {
			while ($fila2 = mysqli_fetch_array($result2)) {
				$direccion = $fila2[1]." ".$fila2[2];
				$data['shippingCity'] = $fila2[0];
				$data['shippingAddress'] = $direccion;
			}
		}
	}
	
	// Firma
	$apikey = "EMuC7EX6cfKrbo0cAPArEZzOVZ";
	$merchantId = "698161";
	$referenceCode = $idCarrito;
	$amount = $monto;
	$currency = "PEN";
	$signature = md5($apikey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency);
	
	$data['signature'] = $signature;
	$data['amount'] = $amount;

	echo json_encode($data);
	return;
?>