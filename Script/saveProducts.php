<?php 

	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';
	$nombreImg = $_FILES["file-es"]["name"];
	$archivo = $_FILES["file-es"]["tmp_name"];

	$ruta = "images";
	$ruta = $ruta."/".$nombreImg;

	move_uploaded_file($archivo, $ruta);
	
	echo json_encode("Listo");

 ?>