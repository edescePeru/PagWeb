$(document).ready(function(){

	$(document).on('click', '[data-add]', addCartShop);

});

function addCartShop () {
	event.preventDefault();
	var idProduct = $(this).data('add');
	var url = '../../Script/addCart.php';
	// Llamado ajax para agregar al carrito
	$.ajax({
		url: url,
		data: {idProduct:idProduct},
		method: 'POST'
	}).done(function( response ) {
		console.log(response);

		if(response.error) {
			console.log(response.message);
			
			if (response.clave == 'login') {
				$.notify({
					// options
					icon: 'fa fa-thumbs-down',
					title: 'Advertencia: ',
					message: response.message,
				},{
					type:'danger'
				});
				setTimeout(function(){ window.location = '../../login.php?back=1'; },2000);

			} else {
				$.notify({
					// options
					icon: 'ti-thumb-down',
					title: 'Advertencia',
					message: 'Turning standard Bootstrap alerts into "notify" like notifications',
				},{
					type:'info'
				});
			}
			
		}else{
			$.notify(response.message,"danger");
			// Actualizar campos
			('cart_quantity').html(response.cantidad);
		}
	});
}
