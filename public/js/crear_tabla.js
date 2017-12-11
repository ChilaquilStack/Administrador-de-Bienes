"use strict";
function start() {
    $("#agregar").click(agregar_bienes);
    $("#agregar_categoria").click(agregar_categoria);
    $("#agregar_subcategoria").click(agregar_subcategoria);
    $("#agregar_subsubcategoria").click(agregar_subsubcategoria);
    $("#guardar_credito_fiscal").click(guardar_credito);
    $("#estado_deposito").change(estados_depositario);
}

$(function () {
    start();
});
