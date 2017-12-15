<?php 
	
	include '../BaseDatos/conexion.php';



	if (isset($_GET['categoria'])) {
		
		$data = [];
		$categoria = $_GET['categoria'];
		$dist = mysqli_query($conexion, ' SELECT * FROM subcategoria WHERE idCategoria  = "'.$categoria.'" and enable = 1');
			
		while($fila = mysqli_fetch_row($dist)){
			array_push($data, [$fila[0], $fila[2]]);
		}

		echo json_encode($data);
		return;

	}

	if (isset($_GET['subcategoria'])){
		
		$data = [];
		$subcategoria = $_GET['subcategoria'];
		$dist = mysqli_query($conexion, ' SELECT * FROM marca  WHERE idSubcategoria  = "'.$subcategoria.'" and enable = 1');

		while($fila = mysqli_fetch_row($dist)){
			array_push($data, [$fila[0], $fila[2]]);
		}

		echo json_encode($data);
		return;

	}

	if (isset($_GET['departamento'])) {
		
		$data = [];
		$departamento = $_GET['departamento'];
		$prov = mysqli_query($conexion, 'SELECT * FROM provincia WHERE idDepartamento = "'.$departamento.'"');
		
		/*echo '<option selected="selected" class="holder" value="0">Seleccionar provincia</option>';
		while($fila = mysqli_fetch_row($prov)){
			echo "<option value= ".$fila[0].">".$fila[1]."</option>";
		}*/
		while($fila = mysqli_fetch_row($prov)){
			array_push($data, [$fila[0], $fila[1]]);
		}

		echo json_encode($data);
		return;

	}

	if (isset($_GET['provincia'])) {

		$data = [];		
		$provincia = $_GET['provincia'];
		$dist = mysqli_query($conexion, ' SELECT * FROM distrito WHERE idProvincia  = "'.$provincia.'"');
		
		while($fila = mysqli_fetch_row($dist)){
			array_push($data, [$fila[0], $fila[1]]);
		}

		echo json_encode($data);
		return;

	}
	

	

 ?>