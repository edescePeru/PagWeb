$(document).ready(function(){
	$("#edit-cuenta").on('click', showModalEdit);
	$("#change-password").on('click', showModalChange);
	$("#new-address").on('click', showNewAddress);
	$("#edit-address").on('click', showEditAddress);

	$("#edit-count").on('click', proccesseditCount);
	$("#change-pwd").on('click', proccesschangePwd);
	$("#btn-address").on('click', proccessAddress);

	$('#departamento').on('change', viewProvincia);
	$('#provincia').on('change', viewDistrito);
});

function viewProvincia () {
	$('#provincia').empty();
	$('#provincia').append( '<option selected="selected" class="holder">Seleccionar provincia</option>' );
	var departamento = $(this).val();
	/*$('#provincia').load('Script/ComboSelect.php?departamento='+departamento);*/

	$.getJSON('Script/ComboSelect.php?departamento='+departamento,function(data)
	    {
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	            $("#provincia").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });

	$('#distrito').empty();
	$('#distrito').append( '<option selected="selected" class="holder">Seleccionar distrito</option>' );
}

function viewDistrito () {
	$('#distrito').empty();
	$('#distrito').append( '<option selected="selected" class="holder">Seleccionar distrito</option>' );
	var provincia = $(this).val();
	/*$('#distrito').load('Script/ComboSelect.php?provincia='+provincia);*/

	$.getJSON('Script/ComboSelect.php?provincia='+provincia,function(data)
	    {
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	            $("#distrito").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });
}

function showModalEdit() {
	$('#form-editCount')[0].reset();

	var nombre = $('#nombre').text();
	var apellido = $('#apellido').text();
	var dni = $('#dni').text();
	var telefono = $('#telefono').text();
	
	
	$('#first').val(nombre.trim());
	$('#last').val(apellido.trim());
	$('#docIdentity').val(dni.trim());
	$('#phone').val(telefono.trim());

	$("#modal-edit").modal({
			show:true,
			backdrop:'static'
		});
}

function showModalChange() {
	$('#form-changepwd')[0].reset();

	$("#modal-change").modal({
			show:true,
			backdrop:'static'
		});
}

function showNewAddress() {
	$('#form-address')[0].reset();
	$("#proceso").html("Registrar");
	$("#modal-direccion").modal({
			show:true,
			backdrop:'static'
		});
}

function showEditAddress () {
	$('#form-address')[0].reset();

	$("#proceso").html("Editar");
	var phone1 = $('p#phone1').text();
	var phone2 = $('p#phone2').text();
	var address = $('span#address').text();
	var number = $('span#number').text();
	var dpto = $('span#dpto').text();
	var street = $('span#street').text();
	var referencia = $('span#referencia').text();
	var typeaddress = $('span#typeaddress').text();
	var departamento = $('span.departamento').attr('id');
	var provincia = $('span.provincia').attr('id');
	var distrito = $('span.distrito').attr('id');

	$('input#phone1').val(phone1.trim());
	$('input#phone2').val(phone2.trim());
	$('input#address').val(address.trim());
	$('input#number').val(number.trim());
	$('input#dpto').val(dpto.trim());
	$('input#street').val(street.trim());
	$('input#referencia').val(referencia.trim());
	$('select#typeaddress').val(typeaddress.trim());
	$('select#departamento').val(departamento.trim());

	$.getJSON('Script/ComboSelect.php?departamento='+departamento,function(data)
	    {
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	        	if( value[0] == provincia )
	                $("#provincia").append(" <option value='" + value[0]+"' selected='selected'>" + value[1]  + "</option> ");
	            else
	                $("#provincia").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });

	$.getJSON('Script/ComboSelect.php?provincia='+provincia,function(data)
	    {
	    	console.log(data);
	        $.each(data,function(key,value)
	        {
	            if( value[0] == distrito )
	                $("#distrito").append(" <option value='" + value[0]+"' selected='selected'>" + value[1]  + "</option> ");
	            else
	                $("#distrito").append(" <option value='" + value[0]+"' >" + value[1]  + "</option> ");
	        });
	    });

	$("#modal-direccion").modal({
			show:true,
			backdrop:'static'
		});
}

function proccesseditCount () {
	event.preventDefault();
	var iduser = $("h3.id").attr("id");
	var url = 'Script/EditCuenta.php';
	var data = $("#form-editCount").serialize();
	console.log(data);

	$.ajax({
		url: url,
		data: data + "&iduser=" + iduser,
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

var iduser = $("h3.id").attr("id");

function proccesschangePwd () {
	event.preventDefault();
	var url = 'Script/CambianPwd.php';
	var data = $("#form-changepwd").serialize();
	console.log(data);

	$.ajax({
		url: url,
		data: data + "&iduser=" + iduser,
		method: 'POST'
	}).done(function( response ) {
	    console.log(response);

		if(response.error) {
			console.log(response.message);
			alert(response.message);
				
		}else{
			alert(response.message);
			location.href = 'Script/Logout.php';
		}
	});
}

function proccessAddress() {
	event.preventDefault();
	var data = $("#form-address").serialize();

	if ($('#proceso').html() == 'Registrar') {
		var url = 'Script/RegDireccion.php';
	    console.log(data);

	    $.ajax({
	        url: url,
	        data: data + "&iduser=" + iduser,
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

	if ($('#proceso').html() == 'Editar'){
		var url = 'Script/EditDireccion.php';
	    console.log(data);

		$.ajax({
		 url: url,
		 data: data + "&iduser=" + iduser,
		 method: 'POST'
		}).done(function( response ) {
		    console.log(response);

			if(response.error) {
				console.log(response.Smessage);
				alert(response.message);
				
			}else{
				alert(response.message);
				location.reload();
			}
		});
	}
}