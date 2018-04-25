<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	include_once 'PHPMailer/class.phpmailer.php';
	include_once 'PHPMailer/class.smtp.php';

	$idCompra = $_POST['idCompra'];
	$estado = $_POST['estado'];

	// $eliminar = mysqli_query($conexion, "DELETE FROM categoria WHERE idCategoria = '".$id."'");

	$queryE = "SELECT * FROM compra WHERE idCompra = ".$idCompra;
	$result = mysqli_query($conexion, $queryE);
	$compraEstado = 0;
	if (mysqli_num_rows($result)>0) {
		while ($fila = mysqli_fetch_row($result)) {
			$compraEstado = $fila[4];
		}
	}

	if ($estado < $compraEstado) {
		echo json_encode(['error' => true, 'message' => 'No se puede retroceder a un estado inferior. :(']);
		return;
	} 
	

	$query = "UPDATE compra SET estado = ".$estado." WHERE idCompra = ".$idCompra;
	$modificar = mysqli_query($conexion, $query);
	if ($modificar) {
		// EN TRAYECTO
		if ($estado == 2) {
			$query_select_data = "SELECT CL.nombre, CL.apellidos, CL.docIdentidad, CL.correo, CL.telefono
			FROM cliente CL
			INNER JOIN carrito CA ON CL.idCliente = CA.idCliente
			INNER JOIN compra C ON C.idCarrito = CA.idCarrito
			WHERE C.idCompra = ".$idCompra;
			$result_select_data = mysqli_query($conexion, $query_select_data);
			$cliente = "";
			$nombreCliente = "";
			$correo = "";
			if (mysqli_num_rows($result_select_data)>0) {
				while ($fila = mysqli_fetch_row($result_select_data)) {
			        $cliente = $cliente.'<br><label>Nombre: </label>'.$fila[0].
			        			'<br><label>Apellidos: </label>'.$fila[1].
			        			'<br><label>DocIdentidad: </label>'.$fila[2].
			        			'<br><label>Correo: </label>'.$fila[3].
			        			'<br><label>Telefono: </label>'.$fila[4];
			        $correo = $fila[3];
			        $nombreCliente = $fila[0];
			    }
			}

			$query = "SELECT DC.idCarrito, P.idProducto, P.image, P.nombrePortada , 
			M.nombre , DC.cantidad, DC.precio, S.nombre, P.codigo 
				FROM carrito C 
				INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
				INNER JOIN producto P ON DC.idProducto = P.idProducto
				INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
				INNER JOIN marca M ON M.idMarca = P.idMarca
				INNER JOIN compra CO on CO.idCarrito = C.idCarrito
				WHERE CO.idCompra = ".$idCompra;
			$result = mysqli_query($conexion, $query);
			$data = [];
			$productos = "";
			if (mysqli_num_rows($result)>0) {
				$totalT = 0;
				while ($fila = mysqli_fetch_array($result)) {
					$productos = $productos.'<label>Producto: </label>'.$fila[3].
											'<br><label>Codigo: </label>'.$fila[8].
											'<br><label>Cantidad: </label>'.$fila[5].
											'<br><label>Subtotal: </label>'.($fila[6]*$fila[5]).
											'<br><label>---------------------------------------------------------------------</label><br>';
					$totalT += ($fila[6]*$fila[5]);
				}
				$productos = $productos.'<br><label>TOTAL: </label>'.$totalT;
			}
			$nombre = "EDESCE EIRL";
			$emisor = "edesceperu@gmail.com";
			$asunto = "Compra en Trayecto";
			$mensaje = '<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<title></title>
				<link rel="stylesheet" href="">
			</head>
			<body background="yellow">
				<h1>Su compra esta en trayecto</h1>
				<h2>Hola '.$nombreCliente.'</h2>	
				<p>Te informamos que tu orden de compra Nº '.$idCompra.' esta siendo atendida</p>
				<p>Para pedir información de tu compra debes presentar:</p>
				<p>• Número de orden de compra</p>
				<p>• Documento de Identidad del titular registrado en la orden de compra</p>
				<br>
				<h3>Datos del cliente</h3>'.$cliente.'
				<br><h3>Datos de los productos</h3>'.$productos.'
			
				
			</body>
			</html>';

			$destino = $correo;

			$mailU = new PHPMailer();
			$mailU->IsSMTP();
			$mailU->SMTPAuth = true;
			$mailU->SMTPSecure = "ssl";
			$mailU->Host = "smtp.gmail.com";
			$mailU->Port = "465";
			$mailU->setFrom($emisor, $nombre);
			$mailU->AddAddress($destino);
			$mailU->Username = "mailpruebacursophp@gmail.com";
			$mailU->Password = "cursophp123";
			$mailU->Subject = $asunto;
			$mailU->Body = $mensaje;
			$mailU->WordWrap = 50;
			$mailU->CharSet = "UTF-8";
			$mailU->MsgHTML($mensaje);
			$mailU->Send();
		} else {
			// FINALIZADA
			if ($estado == 3) {
				$query_select_data = "SELECT CL.nombre, CL.apellidos, CL.docIdentidad, CL.correo, CL.telefono
				FROM cliente CL
				INNER JOIN carrito CA ON CL.idCliente = CA.idCliente
				INNER JOIN compra C ON C.idCarrito = CA.idCarrito
				WHERE C.idCompra = ".$idCompra;
				$result_select_data = mysqli_query($conexion, $query_select_data);
				$cliente = "";
				$nombreCliente = "";
				$correo = "";
				if (mysqli_num_rows($result_select_data)>0) {
					while ($fila = mysqli_fetch_row($result_select_data)) {
				        $cliente = $cliente.'<br><label>Nombre: </label>'.$fila[0].
				        			'<br><label>Apellidos: </label>'.$fila[1].
				        			'<br><label>DocIdentidad: </label>'.$fila[2].
				        			'<br><label>Correo: </label>'.$fila[3].
				        			'<br><label>Telefono: </label>'.$fila[4];
				        $correo = $fila[3];
				        $nombreCliente = $fila[0];
				    }
				}

				$query = "SELECT DC.idCarrito, P.idProducto, P.image, P.nombrePortada , 
				M.nombre , DC.cantidad, DC.precio, S.nombre, P.codigo 
					FROM carrito C 
					INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
					INNER JOIN producto P ON DC.idProducto = P.idProducto
					INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
					INNER JOIN marca M ON M.idMarca = P.idMarca
					INNER JOIN compra CO on CO.idCarrito = C.idCarrito
					WHERE CO.idCompra = ".$idCompra;
				$result = mysqli_query($conexion, $query);
				$data = [];
				$productos = "";
				if (mysqli_num_rows($result)>0) {
					$totalT = 0;
					while ($fila = mysqli_fetch_array($result)) {
						$productos = $productos.'<label>Producto: </label>'.$fila[3].
												'<br><label>Codigo: </label>'.$fila[8].
												'<br><label>Cantidad: </label>'.$fila[5].
												'<br><label>Subtotal: </label>'.($fila[6]*$fila[5]).
												'<br><label>---------------------------------------------------------------------</label><br>';
						$totalT += ($fila[6]*$fila[5]);
					}
					$productos = $productos.'<br><label>TOTAL: </label>'.$totalT;
				}
				$nombre = "EDESCE EIRL";
				$emisor = "edesceperu@gmail.com";
				$asunto = "Compra Finalizada";
				$mensaje = '<!DOCTYPE html>
				<html>
				<head>
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<title></title>
					<link rel="stylesheet" href="">
				</head>
				<body background="yellow">
					<h1>Su compra ha finalizado</h1>
					<h2>Hola '.$nombreCliente.'</h2>	
					<p>Te informamos que tu orden de compra Nº '.$idCompra.' ha finalizado</p>
					<p>Por favor dejanos un comentario especificando tu experiencia de compra con nosotros</p>
					<p>En los productos puedes calificar la calidad de ellos</p>
					<br>
					<h3>Datos del cliente</h3>'.$cliente.'
					<br><h3>Datos de los productos</h3>'.$productos.'
				
					
				</body>
				</html>';

				$destino = $correo;

				$mailF = new PHPMailer();
				$mailF->IsSMTP();
				$mailF->SMTPAuth = true;
				$mailF->SMTPSecure = "ssl";
				$mailF->Host = "smtp.gmail.com";
				$mailF->Port = "465";
				$mailF->setFrom($emisor, $nombre);
				$mailF->AddAddress($destino);
				$mailF->Username = "mailpruebacursophp@gmail.com";
				$mailF->Password = "cursophp123";
				$mailF->Subject = $asunto;
				$mailF->Body = $mensaje;
				$mailF->WordWrap = 50;
				$mailF->CharSet = "UTF-8";
				$mailF->MsgHTML($mensaje);
				$mailF->Send();
			}
			
		}
		
		echo json_encode(['error' => false, 'message' => 'Se ha modificado el estado.']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}


 ?>