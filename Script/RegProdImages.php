<?php 

	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	if (empty($_FILES['file-es'])) {
	    echo json_encode(['error'=>'No hay imagenes para subir']); 
	    // or you can throw an exception 
	    return; // terminate
	}


	$idprod =  $_POST['idprod'];

	if ($idprod == "" || $idprod == "undefined") {
	    echo json_encode(['fallo'=> true, 'error'=>'No hay id de producto']); 
	    // or you can throw an exception 
	    return; // terminate
	}

	//obtener la imagen
	$images = $_FILES["file-es"];

	// get file names
	$filenames = $images['name'];

	// loop and process files
	for($i=0; $i < count($filenames); $i++){
	    
	    $ext = explode('.', basename($filenames[$i]));
	    $newname = md5(uniqid()) . "." . array_pop($ext);
	    
	    $actualizar = mysqli_query($conexion, "INSERT INTO productoimage(idProducto, imagen, enable) 														VALUES ('".$idprod."','".$newname."',1)");
	    $direction = "images" . "/" . $newname;
	    $mover = move_uploaded_file($images['tmp_name'][$i], $direction);
	    
	}

	$maximo = mysqli_query($conexion, 'SELECT imagen FROM productoimage WHERE idProducto = "'.$idprod.'" ORDER BY idProducto DESC LIMIT 1');
    $fila = mysqli_fetch_row($maximo);
    $image = $fila[0];

    $actualizar = mysqli_query($conexion, 'UPDATE producto SET image = "'.$image.'" WHERE idProducto = "'.$idprod.'"');


	if ($actualizar == true && $actualizar == true ) {
		echo json_encode(['fallo'=> false, 'message'=> 'Imagenes subidas correctamente']);
		return;
	}else{
		echo json_encode(['fallo'=> true, 'error'=>'Error al subir imágenes. Comuníquese con el administrador del sistema']); 
	    return;
	}
	
	
	
 ?>