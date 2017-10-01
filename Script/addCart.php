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
	

	// Primero ver si existe un carrito de este usuario con estado no vendido
	// si no hay se crea un nuevo carrito y se agrega un detalle a ducho carro
	// si hay se inserta un nuevo detalle al carrito que se ha obtenido
	$query = "SELECT * FROM carrito WHERE idCliente='".$_SESSION['id']."' AND sold=1";
	$result = mysqli_query($conexion, $query);
	if (mysqli_num_rows($result) <= 0) {
		// Insertar carrito y su detalle
		$query_insert="INSERT INTO carrito (idCliente, fechaCreacion, sold) VALUES ('".$_SESSION['id']."', '".date('d-m-Y')."', 0)";
		$result_insert = mysqli_query($conexion, $query_insert);
		$last_id = mysqli_insert_id($conexion);
		$query_insert="INSERT INTO detacarrito (idCarrito, idProducto, cantidad, precio) VALUES (".$last_id.", ".$idProducto.", 1, '".$resultado[5]."')";
		$result_insert = mysqli_query($conexion, $query_insert);
		$query_quantity = "SELECT count(*) FROM detacarrito WHERE $idCarrito=".$last_id;
	} else {
		// Insertar un nuevo detalle a detacarrito 
		$last_id = $resultado[5];
		$query_add="INSERT INTO detacarrito (idCarrito, idProducto, cantidad, precio) VALUES (".$last_id.", ".$idProducto.", 1, '".$resultado[5]."')";
		$result_add = mysqli_query($conexion, $query_insert);
		$query_quantity = "SELECT count(*) FROM detacarrito WHERE $idCarrito=".$last_id;
	}


	
	echo json_encode(['error' => false, 'message' =>'Producto insertado al caritto', 'cantidad' => $query_quantity ]);
	return;



 ?>