$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#new-subcategoria").on('click', saveSubCategoria);
});

function showModalRegister() {
	$("#modal-register").modal('show');
}

function saveSubCategoria () {
	event.preventDefault();
	var url = 'Script/RegSubCategoria.php';
    var data = $("#form-categoria").serializeArray();

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
			location.reload();
		}
	});
}