<?php
include_once '../BaseDatos/conexion.php';

/*$ApiKey = "EMuC7EX6cfKrbo0cAPArEZzOVZApi";*/
$ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
$merchant_id = $_REQUEST['merchantId'];
$referenceCode = $_REQUEST['referenceCode'];
$TX_VALUE = $_REQUEST['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_REQUEST['currency'];
$transactionState = $_REQUEST['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $_REQUEST['signature'];
$reference_pol = $_REQUEST['reference_pol'];
$cus = $_REQUEST['cus'];
$extra1 = $_REQUEST['description'];
$pseBank = $_REQUEST['pseBank'];
$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
$transactionId = $_REQUEST['transactionId'];



//echo $transactionId;

if ($_REQUEST['transactionState'] == 4 ) {
	$estadoTx = "Transacción aprobada";
}

else if ($_REQUEST['transactionState'] == 6 ) {
	$estadoTx = "Transacción rechazada";
}

else if ($_REQUEST['transactionState'] == 104 ) {
	$estadoTx = "Error";
}

else if ($_REQUEST['transactionState'] == 7 ) {
	$estadoTx = "Transacción pendiente";
}

else {
	$estadoTx=$_REQUEST['mensaje'];
}


if (strtoupper($firma) == strtoupper($firmacreada)) {
	// Obtener la referencia y dr de baja al carrito y guardar la compra
	$reference = $referenceCode;
	$findme = 'a';
	$pos = strpos($reference, $findme);
	$idCarrito = substr($reference,0,$pos);
	$query = "UPDATE carrito SET sold = 0";
	$edicion = mysqli_query($conexion, $query);
	echo $idCarrito;

	// Guardar la compra 
	$query_insert="INSERT INTO compra(idCarrito, fechaCreacion, enable) VALUES (".$idCarrito.", '".date('Y-m-d')."', 1)";
	$result_insert = mysqli_query($conexion, $query_insert);
	$last_id = mysqli_insert_id($conexion);
	//echo $last_id.' '.$idProducto.' '.$res[6];
	$query_select = "SELECT * FROM detacarrito WHERE idCarrito = ".$idCarrito;
	$result_select = mysqli_query($conexion, $query_select);
	if (mysqli_num_rows($result_select)>0) {
		while ($fila = mysqli_fetch_array($result_select)) {
			$query_insert2 ="INSERT INTO detacompra (idCompra, idProducto, cantidad, precio, enable) 
			VALUES (".$last_id.", ".$fila[1].", ".$fila[2].", ".$fila[3].", 1)";
			$result_insert2 = mysqli_query($conexion, $query_insert2);
			$query_insert3 ="UPDATE producto SET stock=stock-".$fila[2]." WHERE idProducto = ".$fila[1];
			$result_insert3 = mysqli_query($conexion, $query_insert3);
		}
	}

	// Enviar email a la empresa
	
	include_once 'PHPMailer/class.phpmailer.php';
	include_once 'PHPMailer/class.smtp.php';

	$query_select_data = "SELECT CL.nombre, Cl, apellidos, CL.docIdentidad, CL.correo, CL.telefono
	FROM cliente CL
	INNER JOIN carrito CA ON CL.idCliente = CA.idCliente
	WHERE idCarrito = ".$idCarrito;
	$result_select_data = mysqli_query($conexion, $query_select_data);
	/*if (mysqli_num_rows($result_select)>0) {

	}*/

	$nombre = "Informador";
	$emisor = "informes@gmail.com";
	$asunto = "Informe de Venta";
	$mensaje = '<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		
	</body>
	</html>';

	$destino = "edesceperu@gmail.com";

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = "465";
	$mail->setFrom($emisor, $nombre);
	$mail->AddAddress($destino);
	$mail->Username = "mailpruebacursophp@gmail.com";
	$mail->Password = "cursophp123";
	$mail->Subject = $asunto;
	$mail->Body = $mensaje;
	$mail->WordWrap = 50;
	$mail->CharSet = "UTF-8";
	$mail->MsgHTML($mensaje);

	$mail->Send();
		
	header('Location: /../success.php');
}
else
{
	header('Location: /../error.php');
}
?>