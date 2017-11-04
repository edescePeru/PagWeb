$(document).ready(function(){

	$.getJSON('../../Script/getQuantity.php',function(response)
    {
    	console.log(response);
        // Ahora que tenemos la cantidad hacemos el update
        $('#cart_quantity').html(response.quantity);
        
    });

    $('#submit').on('click', searchProduct);

});

function searchProduct() {
	event.preventDefault();
	var buscar = $('#search').val();
	window.location = '../../search.php?search='+buscar;
}


