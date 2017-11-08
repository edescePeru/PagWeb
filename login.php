<?php 
	 session_start();
	 $inicioSesion = isset($_SESSION['id']);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Inicio Sesion</title>
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
		<div class="register">
			<?php if (!$inicioSesion) {?>
				<div class="col-md-6 login-right">
				  	<h3>Iniciar Sesión</h3>
					<form id="register-login" autocomplete="off">
						<div>
							<span>EMAIL<label>*</label></span>
							<input type="text" id="email" name="email"> 
						</div>
						<div>
							<span>CONTRASEÑA<label>*</label></span>
							<input type="password" id="pwd" name="pwd"> 
						</div>
						<div>
							<a class="forgot" href="#">¿Olvidaste tu contraseña?</a>	
						</div>
						  
						<button type="submit" id="btn-login">Iniciar Sesion</button>
					</form>
				</div>
				
				<div class="col-md-6 login-left">
					<h3>Nuevo Cliente</h3>
				  	<div class="colum-left">
						<p>Al crear una cuenta en <b>Edesce Store</b> podrás acceder a promociones únicas que te llegarán a tu correo, realizar el servicio de pago de manera rápida, revisar y realizar seguimiento de tus pedidos y mucho más...</p>
						<a class="acount-btn" href="register.php"><b>Crear una cuenta</b></a>
					 </div>
					 <div class="colum-right">
						<img src="images/default/login.png" class="img-content">
					</div>
				</div>	
				<div class="clearfix"> </div>
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
<script type="text/javascript" src="misJs/login.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
</body>
</html>		