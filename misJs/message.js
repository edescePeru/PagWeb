// Normalmente se inicia con esta sentencia
$(document).ready(function() {

    $formContact = $("#form-message");

    $formContact.on('submit', function() {
        event.preventDefault();
        var url = 'Script/enviarEmail.php';
        $.ajax({
            url: url,
            data: new FormData(this),
            method: 'POST',
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                if (data.error) {
                    $.notify({
                        // options
                        icon: 'fa fa-thumbs-down',
                        title: 'Advertencia: ',
                        message: response.message,
                    },{
                        type:'danger'
                    });
                } else{
                    $.notify({
                        // options
                        icon: 'fa fa-thumbs-down',
                        title: 'Éxito: ',
                        message: response.message,
                    },{
                        type:'success',
                        delay: 2000,
                        timer: 1000
                    });
                    // setTimeout(function() {
                    //     location.reload();
                    // }, 3000);
                };
                
                
            }
        });
    });
});