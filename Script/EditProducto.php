<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	$idprod = $_POST['idprod'];
	$nombre = $_POST['name'];
	$stock = $_POST['stock'];
	$precio = $_POST['price'];

	if (isset($_POST['subcategoria'])) 
	{    	
		$subcategoria = $_POST['subcategoria'];
    	$upsubcategoria = ", idsubcategoria = '$subcategoria'";
	}else{ $upsubcategoria = ""; }

	if (isset($_POST['marca'])) 
	{    	
		$marca = $_POST['marca'];
    	$upmarca = ", idmarca = '$marca'";
	}else{ $upmarca = ""; }

	if (isset($_POST['model'])) 
	{    	
		$modelo = $_POST['model'];
    	$upmodelo = ", modelo = '$modelo'";
	}else{ $upmodelo = ""; }

	if (isset($_POST['description-short'])) 
	{    	
		$prod_descrip_corta = $_POST['description-short'];
    	$upprod_descrip_corta = ", descripcionCorta = '$prod_descrip_corta'";
	}else{ $upprod_descrip_corta = ""; }

	if (isset($_POST['description-long'])) 
	{    	
		$prod_descrip_larga = $_POST['description-long'];
    	$upprod_descrip_larga = ", descripcionLarga = '$prod_descrip_larga'";
	}else{ $upprod_descrip_larga = ""; }

	if (isset($_POST['garantia'])) 
	{    	
		$prod_garantia = $_POST['garantia'];
    	$upprod_garantia = ", garantia = '$prod_garantia'";
	}else{ $upprod_garantia = ""; }

	if (isset($_POST['color'])) 
	{    	
		$prod_color = $_POST['color'];
    	$upprod_color = ", color = '$prod_color'";
	}else{ $upprod_color = ""; }

	if (isset($_POST['content-box'])) 
	{    	
		$box_contenido = $_POST['content-box'];
    	$upbox_contenido = ", contenidoCaja = '$box_contenido'";
	}else{ $upbox_contenido = ""; }

	if (isset($_POST['large-box'])) 
	{    	
		$box_largo = $_POST['large-box'];
    	$upbox_largo = ", largoCaja = '$box_largo'";
	}else{ $upbox_largo = ""; }

	if (isset($_POST['width-box'])) 
	{    	
		$box_ancho = $_POST['width-box'];
    	$upbox_ancho = ", anchoCaja = '$box_ancho'";
	}else{ $upbox_ancho = ""; }

	if (isset($_POST['height-box'])) 
	{    	
		$box_alto = $_POST['height-box'];
    	$upbox_alto = ", altoCaja = '$box_alto'";
	}else{ $upbox_alto = ""; }	

	if (isset($_POST['height-box'])) 
	{    	
		$box_peso = $_POST['weight-box'];
    	$upbox_peso = ", pesoCaja = '$box_peso'";
	}else{ $upbox_peso = ""; }	
	

	$registro = mysqli_query($conexion, "UPDATE producto SET nombre = '$nombre' , stock = '$stock' , precio = '$precio' 
										$upsubcategoria $upmarca $upmodelo $upprod_descrip_corta $upprod_descrip_larga 
										$upprod_garantia $upprod_color $upbox_contenido $upbox_largo $upbox_ancho 
										$upbox_alto $upbox_peso
										WHERE idProducto = '".$idprod."'");

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha editado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}
	


 ?>