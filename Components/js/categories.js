var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
});

$(".cat-table").DataTable( {
	"ajax": url_base + "Clasificaciones/Lista",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": dt_spanish
});

$(document).on("click", ".btn-delete-category", function() {
	var id = $(this).attr("category");
	
	swal({
		type: 'question',
		title: 'Eliminar Clasificacion',
		text: 'Está seguro de eliminar la clasificacion seleccionada?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {
        	window.location = url_base + "Clasificaciones/eliminar/" + id;
        }
	});
});

$(document).on("click", ".btn-edit-category", function() {

	var id = $(this).attr("category");
	var fd = new FormData();
	fd.append("cpos-category-id", id);

	$.ajax({
		url: url_base + 'Clasificaciones/editar/' + id,
		method: 'GET',
		data : fd,
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id.toString());
			$("#ecategory-name").val(response["category"]);
		}
	});
});