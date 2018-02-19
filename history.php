<?php 
	include 'BaseDatos/conexion.php';
	 session_start();
	 $inicioSesion = isset($_SESSION['id']);

	 if ($inicioSesion) {
		$user = $_SESSION['user'];
		$email = $_SESSION['email'];
	 }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Historial</title>
<link rel="icon" href="images/swarbox.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<style type="text/css" media="screen">
		.mystyle{
			margin-bottom: 0px !important;
		}
	</style>
</head>
<body>
<?php 
	require 'sliderbar.php';
?>

<div class="wrap-box"></div>

<div class="header_bottom men_border">
	<div class="container">
		<div class="col-xs-8 header-bottom-left">
			<?php 
				require 'header.html';
			?>
		</div>
			
		<div class="col-xs-4 header-bottom-right">
			<div class="search">	  
				<input type="text" id="search" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"></div>
			</div>
	 		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div class="single_top">
	<div class="container"> 		
		<div class="content-title">
			<h1 class="contact">Historial de compras</h1>
			<div class="line-title"></div>
		</div>	
		<div class="col-md-9 contact_left">
			
		<?php 
			$query = "";
			$resultSet = mysqli_query($conexion, 'SELECT * FROM compra');
			while($fila1 = mysqli_fetch_array($resultSet)){
        ?>
			<div class="style panel panel-default">
				<div class="panel-heading">
					<div class="row"> 
						<div class="col-sm-9 panel-tittle">
							<i class="fa fa-shopping-basket " aria-hidden="true"> </i> Productos de la compra realizada el <?php echo $fila1[2] ?> <br>
						<?php 
							if ($fila1[4]==1) {
								# Mostrar estado "Registrado"
								
								echo "<b>Estado: </b> Compra Registrada</p>";
								
							} else {
								if ($fila1[4]==2) {
									# Mostrar estado "En trayecto"
									
									echo "<b>echoEstado: Compra en trayecto</b>";
									
								} else {
									# Mostrar estado "Finalizado"
									echo "<b>echoEstado: Compra Finalizada</b>";									
								}
								
							}
							
						?>
						</div>
					</div>
				</div>
				<div class="panel-body">	
				 	<?php 
						
					 	$query = "SELECT DISTINCT DC.idCompra, P.idProducto, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre, P.image, P.stock 
					 				FROM compra C 
			                        INNER JOIN detacompra DC ON C.idCompra = DC.idCompra
			                        INNER JOIN producto P ON DC.idProducto = P.idProducto
			                        INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
			                        INNER JOIN marca M ON M.idMarca = P.idMarca
			                        WHERE DC.idCompra = ".$fila1[0];
						$result = mysqli_query($conexion, $query);
						$data = [];

						$cantidad = mysqli_num_rows($result);

						if ($cantidad>0) {
							while ($fila = mysqli_fetch_array($result)) {
								array_push($data, [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]]);
							}
						}else{
					?>
					<div class="frase">
						TU CARRITO ESTA VACÍO. ¡AGRÉGALE TUS PRODUCTOS FAVORITOS Y 
						DISFRUTA DEL PLACER DE SEGUIR COMPRANDO!...
					</div>
					<?php
						}

						//echo count($data);
						//var_dump($data);

						for ($i=0; $i <count($data) ; $i++) { 
							for($j=$i+1;$j<=count($data)-1;$j++) {	
								if($data[$i][1]==$data[$j][1]){
									$data[$j]['borrar']=true;
								}
							}
						}
						//var_dump($data);

						for ($i=0; $i <count($data) ; $i++) { 
							if (!isset($data[$i]['borrar'])) {
					?>
					<div class="cart-header">
						<div class="cart-sec simpleCart_shelfItem mystyle">
							<div class="cart-item small-image">
								<img src="Script/images/<?php echo $data[$i][7] ?>" class="img-responsive" alt=""/>
									
							</div>
							<div class="cart-item-info small-details">
								<h3><a href="#"><?php echo $data[$i][2] ?></a><span>Marca: <?php echo $data[$i][3] ?></span></h3>
								<ul class="qty">
									<li><p><b>Precio:</b> S/. <?php echo $data[$i][5] ?></p></li>
									<li><div><b>Cantidad:</b> </div><p data-cantidad='<?php echo $data[$i][1] ?>'><?php echo $data[$i][4] ?></p></li>
								

							</div>
							<div class="clearfix"></div>
															
						</div>
					</div> 
					<?php 
							}
						}	
					?>
				</div>
			</div>
        <?php
    		}
        ?>
	  		
		</div>
		
	</div>
</div>  

<div class="footer">
	<div class="container">
		<div class="footer_top">
		<?php 
			require 'footer.html';
		 ?>
		</div>
		<div class="clearfix"> </div>

		<div class="footer_bottom">
			<div class="copy">
                <p>© 2017 Edesce Store. Todos los derechos reservados.</p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/simpleCart.min.js"> </script>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/megamenu.js"></script>
<script type="text/javascript" src="misJs/validate.js"></script>
<script type="text/javascript" src="misJs/message.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="misJs/cartQuantity.js"></script>
<script type="text/javascript" src="misJs/cartShop2.js"></script>


<script>
	$(document).ready(function(){
		$(".megamenu").megamenu();
		$('[data-toggle="tooltip"]').tooltip();  
	});

	addEventListener("load", function() { 
		setTimeout(hideURLbar, 0);
	}, false); 

	function hideURLbar(){ window.scrollTo(0,1); } 

</script>

<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>		