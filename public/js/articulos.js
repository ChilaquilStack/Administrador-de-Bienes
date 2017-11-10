"use strict";

function addImage1(e){
    var file = e.target.files[0],
    imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = fileOnload1;
    reader.readAsDataURL(file);
}

function addImage2(e){
    var file = e.target.files[0],
    imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = fileOnload2;
    reader.readAsDataURL(file);
}

function addImage3(e){
    var file = e.target.files[0],
    imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = fileOnload3;
    reader.readAsDataURL(file);
}

function addImage4(e){
    var file = e.target.files[0],
    imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = fileOnload4;
    reader.readAsDataURL(file);
}

function fileOnload1(e) {
    var result=e.target.result;
    $('#imgSalida1').attr("src",result);
}

function fileOnload2(e) {
    var result=e.target.result;
    $('#imgSalida2').attr("src",result);
}

function fileOnload3(e) {
    var result=e.target.result;
    $('#imgSalida3').attr("src",result);
}

function fileOnload4(e) {
    var result=e.target.result;
    $('#imgSalida4').attr("src",result);
}


function start() {

    $("#guardar_credito_fiscal").click(function(){
        guardar_credito();
    });

    $('#loadImage1').change(function (e) {
        addImage1(e);
    });

    $('#loadImage2').change(function (e) {
        addImage2(e);
    });

    $('#loadImage3').change(function (e) {
        addImage3(e);
    });

    $('#loadImage4').change(function (e) {
        addImage4(e);
    });

}

$(function () {
    start();
});