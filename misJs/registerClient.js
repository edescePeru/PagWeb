$(document).ready(function(){
	$(".megamenu").megamenu();
	$('[data-toggle="tooltip"]').tooltip();  
	$('#btn-register').on('click', enviarFormulario);

});

addEventListener("load", function() { 
	setTimeout(hideURLbar, 0);
}, false); 

function hideURLbar(){ window.scrollTo(0,1); } 


	
function enviarFormulario(){
	event.preventDefault();
	var url = 'Script/RegCustomer.php';
    	var data = $("#register-form").serializeArray();

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
			window.location.href=response.links;
		}

	});
}

/*
	if ($( "#email" ).val() == ""){ 
		alert("Coloque su email");
		$( "#email" ).css('background', "rgba(206, 28, 45, 0.5)");
		return false;	
	} else{
		var email = $("#email").val();
		re  = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (re.test(email) == false){
			alert("Coloque un correo correcto");
			$( "#email" ).css('background', "rgba(206, 28, 45, 0.5)");
			return false;	
		}
	}
*/