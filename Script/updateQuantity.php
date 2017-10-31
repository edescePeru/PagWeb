<?php 
	header('Content-type: application/json');
	session_start();
	include '../BaseDatos/conexion.php'; 

	$carrito = $_POST['carrito'];
	$producto = $_POST['producto'];
	$action = $_POST['action'];
	//echo $action;

	$query = "SELECT * FROM detacarrito WHERE idCarrito=".$carrito." AND idProducto=".$producto;
	$result = mysqli_query($conexion, $query);
	$row = mysqli_fetch_array($result);
	
	if (mysqli_num_rows($result)<=0) {
		echo json_encode(['error' => true, 'message' => 'No se encuentra el detalle del carrito especificado.']);
		return;
	}

	if ($row[2]==1 && $action=="minus") {
		echo json_encode(['error' => true, 'message' => 'No se puede disminuir más la cantidad.']);
		return;
	}

	if ($action=="plus") {
		$queryPlus = "UPDATE detacarrito SET cantidad=cantidad+1 WHERE idCarrito=".$carrito." AND idProducto=".$producto;
		$resultPlus = mysqli_query($conexion, $queryPlus);
		if ($resultPlus) { 
			echo json_encode(['error' => false, 'message' => 'Se ha incrementado correctamente']);
			return;
		}
	} else {

		$queryMinus = "UPDATE detacarrito SET cantidad=cantidad-1 WHERE idCarrito=".$carrito." AND idProducto=".$producto;
		$resultMinus = mysqli_query($conexion, $queryMinus);
		if ($resultMinus) { 
			echo json_encode(['error' => false, 'message' => 'Se ha disminuido correctamente']);
			return;
		}
	}
	return;
 ?>