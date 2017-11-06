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
	<link href="../../css/product.css" rel="stylesheet">
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

<?php 
	$resultSet = mysqli_query($conexion, 'SELECT 
		P.idProducto, P.codigo, P.nombrePortada, P.modelo, P.stock, 
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
				<a href="#" style="pointer-events: none;"><?= $prod['Categoria'] ?></a> >> 
				<a href="../categoria/subcategoria.php?subcategoria=iphone"><?= $prod['Subcategoria'] ?></a>
			</li>
        </ul>
		<div class="single_grid">
			<div class="grid images_3_of_2">
				<ul id="etalage">
					<?php 
						$resultSet2 = mysqli_query($conexion, 'SELECT 
							P.idProducto, P.imagen
							FROM productoimage P 
							WHERE P.enable = 1 and P.idProducto = "'.$idprod.'"');
																	    
							while($imagen = mysqli_fetch_array($resultSet2)){
					?>
			
					<li>
						<img class="etalage_thumb_image" src="../../Script/images/<?= $imagen['imagen']; ?>" class="img-responsive" />
						<img class="etalage_source_image" src="../../Script/images/<?= $imagen['imagen']; ?>" class="img-responsive" title="" />
					</li>	

					<?php } ?>
					
				</ul>
				<div class="clearfix"></div>		
			</div> 

			<div class="desc1 span_3_of_2">
				<h5>Codigo:  <?= $prod['codigo'] ?></h5>
				<h1><?= $prod['nombrePortada'] ?></h1>
				<div class="subtittle">
					<ul>
						<li class="active"> 
							<div id="stock"><?= $prod['stock']; ?></div>
							<?php if ($prod['stock'] > 1){ echo 'unidades';} else{ echo 'unidad';} ?>
						</li>
						<li>
							<div class='starrr' id='star2' ></div>
							(<p id="number-start">
							<?php if ($prod['puntaje']>0): ?>
								<?= $prod['puntaje'] ?>
							<?php else: ?>
								0
							<?php endif ?>
							
							</p>)                			
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
							<!-- <div class="content-quantity">
								<p>Cantidad: </p>
								<div class="quantity">
									<button id="disminuir" class="disminuir">-</button>
									<input type="text" id="quantity" name="" value="1" placeholder="" readonly>
									<button id="incrementar" class="incrementar">+</button>
								</div>
							</div> -->
						   	<div class="clearfix"></div>
						</div>
						<!--<div class="single_but"><a href="" class="item_add btn_3" value=""></a></div>-->
						<div class="buy-box">
							<button class="buy-cart" data-add= <?= $idprod ?>><i class="fa fa-shopping-basket"></i> <b>Comprar</b></button>
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
        <!-- <div class="single_social_top">   
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
		</div> -->
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
							<h3><?= $prod['nombrePortada'] ?></h3>
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
															<input type="text" class="form-control" id="alias" name="alias" value="<?php if ($inicioSesion){ echo $_SESSION['user'];}?>">
														</div>
														<div class="form-group">
															<label>Correo electronico:</label>
															<input type="text" class="form-control" id="email" name="email" value="<?php if ($inicioSesion){ echo $_SESSION['email'];}?>">
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
			                			<p>
			                			<?php if ($prod['puntaje']>0): ?>
											<?= $prod['puntaje'] ?>
										<?php else: ?>
											0
										<?php endif ?>
										</p><p>/5</p>
									</div> <br>
									<div style="display: inline-flex; color: #616060; font-size: 0.9em;">
										<p>Basado en <div style="margin: 0 0.3em;"><b><?= $prod['cantidad'] ?></b></div> comentarios</p> 
									</div>
			 					</div>
							</div>

							<div class="desc1 part2">
								<?php 
									$resultSet1 = mysqli_query($conexion, 'SELECT 
										C.alias, C.puntaje, C.titulo, C.descripcion, C.fechaCreacion, 
										C.recomendar
										FROM producto P 
										JOIN comentario C ON C.idProducto = P.idProducto
										WHERE P.enable = 1 and P.idProducto = "'.$idprod.'"
										ORDER BY C.fechaCreacion DESC');
																	    
									while($comment = mysqli_fetch_array($resultSet1)){

										$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
								?>

									<div class="comment">
										<div class="comment-tittle">
											<div class="part-left">
												<p id="puntaje"><?= $comment['puntaje'] ?></p>
										    	<div id="html" class='starrr'></div>
										    	<label for=""><?= $comment['titulo'] ?></label>
											</div>
											<div class="part-rigth">
												<h5><?= date('d', strtotime($comment['fechaCreacion']))." / ".$meses[date('n',strtotime($comment['fechaCreacion']))-1]. " / ".date('Y',strtotime($comment['fechaCreacion'])) ;     ?></h5>

											</div>
								    		
								    	</div>
								    	<div class="comment-body">
								    		<h5>Comentado por <?= $comment['alias'] ?></h5>
								    		<p><?= $comment['descripcion'] ?></p>
								    		<div class="recomment">
								    		<?php if ($comment['recomendar'] == '1'){ ?>
								    			<i class="fa fa-thumbs-up" aria-hidden="true"></i> 
								    			<h5>Si, recomiendo este producto</h5>
								    		<?php }else{ ?>
								    			<h5>No, recomiendo este producto</h5>
								    			
								    		<?php } ?>
								    		</div>
								    	</div>
										
									</div>			

								<?php } ?>
							
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
	$(function() {
		var elementos = $("div#html");
		var puntajes = $("p#puntaje");


		for(i=0, j=0; i<elementos.length && j<puntajes.length; i++, j++) {
			$(elementos[i]).starrr({
					max: 5,
					rating: puntajes[j].innerHTML,
					readOnly: true
				});      
			$(puntajes[j]).css("display", "none");
        }    
	});
</script>
<script type="text/javascript" src="../../notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../../misJs/productoview.js"></script>
<script type="text/javascript" src="../../misJs/cartShop.js"></script>
<script type="text/javascript" src="../../misJs/cartQuantity2.js"></script>




</body>
</html>		