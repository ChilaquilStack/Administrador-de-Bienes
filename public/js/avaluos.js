"use strict";

function enviar() {
    var avaluo;
    avaluo = {
        perito: {}
    };
    avaluo.articulo = $("#id_articulo").val()
    avaluo.perito.nombre = $("#nombre_perito").val();
    avaluo.perito.apellido_paterno = $("#apellido_paterno_perito").val();
    avaluo.perito.apellido_materno = $("#apellido_materno_perito").val();
    avaluo.monto = $("#monto").val();
    avaluo.numero_dictamen = $("#numero_dictamen").val();
    avaluo.fecha = $("#fecha_avaluo").val();
    ajax("/avaluos", "post", {"avaluo": avaluo});
}

function start() {
    $("#enviar").click(function () {
        enviar()
    });
    $("#fecha_avaluo").datepicker();
}

$(function () {
    start();
});