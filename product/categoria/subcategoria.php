<?php 
	 session_start();
	 include_once '../../BaseDatos/conexion.php';
	 $inicioSesion = isset($_SESSION['id']);

	 $subcategoria = $_GET['subcategoria'];

	 //echo $subcategoria;
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Buy_shop an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Men :: w3layouts</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- CSS -->
	<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../css/font-awesome.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	
</head>	
<body>


<?php 
	require '../sliderbar.php';
?>

<div class="wrap-box"></div>

<div class="header_bottom">
	<div class="container">
		<div class="col-xs-8 header-bottom-left">
		<?php 
			require '../header.html';
		 ?>
		</div>
		
		<div class="col-xs-4 header-bottom-right">
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

<div class="container product">
	<div class="women_main">

		<!-- start sidebar -->
		<div class="col-md-3">
			<div class="w_sidebar">
				<div class="w_nav1">
					<h4>All</h4>
					<ul>
						<li><a href="women.html">women</a></li>
						<li><a href="#">new arrivals</a></li>
						<li><a href="#">trends</a></li>
						<li><a href="#">boys</a></li>
						<li><a href="#">girls</a></li>
						<li><a href="#">sale</a></li>
					</ul>	
				</div>

				<h3>filter by</h3>
				<section  class="sky-form">
					<h4>catogories</h4>
					<div class="row1 scroll-pane">
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
						</div>
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kutis</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>churidar kurta</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>salwar</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>printed sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>	
						</div>
					</div>
				</section>

				<section  class="sky-form">
					<h4>brand</h4>
					<div class="row1 scroll-pane">
						<div class="col col-4">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>shree</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
						</div>
						<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>vishud</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>amari</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>																								
						</div>
					</div>
				</section>

				<section class="sky-form">
					<h4>colour</h4>
					<ul class="w_nav2">
						<li><a class="color1" href="#"></a></li>
						<li><a class="color2" href="#"></a></li>
						<li><a class="color3" href="#"></a></li>
						<li><a class="color4" href="#"></a></li>
						<li><a class="color5" href="#"></a></li>
						<li><a class="color6" href="#"></a></li>
						<li><a class="color7" href="#"></a></li>
						<li><a class="color8" href="#"></a></li>
						<li><a class="color9" href="#"></a></li>
						<li><a class="color10" href="#"></a></li>
						<li><a class="color12" href="#"></a></li>
						<li><a class="color13" href="#"></a></li>
						<li><a class="color14" href="#"></a></li>
						<li><a class="color15" href="#"></a></li>
						<li><a class="color5" href="#"></a></li>
						<li><a class="color6" href="#"></a></li>
						<li><a class="color7" href="#"></a></li>
						<li><a class="color8" href="#"></a></li>
						<li><a class="color9" href="#"></a></li>
						<li><a class="color10" href="#"></a></li>
					</ul>
				</section>

				<section class="sky-form">
					<h4>discount</h4>
					<div class="row1 scroll-pane">
						<div class="col col-4">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
						</div>
						<div class="col col-4">
							<label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
							<label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
						</div>
					</div>						
				</section>
			</div>
		</div>

		<div class="col-md-9 w_content">
			<div class="women">
				
				<div class="clearfix"></div>
				<?php
					$query = "SELECT * FROM producto";

					$result = mysqli_query($conexion, $query);

					$numeroProductos = mysqli_num_rows($result);
					$numeroLotes = 4;

					$numeroPaginas = ceil($numeroProductos/$numeroLotes);

					if (!isset($_GET['page'])) {
				?>
					<div class="feature feature-icon-hover indent first">
						<a href="subcategoria.php?subcategoria=<?php echo $subcategoria ?>&page=1" title=""><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i>Anterior</a>
						<a href="subcategoria.php?subcategoria=<?php echo $subcategoria ?>&page=2" title="" class="pull-right"><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>Siguiente</a>
					</div>
				<?php
					} else {
						$pagina = $_GET['page'];
						if ($pagina==1) {
							$next = $pagina+1;
							$prev = 1;
						} else {
							if ($pagina == $numeroPaginas) {
								$next = $pagina;
								$prev = $pagina-1;
							} else {
								$next = $pagina+1;
								$prev = $pagina-1;
							}
							
							
						}
				?>
					<div class="feature feature-icon-hover indent first">
						<a href="subcategoria.php?subcategoria=<?php echo $subcategoria ?>&page=<?php echo $prev ?>" title=""><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i>Anterior</a>
						<a href="subcategoria.php?subcategoria=<?php echo $subcategoria ?>&page=<?php echo $next ?>" title="" class="pull-right"><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>Siguiente</a>
					</div>
				<?php
					}
					
				?>
							
							
				<?php    	
						
				?>
			</div>
			<br>
			<br>
			<!-- grids_of_4 -->
			<div class="grids_of_4">
			<?php 
				if (!isset($_GET['page'])) {
					$pagina = 1;
				} else {
					$pagina = $_GET['page'];
				}
				
				if ($pagina <= 1) {
					$limit = 0;
				} else {
					$limit = $numeroLotes*($pagina-1);
				}

				$consulta = "SELECT *  FROM producto LIMIT $limit, $numeroLotes";
				$resultado = mysqli_query($conexion, $consulta);
				while ($fila = mysqli_fetch_array($resultado)) {
			?>
				<div class="grid1_of_4 simpleCart_shelfItem">
					<div class="content_box">
						<a href="../content/product.php?idprod=<?php echo $fila['idProducto'] ?>">
							<div class="view view-fifth">
								<img src="../../images/celular/mini.jpg" class="img-responsive" alt=""/>
								<div class="mask1">
									<div class="info"> </div>
								</div>
							</div>
						</a>	

						<h6><a href="single.html"> <b><?php echo $fila['nombrePortada'] ?></b> </a></h6>
						<div class="size_1">
							<span class="item_price">S/.<?php echo $fila['precio'] ?></span>
							<div class="clearfix"></div>
						</div>

						<div class="size_2">
							<!--<div class="size_2-left"> 
								<input type="text" class="item_quantity quantity_1" value="1" />
							</div>-->
							<input type="button" data-add="<?php echo $fila[0]; ?>" class="item_add add3" value="Agregar carrito"/>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			<?php 
				}

			 ?>
				
				<div class="clearfix"></div>
			</div>
			<!-- end grids_of_4 -->

		</div>		
		
		<!-- start content -->
		<div class="clearfix"></div>
		<!-- end content -->

	</div>
</div>

<div class="footer">
	<div class="container">
		<div class="footer_top">
		<?php 
			require '../footer.html';
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

<script type="text/javascript" src="../../js/simpleCart.min.js"> </script>
<script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../../js/megamenu.js"></script>
<script type="text/javascript" src="../../js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script>
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

	$(function()
	{
		$('.scroll-pane').jScrollPane();
	});
</script>
<script type="text/javascript" src="../../notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../../misJs/cartQuantity2.js"></script>
<script type="text/javascript" src="../../misJs/cartShop.js"></script>
<script type="text/javascript" src="../../misJs/checkout.js"></script>

</body>
</html>		