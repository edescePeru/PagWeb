$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#process-categoria").on('click', processCategoria);
	$(document).on('click', '[data-eliminar]', deleteCategoria);
	$(document).on('click', '[data-editar]', showModalEditar);
});

function showModalRegister() {
	$('#form-categoria')[0].reset();
	$("#proceso").html("Registrar");
	$("#modal-categ").modal({
			show:true,
			backdrop:'static'
		});
}

var idCategoria;
function showModalEditar() {
	$('#form-categoria')[0].reset();
	$("#proceso").html("Editar");

	var $fila = $(this).parents('tr');
	idCategoria = $fila.find('[data-id]').data('id');
	var nombre = $fila.find('[data-nombre]').text();
	
	$('#categoria').val(nombre.trim());

	$("#modal-categ").modal({
			show:true,
			backdrop:'static'
		});
}


function processCategoria() {
	event.preventDefault();
	if ($('#proceso').html() == 'Registrar') {
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

	if ($('#proceso').html() == 'Editar'){
		var url = 'Script/EditCategoria.php';
	    var data = $("#form-categoria").serialize();

		$.ajax({
		 url: url,
		 data: data + "&id=" + idCategoria,
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

function deleteCategoria () {
	event.preventDefault();
	var url = 'Script/DelCategoria.php';
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