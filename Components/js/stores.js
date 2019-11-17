var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
})

$(".store-table").DataTable( {
	"ajax": url_base + "Sucursales/Lista",
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
		"sLoadingRecords": "Cargando informacion de la tabla...",
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

$(document).on("click", ".btn-delete-store", function() {
	var id = $(this).attr("store");
	
	swal({
		type: 'question',
		title: 'Eliminar Sucursal',
		text: 'Está seguro de eliminar la sucursal seleccionada?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {
        	window.location = url_base + "Sucursales/Eliminar/" + id;
        }
	});
});

$(document).on("click", ".btn-edit-store", function() {
	var id = $(this).attr("store");
	$("#EditForm").attr("action", action+id);
	var fd = new FormData();
	fd.append("cpos-store-id", id);

	$.ajax({
		url: url_base + 'Sucursales/Editar/' + id,
		method: 'GET',
		data: fd,
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id.toString());
			$('#name').val(response["name"]);
			$('#address').val(response["address"]);
			$('#employee_id').val(response["employee_id"]);
			$('#phone').val(response["phone"]);
			$('#opening_date').val(response["opening_date"]);
			$('#status').val(response["status"]);
			$('#date_recorded').val(response["date_recorded"]);
		}
	});
});