$(document).ready(function(){
	$.getJSON('Script/getCarrito.php',function(data)
    {
    	console.log(data);
    	var cantidad = data.length;
    	console.log(cantidad);
    	$('#cantidad').html(cantidad);
    	var subtotal=0;
    	for (var i = 0; i < data.length; i++) {
    		subtotal = subtotal + parseFloat(data[i][5])*parseFloat(data[i][4]);
    	};
    	var discount = 0.00;
    	var delivery = 10.20;
    	var total = subtotal-discount+delivery;
    	$('#subtotal').html(subtotal.toFixed(2));
    	$('#discount').html(discount.toFixed(2));
    	$('#delivery').html(delivery.toFixed(2));
    	$('#total').html(total.toFixed(2));

    });

    $("[data-plus]").on('click', incrementQuantity);
    $("[data-minus]").on('click', decrementQuantity);
    $("[data-delete]").on('click', deleteItem);

});

function deleteItem () {
	event.preventDefault();
	var global = $(this);
	var carrito = $(this).data('carrito');
	var producto = $(this).data('producto');
	// first visual changes
	
	var url = 'Script/deleteItem.php';
	$.ajax({
        url: url,
        data: {carrito:carrito, producto:producto},
        method: 'POST'
	}).done(function( response ) {
	    console.log(response);

		if(response.error) {
			console.log(response.message);
		}else{
			global.parent().parent().parent().parent().hide();
			setTimeout(function(){ location.reload(); },2000);
		}

	});



}

function incrementQuantity () {
	// first visual changes
	
	event.preventDefault();
	var global = $(this);
	var carrito = $(this).data('carrito');
	var producto = $(this).data('producto');
	var action = 'plus';
	var beforeQuantity = $(this).attr("data-quantity");

	// Guardamos en la base de datos
	// Si hay error no hacemos nada sino seguimos normalmente
	var url = 'Script/updateQuantity.php';
	$.ajax({
        url: url,
        data: {carrito:carrito, producto:producto, action:action},
        method: 'POST'
	}).done(function( response ) {
	    console.log(response);

		if(response.error) {
			console.log(response.message);
		}else{
			var updateQuantity = parseFloat(beforeQuantity)+1;
			$('[data-cantidad='+producto+']').html("Cantidad: "+updateQuantity);
			global.next().attr('data-quantity', updateQuantity);
			global.attr('data-quantity', updateQuantity);
			var price = global.data('price');
			var beforeSubtotal = $('#subtotal').text();
			var newSubtotal = parseFloat(price)+parseFloat(beforeSubtotal);
			$('#subtotal').html(newSubtotal.toFixed(2));
			var discount = $('#discount').text();
			var delivery = $('#delivery').text();
			var total = newSubtotal-parseFloat(discount)+parseFloat(delivery);
			$('#total').html(total.toFixed(2));
		}

	});

	

}
function decrementQuantity () {
	event.preventDefault();
	var global = $(this);
	var carrito = $(this).data('carrito');
	var producto = $(this).data('producto');
	var action = 'minus';
	var beforeQuantity = $(this).attr("data-quantity");
	// Guardamos en la base de datos
	// Si hay error no hacemos nada sino seguimos normalmente
	var url = 'Script/updateQuantity.php';
	$.ajax({
        url: url,
        data: {carrito:carrito, producto:producto, action:action},
        method: 'POST'
	}).done(function( response ) {
	    console.log(response);
		if(response.error) {
			console.log(response.message);
		}else{
			if (beforeQuantity>1) {
				var updateQuantity = parseFloat(beforeQuantity)-1;
				$('[data-cantidad='+producto+']').html("Cantidad: "+updateQuantity);
				global.attr('data-quantity', updateQuantity);
				global.prev().attr('data-quantity', updateQuantity);
				var price = global.data('price');
				var beforeSubtotal = $('#subtotal').text();
				var newSubtotal = parseFloat(beforeSubtotal)-parseFloat(price);
				$('#subtotal').html(newSubtotal.toFixed(2));
				var discount = $('#discount').text();
				var delivery = $('#delivery').text();
				var total = newSubtotal-parseFloat(discount)+parseFloat(delivery);
				$('#total').html(total.toFixed(2));
			}
		}

	});
	
}

