$(document).ready(function(){
	$('#Next1').on('click', function () { nextPage(1) });
	$('#Previous2').on('click', function () { PreviousPage(2) });
	$('.text1').on('input', function() { nextButton(1) });

	$('#departamento').on('change', viewProvincia);
    $('#provincia').on('change', viewDistrito);

    $("#editar").on('click', showEditAddress);
    $('#registrar').on('click', proccessAddress);

    $('#btn-address').on('click', editAddress);



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

function nextButton(i) {

		var empty = false;

		$('.text'+i).each(function() {
			if (!empty && $(this).val() == '') {
				empty = true;
			}
		});

		$('#Next'+i).prop('disabled', empty);
}

function showEditAddress () {
    $('#form-edit-address')[0].reset();

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

var iduser = $("h1.id").attr("id");
function proccessAddress () {
    event.preventDefault();
    var data = $("#form-address").serialize();
        var url = 'Script/RegDireccion.php';
        console.log(data);

        /*var trueorfalse = true;*/
        $.ajax({
            url: url,
            data: data + "&iduser=" + iduser,
            method: 'POST',
            /*cache: false,
            async : false, */
            success: function(response ) {
                console.log(response);

                if(response.error) {
                    console.log(response.message);
                    alert(response.message);
                    /*trueorfalse = false;*/
                }else{
                    console.log(response.message);
                    alert(response.message);
                    /*trueorfalse = true;*/
                }

            }
        });

        /*return trueorfalse; */   
}


function editAddress () {
    event.preventDefault();
    var data = $("#form-edit-address").serialize();
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
