"use strict";
var tabla_creditos, tabla_articulos, credito_fiscal = {
    "contribuyente": {
        "domicilio": {}
    },
    "bien": {
        "articulos": [],
        "depositario": {},
        "deposito": {}
    }
};

function format ( d ) {
    // `d` is the original data object for the row
    return '<table id="tabla_actualizar_credito" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
            '<td>Crédito Fiscal:</td>' +
            '<td>' + '<input type="text" id="nuevo_folio" value="' + d.folio + '" readonly></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Docuemento Determinante:</td>' +
            '<td>' + '<input type="text" id="nuevo_documento_determinante" value="' + d.documento_determinante + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Origen del Crédito:</td>' +
            '<td>' + '<input type="text" id="nuevo_origen"value="' + d.origen_credito + '"></td>' +
        '</tr>' +
        '<tr>' +
            '<td>Monto:</td>' +
            '<td>' + '<input type="text" id="nuevo_monto" value="' + d.monto + '"></td>' +
        '</tr>' +
        '<tr>' +
        '<td>' + '<button type="button" class="btn btn-success btn-sm" onclick="actualizar_credito(' + d.folio + '); return false;">Actualizar</button>' + '</td>' +
    '</tr>' +
    '</table>';
}

//Funcion para guardar los creditos fiscales
function guardar_credito(){
    credito_fiscal.folio = $("#folio").val();
    credito_fiscal.documento = $("#documento").val();
    credito_fiscal.origen = $("#origen").val();
    credito_fiscal.monto = $("#monto").val();
    credito_fiscal.contribuyente.nombre = $("#nombre_contribuyente").val();
    credito_fiscal.contribuyente.apellido_paterno = $("#apellido_paterno_contribuyente").val();
    credito_fiscal.contribuyente.apellido_materno = $("#apellido_materno_contribuyente").val();
    credito_fiscal.contribuyente.telefono = $("#telefono_contribuyente").val();
    credito_fiscal.contribuyente.rfc = $("#rfc_contribuyente").val();
    credito_fiscal.contribuyente.curp = $("#curp_contribuyente").val();
    credito_fiscal.contribuyente.domicilio.estado = $("#estado").val();
    credito_fiscal.contribuyente.domicilio.municipio = $("#municipio").val();
    credito_fiscal.contribuyente.domicilio.colonia = $("#colonia").val();
    credito_fiscal.contribuyente.domicilio.cp = $("#codigo_postal").val();
    credito_fiscal.contribuyente.domicilio.int = $("#int").val();
    credito_fiscal.contribuyente.domicilio.ext = $("#ext").val();
    credito_fiscal.contribuyente.domicilio.calle = $("#calle").val();
    credito_fiscal.bien.numero_control = $("#numero_control").val();
    credito_fiscal.bien.deposito.estado = $("#estado_deposito").val();
    credito_fiscal.bien.deposito.municipio = $("#municipio_deposito").val();
    credito_fiscal.bien.deposito.colonia = $("#colonia_deposito").val();
    credito_fiscal.bien.deposito.cp = $("#codigo_postal_deposito").val();
    credito_fiscal.bien.deposito.int = $("#int_deposito").val();
    credito_fiscal.bien.deposito.ext = $("#ext_deposito").val();
    credito_fiscal.bien.deposito.calle = $("#calle_deposito").val();
    credito_fiscal.bien.depositario.nombre = $("#nombre_depositario").val();
    credito_fiscal.bien.depositario.apellido_paterno = $("#apellido_paterno_depositario").val();
    credito_fiscal.bien.depositario.apellido_materno = $("#apellido_materno_depositario").val();
    //Se envian los datos al servidor
        ajax("/creditos/create", "post", {"credito": credito_fiscal}, $("#success"), $("#success #mensaje"), tabla_creditos);
    //Refrescamos la tabla para que cargue el nuevo registro
}

