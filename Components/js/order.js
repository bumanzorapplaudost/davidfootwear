var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
})

$(".order-products-table").DataTable( {
	//"ajax": url_base + "Bodegas/Lista",
	"bLengthChange" : false,
	"pageLength": 6,
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": dt_spanish
});

$(".orders-table").DataTable( {
	//"ajax": url_base + "Bodegas/Lista",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": dt_spanish
});

$(document).on("click", ".btn-delete-product", function(event) {
	event.preventDefault();
	var fo = $(this).parents("tr");
	swal({
		type: 'question',
		title: 'Eliminar Producto',
		text: 'Desea retirar el producto del pedido?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {
        	fo.fadeOut();
        }
	})
});