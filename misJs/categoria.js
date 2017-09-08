$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#new-categoria").on('click', saveCategoria);
	$("[data-eliminar]").on('click', deleteCategoria);
});

function showModalRegister() {
	$("#modal-register").modal('show');
}

function saveCategoria () {
	event.preventDefault();
	var url = 'Script/RegCategoria.php';
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

function deleteCategoria () {
	event.preventDefault();
	var dato = $(this).data('eliminar');
	//var dato = $(this).parents("tr").find('td:nth-child(2)').html();
	//var dato = $(this).parents("tr").data('id');
	alert(dato);
}	