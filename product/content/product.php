<?php 
	 session_start();
	 include_once '../../BaseDatos/conexion.php';
	 $inicioSesion = isset($_SESSION['id']);

	 $idprod = $_GET['idprod'];

	 //echo $subcategoria;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Buy_shop an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Single :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Buy_shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

	<!-- CSS -->
	<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../css/font-awesome.min.css" rel="stylesheet" >
	<link href="../../css/etalage.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

<style type="text/css">
	.single_top {
	    margin: 0em 3em 3em 3em;
	}
	ul.back {
		padding-bottom: 0.5em;
		margin-bottom: 3em;
		border: 0;
	}
	ul.back li a{
		color: black;
	}
	.desc1 ul.description{
	    list-style-type: circle;
	    margin-left: 1.3em;
	}
	.desc1>h5{
   		color: #888;
   		text-align: right;
	}
	.single_top h1{
		margin-bottom: 0.2em;
		font-weight: 600;
		text-align: justify;
	}
	.images_3_of_2 {
    	width: 33.3%;product.php
    }
    .span_3_of_2 {
	    width: 36.3%;
	    margin-right: 2.1%;
	}
	.span_3_of_2 p[name="pa"]{
		margin-top: 2px;
	}
	.span_3_of_1{
		width: 25.3%;
	}
	.subtittle{
		border-bottom: 1px solid rgb(185, 184, 184);
		margin: 0.5em 0 1em 0;
		padding: 0 0 0.3em 0;
	}
	.subtittle>ul{
		display: inline-flex;
		font-size: 14.4px;
	}
	.subtittle>ul>li.active{
	    border-left: 0px;
		margin-right: 0.5em;
		display: inline-flex;
	}
	.subtittle>ul>li.active>div{
		margin-right: 5px;
	}
	.subtittle>ul>li{
		border-left: 1px dotted rgb(208, 208, 208);
    	margin-right: 10px;
    	display: inline-flex;
    	padding-left: 0.5em;
	}
	.subtittle>ul>li:first-child{
		padding-left: 0;
	}
	.prodetails{
		font-size: 13px;
	    margin: 1em 0 0 1.3em;
	    text-decoration: underline;
        display: block;
	}
	.price_single{
		margin: 2em 0 1em;
	}
	.head h2{
		font-size: 2em;
	}
	.cart-shop{
		background: #f1efef;
		border: 2px solid #eaeaea;
		padding: 0 0.5em 0 0.5em;
	}
	.content-quantity{
		display: inline-flex;
		margin-top: 2em;
	}
	.content-quantity>p{
		padding: 0.3em 0 0.3em 0;
	}
	.quantity{
		width: 7em;
		display: flex;
		margin-left: 1em;
	}
	.quantity>input{
		width: 3em;
    	text-align: center;
    	border-right: 0;
    	border-left: 0;
    	border-top: 1px solid #b1b1b1;
    	border-bottom: 1px solid #b1b1b1;
	}
	.quantity>button{
		background: #f54d56;
	    border: 1px solid #f54d56;
	    height: 2em;
	    outline: none;
	    color: white;
	    font-weight: bold;
	}
	.disminuir{
		border-radius: 5px 0 0 5px;
	}
	.incrementar{
		border-radius: 0 5px 5px 0;
	}
	.buy-cart{
		background: #f54d56;
	    border: 0;
	    color: white;
	    width: 100%;
	    padding: 0.5em 0 0.5em 0;
	    outline: none;
	    border-radius: 5px;
	}
	.buy-box{
		margin-bottom: 2em;
	}
	.import-points{
		border-top: 1px solid #eaeaea;
		padding: 0.5em;
		margin: 1em 0;
	}
	.import-points>div{
		font-size: 0.84em;
		margin: 0.5em 0;
	}
	.import-points>div>i{
		font-size: 18px;
	    height: 30px;
	    line-height: 32px;
	    margin-right: 0.33em;
	    text-align: center;
	    vertical-align: middle;
	    width: 30px;
	    color: #fff;
	    border-radius: 50%;
	    background-color: #f54d56;
	}
	.import-points>div>i:hover{
	    color: #f54d56;
	    background-color: #fff;
	    border: 1px solid #f54d56;
	}
	.h3.m_2{
		margin: 0em 0 2em;
	}

	/*.nav-tabs > li.active > a,
	.nav-tabs > li.active > a:hover,
	.nav-tabs > li.active > a:focus{
		background: #f54d56;
	    color: white;
	    border: 0;
	}*/

	.nav-tabs > li{
		width: 229.1px;
    	text-align: center;
	}
	.nav-tabs > li > a{
		color: gray;
	}
	.nav-tabs > li.active > a,
	.nav-tabs > li.active > a:hover,
	.nav-tabs > li.active > a:focus{ 
		border-radius: 0;
		color: black;
    	font-weight: 700;	    
	}
	.nav-tabs > li:first-child {
	    margin-bottom: -2px;
	    margin-left: 1em;
	}
	.tab-content{
		margin: 1em;
	}
	.tab-content > div > h3{
		margin-bottom: 1em;
	}
	.part1{
		width: 35%;
    	margin-right: 2.1%;
	}
	.part2{
		width: 50%;
    	margin-left: 4em;
	}
	.table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th{
		background-color: rgba(251, 52, 48, 0.02);
	}
	span.stars, span.stars span {
        display: block;
        background: url(../../images/default/start3.png) 0 -16px repeat-x;
        width: 75px;
        height: 16px;
      }
	.part1 span.stars, .part1 span.stars span {
    	zoom: 2.2;
    	margin: 2px 0.2em 0 0;
    }
    span.stars span {
        background-position: 0 0;
    }
    .start-promedio{
      	display: inline-flex;
    }
    .start-promedio p{
      	font-size: 2em;
    }
    .start-promedio p:nth-child(4){
      	color: rgb(175, 175, 187);
    }
    .btn-info{
		background-color: #f54d56;
    	border-color: #f54d56;
    	outline: none;
    }
    .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open .dropdown-toggle.btn-info{
    	background-color: #f54d56;
    	border-color: #f54d56;
    	outline: none;
    }

    .starrr a {
	    font-size: 16px;
	    padding: 0 1px;
	    cursor: pointer;
	    color: #FFD119;
	    text-decoration: none; 
	}

	div[id="star3"]{
		margin: 0.4em;
	}

	div[id="star3"] a, div[id="star1"] a{
		font-size: 2em;
	}

	div[id="star2"] a, div[id="star3"] a{
    	pointer-events: none;
	}

	.form-horizontal .form-group{
		margin: 0;
		margin-bottom: 0.5em;
	}

	.checkbox input{
		position: initial;
	}

	.modal-lg{
		width: 43em;
		text-align: center;
	}

	.form-horizontal{
		padding: 0 3em;
	}

	.form-group label{
		display: inline-flex;
	}

	.form-group label p{
		color: rgba(0, 0, 0, .5);
    	margin-left: 4px;
	}

	textarea{
		resize: none
	}

	.modal-body {
	    padding: 0 20px;
	}

	.modal-header{
		border: 0;
		text-transform: uppercase;
	}

	.modal-title{
		font-weight: bold;
	}

	.modal-footer{
		text-align: center;
	}

	.modal-footer button{
		width: 10em;
    	font-size: 15px;
	}

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
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
			</div>
			<div class="clearfix"></div>
		</div>

        		<div class="clearfix"></div>
	</div>
