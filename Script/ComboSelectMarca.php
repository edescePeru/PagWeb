<?php 
	
	include '../BaseDatos/conexion.php';



	if (isset($_GET['categoria'])) {
		
		$data = [];
		$categoria = $_GET['categoria'];
		$dist = mysqli_query($conexion, ' SELECT * FROM subcategoria WHERE idCategoria  = "'.$categoria.'" and enable = 1');

		while($fila = mysqli_fetch_row($dist)){
			array_push($data, [$fila[0], $fila[2]]);
		}

	}

	echo json_encode($data);
	return;

 ?>