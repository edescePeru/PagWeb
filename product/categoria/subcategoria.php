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
	<title><?= str_replace("_"," ",$subcategoria); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- CSS -->
	<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../css/font-awesome.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	
	<style>
		
	</style>

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
				<input type="text" name="s" class="textbox" id="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
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
				<img src="../../images/BANNER TECNOLOGIA.jpg" height="1123" width="281" alt="">
			</div>
		</div>

		<div class="col-md-9 w_content">
			<div class="women">
				
				<div class="clearfix"></div>
				<?php
					$query = "SELECT * FROM producto WHERE stock>0";

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

				$subcateg = str_replace("_"," ",$subcategoria);

				$consulta = "SELECT P.idProducto, left(P.nombrePortada,80) as nombrePortada, P.precio, 
							SC.nombre, P.image
								FROM producto P
								JOIN subcategoria SC ON P.idSubCategoria = SC.idSubCategoria
								WHERE SC.nombre =  '".$subcateg."' and P.enable = 1 AND P.stock>0";
				/*LIMIT $limit, $numeroLotes*/
				$resultado = mysqli_query($conexion, $consulta);
				while ($fila = mysqli_fetch_array($resultado)) {
			?>
				<div class="grid1_of_4 simpleCart_shelfItem">
					<div class="content_box">
						<a href="../content/product.php?idprod=<?php echo $fila['idProducto'] ?>">
							<div class="view view-fifth">
								<img src="../../Script/images/<?= $fila['image'] ?>" class="img-responsive" alt=""/>
								<div class="mask1">
									<div class="info"> </div>
								</div>
							</div>
						</a>

						<div class="body-description">
							<a href="../content/product.php?idprod=<?php echo $fila['idProducto'] ?>">
								<div class="descripcion">
									<h6><b><?php echo $fila['nombrePortada'] ?>...</b></h6>
								</div>
								<div class="size_1">
									<span class="item_price">S/.<?php echo $fila['precio'] ?></span>
									<div class="clearfix"></div>
								</div>
							</a>

							<!-- <div class="size_2"> -->
								<!--<div class="size_2-left"> 
									<input type="text" class="item_quantity quantity_1" value="1" />
								</div>-->
								<!-- <input type="button" data-add="<?php echo $fila[0]; ?>" class="item_add add3" value="Agregar carrito"/>
								<div class="clearfix"> </div>
							</div> -->
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

</body>
</html>		