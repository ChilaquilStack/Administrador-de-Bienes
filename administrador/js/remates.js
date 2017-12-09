"use strict";

function start() {
    $("#fecha_inicio_remate").datepicker();
    $("#fecha_fin_remate").datepicker();
    $("#hora_inicio_remate").wickedpicker();
    $("#hora_fin_remate").wickedpicker();
}

$(function () {
    start();
});