"use strict";

function crear_subcategoria(id) {
    ajax("/categorias/subcategoria/create", "post", {"categoria": {"id": id, "subcategoria": {"nombre": $("#subcategoria").val()}}});
}

function crear_subsubcategoria(id) {
    ajax("/categorias/subsubcategoria/create", "post", {"subcategoria": {"id": id, "subsubcategoria": {"nombre": $("#subsubcategoria").val()}}});
}

function start() {
    $("#btn_agregar_categoria").click(function () {
        ajax("/categorias", "post", {"categoria": {"nombre": $("#categoria").val()}});
    });
}

$(function () {
    start();
});