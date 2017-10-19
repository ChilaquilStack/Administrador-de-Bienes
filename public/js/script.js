"use strict";
var tabla_creditos;

var columnas_creditos;
columnas_creditos = [
    {
        "title": "Creditos Fiscales",
        "data": "folio"
    },
    {
        "title": "Documento Determinante",
        "data": "documento_determinante"
    },
    {
        "title": "Origen del credito fiscal",
        "data": "origen_credito"
    },
    {
        "title": "Monto total del credito fiscal",
        "data": "monto",
        "render": function (data) {
            return "$" + data;
        }
    },
    {
        "title": "Bienes del credito fiscal",
        "defaultContent": "<button type='button' class='btn btn-default btn-lg'><span class='glyphicon glyphicon-eye-open'></button>",
        "data": null,
        "className": "view-bienes"
    },
    {
        "title": "Editar credito fiscal",
        "defaultContent": "<button type='button' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-edit'></span></button>",
        "data": null,
        "className": "details-control"
    },
    {
        "title": "Eliminar",
        "className": "delete-control",
        "defaultContent": "<button type='button' class='btn btn-danger btn-lg' data-toggle='modal' data-target='#warning'><span class='glyphicon glyphicon-remove'></span></button>"
    }
];

function actualizar_credito(folio) {
    var datos = {};
    datos.folio = $("#nuevo_folio").val();
    datos.monto = $("#nuevo_monto").val();
    datos.documento= $("#nuevo_documento_determinante").val();
    datos.origen = $("#nuevo_origen").val();
    ajax("/creditos/update", "post", {"folio": folio, "credito": datos});
    tabla_creditos.ajax.reload();
}
function format ( d ) {
    // `d` is the original data object for the row
    return '<table id="tabla_actualizar_credito" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
            '<td>Credito Fiscal:</td>' +
            '<td>' + '<input type="text" id="nuevo_folio" value="' + d.folio + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Docuemento Determinante:</td>' +
            '<td>' + '<input type="text" id="nuevo_documento_determinante" value="' + d.documento_determinante + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Origen del Credito:</td>' +
            '<td>' + '<input type="text" id="nuevo_origen"value="' + d.origen_credito + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Monto:</td>' +
            '<td>' + '<input type="text" id="nuevo_monto" value="' + d.monto + '"></td>' +
        '</tr>' +
        '<tr>' +
        '<td>' + '<button type="button" class="btn btn-success btn-sm" onclick="actualizar_credito(' + d.folio + '); return false;">Actualizar</button>' + '</td>' +
    '</tr>' +
    '</table>';
}

function crear_tabla(tabla, columnas) {
    tabla.DataTable({
        "contentType": "application/json; charset=utf-8",
        "dataType": "json",
        "ajax": {
            "url": "/creditos/creditos",
            "dataSrc": function (json) {
                return $.parseJSON(json);
            }
        },
        "columns": columnas,
        "bDestroy": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "dom": "Bfrtip",
        "buttons": [
            {
                "text": "<i id='botoncito' class='glyphicon glyphicon-plus-sign'></i>",
                "titleAttr" : "Registrar Credito Fiscal",
                "className" : "btn btn-info",
                "action": function(){
                    if($("#botoncito").hasClass("glyphicon glyphicon-plus-sign")){
                        $("#creditos_fiscales_form").slideDown("slow");
                        $("#botoncito").removeClass("glyphicon glyphicon-plus-sign");
                        $("#botoncito").addClass("glyphicon glyphicon-minus-sign");
                    } else{
                        $("#creditos_fiscales_form").slideUp("slow");
                        $("#botoncito").removeClass("glyphicon glyphicon-minus-sign");
                        $("#botoncito").addClass("glyphicon glyphicon-plus-sign");
                    }
                }
            },
            {
                "text": "<i class='fa fa-file-excel-o'></i>",
                "extend": "excelHtml5",
                "className": "btn btn-info",
                "titleAttr": "Excel",
                "filename": "reporte",
                "exportOptions": {
                    "columns":[1,2,3]
                }
            },
            {
                "text": "<i class='fa fa-file-pdf-o'></i>",
                "extend": "pdfHtml5",
                "className": "btn btn-info",
                "titleAttr": "PDF",
                "exportOptions": {
                    "columns":[1,2,3]
                }
            }
        ]
    });
}

function ajax(direccion, metodo, data) {
    $.ajax({
        "url": direccion,
        "type": metodo,
        "data": data,
        "success": function(msj) {
            $("#success #mensaje").text(msj);
            $("#success").modal();
            $("#creditos_fiscales_form")[0].reset();
            //crear_tabla($("#creditos"), columnas_creditos);
        },
        "error": function(msj) {
            $("#warning #mensaje").text("");
            for(var e in msj.responseJSON){
                for(var a in msj.responseJSON[e]){
                    $("#warning #mensaje").append("<p>" + msj.responseJSON[e][a] + "</p>");
                    $("#warning").modal();
                }
            }
        },
        "headers": {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function start() {

    //Llamado de la tabla de los creditos fiscales
    crear_tabla($("#creditos"), columnas_creditos);

    //Asignamos la tabala a una variable
    tabla_creditos = $("#creditos").DataTable();

    //Tomar los datos del credito fiscal
    $("#guardar").click(function () {
        var credito_fiscal;
        credito_fiscal = {};
        credito_fiscal.folio = $("#folio").val();
        credito_fiscal.documento = $("#documento").val();
        credito_fiscal.origen = $("#origen").val();
        credito_fiscal.monto = $("#monto").val();
        //Se envian los datos al servidor
        ajax("/creditos/create", "post", {"credito": credito_fiscal}, $("#success"), $("#success #mensaje"));
        //Refrescamos la tabla para que cargue el nuevo registro
        tabla_creditos.ajax.reload(function(json){
            console.log(json.lastInput);
        });
    });

    //Mostrar los detalles del credito fiscal en una sub-tabla
    $('#creditos tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = tabla_creditos.row(tr);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            //format retorna la sub-tabla
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

    //Eliminar los creditos fiscales
    $('#creditos tbody').on('click', 'td.delete-control', function () {
        var data = tabla_creditos.row($(this).parents("tr")).data();
        $("#data").val(data.folio);
        $("#confirmar_warning").click(function() {
            $("#eliminar_credito").modal()
            $("#aceptar_eliminar_credito").click(function(){
                ajax("/creditos/destroy", "post", {
                        "folio": $("#data").val(),
                        "baja": $("#categoria_bajas option:selected").val(),
                        "comentarios": $("#comentarios").val()
                    }
                );
                //Recargamos la tabla para que deje de mostrar el credito eliminado
                tabla_creditos.ajax.reload();
            });
        });
    });

    //Ver los bienes que tienen adjunto los creditos fiscales
    $('#creditos tbody').on('click', 'td.view-bienes', function () {
        var data = tabla_creditos.row($(this).parents("tr")).data();
    });

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex ) {
            var min = parseInt( $('#min').val(), 10 );
            var max = parseInt( $('#max').val(), 10 );
            var age = parseFloat( data[3] ) || 0; // use data for the age column

            if ( ( isNaN( min ) && isNaN( max ) ) ||
                 ( isNaN( min ) && age <= max ) ||
                 ( min <= age   && isNaN( max ) ) ||
                 ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );
    $('#min, #max').keyup( function() {
        tabla_creditos.draw();
    });
}
$(function () {
    start();
});