<?php 

	header('Content-type: application/json');
	include '../BaseDatos/conexion.php';


	// Si no se ha llegado ha definir el array global $_FILES, cancelaremos el resto del proceso
	if (empty($_FILES['file-es'])) {
		// Devolvemos un array asociativo con la clave error en formato JSON como respuesta	
	    echo json_encode(['rpta'=> true, 'mensaje'=>'Error al subir los archivos. Póngase en contacto con la empresa']); 
		// Cancelamos el resto del script
	    return; 
	}

	if (empty($_FILES['file-es'])) {
	    echo json_encode(['rpta'=> true, 'mensaje'=>'No hay imagenes para subir']); 
	    // or you can throw an exception 
	    return; // terminate
	}


	$idprod =  $_POST['idprod'];

	if ($idprod == "" || $idprod == "undefined") {
	    echo json_encode(['rpta'=> true, 'mensaje'=>'No hay id de producto']); 
	    // or you can throw an exception 
	    return; // terminate
	}

		// Definimos la constante con el directorio de destino de las descargas
	define('DIR_DESCARGAS',__DIR__.DIRECTORY_SEPARATOR .'images');


	// Obtenemos el array de ficheros enviados
	$ficheros = $_FILES['file-es'];
	// Establecemos el indicador de proceso correcto (simplemente no indicando nada)
	$estado_proceso = NULL;
	// Paths para almacenar
	$paths= array();
	// Obtenemos los nombres de los ficheros
	$nombres_ficheros = $ficheros['name'];

	// Si no se ha subido mas de 2 imagenes
	if (count($nombres_ficheros) < 2) {
		// Devolvemos un array asociativo con la clave error en formato JSON como respuesta	
	    echo json_encode(['rpta'=> true, 'mensaje'=>'Debe agregar como minimo 2 imagenes']); 
		// Cancelamos el resto del script
	    return; 
	}

	// Si no existe la carpeta de destino la creamos
	if(!file_exists(DIR_DESCARGAS)) @mkdir(DIR_DESCARGAS);

	// Sólo en el caso de que exista esta carpeta realizaremos el proceso
	if(file_exists(DIR_DESCARGAS)) {
		// Recorremos el array de nombres para realizar proceso de upload
		for($i=0; $i < count($nombres_ficheros); $i++){
			// Extraemos el nombre y la extensión del nombre completo del fichero
			$nombre_extension = explode('.', basename($nombres_ficheros[$i]));

			//creamos un nombre nuevo
			$nombre_nuevo = md5(uniqid()) . "." . array_pop($nombre_extension);

			/*// Obtenemos la extensión
			$extension=array_pop($nombre_extension);
			// Obtenemos el nombre
			$nombre=array_pop($nombre_extension);

			$nombre_nuevo = utf8_decode($nombre) . '.' . $extension;*/

			// Creamos la ruta de destino
			$archivo_destino = DIR_DESCARGAS . DIRECTORY_SEPARATOR . utf8_decode($nombre_nuevo);
			
			// Mover el archivo de la carpeta temporal a la nueva ubicación
			if(move_uploaded_file($ficheros['tmp_name'][$i], $archivo_destino)) {

				//registramos cada producto en una base de datos
				$registrar_imagen = mysqli_query($conexion, "INSERT INTO productoimage(idProducto, imagen, enable)
															VALUES ('".$idprod."','".$nombre_nuevo."','1')");

				if ($registrar_imagen) {

					if ($i == 0) {
						$imagen_principal = mysqli_query($conexion, 'UPDATE producto SET image = "'.$nombre_nuevo.'" WHERE idProducto = "'.$idprod.'"');
					} 
					
					// Activamos el indicador de proceso correcto
					$estado_proceso = true;
					// Almacenamos el nombre del archivo de destino
					$paths[] = $archivo_destino;

				} else{
					// Activamos el indicador de proceso erroneo		
					$estado_proceso = false;
					// Rompemos el bucle para que no continue procesando ficheros
					break;
				}			

			} else {
				// Activamos el indicador de proceso erroneo		
				$estado_proceso = false;
				// Rompemos el bucle para que no continue procesando ficheros
				break;
			}
		}
	}

	// PREPARAR LAS RESPUESTAS SOBRE EL ESTADO DEL PROCESO REALIZADO
	// **********************************************************************

	// Definimos un array donde almacenar las respuestas del estado del proceso
	$respuestas = array();
	// Comprobamos si el estado del proceso a finalizado de forma correcta
	if ($estado_proceso === true) {
		// Como mínimo tendremos que devolver una respuesta correcta por medio de un array vacio.
	    $respuestas = array();
		$respuestas = ['rpta' => false, 'mensaje'=> 'Se registro correctamente '.count($paths).' imagenes.']; 

	} elseif ($estado_proceso === false) {
	    $respuestas = ['rpta'=> true, 'mensaje'=>'Error al subir los archivos. Póngase en contacto con la empresa.'];
	    // Eliminamos todos los archivos subidos
	    foreach ($paths as $fichero) {
	        unlink($fichero);
	    }

	// Si no se han llegado a procesar ficheros $estado_proceso seguirá siendo NULL
	} else {
	    $respuestas = ['rpta'=> true, 'mensaje'=>'No se ha procesado ficheros.'];
	}

	// Devolvemos el array asociativo en formato JSON como respuesta
	echo json_encode($respuestas);
		
	


	
	
 ?>