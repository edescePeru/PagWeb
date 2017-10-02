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
					icon: 'fa fa-thumbs-down',
					title: 'Advertencia: ',
					message: response.message,
				},{
					type:'danger',
					delay: 2000,
					timer: 1000
				});
				$('#cart_quantity').html(response.cantidad);
			}
			
		}else{
			$.notify({
					// options
					icon: 'fa fa-thumbs-up',
					title: 'Éxito: ',
					message: response.message,
				},{
					type:'success',
					delay: 2000,
					timer: 1000
				});
			// Actualizar campos
			$('#cart_quantity').html(response.cantidad);
		}
	});
}
