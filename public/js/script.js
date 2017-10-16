"use strict";
var dataSet = [
    {
        "folio": "1",
        "documento": "0000001",
        "origen": "Anexo18",
        "monto": "25000"
    },
    {
        "folio": "2",
        "documento": "0000002",
        "origen": "Anexo18",
        "monto": "35000"
    }
];

function crear_tabla(tabla, columnas) {
    tabla.DataTable({
        "data": dataSet,
        "columns": columnas,
        "bDestroy": true
    });
}
function crear_credito_fiscal() {
    var credito_fiscal;
    credito_fiscal = {};
    credito_fiscal.folio = $("#folio").val();
    credito_fiscal.documento = $("#documento").val();
    credito_fiscal.origen = $("#origen").val();
    credito_fiscal.monto = $("#monto").val();
    dataSet.push(credito_fiscal);
}
function start() {
    var tabla, columnas_creditos;
    columnas_creditos = [
        {
            "title": "Creditos Fiscales",
            "data": "folio"
        },
        {
            "title": "Documento Determinante",
            "data": "documento"
        },
        {   
            "title": "Origen del credito",
            "data": "origen"},
        {   
            "title": "Monto total del credito",
            "data": "monto"},
        {
            "title": "Bienes",
            "defaultContent": "<button class='btn btn-info'>Ver</button>",
            "data": null
        }
    ];
    tabla = $('#creditos');
    $("#guardar").click(function () {
        crear_credito_fiscal();
        crear_tabla(tabla, columnas_creditos);
    });
    crear_tabla(tabla, columnas_creditos);
}
$(function () {
    start();
});