var Utility = Utility || {};

Utility.RegisterKeyPress = function () {
    var codeset = { 32: false, 46: false, 118: false, 78: false, 82: false, 13: false };

    $(document).on('keydown', function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code in codeset) {
            codeset[e.keyCode] = true;
            if (codeset[32]) {
                e.preventDefault();
                $("#pos-search-product").click();
                codeset[32] = false;
                console.log("Space pressed");
            }else if(codeset[46]){
                $("#pos-delete-sale").click();
            	codeset[46] = false;
            }else if(codeset[118]){
                $("#pos-checkout").click();
            	console.log("Checkout");
            	codeset[118] = false;
            }else if(codeset[78]) {
                console.log("Mostrar modal para crear nueva venta");
                codeset[78] = false;
            }else if(codeset[119]) {
                $("#pos-add-product").click();
                codeset[13] = false;
            }else if(codeset[82]) {
                console.log('Redirigir para las ventas retenidas, facturas no finalizadas');
                codeset[82] = false;
            }
        }
    }).on('keyup', function (e) {
        if (e.keyCode in codeset) {
            codeset[e.keyCode] = false;
        }
    });
};

Utility.RegisterKeyPress();

$().ready(function() {
    if(window.matchMedia('(max-width:767px)').matches){
        swal({
            type: 'error',
            title : 'Dispositivo no soportado',
            text: 'No puede accesar al POS desde un celular, ingrese desde un computador...'
        }).then(function(result){
            if(result.value){
                window.location = "Home";
            }
        });
    }
});

$(document).on("click", "#pos-add-product", function(){
    $("#product-code").val("");
    $("#product-code").focus();
    $("#loading").css("display","block");

    //setTimeout iria dentro del response de Ajax
    setTimeout(function(){
        $("#loading").css("display","none");
    }, 1000);
})