<?php 
	header('Content-type: application/json');
	session_start();
	if (!isset($_SESSION['id'])) {
		echo json_encode(['error' => true, 'message' =>'Es necesario iniciar sesión' ]);
		return;
	}

	echo json_encode(['error' => false, 'message' =>'Redireccionando ...']);
	return;

 ?>