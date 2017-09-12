$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#new-subcategoria").on('click', processSubCategoria);

	$(document).on('click', '[data-eliminar]', deleteSubCategoria);
	$(document).on('click', '[data-editar]', showModalEditar);
});

function showModalRegister() {
	$('#form-subcategoria')[0].reset();
	$("#proceso").html("Registrar");
	$("#modal-subcateg").modal({
			show:true,
			backdrop:'static'
		});
}

function deleteSubCategoria() {
	event.preventDefault();
	var url = 'Script/DelSubCategoria.php';
	var dato = $(this).data("eliminar");

	var r = confirm("¿Desea eliminar esta Subcategoría?");
    if (r == true) {
		$.ajax({
			url: url,
			data: {dato:dato},
			method: 'POST'
		}).done(function( response ) {
			console.log(response);

			if(response.error) {
				console.log(response.message);
				$.notify(response.message,"danger");
				
			}else{
				$.notify(response.message,"danger");
				setTimeout(function(){ location.reload(); },2000);
			}
		});
    } 	
}

var idSubCategoria;

function showModalEditar() {
	$('#form-subcategoria')[0].reset();
	$("#proceso").html("Editar");

	var $fila = $(this).parents('tr');
	idSubCategoria = $fila.find('[data-id]').data('id');
	var categoria = $fila.find('[data-categoria]').data('categoria');

	var subcategoria = $fila.find('[data-subcategoria]').text();
	
	$('#subcategoria').val(subcategoria.trim());
	$('#categoria').val(categoria);

	$("#modal-subcateg").modal({
		show:true,
		backdrop:'static'
	});
}

function processSubCategoria() {
	event.preventDefault();
	if ($('#proceso').html() == 'Registrar') {
		var url = 'Script/RegSubCategoria.php';
	    var data = $("#form-subcategoria").serializeArray();

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
		var url = 'Script/EditSubCategoria.php';
	    var data = $("#form-subcategoria").serialize();

		$.ajax({
		 url: url,
		 data: data + "&id=" + idSubCategoria,
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