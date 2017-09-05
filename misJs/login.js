$(document).ready(function(){
	$(".megamenu").megamenu();

	$('#btn-login').on('click', login);
});

function login(){
	event.preventDefault();
	var url = 'Script/Login.php';
	var data = $("#register-login").serializeArray();

	$.ajax({
		url: url,
		data: data,
		method: 'POST'
	}).done(function( response ) {
		console.log(response);

		if(response.error) {
			console.log(response.message);
			alert(response.message);
			$( response.input ).css({"background": "rgba(206, 28, 45, 0.22", "border": "1px solid red"});
			$( response.input ).focusin(function(){
				$( response.input ).css({"background": "white", "border": "1px solid #EEE"});
			});

			$( response.input ).focusout(function(){
				$( response.input ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
			});
		}else{
			alert(response.message);
			if (response.role == 2) {
				window.location.href="index.php";
			} else{
				window.location.href="panel.php";
			}
		}

	});
}

