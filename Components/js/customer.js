var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
})


$(".customer-table").DataTable( {
	"ajax": url_base + "Clientes/Lista",
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

$(document).on("change", ".customer-type", function() {
	var val = "";
	if($(this).attr("id") == "customer-type"){
		val = $("#customer-type :selected").val();
	}else{
		val = $("#ecustomer-type :selected").val();
	}
	if(val == "CCF" || val == "EXP" || val == "ENT") {
		$(".c-type").removeAttr("disabled");
		$(".c-type").attr("required","required");
	}else{
		$(".c-type").attr("disabled","disabled");
		$(".c-type").removeAttr("required");
	}
});

$(document).on("click", ".customer-show-data", function() {
	var id = $(this).attr("customer");
	var fd = new FormData();
	fd.append("bll_type_id", id);

	$.ajax({
		url: url_base + 'Clientes/DatosFiscales/' + id,
		method: 'GET',
		data : fd,
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			var type = "";
			$("#vcustomer-nit").val(response["nit"]);
			$("#vcustomer-nrc").val(response["nrc"]);
			$("#vcustomer-area").val(response["area"]);
			$("#fd_representative").val(response["representative"]);
		}
	});
});

$(document).on("click", ".btn-delete-customer", function() {
	var id = $(this).attr("customer");
	swal({
		type: 'question',
		title: 'Eliminar Cliente',
		text: 'Está seguro de eliminar el cliente?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {
        	window.location = url_base + "Clientes/Eliminar/"+id;
        }
	})
});

$(document).on("click", ".btn-edit-customer", function() {
	var id = $(this).attr("customer");
	$("#EditForm").attr("action", action+id);
	var fd = new FormData();
	fd.append("bll_type_id", id);

	$.ajax({
		url: url_base + 'Clientes/Editar/'+id,
		method: 'GET',
		data : fd,
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id.toString());
			$("#cid").val(response["customer_id"]);
			if(response["type"] == "FCF") {
				$("#ecustomer-nit").attr("disabled","true");
				$("#ecustomer-nrc").attr("disabled","true");
				$("#ecustomer-area").attr("disabled","true");
				$("#erepresentative").attr("disabled", "true");
				$("#ecustomer-nit").removeAttr("required");
				$("#ecustomer-nrc").removeAttr("required");
				$("#ecustomer-area").removeAttr("required");
				$("#erepresentative").removeAttr("required");
			}else{
				$("#erepresentative").attr("required", "true");
				$("#ecustomer-nit").attr("required","true");
				$("#ecustomer-nrc").attr("required","true");
				$("#ecustomer-area").attr("required","true");
				$("#ecustomer-nit").removeAttr("disabled");
				$("#ecustomer-nrc").removeAttr("disabled");
				$("#ecustomer-area").removeAttr("disabled");
				$("#erepresentative").removeAttr("disabled");
			}

			$("#ecustomer-fname").val(response["name"]);
			$("#ecustomer-phone").val(response["phone"]);
			$("#ecustomer-email").val(response["email"]);
			$("#ecustomer-type").val(response["type"]);
			$("#ecustomer-nit").val(response["nit"]);
			$("#ecustomer-nrc").val(response["nrc"]);
			$("#ecustomer-area").val(response["area"]);
		}
	});
});