"use strict";

var categorias = [];

function mostrar_categorias() {
    $.ajax({
        "url": url + "categorias/subcategorias",
        "method": "get",
        "data": {
            "id": $("#categoria option:selected").val()
        },
        "success": function(data) {
            $("#subcategoria").html('');
            $.each(data, function(i, obj) {
                $("#subcategoria").append("<option value='" + obj.id + "'>" + obj.nombre + "</option>");
            });
        },
        "error": function(data){
            console.log("error");
        }
    });
}

function mostrar_subcategorias() {
    $.ajax({
        "url": url + "categorias/subsubcategorias",
        "method": "get",
        "data": {
            "id": $("#subcategoria option:selected").val()
        },
        "success": function(data) {
            $("#subsubcategoria").html('');
            $.each(data, function(i, obj) {
                $("#subsubcategoria").append("<option value='" + obj.id + "'>" + obj.nombre + "</option>");
            });
        },
        "error": function () {
            console.log("error");
        }
    });
}

function agregar_categorias() {
    var lista = "<ol class='list-group'>"
    //Se crea un objeto con el nombre de la categorias y un arreglo que contendra las subcategorias
    //se agrega a un arreglo que contengas las categorias
    categorias.push({"nombre": $("#categoria option:selected").text(), "subcategorias": []});
    //Las categorias agregadas al arreglo son insertadas en el DOM
    $.each(categorias, function (index, categoria) {
        lista += "<li class='list-group-item' >" + categoria.nombre + "</li>";
    });
    lista += "</ol>";
    $(".categorias").append(lista);
}

$(function () {
    $("#categoria").change(mostrar_categorias);
    $("#subcategoria").change(mostrar_subcategorias);
    $("#agregar_categoria").click(agregar_categorias);
});