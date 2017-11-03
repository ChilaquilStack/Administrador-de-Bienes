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

function ajax(direccion, metodo = "get", data) {
    $.ajax({
        "url": direccion,
        "type": metodo,
        "data": data,
        "success": function(msj) {
            $("#success #mensaje").text(msj);
            $("#success").modal();
        },
        "error": function(msj) {
            $("#warning #mensaje").text("");
            for(var e in msj.responseJSON.errors) {
                for(var a in msj.responseJSON.errors[e]){
                    $("#warning #mensaje").append("<p>" + msj.responseJSON.errors[e][a] + "</p>");
                    $("#warning").modal();
                }
            }
        },
        //Se necesita un token para enviar datos a laravel
        "headers": {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}