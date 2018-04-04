<?php 
	 session_start();
	 include_once 'BaseDatos/conexion.php';
	 $inicioSesion = isset($_SESSION['id']);

	 $search = $_GET['search'];

	 //echo $subcategoria;
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Buscar</title>
	<link rel="icon" href="images/swarbox.ico"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<style>
		div.descripcion{
			height: 4em;
		}
		img.img-responsive{
			width: 150px;
			height: 200px;
		}
		.myButton {
		-moz-box-shadow: 0px 0px 0px 2px #ce1c2e;
		-webkit-box-shadow: 0px 0px 0px 2px #ce1c2e;
		box-shadow: 0px 0px 0px 2px #ce1c2e;
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ce1c2e), color-stop(1, #cf5965));
		background:-moz-linear-gradient(top, #ce1c2e 5%, #cf5965 100%);
		background:-webkit-linear-gradient(top, #ce1c2e 5%, #cf5965 100%);
		background:-o-linear-gradient(top, #ce1c2e 5%, #cf5965 100%);
		background:-ms-linear-gradient(top, #ce1c2e 5%, #cf5965 100%);
		background:linear-gradient(to bottom, #ce1c2e 5%, #cf5965 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ce1c2e', endColorstr='#cf5965',GradientType=0);
		background-color:#ce1c2e;
		-moz-border-radius:10px;
		-webkit-border-radius:10px;
		border-radius:10px;
		border:1px solid #ce1c2e;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:19px;
		padding:5px 37px;
		text-decoration:none;
		text-shadow:0px 1px 0px #bf9da0;
		width: 180px;
	}
	.myButton:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #cf5965), color-stop(1, #ce1c2e));
		background:-moz-linear-gradient(top, #cf5965 5%, #ce1c2e 100%);
		background:-webkit-linear-gradient(top, #cf5965 5%, #ce1c2e 100%);
		background:-o-linear-gradient(top, #cf5965 5%, #ce1c2e 100%);
		background:-ms-linear-gradient(top, #cf5965 5%, #ce1c2e 100%);
		background:linear-gradient(to bottom, #cf5965 5%, #ce1c2e 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#cf5965', endColorstr='#ce1c2e',GradientType=0);
		background-color:#cf5965;
	}
	.myButton:active {
		position:relative;
		top:1px;
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
				<input type="text" id="search" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
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
				<div class="feature feature-icon-hover indent first">
				<?php 
					$queryMarca = "SELECT m.idMarca, m.nombre 
					FROM marca m
					WHERE m.enable=1";
					$resultMarca = mysqli_query($conexion, $queryMarca);

					while ($filaMarca = mysqli_fetch_array($resultMarca)) {
				?>
					<a href="search.php?search=<?php echo $search ?>&orden=1&$page=1&marca=<?php echo $filaMarca["idMarca"] ?>" title="" class="myButton"><?php echo $filaMarca["nombre"] ?></a>
					<br><br>
				<?php
					}
				?>
				</div>
			</div>
		</div>

		<div class="col-md-9 w_content">
		<div class="women">
				
			<div class="clearfix"></div>
			<?php
				
				if (!isset($_GET['orden'])) {
					if (!isset($_GET['marca'])) {
				?>
					<div class="feature feature-icon-hover indent first">
						<a href="search.php?search=<?php echo $search ?>&orden=1&marca=3" title=""><i class="fa fa-chevron-up pull-left" aria-hidden="true"></i>De menor a mayor</a>
						<a href="search.php?search=<?php echo $search ?>&orden=2&marca=3" title="" class="pull-right"><i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>De mayor a menor</a>
					</div>
				<?php	
					}else {
				?>
					<div class="feature feature-icon-hover indent first">
						<a href="search.php?search=<?php echo $search ?>&orden=1&marca=<?php echo $_GET['marca'] ?>" title=""><i class="fa fa-chevron-up pull-left" aria-hidden="true"></i>De menor a mayor</a>
						<a href="search.php?search=<?php echo $search ?>&orden=2&marca=<?php echo $_GET['marca'] ?>" title="" class="pull-right"><i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>De mayor a menor</a>
					</div>
				<?php
					}			
				} else {
					if (!isset($_GET['marca'])) {
				?>
					<div class="feature feature-icon-hover indent first">
						<a href="search.php?search=<?php echo $search ?>&orden=1&marca=3" title=""><i class="fa fa-chevron-up pull-left" aria-hidden="true"></i>De menor a mayor</a>
						<a href="search.php?search=<?php echo $search ?>&orden=2&marca=3" title="" class="pull-right"><i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>De mayor a menor</a>
					</div>
				<?php	
					}else {
				?>
				<div class="feature feature-icon-hover indent first">
					<a href="search.php?search=<?php echo $search ?>&orden=1" title=""><i class="fa fa-chevron-up pull-left" aria-hidden="true"></i>De menor a mayor</a>
					<a href="search.php?search=<?php echo $search ?>&orden=2" title="" class="pull-right"><i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>De mayor a menor</a>
				</div>
			<?php
					}
				}
			?>
		</div>
		<br>
		<br>
		
		<?php
			$query = "SELECT * FROM producto WHERE nombrePortada LIKE '%".$search."%' AND stock>0";

			$result = mysqli_query($conexion, $query);

			$numeroProductos = mysqli_num_rows($result);
			$numeroLotes = 4;

			$numeroPaginas = ceil($numeroProductos/$numeroLotes);
		?>
			
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
					// HAcer un if que pregunte por $orden y haga una consulta desc precio o asc precio
					if (isset($_GET['orden'])) {
						if ($_GET['orden'] == 1) {
							if (!isset($_GET['marca'])) {
								$consulta = "SELECT idProducto, left(nombrePortada, 80) as nombrePortada, precio, image  FROM producto WHERE nombrePortada LIKE '%".$search."%' AND stock>0 ORDER BY precio ASC LIMIT $limit, $numeroLotes ";
								
							} else {
								// De mayor a menor
								$consulta = "SELECT idProducto, left(nombrePortada, 80) as nombrePortada, precio, image  
								FROM producto WHERE idMarca=".$_GET['marca']." AND nombrePortada LIKE '%".$search."%' AND stock>0 ORDER BY precio ASC LIMIT $limit, $numeroLotes ";
								
							}
					
						} else {
							// De menor a mayor
							if (!isset($_GET['marca'])) {
								$consulta = "SELECT idProducto, left(nombrePortada, 80) as nombrePortada, precio, image  
								FROM producto WHERE nombrePortada LIKE '%".$search."%' AND stock>0 ORDER BY precio DESC LIMIT $limit, $numeroLotes";

							} else {
								$consulta = "SELECT idProducto, left(nombrePortada, 80) as nombrePortada, precio, image  
								FROM producto WHERE idMarca=".$_GET['marca']." AND nombrePortada LIKE '%".$search."%' AND stock>0 ORDER BY precio DESC LIMIT $limit, $numeroLotes";

							}
					
						}
						
					} else {
						if (!isset($_GET['marca'])) {
							$consulta = "SELECT idProducto, left(nombrePortada, 80) as nombrePortada, precio, image  FROM producto WHERE nombrePortada LIKE '%".$search."%' AND stock>0 LIMIT $limit, $numeroLotes";
							
						} else {
							$consulta = "SELECT idProducto, left(nombrePortada, 80) as nombrePortada, precio, image  
							FROM producto WHERE idMarca=".$_GET['marca']." AND nombrePortada LIKE '%".$search."%' AND stock>0 LIMIT $limit, $numeroLotes";
							
						}
					
					}
					
					$resultado = mysqli_query($conexion, $consulta);
					while ($fila = mysqli_fetch_array($resultado)) {
				?>
				<div class="grid1_of_4 simpleCart_shelfItem">
					<div class="content_box">
						<a href="product/content/product.php?idprod=<?php echo $fila['idProducto'] ?>">
							<div class="view view-fifth">
								<img src="Script/images/<?php echo $fila['image'] ?>" class="img-responsive" alt=""/>
								<div class="mask1">
									<div class="info"> </div>
								</div>
							</div>
						</a>	

						<div class="descripcion">
							<h6><a href="single.html"> <b><?php echo $fila['nombrePortada'] ?> ...</b> </a></h6>
					
						</div>
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
				
			</div>
			<!-- end grids_of_4 -->
			<div class="women">
				
				<div class="clearfix"></div>
				<?php
					
					if (!isset($_GET['page'])) {	
						if (!isset($_GET['marca'])) {	
							?>
								<div class="feature feature-icon-hover indent first">
									<a href="search.php?search=<?php echo $search ?>&page=1" title=""><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i>Anterior</a>
									<a href="search.php?search=<?php echo $search ?>&page=2" title="" class="pull-right"><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>Siguiente</a>
								</div>
							<?php
						} else {
							?>
								<div class="feature feature-icon-hover indent first">
									<a href="search.php?search=<?php echo $search ?>&page=1" title=""><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i>Anterior</a>
									<a href="search.php?search=<?php echo $search ?>&page=2" title="" class="pull-right"><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>Siguiente</a>
								</div>
							<?php
						}	
				
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
						if (!isset($_GET['marca'])) {
							?>
								<div class="feature feature-icon-hover indent first">
									<a href="search.php?search=<?php echo $search ?>&page=<?php echo $prev ?>" title=""><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i>Anterior</a>
									<a href="search.php?search=<?php echo $search ?>&page=<?php echo $next ?>" title="" class="pull-right"><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>Siguiente</a>
								</div>
							<?php
						} else {
							?>
								<div class="feature feature-icon-hover indent first">
									<a href="search.php?search=<?php echo $search ?>&page=<?php echo $prev ?>&marca=<?php echo $_GET['marca'] ?>" title=""><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i>Anterior</a>
									<a href="search.php?search=<?php echo $search ?>&page=<?php echo $next ?>&marca=<?php echo $_GET['marca'] ?>" title="" class="pull-right"><i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>Siguiente</a>
								</div>
							<?php
						}

				
					}
					
				?>
			</div>
			<br>
			<br>

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
			require 'product/footer.html';
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
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
<script type="text/javascript" src="notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="misJs/cartQuantity.js"></script>
<script type="text/javascript" src="misJs/cartShop2.js"></script>

</body>
</html>		