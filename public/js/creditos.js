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

function crear_tabla(tabla, columnas, url, data, botones) {
    tabla.DataTable({
        "contentType": "application/json; charset=utf-8",
        "dataType": "json",
        "ajax": {
            "data": data,
            "url": url,
            "dataSrc": function (json) {
                return $.parseJSON(json);
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
        "destroy": true,
    });
}

function ajax(direccion, metodo = "get", data, tabla) {
    let e;
    $.ajax({
        "url": direccion,
        "type": metodo,
        "data": data,
        "success": function(msj) {
            $("#success #mensaje").text(msj);
            $("#success").modal();
            $("#creditos_fiscales_form")[0].reset();
            tabla.ajax.reload();
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

//Funcion para guardar los creditos fiscales
function guardar_credito(){
    credito_fiscal.folio = $("#folio").val();
    credito_fiscal.documento = $("#documento").val();
    credito_fiscal.origen = $("#origen").val();
    credito_fiscal.monto = $("#monto").val();
    credito_fiscal.contribuyente.nombre = $("#nombre").val();
    credito_fiscal.contribuyente.apellido_paterno = $("#paterno").val();
    credito_fiscal.contribuyente.apellido_materno = $("#materno").val();
    credito_fiscal.contribuyente.telefono = $("#telefono").val();
    credito_fiscal.contribuyente.rfc = $("#rfc").val();
    credito_fiscal.contribuyente.curp = $("#curp").val();
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
    credito_fiscal.bien.deposito.calle = $("#calle").val();
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

function mensaje(folio){
    console.log("Editar el folio" + " " + folio)
}

function start() {
	//Llamado de la tabla de los creditos fiscales
	crear_tabla($("#creditos"), columnas_creditos, "creditos/creditos",null, botones_credito);

	//Asignamos la tabla a una variable
    tabla_creditos = $("#creditos").DataTable();

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
    $('#creditos tbody').on('click', 'td.view-bienes', function(){
        var data = tabla_creditos.row($(this).parents("tr")).data();
        crear_tabla($("#tabla_articulos"),columnas_bienes, "/creditos/bienes", {"folio": data.folio}, botones_bienes);
        $("#tabla_articulos").show();
    });

    //Agregar articulos
    $("#agregar").click( function () {
		if($("#tabla_articulos_temporales").is(":hidden")){
			$("#tabla_articulos_temporales").slideDown("slow");
		}
        agregar_articulos();
    });
	
	$("#guardar_credito").click(function(){
		guardar_credito();
	});
}
$(function () {
    start();
});