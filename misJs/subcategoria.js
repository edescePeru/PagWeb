$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#new-subcategoria").on('click', saveSubCategoria);

	$(document).on('click', '[data-eliminar]', deleteSubCategoria);
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

function deleteSubCategoria() {
	event.preventDefault();
	var url = 'Script/DelSubCategoria.php';
	var dato = $(this).data("eliminar");

	var r = confirm("¿Desea eliminar esta categoría?");
    if (r == true) {
		$.ajax({
			url: url,
			data: {dato:dato},
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
}	