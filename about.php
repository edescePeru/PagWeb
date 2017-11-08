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
<title>Contacto</title>
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
		<div class="box_4">
	  		<div class="col-md-8 about_left">
	  			<div class="content-title">
					<h1 class="contact">¿Quienes somos?</h1>
					<div class="line-title"></div>
				</div>	
				<p>
					<b>EdesceStore</b> es la nueva <b>tienda online</b> en el Perú, cuenta con una amplia variedad de productos y articulos de marcas reconocida y a precios accesibles al bolsillo de nuestros clientes.

					<br>

					En <b>EdesceStore</b> podras realizar tu compra de manera facil, rapida y segura; ahorrando tiempo y dinero. Podras recibir tu pedido en la comodidad de tu casa o en donde te encuentres. Contamos con diversos metodos de pago y ofrecemos diferentes tipos de promocios y descuentos.

					<br>

					El compromiso con nuestros clientes, brindar un servicio de calidad, la extensa diversidad de productos y los increíbles descuentos y promociones, son tan sólo algunas cualidades que nos caracterizan.

				</p>
				<p class="eslogan"> <b>¡Ven y disfruta comprar de manera online!</b></p>
				
				<div class="faqs">
					<div class="content-title">
						<h1 class="contact">UBICACIÓN</h1>
						<div class="line-title"></div>
					</div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1974.9529041759286!2d-79.02771938932207!3d-8.111072980181746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d83f316ca59%3A0xe63321a0e0c3c978!2sEDESCE!5e0!3m2!1ses!2ses!4v1503943312708" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>		    
				</div>  	
			</div>

			<div class="col-md-4 sidebar">
	  			<div class="content-title">
					<h1 class="contact">Siguenos..</h1>
					<div class="line-title"></div>
				</div>	
				<div class="sidebar-content">
					<h3><b>Facebook</b></h3>
					<div class="fb-page" data-href="https://www.facebook.com/EdesceStore/" data-small-header="false"  data-height="400" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
						<blockquote cite="https://www.facebook.com/EdesceStore/" class="fb-xfbml-parse-ignore">
							<a href="https://www.facebook.com/EdesceStore/">Edesce Store</a>
						</blockquote>
					</div>
				</div>
				<div class="sidebar-content">
					<h3><b>Youtube</b></h3>
					<div class="you-body">
						<div class="g-ytsubscribe" data-channelid="UCYtuXXobcXWVN8An6xVQn1A" data-layout="full" data-count="default"></div>
					</div>
				</div>
			</div>
	  	<div class="clearfix"> </div>
	  </div>

<!--
   <h3 class="m_2">Related Products</h3>
         <div class="container">
          		<div class="box_3">
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="images/pic6.jpg" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="images/pic2.jpg" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="images/pic4.jpg" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
          			<div class="col-md-3">
          				<div class="content_box"><a href="single.html">
			   	          <img src="images/pic5.jpg" class="img-responsive" alt="">
				   	   </a>
				   </div>
				    <h4><a href="single.html">Contrary to popular belief</a></h4>
				    <p>$ 199</p>
			        </div>
			        <div class="clearfix"> </div>
          		</div>
          	</div>
-->
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
<script src="https://apis.google.com/js/platform.js"></script>
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