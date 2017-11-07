<?php 

	header('Content-type: application/json');

	$nombre = $_POST["name"];
	$emisor = $_POST["email"];
	$asunto = $_POST["object"];
	$mensaje = $_POST["message"];

	$cabeceras = "MIME-Version: 1.0 \r\n";
	$cabeceras .= "Content-type: text/html; charset = iso-8859-1\r\n";
	$cabeceras .= "From: $emisor \r\n";

	$destino = "edesceperu@gmail.com";

	if (mail($destino, $asunto, $mensaje, $cabeceras)) {
		echo json_encode(['error'=>true, 'message'=>'Correo enviado correctamente']);
		return;
	}

	echo json_encode(['error'=>true, 'message'=>$mail->ErrorInfo]);
	return;
 ?>