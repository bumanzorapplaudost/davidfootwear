var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
})

$(".providers-tbl").DataTable({
	"ajax" : url_base + "Proveedores/Lista",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

$(document).on("click", ".btn-delete-provider", function() {
	var id = $(this).attr("provider");

	swal({
		type: 'question',
		title: 'Eliminar Proveedor',
		text: 'Está seguro de eliminar el proveedor seleccionado?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {
        	window.location = url_base + "Proveedores/Eliminar/"+id;
        }
	});
});

$(document).on("click", ".btn-edit-provider", function() {

	var id = $(this).attr("provider");
	var fd = new FormData();
	fd.append("cpos-provider-id", id);

	$.ajax({
		url: url_base + 'Proveedores/Editar/' + id,
		method: 'GET',
		data : fd,
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id.toString());
			$("#eprovider-name").val(response["name"]);
			$("#eprovider-nit").val(response["nit"]);
			$("#eprovider-nrc").val(response["nrc"]);
			$("#eprovider-area").val(response["area"]);
			$("#eprovider-cellphone").val(response["cellphone"]);
			$("#eprovider-phone").val(response["phone"]);
			$("#eprovider-rep").val(response["representative"]);
			$("#eprovider-email").val(response["email"]);
			$("#eprovider-address").val(response["address"]);
		}
	});
});