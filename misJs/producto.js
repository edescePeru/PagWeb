$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$(document).on('click', '[data-items]', showModalItems);
	/*$("#btn-register").on('click', registerProduct);*/

	$('#categoria').on('change', viewSubcategoria);
	$('#subcategoria').on('change', viewMarca);
	$('#marca').on('change', viewButton);

	$('#Next1').on('click', function () { nextPage(1); nextView(); })
	$('#Next2').on('click', function () { nextPage(2) });
	$('#Next3').on('click', function () { nextPage(3) });
	$('#Next4').on('click', function () { 
		registerProduct();

		
	});

	$('#Previous2').on('click', function () { PreviousPage(2) });
	$('#Previous3').on('click', function () { PreviousPage(3) });
	$('#Previous4').on('click', function () { PreviousPage(4) });
	$('#Previous5').on('click', function () { PreviousPage(5) });

	$('.text2').on('input', function() { nextButton(2) });
	$('.text3').on('input', function() { nextButton(3) });
	$('.text4').on('input', function() { nextButton(4) });

	

	

});

function nextButton(i) {

		var empty = false;

		$('.text'+i).each(function() {
			if (!empty && $(this).val() == '') {
				empty = true;
			}
		});

		/*if (i == 2) {
			cant = $('#description-long').val().length;
			if (cant <= 100) {
				empty = true;
			}
		}*/

		/*console.log(empty);
		console.log(i);
		console.log(cant);*/

		$('#Next'+i).prop('disabled', empty);
}

function nextView() {

	var idCategoria = $('#categoria').val();
	var idSubcategoria = $('#subcategoria').val();
	var idMarca = $('#marca').val();

	var categoria = $("#categoria option:selected").map(function() {
	    return $(this).text();
	}).get();
	var subcategoria = $("#subcategoria option:selected").map(function() {
	    return $(this).text();
	}).get();
	var marca = $("#marca option:selected").map(function() {
	    return $(this).text();
	}).get();

	$('#categ').text(categoria);	
	$("#subcateg").text(subcategoria);
	$("#marc").text(marca);



	



	/*console.log(idCategoria);
	console.log(idSubcategoria);
	console.log(idMarca);
	console.log(categoria);
	console.log(subcategoria);
	console.log(marca);*/
}

function viewSubcategoria () {
	var categoria = $(this).val();
	$('#Next1').prop('disabled', true);
	$("#subcategoria").css("display", "block");
	$("#marca").css("display", "none");
	$('#subcategoria').load('Script/ComboSelect.php?categoria='+categoria);
}

function viewMarca () {
	var subcategoria = $(this).val();
	$('#Next1').prop('disabled', true);
	$(".select-subcategoria").css("float", "left");
	$("#marca").css("display", "block");
	$('#marca').load('Script/ComboSelect.php?subcategoria='+subcategoria);
}

function viewButton() {
	$('#Next1').prop('disabled', false);
}

function nextPage(i) {
	$('li').removeClass('active');
	x = i + 1;
	$('.nav-tabs li:nth-child('+x+')').addClass('active');
}

function PreviousPage(i) {
	$('li').removeClass('active');
	x = i - 1;
	$('.nav-tabs li:nth-child('+x+')').addClass('active');
}



function showModalRegister() {
	$("#modal-register").modal('show');
}

function showModalItems() {
	$("#modal-items").modal('show');
}

function registerProduct() {
	event.preventDefault();
    var r = confirm("Revise si sus datos son correctos \n Los datos ingresados se registraran en la base de datos");
    if (r == true) {
    	var url = 'Script/RegProduct.php';
	    var data = $("#product-register").serializeArray();
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
		        nextPage(4);
				$("#Next4").attr("href", "#Tab5");
				
			}else{
				alert(response.message);
				console.log(response.message);
				location.reload();
			}
		});

        
    }
		/*event.preventDefault();
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
		});*/
}