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
    credito_fiscal.bien.documento_embargo = $("#documento_embargo").val();
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


function eliminar_articulo(indice) {
    credito_fiscal.bien.articulos.splice(indice, 1);
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function crear_tabla_articulos(articulos) {
    var tabla = '', categorias_pluck, subcategorias_pluck = [], subsubcategorias_pluck = [];
    categorias_pluck = [];
    subcategorias_pluck = [];
    subsubcategorias_pluck = [];
    $.each(articulos, function (index, articulo) {
        $('#tabla_articulos_temporales tbody').html("");
        tabla += "<tr><td>" + articulo.numero_control + "</td><td>";
        $.each(articulo.categorias, function (i, categoria) {
            categorias_pluck.push(categoria.value);
            $.each(categoria.subcategorias, function (i, subcategoria) {
                subcategorias_pluck.push(subcategoria.value);
                $.each(subcategoria.subsubcategorias, function (i, subsubcategoria) {
                    subsubcategorias_pluck.push(subsubcategoria.value);
                });
            });
        });
        tabla += categorias_pluck.join(' , ');
        tabla += "</td><td>";
        tabla += subcategorias_pluck.join(' , ');
        tabla += "</td><td>";
        tabla += subsubcategorias_pluck.join(' , ');
        tabla += "</td><td>" + articulo.cantidad + "</td><td>" + articulo.descripcion + "</td><td><button type='button' class='btn btn-danger btn-sm' onclick='eliminar_articulo(" + index + ")'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></tr>";
    });
    $('#tabla_articulos_temporales tbody').append(tabla);
}

function agregar_articulos() {
    var articulo = {"categorias": [], "subcategorias": [], "subsubcategorias": []};
    articulo.numero_control = $("#numero_control").val();
    articulo.cantidad = $("#cantidad").val();
    articulo.descripcion = $("#descripcion_articulo").val();
    credito_fiscal.bien.articulos.push(articulo);
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function eliminar_credito() {
    var data = tabla_creditos.row($(this).parents("tr")).data();
    $("#data_credito").val(data.folio);
    $("#confirmar_warning").click(function() {
        $("#eliminar_credito").modal();
    });
}

$("#aceptar_eliminar_credito").click(function(){
    ajax("/creditos/destroy", "post",
        {
            "folio": $("#data_credito").val(),
            "baja": $("#categoria_bajas option:selected").val(),
            "comentarios": $("#comentarios").val()
        }
    );
});

function eliminar_articulo_credito() {
    var data = tabla_articulos.row($(this).parents("tr")).data();
    $("#data_articulo").val(data.id);
    $("#confirmar_warning").click(function() {
        $("#eliminar_articulo").modal();
    });
}

$("#aceptar_eliminar_articulo").click(function(){
    ajax("/bienes/destroy", "post",
        {
            "id": $("#data_articulo").val(),
            "baja": $("#categoria_bajas option:selected").val(),
            "comentarios": $("#comentarios_articulo ").val()
        }
    );
});

function actualizar_credito(folio, tabla) {
    var datos = {};
    datos.folio = $("#nuevo_folio").val();
    datos.monto = $("#nuevo_monto").val();
    datos.documento= $("#nuevo_documento_determinante").val();
    datos.origen = $("#nuevo_origen").val();
    ajax("/creditos/update", "post", {"folio": folio, "credito": datos}, tabla);
}

function mostrar_categorias() {
    $.ajax({
        "url": "/categorias/subcategorias",
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
        "url": "/categorias/subsubcategorias",
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

function estados_contribuyente() {
    $.ajax({
        "url": "/creditos/municipios",
        "method": "get",
        "data": {
            "id": $("#estado option:selected").val()
        },
        "success": function (data) {
            $("#municipio").html('');
            $.each(data, function(i, obj) {
                $("#municipio").append("<option value='" + obj.id + "'>" + obj.nombre + "</option>");
            });
        },
        "error": function (){
            console.log("error");
        }
    });
}

function estados_depositario() {
    $.ajax({
        "url": "/creditos/municipios",
        "method": "get",
        "data": {
            "id": $("#estado_deposito option:selected").val()
        },
        "success": function (data) {
            $("#municipio_deposito").html('');
            $.each(data, function(i, obj) {
                $("#municipio_deposito").append("<option value='" + obj.id + "'>" + obj.nombre + "</option>");
            });
        },
        "error": function (){
            console.log("error");
        }
    });
}

function agregar_categoria() {
    var articulo = credito_fiscal.bien.articulos.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });
    articulo.categorias.push({"id": $("#categoria option:selected").val(), "value": $("#categoria option:selected").text(), "subcategorias": []});
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function agregar_subcategoria() {
    var articulo = credito_fiscal.bien.articulos.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });
    var categoria = articulo.categorias.find(function (c) {
        return c.id === $("#categoria option:selected").val()
    });
    categoria.subcategorias.push({"id": $("#subcategoria option:selected").val(), "value": $("#subcategoria option:selected").text()});
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function agregar_subsubcategoria() {
    var articulo = credito_fiscal.bien.articulos.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });

    var categoria = articulo.categoria.find(function (categoria) {
        return categoria.id === $("#categoria option:selected").val()
    });

    var subcategoria = categoria.subcategoria.find(function (subcategoria) {
        return subcategoria.id === $("#subcategoria option:selected").val()
    });
    subcategoria.subsubcategorias = [];
    subcategoria.subsubcategorias.push({"id": $("#subsubcategoria option:selected").val(), "value": $("#subsubcategoria option:selected").text()});
    crear_tabla_articulos(credito_fiscal.bien.articulos);
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

    //Eliminar articulo
    $('#tabla_articulos tbody').on('click', 'td.delete-bien', eliminar_articulo_credito);
    

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

    $("#categoria").change(mostrar_categorias);
    $("#subcategoria").change(mostrar_subcategorias);
    $("#estado").change(estados_contribuyente);
    $("#estado_deposito").change(estados_depositario);
    $("#agregar_categoria").click(agregar_categoria);
    $("#agregar_subcategoria").click(agregar_subcategoria);
    $("#agregar_subsubcategoria").click(agregar_subsubcategoria);
    $("#guardar_credito_fiscal").click(guardar_credito);
}
$(function () {
    start();
});