"use strict";

var categoria = {"subcategorias": []};

function buscar_subcategoria(subcategoria) {
    return subcategoria.nombre === $("#subcategoria").val();
}

function nueva_subcategoria(nombre, subsubcategorias) {
    this.nombre = nombre;
    this.subsubcategorias = subsubcategorias;
}

function crear_tabla() {
    var tabla = "", numero_subcategorias;

    numero_subcategorias = categoria.subcategorias.length + 1;
    $.each(categoria.subcategorias, function (index, value) {
        numero_subcategorias += value.subsubcategorias.length;
    });
    tabla = "<tr><td rowspan='" + numero_subcategorias + "'>" + categoria.nombre + "</td></tr>";
    $.each(categoria.subcategorias, function (index, subcategoria) {
        tabla += "<tr><td rowspan='" + parseInt(subcategoria.subsubcategorias.length + 1) + "'>" + subcategoria.nombre + "</td></tr>";
        $.each(subcategoria.subsubcategorias, function (index, subsubcategoria) {
            tabla += "<tr><td>" + subsubcategoria + "</td></tr>";
        });
    });
    $("#tabla_categorias tbody").html('');
    $("#tabla_categorias tbody").append(tabla);
}

function agregar_subcategoria() {
    categoria.nombre = $("#categoria").val();
    categoria.subcategorias.push(new nueva_subcategoria($("#subcategoria").val(), []));
    crear_tabla();
}

function agregar_subsubcategoria() {
    var subcategoria = {"subsubcategorias": []};
    subcategoria = categoria.subcategorias.find(buscar_subcategoria);
    subcategoria.subsubcategorias.push($("#subsubcategoria").val());
    crear_tabla();
}

function start() {
    var btn_agregar_subcategoria, btn_agregar_subsubcategoria, btn_guardar_categoria;

    btn_agregar_subcategoria = $("#agregar_subcategoria");
    btn_agregar_subsubcategoria = $("#agregar_subsubcategoria");
    btn_guardar_categoria = $("#guardar_categoria");

    btn_agregar_subcategoria.click(agregar_subcategoria);
    btn_agregar_subsubcategoria.click(agregar_subsubcategoria);
    btn_guardar_categoria.click(function(){
        ajax("/categorias", "post", {"categoria": categoria});
    });
}

$(function () {
    start();
});