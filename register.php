<?php 
	 session_start();
	 $inicioSesion = isset($_SESSION['id']);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Registro</title>
	<link rel="icon" href="images/swarbox.ico"/>
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
<div class="header_top">
	<div class="container">
         		<div class="cssmenu">
			<ul class="ul-left">
				<li class="active"><a href="about.php">Nosotros</a></li> 
				<li><a href="contact.html">Contactanos	</a></li> 
			</ul>
			<ul class="ul">
				<li>
					<div class="box_1-cart">
						<div class="box_11">
							<a href="checkout.html">
						  		<h4>
						  			<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						  			<p class="carts">
						  				<span id="simpleCart_quantity" class="simpleCart_quantity"></span>
						  			</p>
						  			<div class="clearfix"> </div>
						  		</h4>
						  	</a>
						</div>
				  		<div class="clearfix"> </div>
					</div>
				</li>
				<?php if (!$inicioSesion) {?>
					<li class="active"><a href="login.php">Iniciar Sesion</a></li> 
				<?php } else { ?>	
					<li>
						<div class="box_1-cart">
							<div class="box_11">
								<a href="checkout.html">
							  		<h4>
							  			<i class="fa fa-user" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Mi cuenta"></i>
							  			<div class="clearfix"> </div>
							  		</h4>
							  	</a>
							</div>
					  		<div class="clearfix"> </div>
						</div>
					</li>	
					<li>
						<div class="box_1-cart">
							<div class="box_11">
								<a href="checkout.html" data-toggle="tooltip" data-placement="right" title="Pedidos">
							  		<h4>
							  			<i class="fa fa-truck" aria-hidden="true"></i>
							  			<div class="clearfix"> </div>
							  		</h4>
							  	</a>
							</div>
					  		<div class="clearfix"> </div>
						</div>
					</li>	
					<li class="active">
						<div class="box_1-cart">
							<div class="box_11">
								<a href="script/logout.php" data-toggle="tooltip" data-placement="right" title="Salir">
							  		<h4>
							  			<i class="fa fa-power-off" aria-hidden="true"></i>
							  			<div class="clearfix"> </div>
							  		</h4>
							  	</a>
							</div>
					  		<div class="clearfix"> </div>
						</div>
					</li>	
				<?php } ?>
			</ul>
		</div>
	</div>
</div>

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

		<div class="clearfix"></div>
	</div>
</div>

<div class="border-box"></div>

<div class="single_top">
	<div class="container">
		<?php if (!$inicioSesion) {?> 
			<h1>
				<B>CREAR CUENTA</B>
				<div class="border-title"></div>
			</h1>
		
			<div class="colum-left">
				<div class="register">
					<form id="register-form" autocomplete="off"> 
						<div class="register-top-grid">
							<h3>INFORMACIÓN PERSONAL</h3>
							<div>
								<span>NOMBRES <label>*</label></span>
								<input type="text" id="first" name="first"> 
							</div>
							<div>
								<span>APELLIDOS <label>*</label></span>
								<input type="text" id="last" name="last"> 
							</div>
							<div>
								<span>DNI <label>*</label></span>
								<input type="text" maxlength="8" id="dni" name="dni"> 
							</div>
							<div>
								<span>TELEFONO <label>*</label></span>
								<input type="text" maxlength="9" id="phone" name="phone"> 
							</div>
							<!--	
							<div class="clearfix"> </div>
							<a class="news-letter" href="#">
								<label class="checkbox">
									<input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter
								</label>
							</a> 
							-->
						</div>
						
						<div class="register-bottom-grid">
						    <h3>INFORMACION DE INICIO DE SESIÓN</h3>
						    <div>
								<span>EMAIL <label>*</label></span>
								<input type="text" id="email" name="email">
							</div>

							
							<div class="clearfix block"> </div>

							<div>
								<span>CONTRASEÑA <label>*</label></span>
								<input type="password" id="password" name="pwd">
							</div>
							
							<div>
								<span>CONFIRMAR CONTRASEÑA <label>*</label></span>
								<input type="password" id="repeatpwd" name="repeatpwd">
							</div>
							<div class="clearfix"> </div>
						</div>
					

						<div class="clearfix"> </div>
						<div class="register-but">
							 <button type="submit" id="btn-register" class="registrar">Registrar</button>
							<div class="clearfix"> </div>
						</div>

					</form>
				</div>
			</div>

			<div class="colum-right">
				<img src="images/default/icono-registro.png" class="img-content">
			</div>
		<?php } else { ?>
			<div class="noLogin">
				<img src="images/default/noPage.png">
				<div class="clearfix"> </div>
				<a type="button" href="script/logout.php" class="logout"><button><b>Cerrar Sesion</b></button></a>
			</div>
		<?php } ?>

	    
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
<script type="text/javascript" src="misJs/registerClient.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>		