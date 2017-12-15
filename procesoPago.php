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
	<title>Procesar pago</title>
	<link rel="icon" href="images/swarbox.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- CSS -->
	<link href="css/select2.min.css" rel="stylesheet" type='text/css' />
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<style>
		.frase{
			margin-bottom: 17em;
		    font-weight: bold;
		    color: black;
		    text-align: right;
		}
		.register-content{
			margin-top: 0.8em;
		}
		.cont-body{
			margin-bottom: 1em;
		}
		.tab-content{
			margin-top: 1em;
		}
		.form-group{
			    margin-bottom: 4em;
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
				<input type="text" id="search"  name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">

				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"></div>
			</div>
	 		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div class="container cont-body">
	<div class="check">	 
		<h1>Proceso de Compra </h1>
		<div class="register-content">
			<ul class="nav nav-tabs ">
				<li class="active" style="pointer-events: none;">
					<a  data-toggle="tab1">Categoría de tu producto</a>
				</li>
				<li style="pointer-events: none;">
					<a  data-toggle="tab2">Informacion de tu producto</a>
				</li>
			</ul>
		</div>

		<form id="product-register" method="post" accept-charset="utf-8">

			<div class="tab-content">

				<div class="tab-pane active" id="Tab1">
					<div class="clearfix">

						<div class="col-sm-6">
							<div class="col-xs-12" >
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>Departamento</b> </label>

									<div class="col-xs-9">
										<select class="form-control departamento" style="width: 100%;"  id="departamento">
				                          <option value=""></option>
				                          <?php 
				                            $depa = mysqli_query($conexion, 'SELECT * FROM departamento');
				                            while($fila = mysqli_fetch_row($depa)){
				                          ?>
				                          <option value= "<?=$fila[0]?>"> <?=$fila[1]?> </option>
				                          <?php } ?>                                             
				                        </select>
									</div>


								</div>
							</div>


							<div class="col-xs-12" >
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>Provincia</b> </label>

									<div class="col-xs-9">
										<select class="form-control provincia" style="width: 100%;"  name="provincia" id="provincia">
				                            <option value=""></option>
				                        </select>
									</div>

									
								</div>
							</div>


							<div class="col-xs-12" >
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>Distrito</b> </label>

									<div class="col-xs-9">
										<select class="form-control distrito" style="width: 100%;"  id="distrito" name="recogoDistrito" >
					                      <option value=""></option>
					                    </select>
									</div>

									
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="col-xs-12" >
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>Dirección</b> </label>

									<div class="col-xs-9">
										<input type="text" id="name" name="name" class="form-control text1" />
									</div>


								</div>
							</div>


							<div class="col-xs-12" >
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>Referencia</b> </label>

									<div class="col-xs-9">
										<input type="text" id="name" name="name" class="form-control text1" />
									</div>

									
								</div>
							</div>


							<div class="col-xs-12" >
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>Telefono</b> </label>

									<div class="col-xs-9">
										<input type="text" id="name" name="name" class="form-control text1" />
									</div>

									
								</div>
							</div>
						</div>


					</div>

					<div style="margin-top: 3em; float: right; ">
						<a  href="producto_catalogo.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
						<button type="button" id="Next1" data-toggle="tab" href="#Tab2" style="width: 150px;" class="btn btn-primary" disabled><i class="fa fa-arrow-circle-right"></i> Siguiente</button>
					</div>
				</div>

				

				<div class="tab-pane" id="Tab2">

					<div class="clearfix">


					</div>

					<div style="margin-top: 3em; float: right; ">
						<a  href="producto_catalogo.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
						<button type="button" id="Previous2" data-toggle="tab" href="#Tab1" class="btn btn-primary" ><i class="fa fa-arrow-circle-left"></i> Atras</button>
						<!-- <button type="submit" id="Next4" data-toggle="tab" href="#Tab5" style="width: 150px;" class="btn btn-primary" disabled><i class="fa fa-arrow-circle-right"></i> Siguiente</button> -->
						<button type="submit" id="process" data-toggle="tab" class="btn btn-primary" disabled><i class="fa fa fa-check-circle"></i> Subir imagenes</button>
					</div>
			</div>
		</div>
	</form>	
		
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
<script type="text/javascript" src="js/select2.full.min.js"></script>
<script type="text/javascript" src="misJs/validate.js"></script>
<script type="text/javascript" src="misJs/message.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="misJs/cartQuantity.js"></script>
<script type="text/javascript" src="misJs/checkout.js"></script>
<script type="text/javascript" src="misJs/procesoPago.js"></script>



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