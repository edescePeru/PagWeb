<?php 
	header('Content-type: application/json');
	session_start();
	include '../BaseDatos/conexion.php'; 
	$query = "SELECT DISTINCT DC.idCarrito, P.idProducto, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre, PI.imagen FROM carrito C 
        INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
        INNER JOIN producto P ON DC.idProducto = P.idProducto
        INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
        INNER JOIN marca M ON M.idMarca = P.idMarca
        INNER JOIN productoimage PI ON PI.idProducto= P.idProducto 
        WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1";
	$result = mysqli_query($conexion, $query);
	$data = [];
	if (mysqli_num_rows($result)>0) {
		while ($fila = mysqli_fetch_array($result)) {
			array_push($data, [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]]);
			}
	}

	for ($i=0; $i <=count($data) ; $i++) { 
		for($j=$i+1;$j<=count($data)-1;$j++) {	
			if($data[$i][1]==$data[$j][1]){
				$data[$j]['borrar']=true;
			}
		}
	}
	//var_dump ($data);

	/*for ($i=0; $i <=count($data) ; $i++) { 
		if(isset($data[$i]['borrar']) ){
			//echo "INICIO ARRAY";
			unset($data[$i]);
			//var_dump($data);
			//echo "INICIO ARRAY";
		}

	}*/
	function elimina_duplicados($array, $campo)
	{
	  foreach ($array as $sub)
	  {
	    $cmp[] = $sub[$campo];
	  }
	  $unique = array_unique($cmp);
	  foreach ($unique as $k => $campo)
	  {
	    $resultado[] = $array[$k];
	  }
	  return $resultado;
	}
	//print_r();

	echo json_encode(elimina_duplicados($data,'1'));
	return;
 ?>