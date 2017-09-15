$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#new-subcategoria").on('click', processSubCategoria);

	$(document).on('click', '[data-eliminar]', deleteSubCategoria);
	$(document).on('click', '[data-editar]', function() {
		
		console.log("hola");

		var $fila = $(this).parents('tr');

		var idMarca = $fila.find('[data-id]').data('id');
		var categoria = $fila.find('[data-categoria]').data('categoria');
		var subcategoria = $fila.find('[data-subcategoria]').data('subcategoria');

		console.log(categoria);
		console.log(subcategoria);

		$('#subcategoria').load('Script/ComboSelect.php?categoria='+categoria+'&&espacio=1');

		var marca = $fila.find('[data-marca]').text();

		$('#marca').val(subcategoria);
		$('#categoria').val(categoria);
		$('#subcategoria').val(subcategoria);


		$("#modal-marca").modal({
			show:true,
			backdrop:'static'
		});
	});

	$('#categoria').on('change', viewSubcategoria);
});

function viewSubcategoria () {
	var categoria = $(this).val();
	$('#subcategoria').load('Script/ComboSelect.php?categoria='+categoria+'&&espacio=1');
}


function showModalRegister() {
	$('#form-marca')[0].reset();
	$("#proceso").html("Registrar");
	$("#modal-marca").modal({
			show:true,
			backdrop:'static'
		});
}

function deleteSubCategoria() {
	event.preventDefault();
	var url = 'Script/DelMarca.php';
	var dato = $(this).data("eliminar");

	var r = confirm("¿Desea eliminar esta Marca?");
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

var idMarca;
function showModalEditar() {
	// $('#form-marca')[0].reset();
	$("#proceso").html("Editar");

	var $fila = $(this).parents('tr');

	idMarca = $fila.find('[data-id]').data('id');
	var categoria = $fila.find('[data-categoria]').data('categoria');
	var subcategoria = $fila.find('[data-subcategoria]').data('subcategoria');

	var marca = $fila.find('[data-marca]').text();
	
	$('#marca').val(marca.trim());

	$('#categoria').val(categoria);
	$('#subcategoria').val(subcategoria);

	// $('#subcategoria option[value='+subcategoria+']').attr('selected','selected');
	
	console.log(subcategoria);

	$("#modal-subcateg").modal({
		show:true,
		backdrop:'static'
	});
}

function processSubCategoria() {
	event.preventDefault();
	if ($('#proceso').html() == 'Registrar') {
		var url = 'Script/RegMarca.php';
	    var data = $("#form-marca").serializeArray();

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
	    var data = $("#form-marca").serialize();

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