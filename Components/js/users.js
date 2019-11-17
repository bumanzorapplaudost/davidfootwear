var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
})

var dt = $(".users-table").DataTable( {
		"ajax": url_base + "Usuarios/Lista",
		"deferRender": true,
		"retrieve": true,
		"processing": true,
		"language": dt_spanish
	});

$(document).on("click", ".btn-delete-user", function() {
	var id = $(this).attr("user");
	
	swal({
		type: 'question',
		title: 'Eliminar Usuario',
		text: 'Está seguro de eliminar el usuario seleccionado?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {

        	$.ajax({
				url: url_base + 'Usuarios/Eliminar/' + id,
				method: 'GET',
				cache : false,
				contentType : false,
				processData : false,
				dataType : "json",
				success: function(response){
					if(response["status"] == "success") {
						swal({
							type: 'success',
							title: 'Eliminado',
							text: 'Usuario eliminado con éxito'
						}).then(function(result) {
							if(result.value) {
								dt.ajax.reload()
							}
						})
					}					
				}
			});

        }
	});
});

$(document).on("click", ".btn-edit-user", function() {
	var id = $(this).attr("user");
	$("#EditForm").attr("action", action + id);

	$.ajax({
		url: url_base + 'Usuarios/Editar/' + id,
		method: 'GET',
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id.toString());
			
		}
	});
});