var action = "";

$(document).ready(function() {
	action = $("#EditForm").attr("action");
});

dt = $(".tbl_productos").DataTable( {
	"ajax": url_base + "Productos/Lista",
	"bLengthChange" : false,
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": dt_spanish
});

$(document).on("change", ".picture_image", function(){
	var img = this.files[0];
	console.log("Files");

	if(img["type"] != "image/jpeg" && img["type"] != "image/png"){
		$(".picture_image").val("");
		swal({
			title : 'Error',
			text : 'Extension incorrecta, asegúrese que el formato de la imagen sea JPG / PNG',
			type : 'warning',
			confirmButtonText : 'Cerrar'
		});
		$(".preview").attr("src", url_base + "Components/img/productos/default/anonymous.png");
	}else if(img["size"] > 7000000){
		$(".picture_image").val("");
		swal({
			title : 'Error',
			text : 'La imagen excede el almacenamiento permitido, intente con una mas liviana',
			type : 'warning',
			confirmButtonText : 'Cerrar'
		});
		$(".preview").attr("src", url_base + "Components/img/productos/default/anonymous.png");
	}else{
		var imgData = new FileReader;
		imgData.readAsDataURL(img);
		$(imgData).on("load",function(event){
			var path = event.target.result;
			$(".preview").attr("src", path);
		});
	}
});

$(document).on("change", "#earning", function(){
	var rev = $("#earning").val();
	price = $("#cost_price").val() * (1+ (rev/100));
	//price = Math.round(price);
	$("#sell_price").val(price);

});

$(document).on("click", "#increaseps", function(){
	var img = $(this).attr("image");
	$("#showedImage").attr("src", img);
});

$(document).on("click", ".btn-tallas", function(){
	var product = $(this).attr("product");

	var result = $(".tbl_tallas").DataTable( {
		"ajax": url_base + "Productos/Tallas/" + product,
		"deferRender": true,
		"bLengthChange" : false,
		"pageLength" : 5,
		"retrieve": true,
		"processing": true,
		"language": dt_spanish
	});

	setTimeout(function() {
		result.ajax.url(url_base + "Productos/Tallas/" + product).load()
	}, 50)
});

$(document).on("click", ".btn-edit-product", function() {

	var id = $(this).attr("product");

	$.ajax({
		url: url_base + 'Productos/Editar/' + id,
		method: 'GET',
		cache : false,
		contentType : false,
		processData : false,
		dataType : "json",
		success: function(response){
			$("#EditForm").attr("action", action + id);
			$("#code").val(response["code"]);
			$("#brand_id").val(response["brand_id"]);
			$("#category_id").val(response["category_id"]);
			$("#color").val(response["color"]);
			$("#_cost_price").val(response["cost_price"]);
			$("#_earning").val(response["earning"]);
			$("#gender").val(response["gender"]);
			$("#min_stock").val(response["min_stock"]);
			$("#_sell_price").val(response["sell_price"]);
			$(".preview").attr("src", url_base + "Components/img/productos/"+ response["picture"]);
		}
	});
});

$(document).on("click", ".btn-delete-product", function() {

	var product = $(this).attr("product");

	swal({
		type: 'question',
		title: 'Eliminar Producto',
		text: 'Está seguro de eliminar el producto seleccionado?',
		showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar!'
        }).then(function(result) {
        if (result.value) {

        	$.ajax({
				url: url_base + 'Productos/Eliminar/' + product,
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
							text: 'Producto eliminado con éxito'
						}).then(function(result) {
							if(result.value) {
								dt.ajax.reload()
							}
						});
					}else if(response["status"] == "existing") {
						swal({
							type: 'error',
							title: 'Stock Existente',
							text: 'El producto no se puede eliminar, hay unidades en bodega.'
						});
					}					
				}
			});
        }
	});
});