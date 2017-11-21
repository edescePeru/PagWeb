$(document).ready(function(){
	$('#Next1').on('click', function () { nextPage(1) });
	$('#Previous2').on('click', function () { PreviousPage(2) });
	$('.text1').on('input', function() { nextButton(1) });

	$('#departamento').change(function(){
        var departamento=$('#departamento').val();
        $('#provincia').load('Script/SelectProvincia.php?departamento='+departamento);
    }); 

    $('#provincia').change(function(){
        var provincia=$('#provincia').val();
        $('#distrito').load('Script/SelectDistrito.php?provincia='+provincia);
    });

    $(".departamento").select2({
        placeholder: "Seleccione su departamento",
        allowClear: true
    });  

    $(".provincia").select2({
        placeholder: "Seleccione su provincia",
        allowClear: true
    });  

    $(".distrito").select2({
        placeholder: "Seleccione su distrito",
        allowClear: true
    });

});

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