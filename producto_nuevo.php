<?php
include 'BaseDatos/conexion.php';
session_start();
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
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

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
							
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h3 class="header smaller lighter blue">Nuevo producto</h3>
								<div class="table-header">
									Registro de un producto
								</div>

								<div class="register-content">
									<ul class="nav nav-tabs ">

										<li class="active" style="pointer-events: none;">
											<a  data-toggle="tab1">Categoría de tu producto</a>
										</li>
										<li style="pointer-events: none;">
											<a  data-toggle="tab2">Informacion de tu producto</a>
										</li>
										<li style="pointer-events: none;">
											<a  data-toggle="tab3">Información adicional de tu producto <i class="fa"></i></a>
										</li>
										<li style="pointer-events: none;">
											<a  data-toggle="tab4">Precios de tu producto <i class="fa"></i></a>
										</li>
										<li style="pointer-events: none;">
											<a  data-toggle="tab5">Imagenes de tu producto <i class="fa"></i></a>
										</li>

									</ul>

							    <form action="Script/RegGenAnuncio.php"  method="post" id="formulario" autocomplete="off">

							      <div class="tab-content">

									<div class="tab-pane active" id="Tab1">

										<div class="clearfix">

											<div style=" border-bottom: 1px dotted #CCC; margin-bottom: 1em;">
												<p>Por favor, seleccione la categoria principal para su producto</p>
											</div>

								            <div class="first-select">
												<select name="categoria" id="categoria" multiple>
													<?php 
														$resultSet = mysqli_query($conexion, 'SELECT * FROM categoria WHERE enable = 1');
														while($fila = mysqli_fetch_array($resultSet)){
													?>
													<option value="<?php echo $fila[0]; ?>"><?php echo $fila[1] ?></option>
													<?php }	?>
												</select>
											</div>

											<div class="select-subcategoria">
												<select name="subcategoria" id="subcategoria" multiple>
													
												</select>
											</div>

											<div class="select-marca">
												<select name="marca" id="marca" multiple>
													
												</select>	
											</div>
										</div>

										<div style="margin-top: 1em; float: right; ">
											<a  href="GenIndex.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
											<button type="button" id="Next1" data-toggle="tab" href="#Tab2" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> Siguiente</button>
										</div>

							        </div>

							        <div class="tab-pane" id="Tab2">


								    

							          <div class="tab2">
							            <a  href="GenIndex.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
							            <button type="button" id="Previous2" data-toggle="tab" href="#Tab1" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Atras</button>
							            <button type="button" id="Next2" data-toggle="tab" href="#Tab3" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> Siguiente</button>
							          </div>
							        </div>

							        <div class="tab-pane" id="Tab3">

							          <div style=" border-bottom: 1px dotted #CCC;  margin-top: 30px; font-size: 20px;">
							            <p align="center" style="font-family: Agency FB;"><b>DESCRIPCIÓN DE UNIDADES...</b></p>
							          </div>

							          <div style="float: left;width: 44%;padding-left: 52px;">
							            <div class="col-xs-12" >
							              <div class="form-group has-feedback">
							                <h5 class="control-label">Cantidad Unidades: </h5> 
							                <div class="input-group">
							                 
							                  <input type="text" class="form-control" name="unidadCantidad">
							                  <div class="input-group-addon">
							                    Unidades
							                  </div>
							                </div>
							              </div>
							            </div>


							            <div class="col-xs-12" >
							              <div class="form-group has-feedback">
							                <h5 class="control-label">Tipo de Unidad: </h5>         
							                <input type="text" class="form-control"  name="tipoUnidad">
							                <span class="fa fa-truck" style="top: 38px; right: 0; width: 34px; position: absolute;"></span>   
							              </div>
							            </div>
							           
							          </div>

							          <div style="float: right; width: 45%">
							            <div class="col-xs-12" >
							              <div class="form-group has-feedback">
							                <h5 class="control-label">Requisitos de la Unidad: </h5>         
							                <textarea  style="width:100%; height:150px; resize:none; border-radius: 5px;" name="RequisitoUnidad" id="RequisitoUnidad"></textarea>
							              </div>
							            </div>
							          </div>

							        
							            <div class="tab3">
							            <a  href="GenIndex.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
							            <button type="button" id="Previous3" data-toggle="tab" href="#Tab2" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Atras</button>
							            <button type="button" id="Next3" data-toggle="tab" href="#Tab4" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> Siguiente</button>
							          </div>
							        </div>

							        <div class="tab-pane" id="Tab4">

							          <div style=" border-bottom: 1px dotted #CCC;  margin-top: 30px; font-size: 20px;">
							            <p align="center" style="font-family: Agency FB;"><b>DESCRIPCIÓN DEL PRECIO...</b></p>
							          </div>

							          <div class="col-xs-6" >
							            <div class="form-group has-feedback">
							              <h5 class="control-label">Forma de Pago: </h5>         
							              <div class="has-feedback">
							                <select class="form-control" name="forma" id="forma" style=" width: 75%;">
							                  <option value="Contado">Contado</option>
							                  <option value="Credito">Credito</option>
							                </select>
							              </div>
							            </div>

							            <div class="form-group has-feedback">
							              <h5 class="control-label">Tipo de Moneda: </h5>         
							              <div class="has-feedback">
							                <select class="form-control" name="tipo" id="tipo" style=" width: 75%;">
							                  <option value="sol">Soles</option>
							                  <option value="dolar">Dolares</option>
							                </select>
							              </div>
							            </div>

							            <div class="form-group has-feedback">
							              <h5 class="control-label">Monto de Pago: </h5> 
							              <div class="input-group" style=" width: 75%;">
							                <div class="input-group-addon" id="mon">
							                  S/.
							                </div>
							                <input type="text" class="form-control" name="monto"  onkeypress="return NumCheck(event, this);">
							              </div>

							              <input type="checkbox" name="portn"> Por tonelada <br>

							              <div class="form-group" id="CantDias" style="display:none">
							                <h5 class="control-label">Cantidad de dias: </h5>
							                <input type="text" class="form-control" name="dias" style=" width: 75%;" >
							              </div>
							            </div>

							          </div>

							          <div class="col-xs-6" >           
							            <div class="form-group has-feedback"> 
							              <h5 class="control-label">Seleccione: </h5>   
							              <input type="checkbox" name="igv"> Incluye Igv <br>
							              <input type="checkbox" name="seguro"> Tiene seguro de Carga
							            </div>

							          </div>

							          
							          <div class="tab4" >
							            <a  href="GenIndex.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
							            <button type="button" id="Previous4" data-toggle="tab" href="#Tab3" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Atras</button>
							            <button type="submit"  id="submit" style="width: 150px;" class="btn btn-success" OnClick="return confirm('¿Esta seguro que los datos son correctos?');"><i class="fa fa fa-check-circle"></i> Enviar</button>
							          </div>
							        </div>

							        <div class="tab-pane" id="Tab4">

							          <div style=" border-bottom: 1px dotted #CCC;  margin-top: 30px; font-size: 20px;">
							            <p align="center" style="font-family: Agency FB;"><b>DESCRIPCIÓN DEL PRECIO...</b></p>
							          </div>

							          <div class="col-xs-6" >
							            <div class="form-group has-feedback">
							              <h5 class="control-label">Forma de Pago: </h5>         
							              <div class="has-feedback">
							                <select class="form-control" name="forma" id="forma" style=" width: 75%;">
							                  <option value="Contado">Contado</option>
							                  <option value="Credito">Credito</option>
							                </select>
							              </div>
							            </div>

							            <div class="form-group has-feedback">
							              <h5 class="control-label">Tipo de Moneda: </h5>         
							              <div class="has-feedback">
							                <select class="form-control" name="tipo" id="tipo" style=" width: 75%;">
							                  <option value="sol">Soles</option>
							                  <option value="dolar">Dolares</option>
							                </select>
							              </div>
							            </div>

							            <div class="form-group has-feedback">
							              <h5 class="control-label">Monto de Pago: </h5> 
							              <div class="input-group" style=" width: 75%;">
							                <div class="input-group-addon" id="mon">
							                  S/.
							                </div>
							                <input type="text" class="form-control" name="monto"  onkeypress="return NumCheck(event, this);">
							              </div>

							              <input type="checkbox" name="portn"> Por tonelada <br>

							              <div class="form-group" id="CantDias" style="display:none">
							                <h5 class="control-label">Cantidad de dias: </h5>
							                <input type="text" class="form-control" name="dias" style=" width: 75%;" >
							              </div>
							            </div>

							          </div>

							          <div class="col-xs-6" >           
							            <div class="form-group has-feedback"> 
							              <h5 class="control-label">Seleccione: </h5>   
							              <input type="checkbox" name="igv"> Incluye Igv <br>
							              <input type="checkbox" name="seguro"> Tiene seguro de Carga
							            </div>

							          </div>

							          
							          <div class="tab4" >
							            <a  href="GenIndex.php" class="btn btn-danger" style="width: 150px;"  OnClick="return confirm('¿Desea salir y perder los datos del envío?');"> <i class="fa fa-times-circle"></i> Cancelar</a>
							            <button type="button" id="Previous4" data-toggle="tab" href="#Tab3" style="width: 150px;" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Atras</button>
							            <button type="submit"  id="submit" style="width: 150px;" class="btn btn-success" OnClick="return confirm('¿Esta seguro que los datos son correctos?');"><i class="fa fa fa-check-circle"></i> Enviar</button>
							          </div>
							        </div>
							      </div>

							    </form>
	
								</div>
							</div>
						</div>
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

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
<script src="assets/js/bootstrap.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>


<!-- Own scripts -->
<script src="misJs/producto.js"></script>
</body>
</html>
