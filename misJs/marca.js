$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$("#new-subcategoria").on('click', processSubCategoria);

	$(document).on('click', '[data-eliminar]', deleteSubCategoria);
	$(document).on('click', '[data-editar]', showModalEditar);

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
		$('#subcategoria').html('');
		
		console.log("hola");

		var $fila = $(this).parents('tr');

		idMarca = $fila.find('[data-id]').data('id');
		var categoria = $fila.find('[data-categoria]').data('categoria');
		var subcategoria = $fila.find('[data-subcategoria]').data('subcategoria');

		console.log(categoria);

		var marca = $fila.find('[data-marca]').data('marca');
		console.log(marca);

        $.getJSON('Script/ComboSelectMarca.php?categoria='+categoria,function(data)
	    {
	    	$("#subcategoria").append("<option ></option>");
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	        	console.log(value[0]);
	            if( value[0] == subcategoria )
	                $("#subcategoria").append(" <option value='" + value[0]+"' selected='selected'>" + value[1]  + "</option> ");
	            else
	                $("#subcategoria").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });

		$('#marca').val(marca);
		$('#categoria').val(categoria);


		$("#modal-marca").modal({
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
		var url = 'Script/EditMarca.php';
	    var data = $("#form-marca").serialize();

		$.ajax({
		 url: url,
		 data: data + "&id=" + idMarca,
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