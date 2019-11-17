var url_base = "http://localhost/davidfootwear/";
var base_url = "http://localhost/davidfootwear/";

var dt_spanish = {

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

/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree();

/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({

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

/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})

/*=============================================
 //input Mask
=============================================*/

//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask();


/* window.onbeforeunload = function() {
  return "Todo el progreso que haya realizado será perdido, esta seguro de salir del sitio?";
}; */

function Medias() {
    if(window.matchMedia('(max-width:767px)').matches){
            $("body").removeClass("sidebar-mini");
            $("body").removeClass("sidebar-collapse");
            if($("body").hasClass("sidebar-open")){
                $("body").removeClass("sidebar-open");
            }
    }else{
        if(!$("body").hasClass("sidebar-mini")) {
            $("body").removeClass("sidebar-collapse");
            $("body").addClass("sidebar-mini");
        }
    }
}

$(window).resize(function() {
    Medias();
});

$('.sidebar-menu').tree();

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var th = " AM";    
    if(!(h < 12)) {
        th = "";
    }
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('datetime').innerHTML = h + ":" + m + ":" + s + th;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

$().ready(function(){
    startTime();
    Medias();
});

$(".btn-submit").click(function(event) {
    
})