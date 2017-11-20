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
	<title>EdesceStore</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- CSS -->
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
		.tabs-left{
		  border-bottom: none;
		  padding-top: 2px;
		}
		.tabs-left {
		  border-right: 1px solid #ddd;
		}
		.tabs-left>li {
		  float: none;
		  margin-bottom: 2px;
		}
		.tabs-left>li {
		  margin-right: -1px;
		}
		.tabs-left>li.active>a,
		.tabs-left>li.active>a:hover,
		.tabs-left>li.active>a:focus {
		  border-bottom-color: #ddd;
		  border-right-color: transparent;
		}
		.tabs-left>li>a {
		  border-radius: 4px 0 0 4px;
		  margin-right: 0;
		  display:block;
		}
		h3.account{
			text-transform: uppercase;
			font-weight: bold;
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

<div class="single_top">
	<div class="container"> 
		<div class="box_4">
	  		<div class="acount_left">
	  			<div class="content-title">
					<h3 class="account">Mi Cuenta</h3>
					<div class="line-title"></div>
				</div>	

				<div class="row" style="min-height:300px;">

				<div class="row affix-row">
				    <div class="col-sm-3 affix-sidebar">
						<div class="sidebar-nav">
							<div class="navbar navbar-default" role="navigation">
						    	<div class="navbar-header">
							      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
							      <span class="sr-only">Toggle navigation</span>
							      <span class="icon-bar"></span>
							      <span class="icon-bar"></span>
							      <span class="icon-bar"></span>
							      </button>
							      <span class="visible-xs navbar-brand">Sidebar menu</span>
						    	</div>
						    	<div class="navbar-collapse collapse sidebar-navbar-collapse">
						      		<ul class="nav navbar-nav" id="sidenav01">
						        		<!-- <li class="active">
								        	<a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
								        		<h4>Control Panel <br> <small>IOSDSV <span class="caret"></span></small></h4>
								          	</a>
									        <div class="collapse" id="toggleDemo0" style="height: 0px;">
									        	<ul class="nav nav-list">
									            	<li><a href="#">ProfileSubMenu1</a></li>
									            	<li><a href="#">ProfileSubMenu2</a></li>
									            	<li><a href="#">ProfileSubMenu3</a></li>
									            </ul>
									        </div>
								        </li> -->
								        <li class="active">
								          	<a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
									        	<span class="glyphicon glyphicon-cloud"></span> Submenu 1 <span class="caret pull-right"></span>
									        </a>
									        <div class="collapse" id="toggleDemo" style="height: 0px;">
									        	<ul class="nav nav-list">
									            	<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
									                <li><a href="#profile" data-toggle="tab">Profile</a></li>
									                <li><a href="#messages" data-toggle="tab">Messages</a></li>
									                <li><a href="#settings" data-toggle="tab">Settings</a></li>
									            </ul>
									        </div>
								        </li>
						        
						        	<!-- <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li> -->
						      	</div>
							</div>
						</div>
					</div>
					<div class="col-sm-9 affix-content">
						<div class="tab-content">
			                <div class="tab-pane active" id="home">Home Tab.</div>
			                <div class="tab-pane" id="profile">Profile Tab.</div>
			                <div class="tab-pane" id="messages">Messages Tab.</div>
			                <div class="tab-pane" id="settings">Settings Tab.</div>
			            </div>
					</div>
				</div>



		        <!-- <div class="col-xs-3">
		            <ul class="nav nav-tabs tabs-left">
		                <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
			                <ul class="nav nav-tabs tabs-left">
				                <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
				                <li><a href="#profile" data-toggle="tab">Profile</a></li>
				                <li><a href="#messages" data-toggle="tab">Messages</a></li>
				                <li><a href="#settings" data-toggle="tab">Settings</a></li>
				            </ul>
		                <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li>
		                <li><a href="#messages" data-toggle="tab">Messages</a></li>
		                <li><a href="#settings" data-toggle="tab">Settings</a></li>
		            </ul>
		        </div> -->
		        <!-- <div class="col-xs-9">
		            <div class="tab-content">
		                <div class="tab-pane active" id="home">Home Tab.</div>
		                <div class="tab-pane" id="profile">Profile Tab.</div>
		                <div class="tab-pane" id="messages">Messages Tab.</div>
		                <div class="tab-pane" id="settings">Settings Tab.</div>
		            </div>
		        </div> -->
		        <div class="clearfix"></div>
		    </div>

				 	
			</div>
	  		<div class="clearfix"> </div>
		</div>
    </div>

</div>  
<div class="clearfix"></div>

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
<script type="text/javascript" src="misJs/cartQuantity2.js"></script>
<script type="text/javascript" src="misJs/checkout.js"></script>


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

<script type="text/javascript" src="notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="misJs/cartQuantity.js"></script>
<script type="text/javascript" src="misJs/cartShop2.js"></script>

</body>
</html>