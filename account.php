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
	<title>Mi Cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<style>
		
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
					<h3 class="account id" id="<?= $_SESSION['id'] ?>">Mi Cuenta</h3>
					<div class="line-title"></div>
				</div>	

				<div class="row" style="min-height:300px;">

				<div class="row affix-row">
				    <div class="col-sm-3 affix-sidebar">
						<div class="sidebar-nav">
							<div class="navbar navbar-default navbar-red" role="navigation">
						    	<div class="navbar-header">
							      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
							      <span class="sr-only">Toggle navigation</span>
							      <span class="icon-bar"></span>
							      <span class="icon-bar"></span>
							      <span class="icon-bar"></span>
							      </button>
							      <span class="visible-xs navbar-brand">Menu</span>
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
								        <li>
								          	<a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
									        	<span class="glyphicon glyphicon-cloud"></span> Mi cuenta <span class="caret pull-right"></span>
									        </a>
									        <div class="collapse" id="toggleDemo" style="height: 0px;">
									        	<ul class="nav nav-list">
									            	<li class="list-content">
									            		<a href="#datos" data-toggle="tab"><i class="fa fa-check-circle" aria-hidden="true"></i>Datos Personales</a>
									            	</li>
									                <li class="list-content">
									                	<a href="#address" data-toggle="tab"><i class="fa fa-check-circle" aria-hidden="true"></i>Direcciones de Entrega</a>
									                </li>
									                <li class="list-content">
									                	<a href="#pedidos" data-toggle="tab"><i class="fa fa-check-circle" aria-hidden="true"></i>Mis Pedidos</a>
									                </li>
									                <!-- <li class="list-content">
									                	<a href="#settings" data-toggle="tab"><i class="fa fa-check-circle" aria-hidden="true"></i>Settings</a>
									                </li> -->
									            </ul>
									        </div>
								        </li>

						        
						        		<!-- <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li> -->
						      		</ul>

						      	</div>
							</div>
						</div>
					</div>
					<div class="col-sm-9 affix-content">
						<div class="tab-content">
			                <div class="tab-pane" id="datos">
			                	<h3 class="header">Mis datos personales</h3>
			                	<a id="edit-cuenta" role="button" class="btn btn-success" >
									Editar Cuenta
								</a>
								<a id="change-password" role="button" class="btn btn-primary" >
									Cambiar contraseña
								</a>

								<?php 
									$resultSet = mysqli_query($conexion, 'SELECT *	FROM cliente WHERE enable = 1 and idCliente = "'.$_SESSION['id'].'"');
									    while($fila = mysqli_fetch_array($resultSet)){
								?>
								<div class="information">
									<div class="col-sm-6">
										<div class="form-group">
										    <label class="control-label col-sm-6">Nombre Completo:</label>
											<div class="col-sm-6" >
												<p id="nombre"><?= $fila['nombre'] ?></p>
										    </div>
										</div>
										<div class="form-group">
										    <label class="control-label col-sm-6">Apellido Completo:</label>
											<div class="col-sm-6" >
												<p id="apellido"><?= $fila['apellidos'] ?></p>
										    </div>
										</div>
										<div class="form-group">
										    <label class="control-label col-sm-6">Documento de Identidad:</label>
											<div class="col-sm-6" >
												<p id="dni"><?= $fila['docIdentidad'] ?></p>
										    </div>
										</div>
									</div>																	
									<div class="col-sm-6">
										<div class="form-group">
										    <label class="control-label col-sm-6">Telefono:</label>
											<div class="col-sm-6" >
												<p id="telefono"><?= $fila['telefono'] ?></p>
										    </div>
										</div>
										<div class="form-group">
										    <label class="control-label col-sm-6">Correo:</label>
											<div class="col-sm-6">
												<p><?= $fila['correo'] ?></p>
										    </div>
										</div>
									</div>
								</div>
								<?php } ?>
			                </div>
			                <div class="tab-pane" id="address">
								<h3 class="header">Mis direcciones</h3>
			                	<?php 
									$resultSet = mysqli_query($conexion, 'SELECT C.idCliente, C.nombre, C.apellidos, C.telefono, 
										DC.telefono1, DC.telefono2, DC.tipoDireccion, DC.direccion, DC.numero, DC.dpto, 
										DC.urbanizacion, DC.referencia, DC.idDistrito, D.descripcion as Distrito, D.idProvincia, 
										P.descripcion as Provincia, P.idDepartamento, DP.descripcion as Departamento 
										FROM cliente C
										JOIN direccioncliente DC ON C.idCliente = DC.idCliente
										JOIN distrito D ON DC.idDistrito = D.IdDistrito
										JOIN provincia P ON D.idProvincia = P.IdProvincia
										JOIN departamento DP ON P.idDepartamento = DP.IdDepartamento
										WHERE C.enable = 1 and C.idCliente = "'.$_SESSION['id'].'"');
									$total = mysqli_num_rows($resultSet);
									if ($total <= 0) {
								?>
			                	<a id="new-address" role="button" class="btn btn-primary" >
									Nueva Direccion
								</a>
								<?php }else{
									while($fila = mysqli_fetch_array($resultSet)){
								?>
			                	<a id="edit-address" role="button" class="btn btn-success" >
									Editar Direccion
								</a>
								<div class="information">
									<div class="col-sm-6">
										<div class="form-group">
										    <label class="control-label col-sm-6">Cliente:</label>
											<div class="col-sm-6" >
												<p id="cliente"><?= $fila['nombre'] ?> <?= $fila['apellidos'] ?></p>
										    </div>
										</div>
										<div class="form-group">
										    <label class="control-label col-sm-6">Telefono Principal:</label>
											<div class="col-sm-6" >
												<p id="phone1"> <?= $fila['telefono1'] ?></p>
										    </div>
										</div>
										<div class="form-group">
										    <label class="control-label col-sm-6">Telefono Secundario:</label>
											<div class="col-sm-6" >
												<p id="phone2"><?php $fila['telefono2'] ?></p>
										    </div>
										</div>
									</div>																	
									<div class="col-sm-6">
										<div class="form-group">
										    <label class="control-label col-sm-5">Direccion:</label>
											<div class="col-sm-7" >
												<p>
													<span id="address"><?= $fila['direccion'] ?></span> <br> 
													<span id="number"><?= $fila['numero'] ?></span> <br> 
													<?php if ($fila['dpto'] != ""){ ?>
														<span id="dpto"><?= $fila['dpto'] ?></span> <br>
													<?php } ?>
													<?php if ($fila['urbanizacion'] != ""){ ?>
														<span id="street"><?= $fila['urbanizacion'] ?></span> <br> 
													<?php } ?>													 
													<?php if ($fila['referencia'] != ""){ ?>
														<span id="referencia"><?= $fila['referencia'] ?></span> <br> 
													<?php } ?>													 
													<span id="typeaddress"><?= $fila['tipoDireccion'] ?></span> <br>
													<span class="distrito" id="<?= $fila['idDistrito'] ?>"><?= $fila['Distrito'] ?></span> - <span class="provincia" id="<?= $fila['idProvincia'] ?>"><?= $fila['Provincia'] ?></span> - <span class="departamento" id="<?= $fila['idDepartamento'] ?>"><?= $fila['Departamento'] ?></span>
												</p>
										    </div>
										</div>
									</div>
								</div>
								<?php } }?>
			                </div>
			                <div class="tab-pane" id="pedidos">Messages Tab.</div>
			                <!-- <div class="tab-pane" id="settings">Settings Tab.</div> -->
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

<!-- Modals-->
<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="smaller lighter blue no-margin"><b>Editar Datos Personales</b></h4>
			</div>
			
			<form class="form-horizontal" role="form" id="form-editCount">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Nombre</label>
						<div class="col-sm-9 ">
							<input type="text" class="form-control" id="first" name="first"> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Apellido</label>
						<div class="col-sm-9 ">
							<input type="text" class="form-control" id="last" name="last"> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Documento de Identidad</label>
						<div class="col-sm-9 ">
							<input type="text" class="form-control" id="docIdentity" name="docIdentity" style="margin: 10px 0;"> 
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Telefono</label>
						<div class="col-sm-9 ">
							<input type="text" class="form-control" id="phone" name="phone"> 
						</div>
					</div>					
				</div>

				<div class="modal-footer">
					<button id="edit-count" class="btn btn-primary pull-rigth" >
						<i class="ace-icon fa fa-save"></i>
						<b>Editar</b>
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modal-change" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="smaller lighter blue no-margin"><b>Cambiar contraseña</b></h4>
			</div>
			
			<form class="form-horizontal" role="form" id="form-changepwd">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Contraseña Actual: </label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="passnow" name="passnow"> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Contraseña Nueva: </label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="passnew" name="passnew"> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Repetir contraseña nueva: </label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="repeatpassnew" name="repeatpassnew" style="margin: 10px 0;"> 
						</div>
					</div>						
				</div>

				<div class="modal-footer">
					<button id="change-pwd" class="btn btn-primary pull-rigth" >
						<i class="ace-icon fa fa-save"></i>
						<b>Cambiar Contraseña</b>
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modal-direccion" class="modal fade" tabindex="-1">
	<div class="modal-dialog direccion">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="smaller lighter blue no-margin"><b><div id="proceso" class="proceso">Nueva</div> Direccion</b></h4>
			</div>
			
			<form class="form-horizontal" role="form" id="form-address">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label no-padding-right address">Teléfono/Celular:</label>	
								<?php $acceso = mysqli_query($conexion, "SELECT telefono FROM cliente
                                       WHERE idCliente = '".$_SESSION['id']."' ");
								    $telefono = mysqli_fetch_row($acceso);
								?>							
								<input type="text" class="form-control" id="phone1" name="phone1" value="<?= $telefono['0']?>">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Tipo de Direccion:</label>
								<select class="form-control" id="typeaddress" name="typeaddress">
									<option value="Casa">Casa</option>
									<option value="Departamento">Departamento</option>
									<option value="Condominio">Condominio</option>
									<option value="Oficina">Oficina</option>
									<option value="Local">Local</option>
									<option value="Centocomercial">Cento Comercial</option>
									<option value="Mercado">Mercado</option>
									<option value="Galeria">Galería</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Nro/Lote/Mz:</label>								
								<input type="text" class="form-control" id="number" name="number">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Ubanizacion <span>(opcional)</span>:</label>								
								<input type="text" class="form-control" id="street" name="street">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Departamento:</label>
								<select class="form-control" id="departamento" name="departamento">
									<option selected="selected" class="holder" value="0">Seleccionar departamento</option>
				                    <?php 
				                        $depa = mysqli_query($conexion, 'SELECT * FROM departamento');
				                        while($fila = mysqli_fetch_row($depa)){
				                    ?>
				                    	<option value= "<?=$fila[0]?>"> <?=$fila[1]?> </option>
				                    <?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Distrito:</label>
								<select class="form-control" id="distrito" name="distrito">
									<option selected="selected" class="holder" value="0">Seleccionar distrito</option>
								</select>
							</div>
							
						</div>	
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label no-padding-right address">Otro Teléfono/Celular <span>(opcional)</span>:</label>								
								<input type="text" class="form-control" id="phone2" name="phone2">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Direccion:</label>								
								<input type="text" class="form-control" id="address" name="address">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Dpto/Interior <span>(opcional)</span>:</label>								
								<input type="text" class="form-control" id="dpto" name="dpto">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Referencia <span>(opcional)</span>:</label>								
								<input type="text" class="form-control" id="referencia" name="referencia">
							</div>
							<div class="form-group">
								<label class="control-label no-padding-right address">Provincia:</label>
								<select class="form-control" id="provincia" name="provincia">
									<option selected="selected" class="holder" value="0">Seleccionar provincia</option>
								</select>
							</div>

						</div>
					</div>					
				</div>

				<div class="modal-footer">
					<button id="btn-address" class="btn btn-primary pull-rigth" >
						<i class="ace-icon fa fa-save"></i>
						<b>Guardar</b>
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
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
<script type="text/javascript" src="misJs/account.js"></script>

</body>
</html>