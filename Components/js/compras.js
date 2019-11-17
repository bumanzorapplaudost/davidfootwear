dt_purchase_list = $(".dt-purchase-list").DataTable({
    "ajax" : url_base + "Compras/Lista/",
    "deferRender" : true,
    "bLengthChange" : false,
    "pageLength" : 10,
    "searching" : false,
    "info" : false,
    "ordering" : false,
    "retrieve": true,
    "processing": true,
    "language" : dt_spanish
});