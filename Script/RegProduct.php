<?php 
	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';

	session_start();

	//valores
	$categoria = $_POST['categoria'];
	$subcategoria = $_POST['subcategoria'];
	$marca = $_POST['marca'];

	$prod_nombre = $_POST['name'];
	$prod_modelo = $_POST['model'];
	$prod_descrip_corta = $_POST['description-short'];
	$prod_descrip_larga = $_POST['description-long'];
	$prod_garantia = $_POST['garantia'];
	$prod_color = $_POST['color'];

	$box_contenido = $_POST['content-box'];
	$box_largo = $_POST['large-box'];
	$box_ancho = $_POST['width-box'];
	$box_alto = $_POST['height-box'];
	$box_peso = $_POST['weight-box'];

	$prod_codigo = $_POST['key'];
	$prod_stock = $_POST['stock'];
	$prod_precio = $_POST['price'];

	if ($categoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la categoria.']);
		return;
	}

	if ($subcategoria == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la sub categoria.']);
		return;
	}

	if ($marca == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la marca.']);
		return;
	}

	if ($prod_nombre == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el nombre del producto.']);
		return;
	}

	if ($prod_modelo == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el modelo del producto.']);
		return;
	}

	if ($prod_descrip_corta == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la descripcion corta del producto.']);
		return;
	}

	if ($prod_descrip_larga == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la descripcion larga del producto.']);
		return;
	}

	if ($prod_descrip_larga < 100) {
		echo json_encode(['error' => true, 'message' => 'Es necesario que la descripcion larga del producto sea mayor a 100 caracteres.']);
		return;
	}

	if ($prod_garantia == "") {
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar la garantia del producto.']);
		return;
	}

	if ($prod_color == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el color del producto.']);
		return;
	}

	if ($box_contenido == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el contenido de la caja.']);
		return;
	}

	if ($box_largo == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el largo de la caja.']);
		return;
	}

	if (!is_numeric($box_largo) && $box_largo < 0){
		echo json_encode(['error' => true, 'message' => 'Es necesario que el largo de la caja sea valor numerico positivo.']);
		return;
	}

	if ($box_ancho == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el ancho de la caja.']);
		return;
	}

	if (!is_numeric($box_ancho) && $box_ancho < 0){
		echo json_encode(['error' => true, 'message' => 'Es necesario que el ancho de la caja sea valor numerico positivo.']);
		return;
	}

	if ($box_alto == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el alto de la caja.']);
		return;
	}

	if (!is_numeric($box_alto) && $box_ancho < 0){
		echo json_encode(['error' => true, 'message' => 'Es necesario que el alto de la caja sea valor numerico positivo.']);
		return;
	}

	if ($box_peso == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el peso de la caja.']);
		return;
	}

	if (!is_numeric($box_peso) && $box_peso < 0){
		echo json_encode(['error' => true, 'message' => 'Es necesario que el peso de la caja sea valor numerico positivo.']);
		return;
	}

	if ($prod_codigo == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el codigo del producto.']);
		return;
	}

	if ($prod_stock == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el stock del producto.']);
		return;
	}

	if (!is_numeric($prod_stock) && $prod_stock < 0){
		echo json_encode(['error' => true, 'message' => 'Es necesario que el stock del producto sea valor numerico positivo.']);
		return;
	}

	if ($prod_precio == ""){
		echo json_encode(['error' => true, 'message' => 'Es necesario especificar el precio del producto.']);
		return;
	}

	if (!is_numeric($prod_precio) && $prod_precio < 0){
		echo json_encode(['error' => true, 'message' => 'Es necesario que el precio del producto sea valor numerico positivo.']);
		return;
	}

	$query = "INSERT INTO producto(nombrePortada, descripcionCorta, descripcionLarga, contenidoCaja, color, precio, idSubCategoria, idMarca, idCliente, enable) 
	VALUES ('".$name."','".$descriptionShort."','".$descriptionLong."','".$contentBox."','".$color."',".$price.",".$subcategoria.",".$marca.",'".$_SESSION['id']."',1)";

	$registro = mysqli_query($conexion, $query);

	if ($registro) { 
		echo json_encode(['error' => false, 'message' => 'Se ha registrado correctamente']);
		return;
	} else {
		echo json_encode(['error' => true, 'message' => 'Ocurrió un error inesperado. :(']);
		return;
	}

?>