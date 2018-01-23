$(document).ready(function(){
	$('#Next1').on('click', function () { nextPage(1) });
	$('#Previous2').on('click', function () { PreviousPage(2) });
	$('.text1').on('input', function() { nextButton(1) });

	$('#departamento').on('change', viewProvincia);
    $('#provincia').on('change', viewDistrito);

    $("#editar").on('click', showEditAddress);
    $('#registrar').on('click', proccessAddress);

    $('#btn-address').on('click', editAddress);
    $('#btn-voucher').on('click', sendVoucher);

    $("#voucher").on('click', showModalVoucher);
    getDataPayu();




});

function getDataPayu () {
    
    $.getJSON('Script/getCarrito.php',function(data)
    {
        console.log(data);
        var cantidad = data.length;
        console.log(cantidad);

        // $('#cantidad').html(cantidad);
        var subtotal=0;
        for (var i = 0; i < data.length; i++) {
            subtotal = subtotal + parseFloat(data[i][5])*parseFloat(data[i][4]);
        };
        var discount = 0.00;
        var delivery = 0.00;
        var amount = subtotal-discount+delivery;
        
        $.getJSON('Script/getDataPayu.php?monto='+amount,function(data)
        {
            console.log(data["signature"]);
            
            var merchantId = "698161";
            // IdUsuario
            var accountId = data["accountId"];
            var description = "Compra de productos PAYU";
            // IdCarrito
            var referenceCode = data["referenceCode"];
            // Cantidad final
            var amount = data["amount"];
            var tax = 0;
            var taxReturnBase = 0;
            var currency = "PEN";
            // firma
            var signature = data["signature"];
            var test = 1 ;
            // Email del cliente
            var buyerEmail = data["buyerEmail"];
            // Url de respuesta
            var responseUrl = "https://www.swarbox.com/Script/urlRespuesta.php";
            // Url de confirmacion
            var confirmationUrl = "https://www.swarbox.com/Script/urlConfirmacion.php";
            // Direccion actualizada del cliente
            var shippingAddress = data["shippingAddress"];
            // Departamento del cliente
            var shippingCity = data["shippingCity"];
            // Pais del cliente
            var shippingCountry = "PE";

            $formPayu = $("#formPayU");
            $formPayu.find('[name="merchantId"]').val(merchantId);
            $formPayu.find('[name="accountId"]').val(accountId);
            $formPayu.find('[name="description"]').val(description);
            $formPayu.find('[name="referenceCode"]').val(referenceCode);
            $formPayu.find('[name="amount"]').val(amount);
            $formPayu.find('[name="tax"]').val(tax);
            $formPayu.find('[name="taxReturnBase"]').val(taxReturnBase);
            $formPayu.find('[name="currency"]').val(currency);
            $formPayu.find('[name="signature"]').val(signature);
            $formPayu.find('[name="test"]').val(test);
            $formPayu.find('[name="buyerEmail"]').val(buyerEmail);
            $formPayu.find('[name="responseUrl"]').val(responseUrl);
            $formPayu.find('[name="confirmationUrl"]').val(confirmationUrl);
            $formPayu.find('[name="shippingCity"]').val(shippingCity);
            $formPayu.find('[name="shippingCountry"]').val(shippingCountry);
            $formPayu.find('[name="shippingAddress"]').val(shippingAddress);


            
        });
    });
   
}

function sendVoucher () {
    event.preventDefault();
    var url = 'Script/RegPago.php';
    console.log(data);

    /*var trueorfalse = true;*/
    $.ajax({
        url: url,
        data: new FormData($("#form-voucher")),
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
}

function showModalVoucher () {
    $("#modal-voucher").modal({
            show:true,
            backdrop:'static'
        });
}

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
