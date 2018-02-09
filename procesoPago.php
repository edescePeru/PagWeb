<?php 
	include 'BaseDatos/conexion.php'; 
	session_start();
	$inicioSesion = isset($_SESSION['id']);

	if ($inicioSesion) {
		$user = $_SESSION['user'];
		$email = $_SESSION['email'];
	}

	$query = mysqli_query($conexion, "SELECT DISTINCT * FROM carrito C 
                        INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
                        INNER JOIN producto P ON DC.idProducto = P.idProducto
                        INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
                        INNER JOIN marca M ON M.idMarca = P.idMarca
                        WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1");
	$total = mysqli_num_rows($query);
	if($total <= 0) { header('Location:checkout.php');}
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
	<link href="css/style2.css" rel='stylesheet' type='text/css' />
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
		<h1 class="id" id="<?= $_SESSION['id'] ?>">Informacion del pedido </h1>
		<div class="col-sm-9">

			<div class="panel panel-default">
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
				?>
				<div class="panel-heading">
					<div class="row"> 
						<div class="col-sm-9 panel-tittle">
							<i class="fa fa-truck" aria-hidden="true"> </i> Direccion de envio
						</div>
						<div class="col-sm-3">
							<?php if ($total <= 0) { ?>
								<button type="button" id="registrar" data-toggle="tab" href="#Tab2" style="width: 150px;" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> Guardar Direccion</button>
							<?php }else{ ?>
								<button type="button" id="editar" style="width: 150px;" class="btn btn-danger"> <i class="fa fa-pencil-square-o"></i>Editar Direccion</button>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<?php
						if ($total <= 0) {
					?>
					<form id="form-address" method="post" accept-charset="utf-8">
						<div class="row address-register">
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
					</form>
					<?php }else{ 
						while($fila = mysqli_fetch_array($resultSet)){
					?>
					<div>
						<div class="col-sm-6" style="    border-right: 1px dashed #dad7d7;">
							<div class="form-group details">
							    <label class="control-label col-sm-6 details-tittle">Cliente:</label>
								<div class="col-sm-6 details-body" >
									<p id="cliente"><?= $fila['nombre'] ?> <?= $fila['apellidos'] ?></p>
							    </div>
							</div>
							<div class="form-group details">
							    <label class="control-label col-sm-6 details-tittle">Telefono Principal:</label>
								<div class="col-sm-6 details-body" >
									<p id="phone1"> <?= $fila['telefono1'] ?></p>
							    </div>
							</div>
							<div class="form-group details">
							    <label class="control-label col-sm-6 details-tittle">Telefono Secundario:</label>
								<div class="col-sm-6 details-body" >
									<p id="phone2"><?php $fila['telefono2'] ?></p>
							    </div>
							</div>
						</div>																	
						<div class="col-sm-6">
							<div class="form-group details">
							    <label class="control-label col-sm-6 tittle-address">Direccion:</label>
								<div class="col-sm-6 body-address" >
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
					<?php }} ?>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row"> 
						<div class="col-sm-9 panel-tittle">
							<i class="fa fa-shopping-basket " aria-hidden="true"> </i> Productos pedidos
						</div>
					</div>
				</div>
				<div class="panel-body">	
				 	<?php 
						include 'BaseDatos/conexion.php'; 
					 	$query = "SELECT DISTINCT DC.idCarrito, P.idProducto, P.nombrePortada , M.nombre , DC.cantidad, DC.precio, S.nombre, P.image, P.stock FROM carrito C 
			                        INNER JOIN detacarrito DC ON C.idCarrito = DC.idCarrito
			                        INNER JOIN producto P ON DC.idProducto = P.idProducto
			                        INNER JOIN subcategoria S ON S.idSubCategoria = P.idSubCategoria
			                        INNER JOIN marca M ON M.idMarca = P.idMarca
			                        WHERE C.idCliente = ".$_SESSION['id']." AND C.sold = 1";
						$result = mysqli_query($conexion, $query);
						$data = [];

						$cantidad = mysqli_num_rows($result);

						if ($cantidad>0) {
							while ($fila = mysqli_fetch_array($result)) {
								array_push($data, [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]]);
							}
						}else{
					?>
					<div class="frase">
						TU CARRITO ESTA VACÍO. ¡AGRÉGALE TUS PRODUCTOS FAVORITOS Y 
						DISFRUTA DEL PLACER DE SEGUIR COMPRANDO!...
					</div>
					<?php
						}

						//echo count($data);
						//var_dump($data);

						for ($i=0; $i <count($data) ; $i++) { 
							for($j=$i+1;$j<=count($data)-1;$j++) {	
								if($data[$i][1]==$data[$j][1]){
									$data[$j]['borrar']=true;
								}
							}
						}
						//var_dump($data);

						for ($i=0; $i <count($data) ; $i++) { 
							if (!isset($data[$i]['borrar'])) {
					?>
					<div class="cart-header">
						<div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item small-image">
								<img src="Script/images/<?php echo $data[$i][7] ?>" class="img-responsive" alt=""/>
									
							</div>
							<div class="cart-item-info small-details">
								<h3><a href="#"><?php echo $data[$i][2] ?></a><span>Marca: <?php echo $data[$i][3] ?></span></h3>
								<ul class="qty">
									<li><p><b>Precio:</b> S/. <?php echo $data[$i][5] ?></p></li>
									<li><div>Cantidad: </div><p data-cantidad='<?php echo $data[$i][1] ?>'><?php echo $data[$i][4] ?></p></li>
								</ul>		
							</div>
							<div class="clearfix"></div>
															
						</div>
					</div> 
					<?php 
							}
						}	
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
				<div class="panel panel-default total-cart">
					<div class="panel-body">
						<div class="price-details">
							<h3 style="text-align: center;"><b>DETALLE DE COMPRA</b></h3>
							<span><b>Total</b></span>
							<span id="subtotal" class="total1">gfdgdfg</span>
							<span><b>Descuento</b></span>
							<span id="discount" class="total1">---</span>
							<span><b>Envío</b></span>
							<span id="delivery" class="total1">dfgdf</span>
							<div class="clearfix"></div>				 
						</div>	
						<div class="price-total">
							<span><b>TOTAL</b></span>
							<span id="total" class="total1">dfgdf</span>
							<div class="clearfix"></div>				 
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<a href="#" class="order" href="">Ver estado compra</a>
				<!-- <form id="formPayU" action="https://checkout.payulatam.com/ppp-web-gateway-payu/" method="POST">
				 -->
				 <form id="formPayU" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" method="POST">
				
				  <input name="merchantId"    type="hidden"  value=""   >
				  <input name="accountId"     type="hidden"  value="" >
				  <input name="description"   type="hidden"  value=""  >
				  <input name="referenceCode" type="hidden"  value="" >
				  <input name="amount"        type="hidden"  value=""   >
				  <input name="tax"           type="hidden"  value=""  >
				  <input name="taxReturnBase" type="hidden"  value="" >
				  <input name="currency"      type="hidden"  value="" >
				  <input name="signature"     type="hidden"  value=""  >
				  <input name="test"          type="hidden"  value="" >
				  <input name="buyerEmail"    type="hidden"  value="" >
				  <input name="responseUrl"    type="hidden"  value="" >
				  <input name="confirmationUrl"    type="hidden"  value="" >
				  <input name="shippingAddress" type="hidden" value="" > 
				  <input name="shippingCity" type="hidden" value="" > 
				  <input name="shippingCountry" type="hidden" value="" > 
				  <input name="Submit"        type="submit"  value="Realizar pago" >

				</form>
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

<div id="modal-direccion" class="modal fade" tabindex="-1">
	<div class="modal-dialog direccion">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="smaller lighter blue no-margin"><b><div id="proceso" class="proceso">Nueva</div> Direccion</b></h4>
			</div>
			
			<form class="form-horizontal" role="form" id="form-edit-address">
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

<div id="modal-voucher" class="modal fade" tabindex="-1">
	<div class="modal-dialog direccion small">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="smaller lighter blue no-margin"><b><div id="proceso" class="proceso">Nueva</div> Direccion</b></h4>
				<form class="form-horizontal" role="form" id="form-voucher">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label class="control-label no-padding-right address">Centro de pago:</label>	
															
									<input type="text" class="form-control" id="centro" name="centro" value="">
								</div>
							
								<div class="form-group">
									<label class="control-label no-padding-right address">Monto:</label>								
									<input type="text" class="form-control" id="monto" name="monto">
								</div>
								<div class="form-group">
									<label class="control-label no-padding-right address">Voucher:</label>								
									<input accept="image/x-png,image/jpeg" type="file" class="form-control" id="voucher" name="voucher">
								</div>
								<div class="form-group">
									<label class="control-label no-padding-right address">Nro. operacion:</label>
									<input type="text" class="form-control" id="operacion" name="operacion" value="">
								</div>
								<div class="form-group">
									<label class="control-label no-padding-right address">Fecha:</label>
									<input type="date" class="form-control" id="fecha" name="fecha" value="">
								</div>
								
							</div>	
							
						</div>					
					</div>

					<div class="modal-footer">
						<button id="btn-voucher" class="btn btn-primary pull-rigth" >
							<i class="ace-icon fa fa-save"></i>
							<b>Guardar</b>
						</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
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