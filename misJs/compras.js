$(document).ready(function(){
	$(document).on('change', '[data-combo]', modificarEstado);

});

function modificarEstado () {
	var idCompra = $(this).data('combo');
	var url = 'Script/modificarCompra.php';
	var estado = $(this).val();
	// Llamado ajax para agregar al carrito
	$.ajax({
		url: url,
		data: {idCompra:idCompra, estado:estado},
		method: 'POST'
	}).done(function( response ) {
		console.log(response);

		if(response.error) {
			console.log(response.message);
			
			if (response.error) {
				$.notify({
					// options
					icon: 'fa fa-thumbs-down',
					title: 'Advertencia: ',
					message: response.message,
				},{
					type:'danger'
				});

			} else {
				$.notify({
					// options
					icon: 'fa fa-thumbs-down',
					title: 'Exito: ',
					message: response.message,
				},{
					type:'success',
					delay: 2000,
					timer: 1000
				});
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