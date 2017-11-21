<?php 
	
	include '../BaseDatos/conexion.php';

	$departamento = $_GET['departamento'];

	
	$prov = mysqli_query($conexion, ' Select * from provincia where idDepartamento  = "'.$departamento.'"');

	echo "<option></option>";
	while($fila = mysqli_fetch_row($prov)){

		echo "<option value= ".$fila[0].">".$fila[1]."</option>";
	}

 ?>