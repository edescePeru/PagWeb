<?php 
	
	include '../BaseDatos/conexion.php';



	if (isset($_GET['categoria'])) {
		
		$categoria = $_GET['categoria'];
		$dist = mysqli_query($conexion, ' SELECT * FROM subcategoria WHERE idCategoria  = "'.$categoria.'" and enable = 1');
			
		while($fila = mysqli_fetch_row($dist)){
			echo "<option value= ".$fila[0].">".$fila[2]."</option>";
		}

	}

	else{
		
		$subcategoria = $_GET['subcategoria'];
		$dist = mysqli_query($conexion, ' SELECT * FROM marca  WHERE idSubcategoria  = "'.$subcategoria.'" and enable = 1');

		while($fila = mysqli_fetch_row($dist)){
			echo "<option value= ".$fila[0].">".$fila[2]."</option>";
		}

	}

	

	

 ?>