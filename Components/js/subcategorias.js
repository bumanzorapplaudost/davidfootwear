var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
})

$(".tbl_subcategorias").DataTable( {
	"ajax": url_base + "SubCategorias/Lista",
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

$(document).on("click", ".btn-delete-category", function() {
	var id = $(this).attr("category");
	
	swal({
		type: 'question',
		title: 'Eliminar Sub Categoria',
		text: 'Está seguro de eliminar la sub categoria seleccionada?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {
        	window.location = url_base + "SubCategorias/eliminar/" + id;
        }
	});
});

$(document).on("click", ".btn-edit-category", function() {

	var id = $(this).attr("category");
	var fd = new FormData();
	fd.append("cpos-category-id", id);

	$.ajax({
		url: url_base + 'SubCategorias/Editar/' + id,
		method: 'GET',
		data : fd,
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id.toString());
			$("#category_id").val(response["category_id"]);
			$("#sub_category").val(response["sub_category"]);
		}
	});
});