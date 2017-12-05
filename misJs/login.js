$(document).ready(function(){
	$(".megamenu").megamenu();
	var javaScriptVar = "<?php echo $_GET['back']; ?>";
	console.log(javaScriptVar);

	$('#btn-login').on('click', login);
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

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
		var javaScriptVar = "<?php echo $_GET['back']; ?>";
		console.log(javaScriptVar);
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
			var javaScriptVar = getParameterByName('back');
			if (javaScriptVar == '1') {
				window.history.back();
			} else {
				if (response.user == '1') {
					var r = confirm("¿Desea ir al panel de control?");
					if (r == true) {
					    window.location.href=response.links;
					} else {
					    window.location.href='index.php';
					}
				}else{
					window.location.href=response.links;
				}
				
			}

			
		}

	});
}

