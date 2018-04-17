<?php
include_once '../BaseDatos/conexion.php';

$ApiKey = "EMuC7EX6cfKrbo0cAPArEZzOVZ";
/*$ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";*/
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
	//echo $idCarrito;

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

	$query_select_data = "SELECT CL.nombre, CL.apellidos, CL.docIdentidad, CL.correo, CL.telefono
	FROM cliente CL
	INNER JOIN carrito CA ON CL.idCliente = CA.idCliente
	WHERE CA.idCarrito = ".$idCarrito;
	$result_select_data = mysqli_query($conexion, $query_select_data);
	$cliente = "";
	if (mysqli_num_rows($result_select_data)>0) {
		while ($fila = mysqli_fetch_row($result_select_data)) {
		        $cliente = $cliente.'<br><label>Nombre: </label>'.$fila[0].
		        			'<br><label>Apellidos: </label>'.$fila[1].
		        			'<br><label>DocIdentidad: </label>'.$fila[2].
		        			'<br><label>Correo: </label>'.$fila[3].
		        			'<br><label>Telefono: </label>'.$fila[4];
		    }
	}

	$query = "SELECT DC.idCarrito, P.idProducto, P.image, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre, P.codigo FROM carrito C 
		INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
		INNER JOIN producto P ON DC.idProducto = P.idProducto
		INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
		INNER JOIN marca M ON M.idMarca = P.idMarca
		WHERE DC.idCarrito = ".$idCarrito;
	$result = mysqli_query($conexion, $query);
	$data = [];
	$productos = "";
	if (mysqli_num_rows($result)>0) {
		while ($fila = mysqli_fetch_array($result)) {
			$productos = $productos.'<br><label>Producto: </label>'.$fila[3].
									'<br><label>Codigo: </label>'.$fila[8].
									'<br><label>Cantidad: </label>'.$fila[5].
									'<br><label>Precio Total: </label>'.($fila[6]*$fila[5]).
									'<br><label>---------------------------------------------------------------------</label>';
		}
	}


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
		<h3>Datos del cliente</h3>'.$cliente.'
		<br><h3>Datos del carrito</h3>'.$productos.'
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

	// if ($mail->Send()) {
	// 	echo "Se envio";
	// } else {
	// 	echo "No se envio";
	// }
	
	header('Location: /../success.php');
}
else
{
	header('Location: /../error.php');
}
?>