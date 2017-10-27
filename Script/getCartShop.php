<?php 
	header('Content-type: application/json');
	
	include '../BaseDatos/conexion.php';
	session_start();

	// Si no ha iniciado sesion no se mostrará nada
	if (!isset($_SESSION['id'])) {
		echo json_encode(['error' => true, 'message' =>'Es necesario iniciar sesión', 'clave'=>'login' ]);
		return;
	}

	$query = "SELECT DC.idCarrito, P.idProducto, P.image, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre FROM carrito C 
		INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
		INNER JOIN producto P ON DC.idProducto = P.idProducto
		INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
		INNER JOIN marca M ON M.idMarca = P.idMarca
		WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1";
	$result = mysqli_query($conexion, $query);
	$data = [];
	if (mysqli_num_rows($result)>0) {
		while ($fila = mysqli_fetch_array($result)) {
			array_push($data, [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]]);
		}
	}
	echo json_encode($data);
	return;
?>