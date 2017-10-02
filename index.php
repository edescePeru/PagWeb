<?php 
	 session_start();
	 $inicioSesion = isset($_SESSION['id']);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Edesce store</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/nivo-slider.css" rel="stylesheet" >
	<link href="css/mi-slider.css" rel="stylesheet" >
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

<style>
	.banner_desc {
		text-align: center;
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
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"></div>
			</div>
	 		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div class="slider-wrapper theme-mi-slider">
	
	<div id="slider" class="nivoSlider">     
	    <img src="images/Slider/a.jpg" alt="" title="#htmlcaption1" />    
	    <img src="images/Slider/c.jpg" alt="" title="#htmlcaption2" />     
	    <img src="images/Slider/d.jpg" alt="" title="#htmlcaption3" />    
	    <img src="images/Slider/k.jpg" alt="" title="#htmlcaption4" />    
	    <img src="images/Slider/i.jpg" alt="" title="#htmlcaption5" />    
	</div> 

	<div id="htmlcaption1" class="nivo-html-caption"> 
		<div class="image1">    
			<h2><b>Crea tu propio estilo <br> mirate diferente...</b></h2>
			<h4><b>Ropa de mujer y hombre</b></h4>
			<button><b>Ver mas...</b></button>
		</div>
	</div>

	<div id="htmlcaption2" class="nivo-html-caption"> 
		<div class="image3">    
			<h2><b>Realiza tus actividades <br> con comodidad...</b></h2>
			<h4><b>Zapatos y zapatillas</b></h4>
			<button><b>Ver mas...</b></button>
		</div>
	</div>

	<div id="htmlcaption3" class="nivo-html-caption"> 
		<div class="image3">    
			<h2><b>Ponte en contacto <br> con el mundo...</b></h2>
			<h4><b>Celulares, tablet, smartwach...</b></h4>
			<button><b>Ver mas...</b></button>
		</div>
	</div>

	<div id="htmlcaption4" class="nivo-html-caption"> 
		<div class="image3">    
			<h2><b>La joya que realza <br> tu belleza y elegancia...</b></h2>
			<h4><b>Aretes, Collares, Anillos...</b></h4>
			<button><b>Ver mas...</b></button>
		</div>
	</div>

	<div id="htmlcaption5" class="nivo-html-caption"> 
		<div class="image3">    
			<h2><b>Un accesorio invisible que <br> resalta tu presencia...</b></h2>
			<h4><b>Perfumes de Mujer y Hombre</b></h4>
			<button><b>Ver mas...</b></button>
		</div>
	</div>

</div>	

<div class="content_top">
	<h3 class="m_1">Ultimos Productos</h3>
	<div class="container">
		<div class="box_1">
			<div class="col-md-7">
				<div class="section group">
					<div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
						<div class="shop-holder">
							<div class="product-img">
								<a href="product/t/cell/iphone7.html">
									<img width="225" height="265" src="images/iphone.png" class="img-responsive"  alt="item4">
								</a>
								<a href="" class="button item_add"></a>
							</div>
						</div>
		
						<div class="shop-content" style="height: 80px;">
							<div>
								<a href="product/t/cell/iphone7.html" rel="tag">Nuevo</a>
							</div>
							<h3><a href="product/t/cell/iphone7.html">Iphone 7</a></h3>
							<span class="amount item_price">S/2900.00</span>
						</div>
					</div>
					
					<div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
						<div class="shop-holder">
							<div class="product-img">
								<a href="product/t/cell/s8.html">
									<img width="225" height="265" src="images/s88.png" class="img-responsive"  alt="item4">
								</a>
								<a href="" class="button item_add"></a>
							</div>
						</div>
						<div class="shop-content" style="height: 80px;">
							<div>
								<a href="product/t/cell/s8.html" rel="tag">Nuevo</a>
							</div>
							<h3><a href="product/t/cell/s8.html">Samsumg S8</a></h3>
							<span class="amount item_price">S/3000.00</span>
						</div>
					</div>

					<div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
						<div class="shop-holder">
							<div class="product-img">
								<a href="product/t/cell/p10lite.html">
									<img width="225" height="265" src="images/p10lite.png" class="img-responsive"  alt="item4">		  </a>
								<a href="" class="button item_add"></a>
							</div>
						</div>
				
						<div class="shop-content" style="height: 80px;">
				  			<div><a href="product/t/cell/p10lite.html" rel="tag">Nuevo</a>
				  			</div>
							<h3><a href="product/t/cell/p10lite.html">Huawei P10 Lite</a></h3>
							<span class="amount item_price">S/1170.00</span>
						</div>
					</div>
					<div class="clearfix"></div> 
				</div>
			</div>
			
			<div class="col-md-5 row_3">
				<img src="images/portadas/portadafb4.jpg" class="img-responsive" alt=""/>
				<img src="images/portadas/portadafb3.jpg" class="img-responsive" alt=""/>
				<img src="images/portadas/portadafb1.jpg" class="img-responsive" alt=""/>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="content_bottom">
	<div class="container">
		<h2 class="m_3">Lo mas Buscado</h2>
		<div class="grid_1">
			<div class="col-md-6 blog_1">
				<a href="index_single.html">
					<div class="item-inner"> 
						<img src="images/portadas/asusGamer.png" class="img-responsive" alt=""/>																	
						<div class="date-comments">
							<div class="time"><span class="date"><span class="word1">13</span> <span class="word2">A pedido</span> </span></div>											 
							<div class="comments">
								<span><span class="word1">15</span>
								<span class="word2">Valoraciones</span></span>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-md-6 row_2">
				<a href="index_single.html">
					<div class="item-inner"> 
						<img src="images/portadas/gopro.png" class="img-responsive" alt=""/>																	
							<div class="date-comments">
								<div class="time"><span class="date"><span class="word1">10</span> <span class="word2">A pedido</span> </span></div>											 
								<div class="comments">
								<span><span class="word1">7</span>
								<span class="word2">Valoraciones</span></span>
								</div>
							 </div>
					</div>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>	
</div>

<div class="content_bottom-grid">
	<div class="col-md-6 row_4"></div>
	
	<div class="col-md-6">
		<div class="row_5">
			<div class="col_1_of_3 span_1_of_3">
				<div class="shop-holder1">
					<a href="single.html"><img src="images/default/pic4.jpg" class="img-responsive" alt=""/></a>
				</div>
				<div class="shop-content" style="height: 80px;">
					<h3><a href="single.html">Moda Varones</a></h3>
					<span><span class="amount">100 Productos</span></span>
				</div>
			</div>

			<div class="col_1_of_3 span_1_of_3">
				<div class="shop-holder1">
					<a href="single.html"><img src="images/default/pic5.jpg" class="img-responsive" alt=""/></a>
				</div>
				
				<div class="shop-content" style="height: 80px;">
					<h3><a href="single.html">Moda Mujer</a></h3>
					<span><span class="amount">70 Productos</span></span>
				</div>
			</div>
			
			<div class="col_1_of_3 span_1_of_3">
				<div class="shop-holder1">
					<a href="single.html"><img src="images/default/pic6.jpg" class="img-responsive" alt=""/></a>
				</div>
				
				<div class="shop-content" style="height: 80px;">
					<h3><a href="single.html">Calzado</a></h3>
					<span><span class="amount">54 Unidades</span></span>
				</div>		
			</div>
			<div class="clearfix"></div> 
		</div>
	</div>

	<div class="clearfix"> </div>
</div>

<div class="footer">
	<div class="container">
		<div class="footer_top">
		<?php 
			require 'footer.html';
		 ?>
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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>

<script type="text/javascript"> 
	$(window).on('load', function() {
	    $('#slider').nivoSlider(); 
	}); 

	$(document).ready(function(){
		$(".megamenu").megamenu();
		 $('[data-toggle="tooltip"]').tooltip();  
	});

	addEventListener("load", function() { 
		setTimeout(hideURLbar, 0);
	}, false); 

	function hideURLbar(){ 
		window.scrollTo(0,1); 
	} 
</script>

</body>
</html>		