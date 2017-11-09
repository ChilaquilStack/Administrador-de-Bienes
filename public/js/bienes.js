"use strict";
var tabla_bienes;
function start() {
    tabla_bienes = $("#tabla-bienes").DataTable(crear_tabla(columnas_bienes, "/bienes/bienes", null, null));
    //Mostrar los articulos de un bien
    $('#tabla-bienes tbody').on('click', 'td.view-bienes', function(){
        var data = tabla_bienes.row($(this).parents("tr")).data();
        tabla_articulos = $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos_bienes, "/bienes/articulos", {"numero_control": data.numero_control}, botones_bienes));
        $("#tabla_articulos").show();
    });
}

$(function () {
    start();
});