<?php 
	header('Content-type: application/json');
	
	include '../BaseDatos/conexion.php';
	session_start();

	// Si no ha iniciado sesion no se mostrará nada
	if (!isset($_SESSION['id'])) {
		$quantity = 0;
		echo json_encode(['error' => false, 'message' =>'', 'quantity'=>$quantity ]);
		return;
	} else {
		$query = "SELECT * FROM carrito C 
		INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
		WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1";
		$result = mysqli_query($conexion, $query);
		
		$quantity = mysqli_num_rows($result);
		
		echo json_encode(['error' => false, 'message' =>'', 'quantity'=>$quantity ]);
		return;
	}
	return;
	
?>