$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$(document).on('click', '[data-items]', showModalItems);
	$("#btn-register").on('click', registerProduct);

	$('#categoria').on('change', viewSubcategoria);
	$('#subcategoria').on('change', viewMarca);


});

function viewSubcategoria () {
	var categoria = $(this).val();
	$("#subcategoria").css("display", "block");
	$("#marca").css("display", "none");
	$('#subcategoria').load('Script/ComboSelect.php?categoria='+categoria);
}

function viewMarca () {
	var subcategoria = $(this).val();
	$(".select-subcategoria").css("float", "left");
	$("#marca").css("display", "block");
	$('#marca').load('Script/ComboSelect.php?subcategoria='+subcategoria);
}

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