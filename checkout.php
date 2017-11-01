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
	<title>EdesceStore</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

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
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"></div>
			</div>
	 		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div class="check">	 
		<div class="col-md-9 cart-items">
			 <h1>My Shopping Bag <span id="cantidad">dg</span></h1>

			 <?php 
			 	include 'BaseDatos/conexion.php'; 
		 		$query = "SELECT DISTINCT DC.idCarrito, P.idProducto, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre, PI.imagen FROM carrito C 
                        INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
                        INNER JOIN producto P ON DC.idProducto = P.idProducto
                        INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
                        INNER JOIN marca M ON M.idMarca = P.idMarca
                        INNER JOIN productoimage PI ON PI.idProducto= P.idProducto 
                        WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1";
				$result = mysqli_query($conexion, $query);
				$data = [];
				if (mysqli_num_rows($result)>0) {
					while ($fila = mysqli_fetch_array($result)) {
						array_push($data, [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]]);
						}
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
								<li><p>Precio: <?php echo $data[$i][5] ?></p></li>
								<li><p data-cantidad='<?php echo $data[$i][1] ?>'>Cantidad: <?php echo $data[$i][4] ?></p></li>
							</ul>
							<br>
							<div class="feature feature-icon-hover indent first">
								<a href="" title="" data-carrito="<?php echo $data[$i][0] ?>" data-producto="<?php echo $data[$i][1]; ?>" data-quantity="<?php echo $data[$i][4] ?>" data-price="<?php echo $data[$i][5] ?>" data-plus><i class="fa fa-plus pull-left " aria-hidden="true"></i></a>
								<a href="" title="" data-carrito="<?php echo $data[$i][0] ?>" data-producto="<?php echo $data[$i][1]; ?>" data-quantity="<?php echo $data[$i][4] ?>" data-price="<?php echo $data[$i][5] ?>" data-minus><i class="fa fa-minus" aria-hidden="true"></i></a>
							</div>
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
			 <a class="continue" href="#">Continuar comprando</a>
			 <div class="price-details">
				 <h3>Detalle de compra</h3>
				 <span>Total</span>
				 <span id="subtotal" class="total1">gfdgdfg</span>
				 <span>Discount</span>
				 <span id="discount" class="total1">---</span>
				 <span>Delivery Charges</span>
				 <span id="delivery" class="total1">dfgdf</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span id="total">dfgdfg</span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="#">Realizar compra</a>
			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div>
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