"use strict";

function start() {
    var tabla_bienes; 
    tabla_bienes = $("#tabla_bienes_crear").dataTable({
        "contentType": "application/json; charset=utf-8",
        "dataType": "json",
        "ajax": {
            "url": "/bienes/bienes",
            "dataSrc": function (json) {
                return $.parseJSON(json);
            }
        },
        "columns": columnas_bienes,
        "bDestroy": true,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "pageLength": 5,
        "dom": "Bfrtip",
        "buttons": [],
        "destroy": true,
    });
}

$(function () {
    start();
});