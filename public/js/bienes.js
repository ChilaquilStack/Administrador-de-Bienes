"use strict";
function start() {
    tabla_articulos = $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos_bienes, "bienes/bienes", botones_bienes));
    $("#tabla_articulos").show();
}

$(function () {
    start();
});