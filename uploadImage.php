<?php
include 'BaseDatos/conexion.php';
session_start();

$idprod = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>EDESCE - Admin</title>

	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
	<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

<!-- 	<style>
		.acotacion{
			color: #a7a7a7;
			font-size: 0.9em;
			font-weight: bold;
		}

		input{
			    width: 100%;
		}

		textarea{
			resize: none
		}

		@media (min-width: 768px){
			label.col-sm-3 {
			    width: 22%;
			}
		}
	</style> -->	

	<style type="text/css" media="screen">
		.register-content{
			margin-top: 0.8em;
		}

		select[multiple]{
			height: 24em;
			width: 19em;
		}

		select[id="subcategoria"]{
			margin-left: 1em;
			margin-right: 1em;
		}

		select[id="categoria"]{
			margin-left: 0;
		}


		select[id="subcategoria"], select[id="marca"]{
			display: none;
		}

		.first-select, .select-subcategoria{
			float: left;
		}

		.tab-content{
			overflow: auto;
		}

		div.cat-sub p, div.cat-sub b{
			float: left;
		}

		div.cat-sub b{
			margin-left: 0.5em;
    		margin-right: 0.5em;
		}

		.page-content>.row .col-xs-12{
			margin-top: 1.3em;
		}

		.btn-outline-secondary {
		    color: #868e96;
		    background-color: transparent;
		    background-image: none;
		    border-color: #868e96;
		    border: 1px solid rgba(0, 0, 0, 0.27);
		}

	button.btn.btn-kv.btn-default.btn-outline-secondary > i.glyphicon {
	       font-size: 14px;
	    	color: black;
	        top: 3px;
	}

	</style>

	
    
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

	<?php include 'Script/navbar.php'; ?>
</div>

<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>

	<?php include 'Script/sideBar.php'; ?>
	
	<?php if ($idprod != '' || $idprod != 'undefined'): ?>
		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="panel.php">Inicio</a>
						</li>

						<li>
							<a href="productos.php">Productos</a>
						</li>

						<li class="active">Nuevo</li>
					</ul><!-- /.breadcrumb -->
				</div>

				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</div>

						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<div class="pull-left">
										<select id="skin-colorpicker" class="hide">
											<option data-skin="no-skin" value="#438EB9">#438EB9</option>
											<option data-skin="skin-1" value="#222A2D">#222A2D</option>
											<option data-skin="skin-2" value="#C6487E">#C6487E</option>
											<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
										</select>
									</div>
									<span>&nbsp; Choose Skin</span>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
									<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
									<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
									<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
									<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
									<label class="lbl" for="ace-settings-add-container">
										Inside
										<b>.container</b>
									</label>
								</div>
							</div><!-- /.pull-left -->

							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
									<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
									<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
									<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
								</div>
							</div><!-- /.pull-left -->
						</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="row">
								<div class="col-xs-12">
									<h3 class="header smaller lighter blue">Nuevo producto</h3>
									<div class="table-header">
									<?php 
										$nameProd = mysqli_query($conexion, "SELECT nombre FROM producto WHERE idProducto = " .$idprod);
										if ($row = mysqli_fetch_row($nameProd)) {
									?>
										Subir las imagenes del producto: <b> <?= $row[0] ?> </b>
									<?php
										} 
									?>
										
									</div>

									<form enctype="multipart/form-data">
										<div class="row kv-main" style="width: 100%">
											<div class="col-md-10 col-md-offset-1">
												<br>
												<input id="file-es" name="file-es" type="file" multiple>
												<hr>
												<br>
											</div>
										</div>
									</form>	

								    
		
								</div>
							</div>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

	<?php endif ?>
	

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

				&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
			</div>
		</div>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->


<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery.2.1.1.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
	window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>


<!-- Own scripts -->
<script src="misJs/producto.js"></script>

<script src="js/plugins/sortable.js" type="text/javascript"></script>
<script src="js/fileinput.js" type="text/javascript"></script>
<script src="js/locales/fr.js" type="text/javascript"></script>
<script src="js/locales/es.js" type="text/javascript"></script>
<script src="themes/explorer/theme.js" type="text/javascript"></script>
<script>
    $('#file-es').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
        maxFileCount: 4,
        uploadUrl: 'Script/saveProducts.php',
    }); 

    $('#file-es').on('fileerror', function(event, data, msg) {
       console.log(data.id);
       console.log(data.index);
       console.log(data.file);
       console.log(data.reader);
       console.log(data.files);
       // get message
       alert(msg);
    });
    
</script>
</body>
</html>