function agregar_articulos(){
    let articulo = { "categoria": {}, "subcategoria": {}, "subsubcategoria":{} };
    articulo.numero_control = $("#numero_control").val();
    articulo.cantidad = $("#cantidad").val()
    articulo.categoria.valor = $("#categoria").val();
    articulo.categoria.texto = $("#categoria :selected").text();
    articulo.subcategoria.valor = $("#subcategoria").val();
    articulo.subcategoria.texto = $("#subcategoria :selected").text();
    articulo.subsubcategoria.valor = $("#subsubcategoria").val();
    articulo.subsubcategoria.valor = $("#subsubcategoria :selected").text();
    articulo.descripcion = $("#descripcion_articulo").val();
    credito_fiscal.bien.articulos.push(articulo);
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function crear_tabla_articulos(articulos) {
    var indice, numero_control = $("#numero_control").val();
    $('#tabla_articulos_temporales tbody').html("");
    $.each(articulos, function (index, articulo) {
        indice = index + 1;
        articulo.numero_control = numero_control + "." + indice;
        $('#tabla_articulos_temporales tbody').append(
            "<tr>" +
                "<td>" + articulo.numero_control + "</td>" +
                "<td>" + articulo.categoria.texto + "</td>" +
                "<td>" + articulo.subcategoria.texto + "</td>" +
                "<td>" + "algo" + "</td>" +
                "<td>" + articulo.cantidad + "</td>" +
                "<td>" + articulo.descripcion + "</td>" +
                "<td>" + "<button type='button' class='btn btn-danger btn-sm' onclick='eliminar_articulo(" + index + "); return false;'><i class='fa fa-trash-o' aria-hidden='true'></i></button>" + "</td>" +
            "</tr>"
        );
    });
}

function eliminar_articulo(indice) {
    credito_fiscal.bien.articulos.splice(indice, 1);
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function eliminar_credito(){
    var data = tabla_creditos.row($(this).parents("tr")).data();
    $("#data").val(data.folio);
    $("#confirmar_warning").click(function() {
        $("#eliminar_credito").modal()
        $("#aceptar_eliminar_credito").click(function(){
            ajax("/creditos/destroy", "post", {
                "folio": $("#data").val(),
                "baja": $("#categoria_bajas option:selected").val(),
                "comentarios": $("#comentarios").val()
            }, tabla_creditos);
        });
    });
}

function actualizar_credito(folio, tabla) {
    var datos = {};
    datos.folio = $("#nuevo_folio").val();
    datos.monto = $("#nuevo_monto").val();
    datos.documento= $("#nuevo_documento_determinante").val();
    datos.origen = $("#nuevo_origen").val();
    ajax("/creditos/update", "post", {"folio": folio, "credito": datos}, tabla);
}

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
    //Llamado de la tabla de los creditos fiscales y la Asignamos la tabla a una variable
    tabla_creditos = $("#creditos").DataTable(crear_tabla(columnas_creditos, "creditos/creditos", null, botones_credito));

    //Mostrar los detalles del credito fiscal en una sub-tabla
    $('#creditos tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = tabla_creditos.row(tr);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            //format retorna la sub-tabla
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

    //Eliminar los creditos fiscales
    $('#creditos tbody').on('click', 'td.delete-control', eliminar_credito);

    //Mostrar los bienes de un credito fiscal
    $('#creditos tbody').on('click', 'td.view-bienes', function() {
        var data = tabla_creditos.row($(this).parents("tr")).data();
        $("#tabla_articulos caption h1").text("Bienes del credito fiscal:" + " " + data.folio);
        $("#info-credito").text(data.contribuyente.Nombre + " " + data.contribuyente.Apellido_Materno + " " + data.contribuyente.Apellido_Paterno);
        tabla_articulos = $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos, "/creditos/bienes", {"folio": data.folio}, botones_bienes));
        // tabla_articulos.on( 'order.dt search.dt', function () {
        //     tabla_articulos.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // } ).draw();
        $("#tabla_articulos").show();
    });

    //Agregar articulos
    $("#agregar").click( function () {
        if($("#tabla_articulos_temporales").is(":hidden")){
            $("#tabla_articulos_temporales").slideDown("slow");
        }
        agregar_articulos();
    });

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