<div class="header_top">
	<div class="container">
		<div class="cssmenu">
			<ul class="ul-left">
				<li class="active"><a href="../../about.php">Nosotros</a></li> 
				<li><a href="../../contact.php">Contactanos	</a></li> 
			</ul>
			<ul class="ul">
				<li>
					<div class="box_1-cart">
						<div class="box_11">
							<a href="../../checkout.php">
						  		<h4>
						  			<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						  			<p class="carts">
						  				<span id="cart_quantity">0</span>
						  			</p>
						  			<div class="clearfix"> </div>
						  		</h4>
						  	</a>
						</div>
				  		<div class="clearfix"> </div>
					</div>
				</li>
				<?php if (!$inicioSesion) {?>
					<li class="active"><a href="../../login.php">Iniciar Sesion</a></li> 
				<?php } else { ?>	
					<li>
						<div class="box_1-cart">
							<div class="box_11">
								<a href="../../checkout.html">
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
								<a href="../../checkout.html" data-toggle="tooltip" data-placement="right" title="Pedidos">
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
								<a href="../../script/logout.php" data-toggle="tooltip" data-placement="right" title="Salir">
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
