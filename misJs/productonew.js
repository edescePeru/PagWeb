$(document).ready(function(){
	$('#large-box').on('keypress', decimal);
	$('#width-box').on('keypress', decimal);
	$('#height-box').on('keypress', decimal);
	$('#weight-box').on('keypress', decimal);
	$('#price').on('keypress', decimal);
	$('#stock').on('keypress', decimal);

	$('#description-short').on('keypress', maxline);
	$('#content-box').on('keypress', maxline);

	$("#description-short").attr('maxlength','474');
	$("#content-box").attr('maxlength','474');

	$('#description-long').on('keyup', maxcharacter);

	$('#categoria').on('change', viewSubcategoria);
	$('#subcategoria').on('change', viewMarca);
	$('#marca').on('change', viewButton);

	$('#Next1').on('click', function () { nextPage(1); nextView(); })
	$('#Next2').on('click', function () { nextPage(2) });
	$('#Next3').on('click', function () { nextPage(3) });
	$('#Next4').on('click', function () { registerProduct(); });

	$('#Previous2').on('click', function () { PreviousPage(2) });
	$('#Previous3').on('click', function () { PreviousPage(3) });
	$('#Previous4').on('click', function () { PreviousPage(4) });
	$('#Previous5').on('click', function () { PreviousPage(5) });

	$('.text2').on('input', function() { nextButton(2) });
	$('.text3').on('input', function() { nextButton(3) });
	$('.text4').on('input', function() { nextButton(4) });

});

function maxcharacter () {
	var longitud = $(this).val().length;
	$('#numero').html("Hay "+longitud+" caracteres");
}

function maxline(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  obj = this;
  if (tecla != 13) return;
  filas = obj.rows;
  txt = obj.value.split('\n');
  return (txt.length < filas);
}

/*function registerProducts(my_callback) {
	event.preventDefault();
    var r = confirm("Revise si sus datos son correctos \n Los datos ingresados se registraran en la base de datos");
	if (r == true) {
		var url = 'Script/RegProduct.php';
	    var data = $("#product-register").serializeArray();
	    var resultado;

	    $.ajax({
	        url: url,
	        data: data,
	        method: 'POST'
		}).done(function( response ) {
			if (response.error == true) {
				resultado = 'a';
			} else{
				
			};
			my_callback(resultado);
		});
  		
	}
}
*/

function decimal (e) {
	var texto = $(this);
      key = e.keyCode ? e.keyCode : e.which;

      if(texto.val().substring(0,1) == '.') 
            texto.val('0' + texto.val());

      //borrar      
      if (key == 8) return true;

      // 0-9
      if (key > 47 && key < 58) {
        if (texto.val() === "") return true;
        
      var existePto = (/[.]/).test(texto.val());
        if (existePto === false){
          regexp = /.[0-9]{10}$/; //PARTE ENTERA 10
        }
        else {
          regexp = /.[0-9]{2}$/; //PARTE DECIMAL2
        }

        return !(regexp.test(texto.val()));
      }
      
      //.
      if (key == 46) {
        if (texto.val() === "") return false;
          regexp = /^[0-9]+$/;
          return regexp.test(texto.val());
      }

      //otro key
      return false;
}

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
	/*$('#subcategoria').load('Script/ComboSelect.php?categoria='+categoria);*/
	$('#subcategoria').empty();
	$.getJSON('Script/ComboSelect.php?categoria='+categoria,function(data)
	    {
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	            $("#subcategoria").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });
}

function viewMarca () {
	var subcategoria = $(this).val();
	$('#Next1').prop('disabled', true);
	$(".select-subcategoria").css("float", "left");
	$("#marca").css("display", "block");
	/*$('#marca').load('Script/ComboSelect.php?subcategoria='+subcategoria);*/
	$('#marca').empty();
	$.getJSON('Script/ComboSelect.php?subcategoria='+subcategoria,function(data)
	    {
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	            $("#marca").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });
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
				
				
			}else{
				alert(response.message);
				console.log(response.message);
				//location.href = 'producto_uploadImage.php?idprod='+response.idprod;
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