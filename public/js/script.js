"use strict";
var tabla_creditos, credito_fiscal = {
    "contribuyente": {
        "domicilio": {}
    },
    "bienes": [
        // {
        //     "resguardo": {
        //         "resguardatario":{},
        //         "domicilio": {}
        //     },
        // }
    ]
};

var columnas_creditos;
columnas_creditos = [
    {
        "title": "Crédito Fiscal",
        "data": "folio"
    },
    {
        "title": "Documento determinante",
        "data": "documento_determinante"
    },
    {
        "title": "Origen del crédito fiscal",
        "data": "origen_credito"
    },
    {
        "title": "Adeudo",
        "data": "monto",
        "render": function (data) {
            return "$" + data;
        }
    },
    {
        "title": "Bienes",
        "defaultContent": "<button type='button' class='btn btn-default btn-lg'><span class='glyphicon glyphicon-eye-open'></button>",
        "data": null,
        "className": "view-bienes"
    },
    {
        "title": "Editar",
        "defaultContent": "<button type='button' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-edit'></span></button>",
        "data": null,
        "className": "details-control"
    },
    {
        "title": "Baja",
        "className": "delete-control",
        "defaultContent": "<button type='button' class='btn btn-danger btn-lg' data-toggle='modal' data-target='#warning'><span class='glyphicon glyphicon-remove'></span></button>"
    }
];

function format ( d ) {
    // `d` is the original data object for the row
    return '<table id="tabla_actualizar_credito" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
            '<td>Crédito Fiscal:</td>' +
            '<td>' + '<input type="text" id="nuevo_folio" value="' + d.folio + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Docuemento Determinante:</td>' +
            '<td>' + '<input type="text" id="nuevo_documento_determinante" value="' + d.documento_determinante + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Origen del Crédito:</td>' +
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
        "pageLength": 5,
        "dom": "Bfrtip",
        "buttons": [
            {
                "text": "<i id='add_credito' class='fa fa-plus' aria-hidden='true'></i>",
                "className": "btn btn-info",
                "action": function(){
                    if( $("#registro_creditos_fiscales").is(":hidden") ){
                        $("#registro_creditos_fiscales").show("slow");
                        $("#add_credito").removeClass("fa fa-plus");
                        $("#add_credito").addClass("fa fa-minus");
                        $("#creditos").hide("slow");
                    } else {
                        $("#registro_creditos_fiscales").slideUp("slow");
                        $("#add_credito").removeClass("fa fa-minus");
                        $("#add_credito").addClass("fa fa-plus");
                        $("#creditos").show("slow");
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
                    "columns":[0,1,2,3]
                }
            },
            {
                "text": "<i class='fa fa-file-pdf-o'></i>",
                "extend": "pdfHtml5",
                "className": "btn btn-info",
                "titleAttr": "PDF",
                "exportOptions": {
                    "columns":[0,1,2,3]
                }
            }
        ]
    });
}

function ajax(direccion, metodo, data, tabla) {
    let e;
    $.ajax({
        "url": direccion,
        "type": metodo,
        "data": data,
        "success": function(msj) {
            $("#success #mensaje").text(msj);
            $("#success").modal();
            $("#creditos_fiscales_form")[0].reset();
            tabla.ajax.reload();
        },
        "error": function(msj) {
            $("#warning #mensaje").text("");
            for(e in msj.responseJSON) {
                for(var a in msj.responseJSON[e]){
                    $("#warning #mensaje").append("<p>" + msj.responseJSON[e][a] + "</p>");
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

//Funcion para guardar los creditos fiscales
function guardar_credito(){
    credito_fiscal.folio = $("#folio").val();
    credito_fiscal.documento = $("#documento").val();
    credito_fiscal.origen = $("#origen").val();
    credito_fiscal.monto = $("#monto").val();
    credito_fiscal.contribuyente.nombre = $("#nombre").val();
    credito_fiscal.contribuyente.apellido_paterno = $("#paterno").val();
    credito_fiscal.contribuyente.apellido_materno = $("#materno").val();
    credito_fiscal.contribuyente.telefono = $("#telefono").val();
    credito_fiscal.contribuyente.rfc = $("#rfc").val();
    credito_fiscal.contribuyente.curp = $("#curp").val();
    credito_fiscal.contribuyente.domicilio.estado = $("#estado").val();
    credito_fiscal.contribuyente.domicilio.municipio = $("#municipio").val();
    credito_fiscal.contribuyente.domicilio.colonia = $("#colonia").val();
    credito_fiscal.contribuyente.domicilio.cp = $("#codigo_postal").val();
    credito_fiscal.contribuyente.domicilio.int = $("#int").val();
    credito_fiscal.contribuyente.domicilio.ext = $("#ext").val();
    credito_fiscal.contribuyente.domicilio.calle = $("#calle").val();
    //Se envian los datos al servidor
        ajax("/creditos/create", "post", {"credito": credito_fiscal}, $("#success"), $("#success #mensaje"), tabla_creditos);
    //console.log(credito_fiscal);
    //Refrescamos la tabla para que cargue el nuevo registro
}

function agregar_bienes(){
    let bien = {};
    bien.numero_control = $("#numero_control").val();
    bien.cantidad = $("#cantidad").val();
    bien.categoria = $("#categoria").val();
    bien.subcategoria = $("#subcategoria").val();
    bien.subsubcategoria = $("#subsubcategoria").val();
    bien.comentarios = $("#comentarios_bien").val();
    credito_fiscal.bienes.push(bien);
    let tabla_bienes = $("#tabla_bienes").dataTable({
        "bDestroy": true,
        "data": credito_fiscal.bienes,
        "columns":[
            {
                "data": "numero_control"
            },
            {
                "data": "categoria"
            },
            {
                "data": "subcategoria"
            },
            {
                "data": "subsubcategoria"
            },
            {
                "data": "cantidad"
            },
            {
                "data": "comentarios"
            },
            {
                "data":null,
                "defaultContent": "<button'>X</button>",
            },
            {
                "data":null,
                "defaultContent": "<button>X</button>"
            }
        ]
    });
}

function eliminar_credito(){
    var data = tabla_creditos.row($(this).parents("tr")).data();
    $("#data").val(data.folio);
    $("#confirmar_warning").click(function() {
        $("#eliminar_credito").modal()
        $("#aceptar_eliminar_credito").click(function(){
            ajax("/creditos/destroy", "post", {
                    "folio": $("#data").val(),
                    "baja": $("#categoria_bajas option:selected").val(),
                    "comentarios": $("#comentarios").val()
                }, tabla_creditos);
        });
    });
}

function actualizar_credito(folio, tabla) {
    var datos = {};
    datos.folio = $("#nuevo_folio").val();
    datos.monto = $("#nuevo_monto").val();
    datos.documento= $("#nuevo_documento_determinante").val();
    datos.origen = $("#nuevo_origen").val();
    ajax("/creditos/update", "post", {"folio": folio, "credito": datos}, tabla);
}

function start() {

     //Llamado de la tabla de los creditos fiscales
    crear_tabla($("#creditos"), columnas_creditos);

    //Asignamos la tabala a una variable
    tabla_creditos = $("#creditos").DataTable();

    //Tomar los datos del credito fiscal
    $("#guardar").click(guardar_credito);

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
    $('#creditos tbody').on('click', 'td.delete-control', eliminar_credito);

    //Agregar Bienes
    $("#agregar").click( function () {
        agregar_bienes();
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