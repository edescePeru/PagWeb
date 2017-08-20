<!DOCTYPE HTML>
<html>
<head>
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

	<style type="text/css">
		.border-box{
			border-bottom: 1px solid rgb(236, 236, 236);
		}

		label{
			color: red;
		}

		.single_top {
		    margin: 3em 0 3em 5em;
		}

		.colum-left{
			float: left; 
			width: 60%
		}

		.colum-right{
			float: right; 
			width: 40%
		}
		.clearfix.block{
			height: 67px;
		}

		.border-title{
			border: 1px dashed rgb(236, 236, 236);
		}

		.single_top h1{
			margin-bottom: 25px;
			font-size: 25px;
		}


	</style>


</head>
<body>
<div class="header_top">
	<div class="container">
         		<div class="cssmenu">
         			<ul class="ul-left">
			    	<li class="active"><a href="about.html">Nosotros</a></li> 
			    	<li><a href="contact.html">Contactanos	</a></li> 
			</ul>
			<ul class="ul">
			    	<li class="active"><a href="login.html">Mi cuenta</a></li> 
			    	<li>
				    	<div class="box_1-cart">
						<div class="box_11">
							<a href="checkout.html">
						      		<h4>
						      			<img src="images/default/bag1.png" alt=""/>
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
			</ul>
		</div>
	</div>
</div>

<div class="header_bottom">
	<div class="container">
		<div class="col-xs-8 header-bottom-left">
			<div class="col-xs-3 logo">
				<h1><a href="index.html"><span>EDESCE</span>Store</a></h1>
			</div>
		</div>
			
		<div class="col-xs-4 header-bottom-right">
		</div>

		<div class="clearfix"></div>
	</div>
</div>


<div class="border-box"></div>

<div class="single_top">
	<div class="container"> 
	<h1>
		<B>CREAR CUENTA</B>
		<div class="border-title"></div>
	</h1>
	
		<div class="colum-left">
			<div class="register">
				<form> 
					<div class="register-top-grid">
						<h3>INFORMACIÓN PERSONAL</h3>
						<div>
							<span>NOMBRES <label>*</label></span>
							<input type="text"> 
						</div>
						<div>
							<span>APELLIDOS <label>*</label></span>
							<input type="text"> 
						</div>
						<div>
							<span>DNI <label>*</label></span>
							<input type="text" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"> 
						</div>
						<div>
							<span>TELEFONO <label>*</label></span>
							<input type="text" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"> 
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
							<input type="email">
						</div>

						
						<div class="clearfix block"> </div>

						<div>
							<span>CONTRASEÑA <label>*</label></span>
							<input type="password">
						</div>
						
						<div>
							<span>CONFIRMAR CONTRASEÑA <label>*</label></span>
							<input type="password">
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>

				<div class="clearfix"> </div>
				<div class="register-but">
					<form>
						<input type="submit" value="registrar">
						<div class="clearfix"> </div>
					</form>
				</div>
			</div>
		</div>

		<div class="colum-right">
			
		</div>

	    
	</div>
</div>     

<div class="footer">
	<div class="container">
	   <div class="footer_top">
		<div class="col-md-4 box_3">
			<h3>Our Stores</h3>
			<address class="address">
              <p>9870 St Vincent Place, <br>Glasgow, DC 45 Fr 45.</p>
              <dl>
                 <dt></dt>
                 <dd>Freephone:<span> +1 800 254 2478</span></dd>
                 <dd>Telephone:<span> +1 800 547 5478</span></dd>
                 <dd>FAX: <span>+1 800 658 5784</span></dd>
                 <dd>E-mail:&nbsp; <a href="mailto@example.com">info(at)buyshop.com</a></dd>
              </dl>
           </address>
           <ul class="footer_social">
			  <li><a href=""> <i class="fb"> </i> </a></li>
			  <li><a href=""><i class="tw"> </i> </a></li>
			  <li><a href=""><i class="google"> </i> </a></li>
			  <li><a href=""><i class="instagram"> </i> </a></li>
		   </ul>
		</div>
		<div class="col-md-4 box_3">
			<h3>Blog Posts</h3>
			<h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
			<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
			<h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
			<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
			<h4><a href="#">Sed ut perspiciatis unde omnis</a></h4>
			<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</p>
		</div>
		<div class="col-md-4 box_3">
			<h3>Support</h3>
			<ul class="list_1">
				<li><a href="#">Terms & Conditions</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Refunds</a></li>
				<li><a href="#">Track Order</a></li>
				<li><a href="#">Services</a></li>
			</ul>
			<ul class="list_1">
				<li><a href="#">Services</a></li>
				<li><a href="#">Press</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="footer_bottom">
			<div class="copy">
                <p>Copyright © 2015 Buy_shop. All Rights Reserved.<a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	        </div>
	    </div>
	</div>
</div>

<script type="text/javascript" src="js/simpleCart.min.js"> </script>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/megamenu.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script>
	$(document).ready(function(){
		$(".megamenu").megamenu();
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
</body>
</html>		