</div>

<?php 
	$resultSet = mysqli_query($conexion, 'SELECT 
		P.idProducto, P.codigo, P.nombre, P.modelo, P.stock, 
		P.precio, P.descripcionCorta, P.descripcionLarga, P.garantia, P.color, 
		P.contenidoCaja, P.largoCaja, P.anchoCaja, P.altoCaja, P.pesoCaja, 
		P.FechaCreacion, C.idCategoria, C.nombre as Categoria, P.idSubCategoria, SC.nombre as Subcategoria, 
		P.idMarca, M.nombre as Marca, P.idCliente, ROUND(AVG(Cm.puntaje)) AS puntaje, COUNT(Cm.idComentario) AS cantidad
		FROM producto P 
		JOIN subcategoria SC ON SC.idSubcategoria = P.idSubcategoria 
		JOIN categoria C ON SC.idCategoria = C.idCategoria 
		JOIN marca M ON M.idMarca = P.idMarca 
		JOIN comentario Cm ON Cm.idProducto = P.idProducto
		WHERE P.enable = 1 and P.idProducto = "'.$idprod.'"');
									    
	while($prod = mysqli_fetch_array($resultSet)){
?>
<div class="single_top">
	<div class="container"> 
		<ul class="back">
			<li>
				<i class="back_arrow"> </i>
				<a href="../categoria/subcategoria.php?subcategoria=iphone"><?= $prod['Categoria'] ?></a> >> 
				<a href="../categoria/subcategoria.php?subcategoria=iphone"><?= $prod['Subcategoria'] ?></a>
			</li>
        </ul>
		<div class="single_grid">
			<div class="grid images_3_of_2">
				<ul id="etalage">
					<li>
						<a href="optionallink.html">
							<img class="etalage_thumb_image" src="../../images/default/s1.jpg" class="img-responsive" />
							<img class="etalage_source_image" src="../../images/default/s1.jpg" class="img-responsive" title="" />
						</a>
					</li>
					<li>
						<img class="etalage_thumb_image" src="../../images/default/s2.jpg" class="img-responsive" />
						<img class="etalage_source_image" src="../../images/default/s2.jpg" class="img-responsive" title="" />
					</li>	
					<li>
						<img class="etalage_thumb_image" src="../../images/default/s3.jpg" class="img-responsive"  />
						<img class="etalage_source_image" src="../../images/default/s3.jpg"class="img-responsive"  />
					</li>
						  <li>
						<img class="etalage_thumb_image" src="../../images/default/s4.jpg" class="img-responsive"  />
						<img class="etalage_source_image" src="../../images/default/s4.jpg"class="img-responsive"  />
					</li>
				</ul>
				<div class="clearfix"></div>		
			</div> 

			<div class="desc1 span_3_of_2">
				<h5>Codigo:  <?= $prod['codigo'] ?></h5>
				<h1><?= $prod['nombre'] ?></h1>
				<div class="subtittle">
					<ul>
						<li class="active"> 
							<div id="stock"><?= $prod['stock']; ?></div>
							<?php if ($prod['stock'] > 1){ echo 'unidades';} else{ echo 'unidad';} ?>
						</li>
						<li>
							<div class='starrr' id='star2' ></div>
							(<p id="number-start"><?= $prod['puntaje'] ?></p>)                			
						</li>
						<li id="start"><a href="#section2" id="comentar">Califica tu experiencia</a></li>
					</ul>
				</div>
				

				<?php 
					/*$a = str_replace("\n","<br/>",$prod['descripcionCorta'], $i);*/

					$texto=$prod['descripcionCorta']; 
					//ahora le quitamos los "enter" de más 
					$texto=preg_replace("/\n+/","\n",$texto); 
					//Ahora metemos las lineas en un array 
					$lineas=explode("\n",$texto); 
					//Ahora le damos salida a cada linea como un bullet 
				?>

				<ul class="description">
				<?php foreach ($lineas as $bullet){  ?>
					<li><?=$bullet ?></li>
				<?php }  ?>
				</ul>
				<a class="prodetails" href="#section2" id="section">Mas detalle del producto</a>
			</div>

			<div class="desc1 span_3_of_1">
				
				<div class="cart-shop">
					<div class="simpleCart_shelfItem">
				    	<div class="price_single" style="text-align: center;">
				    		<div><p>Precio</p></div>
							<div class="head"><h2>S/. <?= $prod['precio'] ?> </h2></div>
							<div class="">
								
							</div>
							<div class="content-quantity">
								<p>Cantidad: </p>
								<div class="quantity">
									<button id="disminuir" class="disminuir">-</button>
									<input type="text" id="quantity" name="" value="1" placeholder="" readonly>
									<button id="incrementar" class="incrementar">+</button>
								</div>
							</div>
						   	<div class="clearfix"></div>
						</div>
						<!--<div class="single_but"><a href="" class="item_add btn_3" value=""></a></div>-->
						<div class="buy-box">
							<button class="buy-cart"><i class="fa fa-shopping-basket"></i> <b>Comprar</b></button>
						</div>     
					</div>
				</div>

				<div class="import-points">
					<div>
						<i class="fa fa-truck" aria-hidden="true"></i>Envio a todo el pais
					</div>
					<div>
						<i class="fa fa-users" aria-hidden="true"></i>Protecion al cliente
					</div>
					<div>
						<i class="fa fa-laptop" aria-hidden="true"></i>Productos nuevos
					</div>
					<div>
						<i class="fa fa-credit-card" aria-hidden="true"></i>Pagos seguros en efectivo y con tarjetas
					</div>
				</div>
			</div>


          	<div class="clearfix"></div>
		</div>
        <div class="single_social_top">   
			<h3 class="m_2">Related Products</h3>
				<div class="container">
			       	<div class="box_3">
			          	<div class="col-md-3">
			          		<div class="content_box">
			          			<a href="single.html">
						       		<img src="../../images/default/pic6.jpg" class="img-responsive" alt="">
								</a>
								</div>
								<h4><a href="single.html">Contrary to popular belief</a></h4>
								<p>$ 199</p>
							</div>
			          		<div class="col-md-3">
			          			<div class="content_box">
					  				<a href="single.html">
								 		<img src="../../images/default/pic2.jpg" class="img-responsive" alt="">
									</a>
								</div>
								<h4><a href="single.html">Contrary to popular belief</a></h4>
								<p>$ 199</p>
							</div>
			          		<div class="col-md-3">
			          			<div class="content_box">
			          				<a href="single.html">
										<img src="../../images/default/pic4.jpg" class="img-responsive" alt="">
									</a>
								</div>
							    <h4><a href="single.html">Contrary to popular belief</a></h4>
							    <p>$ 199</p>
						    </div>
			          		<div class="col-md-3">
			          			<div class="content_box">
			          				<a href="single.html">
										<img src="../../images/default/pic5.jpg" class="img-responsive" alt="">
									</a>
								</div>
								<h4><a href="single.html">Contrary to popular belief</a></h4>
								<p>$ 199</p>
							</div>
							<div class="clearfix"> </div>
			       	</div>
				</div>
		</div>
		<div class="main" id="section2">
			<section>
			    <div class="container">
					<ul class="nav nav-tabs">
						<li class="active">
							<a data-toggle="tab" href="#home">Informacion del producto</a>
						</li>
						<li><a data-toggle="tab" href="#menu1" >Caracteristicas	</a></li>
						<li><a data-toggle="tab" href="#menu2" >Comentarios</a></li>
					</ul>

					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<h3><?= $prod['nombre'] ?></h3>
							<?php 
								/*$a = str_replace("\n","<br/>",$prod['descripcionCorta'], $i);*/

								$texto=$prod['descripcionLarga']; 
								//ahora le quitamos los "enter" de más 
								$texto=preg_replace("/\n+/","\n",$texto); 
								//Ahora metemos las lineas en un array 
								$lineas=explode("\n",$texto); 
								//Ahora le damos salida a cada linea como un bullet 
							?>

							<?php foreach ($lineas as $bullet){  ?>
								<p><?=$bullet ?></p>
							<?php }  ?>
						</div>
						
						<div id="menu1" class="tab-pane fade">
			
							<div class="desc1 part1">
								<h4><b>Caracteristicas</b></h4>
								<table class="table table-striped">
								    <tbody>
								      <tr>
								        <td>Codigo del Producto</td>
								        <td><?= $prod['codigo'] ?></td>
								      </tr>
								      <tr>
								        <td>Modelo</td>
								        <td><?= $prod['modelo'] ?></td>
								      </tr>
								      <tr>
								        <td>Color</td>
								        <td><?= $prod['color'] ?></td>
								      </tr>
								      <tr>
								        <td> 
								        	<p style="float: left; margin-right: 2px">Tamaño</p> 
								        	<h5 style="padding-top: 0.3em; margin-bottom: 4px;">(cm)</h5>
								        	<h6>(Largo x Ancho x Alto)</h6>
								        </td>
								        <td><?= $prod['largoCaja'] .' x '. $prod['anchoCaja'] .' x '. 	$prod['altoCaja'] ?></td>
								      </tr>
								      <tr>
								        <td>
								        	<p style="float: left; margin-right: 2px">Peso</p> 
								        	<h5 style="padding-top: 0.3em; margin-bottom: 4px;">(kg)</h5>
								        </td>
								        <td><?= $prod['pesoCaja'] ?></td>
								      </tr>
								      <tr>
								        <td>Garantía</td>
								        <td><?= $prod['garantia'] ?></td>
								      </tr>
								      <tr>
								        <td>Condición</td>
								        <td>Nuevo</td>
								      </tr>
								    </tbody>
								</table>
							</div>

							<div class="desc1 part2">
								<h4><b>¿Qué contiene la caja?</b></h4>
								
								<table class="table table-striped">
								    <tbody>
								    <?php 
										/*$a = str_replace("\n","<br/>",$prod['descripcionCorta'], $i);*/

										$texto=$prod['contenidoCaja']; 
										//ahora le quitamos los "enter" de más 
										$texto=preg_replace("/\n+/","\n",$texto); 
										//Ahora metemos las lineas en un array 
										$lineas=explode("\n",$texto); 
										//Ahora le damos salida a cada linea como un bullet 
									?>

									<?php foreach ($lineas as $bullet){  ?>
										<tr>
								        	<td>
								        		<ul class="description">
								        			<li><?=$bullet ?></li>
								        		</ul>
								        		
								        	</td>
								      	</tr>
									<?php }  ?>
								      
								    </tbody>
								</table>
							</div>
						</div>
						<div id="menu2" class="tab-pane fade">
			 				<div class="desc1 part1">
			 					<div>
									<h4><b>¿Qué tal te pareció el producto?</b></h4>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="border-radius: 0;">Cuéntanos tu experiencia
										<i class="fa fa-commenting" aria-hidden="true" style="font-size: 1.3em;"></i>
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog modal-lg">
								    
										    <!-- Modal content-->
										    <div class="modal-content">
										    	<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
										        	<h4 class="modal-title">Escribe tu comentario</h4>
												</div>
												<form class="form-horizontal" id="form-comment">
													<div class="modal-body">
														<div class="form-group">
															<label>Califica:</label>
													    	<div class='starrr' id='star1'></div>
													    	<span class='choice' style="display: none;" id="points"></span>
														    <!-- <div>&nbsp;
														      <span class='your-choice-was' style='display: none;'>
														        <span class='choice'></span>.
														      </span>
														    </div> -->
														</div>
														<div class="form-group">
															<label>Alias:</label>
															<input type="text" class="form-control" id="alias" name="alias">
														</div>
														<div class="form-group">
															<label>Correo electronico:</label>
															<input type="text" class="form-control" id="email" name="email">
														</div>
														<div class="form-group">
															<label>Titulo <p>(opcional)</p>:</label>
															<input type="text" class="form-control" id="title" name="title">
														</div>
														<div class="form-group">
															<label>Cuentanos tu experiencia <p>(opcional)</p>:</label>
															<textarea class="form-control" rows="4" id="description" name="description"></textarea>
														</div>
														<div class="form-group">
															<label>¿Lo recomendarias?</label>
															<input type="radio" name="option" id="option" value="1"> Si
															<input type="radio" name="option" id="option" value="0"> No
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-success" id="comment">
															<b>Comentar</b>
														</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">
															<b>Cancelar</b>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
			 					<div style="margin-top: 2em;">
			 						<h4><b>Calificación Promedio</b></h4>

									<div class="start-promedio">
			                			<div class='starrr' id='star3' ></div>
			                			<p><?= $prod['puntaje'] ?></p><p>/5</p>
									</div> <br>
									<div style="display: inline-flex; color: #616060; font-size: 0.9em;">
										<p>Basado en <div style="margin: 0 0.3em;"><b><?= $prod['cantidad'] ?></b></div> comentarios</p> 
									</div>
			 					</div>
							</div>

							<div class="desc1 part2">
								<table>
								<?php 
									$resultSet1 = mysqli_query($conexion, 'SELECT 
										C.alias, C.puntaje, C.titulo, C.descripcion, C.fechaCreacion, 
										C.recomendar
										FROM producto P 
										JOIN comentario C ON C.idProducto = P.idProducto
										WHERE P.enable = 1 and P.idProducto = "'.$idprod.'"');
																	    
									while($comment = mysqli_fetch_array($resultSet1)){
								?>

							
								  <tr>
								    <td>
								    	<p id="puntaje"><?= $comment['puntaje'] ?></p>
								    	<div class='starrr' id='star4' ></div>
								    </td>
								  </tr>
								

									
								

							<?php } ?>
								</table>
							</div>


							
						</div>
					</div>
		    	</div>
			</section>
		</div>
   	</div>
</div>
<?php } ?>	
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
<script type="text/javascript" src="../../js/jquery.easydropdown.js"></script>
<script type="text/javascript" src="../../js/jquery.etalage.min.js"></script>
<script type="text/javascript" src="../../js/starrr.js"></script>
<script>
	$(document).ready(function(){
		$(".megamenu").megamenu();
		$('[data-toggle="tooltip"]').tooltip(); 


		$('#etalage').etalage({
				thumb_image_width: 300,
				thumb_image_height: 400,
				source_image_width: 900,
				source_image_height: 1200,
				show_hint: true,
				click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});
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

<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
<script type="text/javascript">

</script>
<script type="text/javascript" src="../../notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../../misJs/productoview.js"></script>




</body>
</html>		