$(document).ready(function(){
	$("#dni").keypress(inputNumber);
	$("#phone").keypress(inputNumber);

	$("input").keyup(validarInput);
	$("#dni").keyup(validarDni);
	$("#phone").keyup(validarPhone);
	$("#email").keyup(validarEmail);

});

function inputNumber() {
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
}

function validarInput() {
	if ($( this ).val()==""){ 
		$( this ).blur(function() {
			$( this ).css({"background": "rgba(206, 28, 45, 0.22", "border": "1px solid red"});
			$( this ).focusin(function(){
		        		$( this ).css({"background": "white", "border": "1px solid #EEE"});
			});
		    
			$( this ).focusout(function(){
				$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
			});
		});
	}

	else {
		$( this ).blur(function() {
			$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
  			$( this ).focusin(function(){
		        		$( this ).css({"background": "white", "border": "1px solid #EEE"});
			});
		    
			$( this ).focusout(function(){
				$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
			});
		});	
	}
};

function validarDni(){
	if ($( this ).val().length < 8){ 
		$( this ).blur(function() {
			$( this ).css({"background": "rgba(206, 28, 45, 0.22", "border": "1px solid red"});
		});
	}

	else {
		$( this ).blur(function() {
			$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
  			$( this ).focusin(function(){
		        		$( this ).css({"background": "white", "border": "1px solid #EEE"});
			});
		    
			$( this ).focusout(function(){
				$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
			});
		});	
	}
}

function validarPhone(){
	if ($( this ).val().length < 9){ 
		$( this ).blur(function() {
			$( this ).css({"background": "rgba(206, 28, 45, 0.22", "border": "1px solid red"});
		});
	}

	else {
		$( this ).blur(function() {
			$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
  			$( this ).focusin(function(){
		        		$( this ).css({"background": "white", "border": "1px solid #EEE"});
			});
		    
			$( this ).focusout(function(){
				$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
			});
		});	
	}
}

function validarEmail(){
	var email = $( this ).val();
	re  = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	if (re.test(email) == false){
		$( this ).blur(function() {
			$( this ).css({"background": "rgba(206, 28, 45, 0.22", "border": "1px solid red"});
		});
	}

	else {
		$( this ).blur(function() {
			$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
  			$( this ).focusin(function(){
		        		$( this ).css({"background": "white", "border": "1px solid #EEE"});
			});
		    
			$( this ).focusout(function(){
				$( this ).css({"background": "#f7f7f7", "border": "1px solid #EEE"});
			});
		});	
	}
}