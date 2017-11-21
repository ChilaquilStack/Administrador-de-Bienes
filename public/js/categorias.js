"use strict";


function start() {
    categoria = {"subcategorias": []};
    var subcategoria = {"nombre": '', "subsubcategorias": []};

    function crear_tabla() {
        let total = categoria.subcategorias.length;
        $.each( categoria.subcategorias, function (index, value) {
            console.log(value.subcategoria.length)
        });
    }


    function subcategori(nombre, subsubcategoria) {
        this.nombre = nombre;
        this.subsubcategoria = subsubcategoria;
    }

    $("#agregar_subcategoria").click(function () {
        categoria.nombre = $("#categoria").val();
        categoria.subcategorias.push(new subcategori(subcategoria.nombre, subcategoria.subsubcategorias));
        //subcategoria.nombre = '';
        subcategoria.subsubcategorias = [];
        crear_tabla();
    });

    $("#agregar_subsubcategoria").click(function () {
        subcategoria.nombre = $("#subcategoria").val();
        subcategoria.subsubcategorias.push($("#subsubcategoria").val());
        //crear_tabla();
    });
}

$(function () {
    start();
});