"use strict";

function obtener_datos_bien(){
	$("#formulario_bien").on("submit", function({
		console.log($(this).serialize());
	});
}

function start() {
	obtener_datos_bien;
}

$(function){
	start();
}