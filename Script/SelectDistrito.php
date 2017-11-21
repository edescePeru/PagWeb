<?php 
	
	include '../BaseDatos/conexion.php';

	$provincia = $_GET['provincia'];

	
	$dist = mysqli_query($conexion, ' SELECT * FROM distrito WHERE idProvincia  = "'.$provincia.'"');

	echo "<option></option>";
	while($fila = mysqli_fetch_row($dist)){

		echo "<option value= ".$fila[0].">".$fila[1]."</option>";
	}

 ?>