<?php 
	include '../BaseDatos/conexion.php';
	$idprod = $_GET['idprod'];
 ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	 <!-- Indicators -->
	<ol class="carousel-indicators">

	<?php 
		$prodimage = mysqli_query($conexion, "SELECT * FROM productoimage WHERE idProducto = ".$idprod." LIMIT 4");
		$numero = mysqli_num_rows($prodimage);

		$i = 0;
		while ($i < $numero) {
			
	?>
		<li data-target="#myCarousel" data-slide-to="<?= $i; ?>" 

		<?php if ($i == "0"): ?>
			class = "active"
		<?php endif ?>

		></li>

	<?php 
			$i++;}
	 ?>

 	</ol>

 	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<?php 

			$i = 0;
			$image = mysqli_query($conexion, "SELECT * FROM productoimage WHERE idProducto = ".$idprod." LIMIT 4");
			while($fila = mysqli_fetch_row($image)){
				
		?>
		<div class="item <?php if ($i == "0"){ echo "active"; 	}?>">
			<div align="center">
				<img src="Script/images/<?= $fila[2] ?>" alt="">
			</div>
			
		</div>
		<?php $i++;} ?>
		
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>

 </div>