$(document).ready(function(){
	$("#show-register").on('click', showModalRegister);
	$(document).on('click', '[data-items]', showModalItems);
});

function showModalRegister() {
	$("#modal-register").modal('show');
}

function showModalItems() {
	$("#modal-items").modal('show');
}