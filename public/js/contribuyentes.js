"use strict";
function start() {
    let tabla_contribuyentes, tabla_creditos;
    tabla_contribuyentes = $("#tabla_contribuyentes").DataTable(crear_tabla(columnas_contribuyentes, "/contribuyentes/contribuyentes", null, null));
    tabla_creditos = $("#creditos").DataTable(crear_tabla(columnas_creditos_contribuyente, "/contribuyentes/creditos", {"id": 1}, null));
    //Mostrar los bienes de un credito fiscal
    $('#creditos tbody').on('click', 'td.view-bienes', function(){
        var data = tabla_creditos.row($(this).parents("tr")).data();
        $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos, "/creditos/bienes", {"folio": data.folio}, botones_bienes));
        $("#tabla_articulos").show();
    });
}

$(function () {
    start();
});