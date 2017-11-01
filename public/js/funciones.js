"use strict";
function crear_tabla(columnas, url, data, botones) {
    var obj;
    obj = {
        "contentType": "application/json; charset=utf-8",
        "dataType": "json",
        "ajax": {
            "data": data,
            "url": url,
            "dataSrc": function (json) {
                return $.parseJSON(json);
            }
        },
        "columns": columnas,
        "bDestroy": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "pageLength": 5,
        "dom": "Bfrtip",
        "buttons": botones,
        "destroy": true
    }
    return obj;
}