$(document).ready(function(){
    $("#btn-select-warehouse").click();
});

$(document).on("click", "#btn-selected-warehouse", function() {
    if($("#transfer-warehouse :selected").val() == "") {
        $("#close-modal").click();
    }else {
        swal({
            type : 'warning',
            title : 'Bodega Vacía',
            text : 'Favor Seleccione una Bodega'
        });
    }
});

$(document).on("click", ".btn-close", function(e) {
    if($("#transfer-warehouse :selected").val() == "") {
        swal({
            type : 'warning',
            title : 'Bodega Vacía',
            text : 'Favor Seleccione una Bodega'
        }).then(function(){
            window.location = "create-transfer";
        });
    }
});