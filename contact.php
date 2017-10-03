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
<title>Contacto</title>
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

<div class="single_top">
	<div class="container"> 		
		<div class="content-title">
			<h1 class="contact">Contáctanos</h1>
			<div class="line-title"></div>
		</div>	
		<div class="col-md-9 contact_left">
			<h3>por mensaje</h3>
	  		<form id="form-message">
				<div class="column_2">
					<?php if ($inicioSesion){ ?>
						<input type="text" class="name"  placeholder="Nombre" name="name" id="name" value="<?= $user; ?>" readonly>
						<input type="text" class="email"  placeholder="Email" name="email" id="email" value="<?= $email; ?>" readonly >
					<?php }else{ ?>
						<input type="text" class="name"  placeholder="Nombre" name="name" id="name">
						<input type="text" class="email"  placeholder="Email" name="email" id="email">
					<?php } ?>
					<input type="text" class="text"  placeholder="Asunto" name="Object" id="Object">
				
				</div>
				
				<div class="column_3">
					<textarea placeholder="Mensaje" name="message" name="message"></textarea>
				</div>

				<div class="form-submit1">
					<button type="submit" id="btn-message">Enviar Mensaje</button>
				</div>

				<div class="clearfix"> </div>
			</form>
		</div>
		
		<div class="col-md-3 contact_right">
			<h3>POR FACEBOOK</h3>
			<div class="fb-page" data-href="https://www.facebook.com/EdesceStore/" data-tabs="messages" data-small-header="false"  data-height="400" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/EdesceStore/" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/EdesceStore/">Edesce Store</a>
				</blockquote>
			</div>
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
<script type="text/javascript" src="misJs/message.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


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