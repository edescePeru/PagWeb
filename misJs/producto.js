$(document).ready(function(){
	$(document).on('click', '[data-eliminar]', deleteProducto);
	$(document).on('click', '[data-picture]', showModalPicture);
	$(document).on('click', '[data-editar]', showModalEditar);

	$("#process-producto").on('click', processProducto);

	$('#precio').on('keypress', decimal);
	$('#stock').on('keypress', decimal);
});

function showModalPicture() {
	var dato = $(this).data("picture");
	$('#modal-body').load('Script/Archivo.php?idprod='+dato);
	$("#modal-picture").modal({
			show:true,
			backdrop:'static'
		});
	
}

var idProducto;
function showModalEditar() {
	$('#form-producto')[0].reset();
	/*$("#proceso").html("Editar");*/

	var $fila = $(this).parents('tr');
	idProducto = $fila.find('[data-id]').data('id');
	var producto = $fila.find('[data-nombre]').text();
	var precio = $fila.find('[data-precio]').text();
	var stock = $fila.find('[data-stock]').text();
	
	$('#nombre').val(producto);
	$('#stock').val(stock);
	$('#precio').val(precio);

	console.log(producto);

	$("#edit").attr("href", "producto_editar.php?idprod="+idProducto);	

	$("#modal-producto").modal({
		show:true,
		backdrop:'static'
	});
}

function decimal (e) {
	var texto = $(this);
      key = e.keyCode ? e.keyCode : e.which;

      if(texto.val().substring(0,1) == '.') 
            texto.val('0' + texto.val());

      //borrar      
      if (key == 8) return true;

      // 0-9
      if (key > 47 && key < 58) {
        if (texto.val() === "") return true;
        
      var existePto = (/[.]/).test(texto.val());
        if (existePto === false){
          regexp = /.[0-9]{10}$/; //PARTE ENTERA 10
        }
        else {
          regexp = /.[0-9]{2}$/; //PARTE DECIMAL2
        }

        return !(regexp.test(texto.val()));
      }
      
      //.
      if (key == 46) {
        if (texto.val() === "") return false;
          regexp = /^[0-9]+$/;
          return regexp.test(texto.val());
      }

      //otro key
      return false;
}

function deleteProducto () {
	event.preventDefault();
	var url = 'Script/DelProducto.php';
	var dato = $(this).data("eliminar");

	var r = confirm("¿Desea eliminar esta categoría?");
    if (r == true) {
		$.ajax({
			url: url,
			data: {dato:dato},
			method: 'POST'
		}).done(function( response ) {
			console.log(response);

			if(response.error) {
				console.log(response.message);
				$.notify(response.message,"danger");
				
			}else{
				$.notify(response.message,"danger");
				setTimeout(function(){ location.reload(); },2000);
			}
		});
    } 	
}	

function processProducto() {
	event.preventDefault();
	var url = 'Script/EditProducto.php';
    var data = $("#form-producto").serialize();

	$.ajax({
		url: url,
		data: data + "&idprod=" + idProducto,
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