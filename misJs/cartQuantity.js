$(document).ready(function(){

	$.getJSON('php/getQuantity.php',function(response)
    {
        // Ahora que tenemos las categorias es momento de llenar el select
        $.each(response, function(id,value){
            $("#categorias").append($("<option></option>").attr("value", value[0]).text(value[1]));
            $("#categoriasE").append($("<option></option>").attr("value", value[0]).text(value[1]));
        });
    });

});



