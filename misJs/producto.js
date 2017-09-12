$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$(document).on('click', '[data-items]', showModalItems);
	$("#btn-register").on('click', registerProduct);
});

function showModalRegister() {
	$("#modal-register").modal('show');
}

function showModalItems() {
	$("#modal-items").modal('show');
}

function registerProduct() {
	event.preventDefault();
	var url = 'Script/productRegister.php';
    var data = $("#form-register").serializeArray();
	console.log(data);
	$.ajax({
        url: url,
        data: data,
        method: 'POST'
	}).done(function( response ) {
	    console.log(response);

		if(response.error) {
			console.log(response.message);
			alert(response.message);
			
		}else{
			alert(response.message);
			console.log(response.message);
			location.reload();
		}
	});
}