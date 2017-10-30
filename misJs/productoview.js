$(document).ready(function(){
	$("#incrementar").on('click', incrementar);
	$("#disminuir").on('click', disminuir);
	$('#quantity').on('keypress', function(){return false; });

	$('#section').on('click', function () { pagescroll(this, 1) });
	$('#comentar').on('click', function () { pagescroll(this, 3) });

	starStatic($('#star2'), $('#number-start').text());
	starStatic($('#star3'), $('#number-start').text());

	star($('#star1'));

	$('#comment').on('click', function () { 
		event.preventDefault();
		var test = validar_comment();
		if (test[0] == true) {
			registerComment();
		} else{
			alert(test[1]);
			return false;
		};
	});

});



function correct_email (email) {
	if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1) {
        return false;
    }

    return true;
}

function starStatic (x,y) {
	x.starrr({
		max: 5,
		rating: y,
		readOnly: true
	      /*change: function(e, value){
	        $s2input.val(value).trigger('input');
	      }*/
	});
}

var puntos;
function star (x) {
	x.starrr({
		change: function(e, value){
			puntos = value;
			$('.choice').text(value);
		}
	});
}

function validar_comment () {
	var puntos = $('#points').text();
	var alias = $("#alias").val();
	var email = $("#email").val();

	if (puntos == "") {
	    var mensaje = 'No ha calificado su experiencias';
	    var rpta = false;
	    return [rpta, mensaje];
	}

	if (alias == "") {
	    var mensaje = 'Es necesario especificar su alias';
		var rpta = false;
		return [rpta, mensaje];
	}

	if (email == "") {
	    var mensaje = 'Es necesario especificar su alias';
		var rpta = false;
		return [rpta, mensaje];
	}

	if (!correct_email($("#email").val())) {
		var mensaje = 'El correo electrónico introducido no es correcto.';
		var rpta = false;
		return [rpta, mensaje];
	}

	if ($("#option:checked").val()==undefined) {
	    var mensaje = 'Debe seleccionar una opcion';
		var rpta = false;
		return [rpta, mensaje];
	}

	else{
		var rpta = true;
		mensaje = '';
		return [rpta, mensaje];
	}
}


function pagescroll (page, x) {
	if (page.hash !== "") {
		// Prevent default anchor click behavior
		event.preventDefault();

		// Store hash
		var hash = page.hash;

		// Using jQuery's animate() method to add smooth page scroll
		// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		$('html, body').animate({
			scrollTop: $(hash).offset().top
		}, 800);

		$('.nav-tabs li.active').removeClass('active');
		$('.nav-tabs li:nth-child('+x+')').addClass('active');

		$('.tab-content div.active').removeClass('in active');
		$('.tab-content div:nth-child('+x+')').addClass('in active')
			
	} 
}

var contador = 1;
function incrementar() {
	var stock = $('#stock').text();
	if (contador >= stock) {
		contador = contador;
	} else{
		contador += 1;
	};
	$('#quantity').val(contador);
	/*console.log(contador);*/
}

function disminuir() {
	if (contador == 1) {
		contador = 1;
	}else{
		contador -= 1;
	}
	$('#quantity').val(contador);
	/*console.log(contador);*/
}

function $_GET(param)
{
	/* Obtener la url completa */
	url = document.URL;
	/* Buscar a partir del signo de interrogación ? */
	url = String(url.match(/\?+.+/));
	/* limpiar la cadena quitándole el signo ? */
	url = url.replace("?", "");
	/* Crear un array con parametro=valor */
	url = url.split("&");

	/* 
	Recorrer el array url
	obtener el valor y dividirlo en dos partes a través del signo = 
	0 = parametro
	1 = valor
	Si el parámetro existe devolver su valor
	*/
	x = 0;
	while (x < url.length)
	{
		p = url[x].split("=");
		if (p[0] == param)
	{
		return decodeURIComponent(p[1]);
	}
		x++;
	}
}

function registerComment() {
	event.preventDefault();
	var idprod = $_GET("idprod");
	var recoment = $("#option:checked").val();;
	var url = '../../Script/RegComentario.php';
	var data = $("#form-comment").serialize();
	console.log(data);

		$.ajax({
	        url: url,
	        data: data + "&idprod=" + idprod + "&puntos=" + puntos  + "&recomendar=" + recoment,
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
	})
}