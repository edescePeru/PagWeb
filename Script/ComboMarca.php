<?php 
		include '../BaseDatos/conexion.php';



		
		$subcategoria = $_GET['subcategoria'];
		$dist = mysqli_query($conexion, ' SELECT * FROM marca ');

		echo '<select name="marca" id="marca" multiple>';				
		while($fila = mysqli_fetch_row($dist)){
			echo "<option value= ".$fila[0].">".$fila[1]."</option>";
		}
		echo '</select>';

 ?>