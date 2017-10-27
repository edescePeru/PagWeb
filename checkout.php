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
	<title>Buy_shop an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Checkout :: w3layouts</title>
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
<div class="header_bottom men_border">
	    <div class="container">
			<div class="col-xs-8 header-bottom-left">
				<div class="col-xs-2 logo">
					<h1><a href="index.html"><span>Buy</span>shop</a></h1>
				</div>
				<div class="col-xs-6 menu">
		            <ul class="megamenu skyblue">
				      <li class="active grid"><a class="color1" href="index.html">Men</a><div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.html">Accessories</a></li>
										<li><a href="men.html">Bags</a></li>
										<li><a href="men.html">Caps & Hats</a></li>
										<li><a href="men.html">Hoodies & Sweatshirts</a></li>
										<li><a href="men.html">Jackets & Coats</a></li>
										<li><a href="men.html">Jeans</a></li>
										<li><a href="men.html">Jewellery</a></li>
										<li><a href="men.html">Jumpers & Cardigans</a></li>
										<li><a href="men.html">Leather Jackets</a></li>
										<li><a href="men.html">Long Sleeve T-Shirts</a></li>
										<li><a href="men.html">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.html">Shirts</a></li>
										<li><a href="men.html">Shoes, Boots & Trainers</a></li>
										<li><a href="men.html">Shorts</a></li>
										<li><a href="men.html">Suits & Blazers</a></li>
										<li><a href="men.html">Sunglasses</a></li>
										<li><a href="men.html">Sweatpants</a></li>
										<li><a href="men.html">Swimwear</a></li>
										<li><a href="men.html">Trousers & Chinos</a></li>
										<li><a href="men.html">T-Shirts</a></li>
										<li><a href="men.html">Underwear & Socks</a></li>
										<li><a href="men.html">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="men.html">Levis</a></li>
										<li><a href="men.html">Persol</a></li>
										<li><a href="men.html">Nike</a></li>
										<li><a href="men.html">Edwin</a></li>
										<li><a href="men.html">New Balance</a></li>
										<li><a href="men.html">Jack & Jones</a></li>
										<li><a href="men.html">Paul Smith</a></li>
										<li><a href="men.html">Ray-Ban</a></li>
										<li><a href="men.html">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					</li>
				    <li class="grid"><a class="color2" href="#">Women</a>
					  <div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.html">Accessories</a></li>
										<li><a href="men.html">Bags</a></li>
										<li><a href="men.html">Caps & Hats</a></li>
										<li><a href="men.html">Hoodies & Sweatshirts</a></li>
										<li><a href="men.html">Jackets & Coats</a></li>
										<li><a href="men.html">Jeans</a></li>
										<li><a href="men.html">Jewellery</a></li>
										<li><a href="men.html">Jumpers & Cardigans</a></li>
										<li><a href="men.html">Leather Jackets</a></li>
										<li><a href="men.html">Long Sleeve T-Shirts</a></li>
										<li><a href="men.html">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.html">Shirts</a></li>
										<li><a href="men.html">Shoes, Boots & Trainers</a></li>
										<li><a href="men.html">Shorts</a></li>
										<li><a href="men.html">Suits & Blazers</a></li>
										<li><a href="men.html">Sunglasses</a></li>
										<li><a href="men.html">Sweatpants</a></li>
										<li><a href="men.html">Swimwear</a></li>
										<li><a href="men.html">Trousers & Chinos</a></li>
										<li><a href="men.html">T-Shirts</a></li>
										<li><a href="men.html">Underwear & Socks</a></li>
										<li><a href="men.html">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="men.html">Levis</a></li>
										<li><a href="men.html">Persol</a></li>
										<li><a href="men.html">Nike</a></li>
										<li><a href="men.html">Edwin</a></li>
										<li><a href="men.html">New Balance</a></li>
										<li><a href="men.html">Jack & Jones</a></li>
										<li><a href="men.html">Paul Smith</a></li>
										<li><a href="men.html">Ray-Ban</a></li>
										<li><a href="men.html">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
			    </li>
				<li><a class="color4" href="about.html">About</a></li>				
				<li><a class="color5" href="404.html">Blog</a></li>
				<li><a class="color6" href="contact.html">Support</a></li>
			  </ul> 
			</div>
		</div>
	    <div class="col-xs-4 header-bottom-right">
	       <div class="box_1-cart">
		     <div class="box_11"><a href="checkout.html">
		      <h4><p>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
		      </a></div>
	          <div class="clearfix"> </div>
	        </div>
	        <div class="search">	  
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
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
					<div class="close1"> </div>
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="Script/images/<?php echo $data[$i][7] ?>" class="img-responsive" alt=""/>
							
						</div>
						<div class="cart-item-info">
						<div class="feature feature-icon-hover indent first">
								<a href="" title=""><i class="fa fa-plus pull-right " aria-hidden="true"></i></a>
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
		<div class="col-md-4 box_3">
			<h3>Our Stores</h3>
			<address class="address">
              <p>9870 St Vincent Place, <br>Glasgow, DC 45 Fr 45.</p>
              <dl>
                 <dt></dt>
                 <dd>Freephone:<span> +1 800 254 2478</span></dd>
                 <dd>Telephone:<span> +1 800 547 5478</span></dd>
                 <dd>FAX: <span>+1 800 658 5784</span></dd>
                 <dd>E-mail:&nbsp; <a href="mailto@example.com">info(at)buyshop.com</a></dd>
              </dl>
           </address>
           <ul class="footer_social">
			  <li><a href=""> <i class="fb"> </i> </a></li>
			  <li><a href=""><i class="tw"> </i> </a></li>
			  <li><a href=""><i class="google"> </i> </a></li>
			  <li><a href=""><i class="instagram"> </i> </a></li>
		   </ul>
		</div>
		<div class="col-md-4 box_3">
			<h3>Blog Posts</h3>
			<h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
			<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
			<h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
			<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
			<h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
			<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
		</div>
		<div class="col-md-4 box_3">
			<h3>Support</h3>
			<ul class="list_1">
				<li><a href="#">Terms & Conditions</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Refunds</a></li>
				<li><a href="#">Track Order</a></li>
				<li><a href="#">Services</a></li>
			</ul>
			<ul class="list_1">
				<li><a href="#">Services</a></li>
				<li><a href="#">Press</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="footer_bottom">
			<div class="copy">
                <p>Copyright © 2015 Buy_shop. All Rights Reserved.<a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
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