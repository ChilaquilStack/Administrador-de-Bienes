"use strict";
var tabla_bienes;
function start() {
    tabla_bienes = $("#tabla-bienes").DataTable(crear_tabla(columnas_bienes, "/bienes/bienes", null, null));
    //Mostrar los articulos de un bien
    $('#tabla-bienes tbody').on('click', 'td.view-bienes', function(){
        var data = tabla_bienes.row($(this).parents("tr")).data();
        tabla_articulos = $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos, "/bienes/articulos", {"numero_control": data.numero_control}, botones_bienes));
        tabla_articulos.on( 'order.dt search.dt', function () {
            tabla_articulos.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        } ).draw();
        $("#tabla_articulos").show();
    });
}

$(function () {
    start();
});