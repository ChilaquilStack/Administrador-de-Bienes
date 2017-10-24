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

function crear_tabla(tabla, columnas, url, data, botones) {
    tabla.DataTable({
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
        "buttons": botones
    });
}

function ajax(direccion, metodo = "get", data, tabla) {
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
        "columns": columnas_bienes
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
    crear_tabla($("#creditos"), columnas_creditos, "creditos/creditos",null,botones_credito);

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

    //Mostrar los bienes de un credito fiscal
    $('#creditos tbody').on('click', 'td.view-bienes', function(){
        var data = tabla_creditos.row($(this).parents("tr")).data();
        crear_tabla($("#tabla_bienes"),columnas_bienes, "/creditos/bienes", {"folio": data.folio}, "null");
    });
    //Agregar Bienes
    $("#agregar").click( function () {
        agregar_bienes();
    });
}
$(function () {
    start();
});