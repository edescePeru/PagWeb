<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';
	session_start();

	if (!isset($_SESSION['id'])) {
		echo json_encode(['error' => true, 'message' =>'Es necesario iniciar sesión', 'clave'=>'login' ]);
		return;
	}
	

	$idProducto = $_POST['idProduct'];

	$consulta = "SELECT * FROM producto WHERE idProducto=".$idProducto;
	$resultado = mysqli_query($conexion, $consulta);

	$result_producto = mysqli_fetch_array($resultado);
	

	// Primero ver si existe un carrito de este usuario con estado no vendido
	// si no hay se crea un nuevo carrito y se agrega un detalle a ducho carro
	// si hay se inserta un nuevo detalle al carrito que se ha obtenido
	$query = "SELECT * FROM carrito WHERE idCliente='".$_SESSION['id']."' AND sold=1";
	$result = mysqli_query($conexion, $query);

	$result_carrito = mysqli_fetch_array($result);

	//echo mysqli_num_rows($result);
	$quantity = 0;
	
	$query_repeat = "SELECT * FROM detacarrito WHERE idCarrito=".$result_carrito[0]." AND idProducto=".$result_producto[0];
	$ejecutar_repeat = mysqli_query($conexion, $query_repeat);
	if ($ejecutar_repeat != NULL) {
		$result_repeat = mysqli_fetch_array($ejecutar_repeat);

		if (mysqli_num_rows($ejecutar_repeat) > 0 ) {
			$last_id = $result_carrito[0];
			$query_quantity = "SELECT count(*) FROM detacarrito WHERE idCarrito=".$last_id;
			$result_quantity = mysqli_query($conexion, $query_quantity);
			$res3 = mysqli_fetch_array($result_quantity);
			$quantity = $res3[0];
			echo json_encode(['error' => true, 'message' =>'Este producto ya se ha insertado al carrito', 'cantidad'=>$quantity]);
			return;
		}
	}
	
	if ($result_carrito == NULL) {
		// Insertar carrito y su detalle
		$query_insert="INSERT INTO carrito(idCliente, fechaCreacion, sold) VALUES (".$_SESSION['id'].", '".date('Y-m-d')."', 1)";
		$result_insert = mysqli_query($conexion, $query_insert);
		$last_id = mysqli_insert_id($conexion);
		//echo $last_id.' '.$idProducto.' '.$res[6];
		$query_insert2 ="INSERT INTO detacarrito (idCarrito, idProducto, cantidad, precio) VALUES (".$last_id.", ".$idProducto.", 1, ".$result_producto[6].")";
		$result_insert2 = mysqli_query($conexion, $query_insert2);
		$query_quantity = "SELECT count(*) FROM detacarrito WHERE idCarrito=".$last_id;
		$result_quantity = mysqli_query($conexion, $query_quantity);
		$res3 = mysqli_fetch_array($result_quantity);
		$quantity = $res3[0];
	} else {
		// Insertar un nuevo detalle a detacarrito 
		$last_id = $result_carrito[0];
		//echo 'last'.$last_id; 
		$query_add="INSERT INTO detacarrito (idCarrito, idProducto, cantidad, precio) VALUES (".$last_id.", ".$idProducto.", 1, ".$result_producto[6].")";
		$result_add = mysqli_query($conexion, $query_add);
		$query_quantity = "SELECT count(*) FROM detacarrito WHERE idCarrito=".$last_id;
		$result_quantity = mysqli_query($conexion, $query_quantity);
		$res4 = mysqli_fetch_array($result_quantity);
		$quantity = $res4[0];
	}

	echo json_encode(['error' => false, 'message' =>'Producto insertado al caritto', 'cantidad' => $quantity ]);
	return;



 ?>