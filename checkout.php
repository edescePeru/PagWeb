<?php 
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
	<title>Checkout</title>
	<link rel="icon" href="images/swarbox.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<style>
		.frase{
			margin-bottom: 17em;
		    font-weight: bold;
		    color: black;
		    text-align: right;
		}

		span.total1{
			text-align: right;
		}
	</style>
</head>
<body>


<?php 
	require 'sliderbar.php';
?>


<div class="wrap-box"></div>

<div class="header_bottom">
	<div class="container">
		<div class="col-xs-8 header-bottom-left">
		<?php 
			require 'header.html';
		 ?>
		</div>
		<div class="col-xs-4 header-bottom-right">
			<div class="search">	  
				<input type="text" id="search"  name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">

				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"></div>
			</div>
	 		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div class="container cont-body">
	<div class="check">	 
		<h1>Carrito de Compras </h1>
		<div class="col-md-9 cart-items">
			 

			 <?php 
			 	include 'BaseDatos/conexion.php'; 
		 		$query = "SELECT DISTINCT DC.idCarrito, P.idProducto, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre, P.image, P.stock FROM carrito C 
                        INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
                        INNER JOIN producto P ON DC.idProducto = P.idProducto
                        INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
                        INNER JOIN marca M ON M.idMarca = P.idMarca
                        WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1";
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
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="Script/images/<?php echo $data[$i][7] ?>" class="img-responsive" alt=""/>
							
						</div>
						<div class="cart-item-info">
							<div class="feature feature-icon-hover indent first">
								<a data-delete data-carrito="<?php echo $data[$i][0] ?>" data-producto="<?php echo $data[$i][1]; ?>" href="" title=""><i class="fa fa-close pull-right " aria-hidden="true"></i></a>
							</div>
							<h3><a href="#"><?php echo $data[$i][2] ?></a><span>Marca: <?php echo $data[$i][3] ?></span></h3>
							<ul class="qty">
								<li><p><b>Precio:</b> S/. <?php echo $data[$i][5] ?></p></li>
								<li><div>Cantidad: </div><p data-cantidad='<?php echo $data[$i][1] ?>'><?php echo $data[$i][4] ?></p></li>
								<li>
									<div class="feature feature-icon-hover indent first">
										<a href="" title="" data-stock='<?php echo $data[$i][8] ?>' data-carrito="<?php echo $data[$i][0] ?>" data-producto="<?php echo $data[$i][1]; ?>" data-quantity="<?php echo $data[$i][4] ?>" data-price="<?php echo $data[$i][5] ?>" data-plus><i class="fa fa-plus pull-left " aria-hidden="true"></i></a>
										<a href="" title="" data-carrito="<?php echo $data[$i][0] ?>" data-producto="<?php echo $data[$i][1]; ?>" data-quantity="<?php echo $data[$i][4] ?>" data-price="<?php echo $data[$i][5] ?>" data-minus><i class="fa fa-minus" aria-hidden="true"></i></a>
									</div>
								</li>
							</ul>
							
						</div>
						<div class="clearfix"></div>
												
					</div>
				</div> 
			<?php 
					}
				}
			
					
			 ?>
						
		
			 </div>
		 <div class="col-md-3 cart-total">
			 <a class="continue" href="index.php">Continuar comprando</a>

			 <?php if ($cantidad > 0): ?>
			 	<div class="panel panel-default total-cart">
					<div class="panel-body">
						<div class="price-details">
							<h3 style="text-align: center;"><b>DETALLE DE COMPRA</b></h3>
							<span><b>Total</b></span>
							<span id="subtotal" class="total1">gfdgdfg</span>
							<span><b>Descuento</b></span>
							<span id="discount" class="total1">---</span>
							<span><b>Envío</b></span>
							<span id="delivery" class="total1">dfgdf</span>
							<div class="clearfix"></div>				 
						</div>	
						<div class="price-total">
							<span><b>TOTAL</b></span>
							<span id="total" class="total1">dfgdf</span>
							<div class="clearfix"></div>				 
						</div>
					</div>
				</div>
			 	
				<div class="clearfix"></div>
				<a class="order" href="procesoPago.php">Realizar compra</a>
			 	
			 <?php endif ?>
			 
			 <!--<div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div> -->
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
<script type="text/javascript" src="misJs/cartQuantity.js"></script>
<script type="text/javascript" src="misJs/checkout.js"></script>


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