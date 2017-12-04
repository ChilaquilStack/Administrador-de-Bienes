"use strict";
function crear_tabla(columnas, url, data, botones) {
    var obj;
    obj = {
        "contentType": "application/json; charset=utf-8",
        "dataType": "json",
        "ajax": {
            "data": data,
            "url": url,
            "dataSrc": function (json) {
                return json;
            }
        },
        "columns": columnas,
        "bDestroy": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "pageLength": 5,
        "dom": "Bfrtip",
        "buttons": botones,
        "destroy": true
    }
    return obj;
}

function ajax(direccion, metodo = "get", data) {
    $.ajax({
        "url": direccion,
        "type": metodo,
        "data": data,
        "success": function(msj) {
            $("#success #mensaje").text(msj);
            $("#success").modal();
        },
        "error": function(msj) {
            $("#warning #mensaje").text("");
            for(var e in msj.responseJSON.errors) {
                for(var a in msj.responseJSON.errors[e]){
                    $("#warning #mensaje").append("<p>" + msj.responseJSON.errors[e][a] + "</p>");
                    $("#warning").modal();
                }
            }
        },
        //Se necesita un token para enviar datos a laravel
        "headers": {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function crear_tabla_articulos(articulos) {
    var tabla = '', categorias_pluck, subcategorias_pluck = [], subsubcategorias_pluck = [];
    $.each(articulos, function (index, articulo) {
        $('#tabla_articulos_temporales tbody').html("");
        tabla += "<tr><td>" + articulo.numero_control + "</td><td>";
        categorias_pluck = [];
        subcategorias_pluck = [];
        subsubcategorias_pluck = [];
        $.each(articulo.categorias, function (i, categoria) {
            categorias_pluck.push(categoria.value);
            $.each(categoria.subcategorias, function (i, subcategoria) {
                subcategorias_pluck.push(subcategoria.value);
                $.each(subcategoria.subsubcategorias, function (i, subsubcategoria) {
                    subsubcategorias_pluck.push(subsubcategoria.value);
                    console.log(subsubcategorias_pluck);
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
    var articulo = {"categorias": []};
    articulo.numero_control = $("#numero_control").val();
    articulo.cantidad = $("#cantidad").val();
    articulo.descripcion = $("#descripcion_articulo").val();
    credito_fiscal.bien.articulos.push(articulo);
    crear_tabla_articulos(credito_fiscal.bien.articulos);
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
    categoria.subcategorias.push({"id": $("#subcategoria option:selected").val(), "value": $("#subcategoria option:selected").text(), "subsubcategorias": []});
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function agregar_subsubcategoria() {
    var articulo = credito_fiscal.bien.articulos.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });

    var categoria = articulo.categorias.find(function (c) {
        return c.id === $("#categoria option:selected").val();
    });

    var subcategoria = categoria.subcategorias.find(function (subcategoria) {
        return subcategoria.id === $("#subcategoria option:selected").val()
    });
    //subcategoria.subsubcategorias = [];
    subcategoria.subsubcategorias.push({"id": $("#subsubcategoria option:selected").val(), "value": $("#subsubcategoria option:selected").text()});
    crear_tabla_articulos(credito_fiscal.bien.articulos);
}

function mostrar_tabla(){
    if($("#tabla_articulos_temporales").is(":hidden")) {
        $("#tabla_articulos_temporales").slideDown("slow");
    }
    agregar_articulos();
}

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
    credito_fiscal.contribuyente.razon_social = $("#razon_social").val();
    credito_fiscal.contribuyente.nombre = $("#nombre_contribuyente").val();
    credito_fiscal.contribuyente.apellido_paterno = $("#apellido_paterno_contribuyente").val();
    credito_fiscal.contribuyente.apellido_materno = $("#apellido_materno_contribuyente").val();
    credito_fiscal.contribuyente.telefono = busqueda_elementos_por_clase(".telefono");
    credito_fiscal.contribuyente.rfc = busqueda_elementos_por_clase(".rfc")
    credito_fiscal.contribuyente.curp = $("#curp_contribuyente").val();
    credito_fiscal.contribuyente.domicilio.estado = busqueda_elementos_por_clase(".estado option:selected");
    credito_fiscal.contribuyente.domicilio.municipio = busqueda_elementos_por_clase(".municipio option:selected");
    credito_fiscal.contribuyente.domicilio.colonia = busqueda_elementos_por_clase(".colonia");
    credito_fiscal.contribuyente.domicilio.cp = busqueda_elementos_por_clase(".codigo_postal");
    credito_fiscal.contribuyente.domicilio.int = busqueda_elementos_por_clase(".int");
    credito_fiscal.contribuyente.domicilio.ext = busqueda_elementos_por_clase(".ext");
    credito_fiscal.contribuyente.domicilio.calle = busqueda_elementos_por_clase(".calle");
    credito_fiscal.bien.numero_control = Math.trunc($("#numero_control").val());
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

function busqueda_elementos_por_clase (clase) {
    var data = '';
    $.each($(clase), function(index, elemento) {
        elemento = $(elemento);
        if(elemento.val()) {
            data =  elemento.val();
        }
    });
    return data;
}

function agregar_articulos() {
    var articulo = {"categorias": []};
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