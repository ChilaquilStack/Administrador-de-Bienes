"use strict";
function crear_tabla(columnas, direccion, data, botones) {
    var obj;
    obj = {
        "contentType": "application/json; charset=utf-8",
        "dataType": "json",
        "ajax": {
            "data": data,
            "url": url + direccion,
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

function borrar_tabla(tabla){
    $(tabla).html("");
}

function mensaje_alerta(mensaje){
    $("#warning #mensaje").html("");
    $("#warning #mensaje").append("<p>" + mensaje + "</p>");
    $("#warning").modal();
}

function mensaje_exito(mensaje){
    $("#success #mensaje").html("");
    $("#success #mensaje").append("<p>" + mensaje + "</p>");
    $("#success").modal();   
}

function ajax(direccion, metodo = "get", data) {
    $.ajax({
        "url": url + direccion,
        "type": metodo,
        "data": data,
        "success": function(msj) {
            $("#success #mensaje").text(msj);
            $("#success").modal();
            limpiar_formularios()
            //location.reload(true);
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

function mostrar_bienes_credito(credito) {
    //console.log(String(credito));
    //Mostrar los bienes de un credito fiscal
    $("#tabla_articulos caption h1").text("Bienes del credito fiscal:" + " " + credito);
    $("#info-credito").text(credito.contribuyente);
    tabla_articulos = $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos, "creditos/bienes", {"folio": credito}, botones_bienes));
    if($("#articulos").is(":hidden")) {
        $("#articulos").slideDown("slow");
        
    } else {
        $("#articulos").slideUp("slow");
    }
}

function agregar_bienes_credito(credito){
    if($("#formulario_bienes").is(":hidden")) {
        $("#formulario_bienes").slideDown("slow");
    } else {
        $("#formulario_bienes").slideUp("slow");
    }
}

function crear_tabla_bienes(bienes) {
    var tabla = '', categorias_pluck, subcategorias_pluck = [], subsubcategorias_pluck = [];
    mostrar_tabla();
    $('#tabla_articulos_temporales tbody').html("");
    $.each(bienes, function (index, bien) {
        tabla += "<tr><td>" + bien.numero_control + "</td><td>";
        categorias_pluck = [];
        subcategorias_pluck = [];
        subsubcategorias_pluck = [];
        $.each(bien.categorias, function (i, categoria) {
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
        tabla += "</td><td>" + bien.cantidad + "</td><td>" + bien.descripcion + "</td><td><button type='button' class='btn btn-danger btn-sm' onclick='eliminar_articulo(" + index + ")'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td></tr>";
    });
    $('#tabla_articulos_temporales tbody').append(tabla);
}

function agregar_bienes() {
    var bien = obtener_bien();
    if(bien){
        bienes.push(bien);
        crear_tabla_bienes(bienes);
    }
}

function agregar_categoria() {
    var bien = bienes.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });
    if(bien){
        bien.categorias.push({"id": $("#categoria option:selected").val(), "value": $("#categoria option:selected").text(), "subcategorias": []});
        crear_tabla_bienes(bienes);
    } else {
        if(!$("#numero_control").val()){
            mensaje_alerta("Por favor ingrese el numero de control del bien");
        } else {
            mensaje_alerta("El numero de control aun no ha sido creado");
        }
    }
}

function agregar_subcategoria() {
    var bien = bienes.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });
    var categoria = bien.categorias.find(function (c) {
            return c.id === $("#categoria option:selected").val()
    });
    categoria.subcategorias.push({"id": $("#subcategoria option:selected").val(), "value": $("#subcategoria option:selected").text(), "subsubcategorias": []});
    crear_tabla_bienes(bienes);
}

function agregar_subsubcategoria(bienes) {
    var bien = bienes.find(function (a) {
        return a.numero_control === $("#numero_control").val();
    });

    var categoria = bien.categorias.find(function (c) {
        return c.id === $("#categoria option:selected").val();
    });

    var subcategoria = categoria.subcategorias.find(function (subcategoria) {
        return subcategoria.id === $("#subcategoria option:selected").val()
    });
    subcategoria.subsubcategorias.push({"id": $("#subsubcategoria option:selected").val(), "value": $("#subsubcategoria option:selected").text()});
    crear_tabla_bienes(bienes);
}

function mostrar_tabla(){
    if($("#tabla_articulos_temporales").is(":hidden")) {
        $("#tabla_articulos_temporales").slideDown("slow");
    } else {
        $("#tabla_articulos_temporales").slideUp("slow");
    }
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
    var credito = {
        contribuyente: {},
        bienes: []
    }
    credito.folio = $("#folio").val();
    credito.documento = $("#documento").val();
    credito.origen = $("#origen").val();
    credito.monto = $("#monto").val();
    credito.contribuyente = obtener_contribuyente();
    credito.bienes  = bienes;
    //Se envian los datos al servidor
        ajax("creditos/create", "post", {"credito": credito}, $("#success"), $("#success #mensaje"), tabla_creditos);
    //Refrescamos la tabla para que cargue el nuevo registro
}

function guardar_bienes(){
    ajax("credito/add")
}

function obtener_contribuyente() {
    var contribuyente = {domicilio: {}};
    contribuyente.razon_social = $("#razon_social").val();
    contribuyente.nombre = $("#nombre_contribuyente").val();
    contribuyente.apellido_paterno = $("#apellido_paterno_contribuyente").val();
    contribuyente.apellido_materno = $("#apellido_materno_contribuyente").val();
    contribuyente.telefono = busqueda_elementos_por_clase(".telefono");
    contribuyente.rfc = busqueda_elementos_por_clase(".rfc")
    contribuyente.curp = $("#curp_contribuyente").val();
    contribuyente.domicilio = obtener_domicilio();
    return contribuyente;
}

function obtener_bien(){
    var bien = {depositario:{}, deposito:{}};

    if($("#numero_control").val() && $("#documento_embargo").val() && $("#descripcion_articulo").val() && $("#cantidad").val()){
        bien.numero_control = $("#numero_control").val();
        bien.documento_embargo = $("#documento_embargo").val();
        bien.descripcion = $("#descripcion_articulo").val();
        bien.cantidad = $("#cantidad").val()
        bien.deposito = obtener_domicilio();
        bien.depositario = obtener_depositario();
        bien.categorias = [];
        return bien;
    }
    $("warning").mensaje
    return null;
}

function obtener_domicilio(){
    var domicilio = {};
    domicilio.estado = busqueda_elementos_por_clase(".estado option:selected");
    domicilio.municipio = busqueda_elementos_por_clase(".municipio option:selected");
    domicilio.colonia = busqueda_elementos_por_clase(".colonia");
    domicilio.cp = busqueda_elementos_por_clase(".codigo_postal");
    domicilio.int = busqueda_elementos_por_clase(".int");
    domicilio.ext = busqueda_elementos_por_clase(".ext");
    domicilio.calle = busqueda_elementos_por_clase(".calle");
    return domicilio;
}

function obtener_depositario() {
    var depositario = {};
    depositario.nombre = $("#nombre_depositario").val();
    depositario.apellido_paterno = $("#apellido_paterno_depositario").val();
    depositario.apellido_materno = $("#apellido_materno_depositario").val();
    console.log(depositario);
    return depositario;
}

function eliminar_articulo(indice) {
    bienes.splice(indice, 1);
    crear_tabla_bienes(bienes);
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
        "url": url + "creditos/municipios",
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

function limpiar_formularios(){
    $.each($("form"), function(index, formulario){
        $(formulario)[0].reset();
    });
}