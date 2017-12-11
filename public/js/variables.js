//var url = "http://transparencia-financiera.app.jalisco.gob.mx/administrador/",
//var url = "",
'use strict';
var url = "http://localhost/administrador/",
bienes = [] ,tabla_creditos, tabla_articulos, tabla_contribuyentes, tabla_creditos, credito_fiscal = {
    "contribuyente": {
        "domicilio": {}
    },
    "bien": {
        "articulos": [],
        "depositario": {},
        "deposito": {}
    }
},
botones_credito = [
    {
        "text": "<i id='add_credito' class='fa fa-plus' aria-hidden='true'></i>",
        "className": "btn btn-info",
        "titleAttr": "Agregar Crédito",
        "action": function () {
            window.location = url + "creditos/create";
        }
    },
    {
        "text": "<i class='fa fa-file-excel-o'></i>",
        "extend": "excelHtml5",
        "className": "btn btn-info",
        "titleAttr": "Excel",
        "filename": "reporte",
        "exportOptions": {
            "columns":[0, 1, 2, 3, 4]
        }
    },
    {
        "text": "<i class='fa fa-file-pdf-o'></i>",
        "extend": "pdfHtml5",
        "className": "btn btn-info",
        "titleAttr": "PDF",
        "exportOptions": {
            "columns":[0, 1, 2, 3, 4]
        }
    }
],
botones_bienes = [
    {
        "text": "<i class='fa fa-file-excel-o'></i>",
        "extend": "excelHtml5",
        "className": "btn btn-info btn-sm",
        "titleAttr": "Excel",
        "filename": "reporte",
        "exportOptions": {
            "columns":[0, 1, 2, 3, 4, 5, 6]
        }
    },
    {
        "text": "<i class='fa fa-file-pdf-o'></i>",
        "extend": "pdfHtml5",
        "className": "btn btn-info btn-sm",
        "titleAttr": "PDF",
        "exportOptions": {
            "columns":[0,1,2,3,4,5,6]
        }
    }
],
columnas_creditos = [
    {
        "title": "Crédito Fiscal",
        "data": "folio"
    },
    {
        "title": "Documento determinante",
        "data": "documento_determinante"
    },
    {
        "title": "Origen del crédito",
        "data": "origen_credito"
    },
    {
        "title": "Adeudo",
        "data": "monto",
        "render": $.fn.dataTable.render.number( ',', '.', 0, '$' )
    },
    {
        "title": "Contribuyente",
        "data": "contribuyente",
        "render": function(data) {
            var nombre = "";
            var direcion = url + "contribuyentes/" + data.id;
            if(data.nombre){
                nombre = data.nombre + " " + data.apellido_paterno + " " + data.apellido_materno;
            } else {
                nombre = data.razon_social;
            }
            return "<a href='" + direcion + "' target='_blank'><button type='button' class='btn btn-link'>" + nombre + "</button></a>";
        }
    },
    {
        "title": "Ver Bienes",
        "data": "folio",
        "render": function(data, type, row) {
            return '<button type="button" class="btn btn-default btn-sm" onclick=mostrar_bienes_credito("' + (data) + '")>' + 
                '<i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>' +
            '</button>'
        }
    },
    {
        "title": "Editar",
        "defaultContent": "<button type='button' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit'></i></button>",
        "data": null,
        "className": "details-control"
    },
    {
        "title": "Baja",
        "className": "delete-control",
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#eliminar_credito'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    },
    {
        "data": "folio",
        "title": "Agregar Bienes",
        "titleAttr": "Agregar Bién",
        "render": function(data, type, row) {
            return '<button type="button" class="btn btn-primary btn-sm" onclick=agregar_bienes_credito("' + (data) + '")>' + 
                '<i class="fa fa-plus" aria-hidden="true"></i>' +
            '</button>'
            
        }
    },
],
columnas_articulos = [
    {
        "title": "#",
        "data": "numero_control"
    },
    {
        "title": "Descripion",
        "data": "descripcion"
    },
    {
        "title": "Cantidad",
        "data":  "cantidad"
    },
    {
        "title": "Categorias",
        "data": "categorias",
        "render": "[, ].nombre"
    },
    {
        "title": "Subcategorias",
        "data": "subcategorias",
        "render": "[, ].nombre"
    },
    {
        "title": "Subsubcategorias",
        "data": "subsubcategorias",
        "render": "[, ].nombre"
    },
    {
        "title": "Depositario",
        "data": "depositario",
        "render": function(data) {
            return data.nombre + " " + data.apellido_paterno + " " + data.apellido_materno;
        }
    },
    {
        "title": "Deposito",
        "data": "deposito",
        "render": function(data){
            if(data.int) {
                return data.calle + " int: " + data.int + " #" + data.ext + " col. " + data.colonia + ", c.p: " + data.cp + " " + data.estado.nombre;
            }
            return data.calle + " #" + data.ext + " col. " + data.colonia + ", c.p: " + data.cp + " " + data.estado.nombre;
        }
    },
    {
        "title": "Valuacion",
        "data": "ultima_valuacion.pivot.monto",
        "render": function(data = "0", type, row){
            var direccion = url + "avaluos/" + row.numero_control;
            if( data === "0" ) {
                return "<a href='" + direccion + "' target='_blank'><botton type='button' class='btn btn-warning btn-sm'>" + "$" + data.toLocaleString() + "</button></a>";
            } else {
                return "<a href='" + direccion + "' target='_blank'><botton type='button' class='btn btn-info btn-sm'>" + "$" + data.toLocaleString() + "</button></a>"
            }
        }
    },
    {
        "title": "Imagenes",
        "data": "numero_control",
        "render": function(data,type, row) {
        var direccion = url + "bienes/" + data + "/imagenes";
            return "<a href='" + direccion + "' target='_blank'><i class='fa fa-picture-o' aria-hidden='true'></i></a>";
        }
    },
    {
        "data":"numero_control",
        "title": "Editar",
        "render": function(data) {
            var direccion = url + "bienes/" + data + "/edit";
            return "<a href='" + direccion + "' target='_blank'><button type='button' class='btn btn-success btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a>";
        }
    },
    {
        "data":null,
        "title": "Baja",
        "className": "delete-bien",
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#eliminar_articulo'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    }
],
columnas_contribuyentes= [
    {
        "title": "Nombre",
        "render": function(data, type, row){
            var nombre = "", direccion = url + "contribuyentes/" + row.id;
            if(row.razon_social){
                nombre = row.razon_social;
            } else {
                nombre = row.nombre + " " + row.apellido_paterno + " " + row.apellido_materno;
            }
            return "<a href='" + direccion + "'><button type='button' class='btn btn-link'>" + nombre + "</button></a>";
        }
    },
    {
        "title": "Domicilio",
        "data": "domicilio",
        "render": function(data, type, row){
            if(data.int) {
                return data.calle + " int: " + data.int + " #" + data.ext + " col. " + data.colonia + ", c.p: " + data.cp + " " + data.estado;
            }
            return data.calle + " #" + data.ext + " col. " + data.colonia + ", c.p: " + data.cp + " " + data.estado;
        }
    }
],
columnas_creditos_contribuyente = [
    {
        "title": "Crédito Fiscal",
        "data": "folio"
    },
    {
        "title": "Documento determinante",
        "data": "documento_determinante"
    },
    {
        "title": "Origen del crédito fiscal",
        "data": "origen_credito"
    },
    {
        "title": "Adeudo",
        "data": "monto",
        "render": $.fn.dataTable.render.number( ',', '.', 0, '$' )
    },
],
columnas_articulos_bienes = [
    {
        "title": "#",
        "data": "numero_control"
    },
    {
        "title": "Descripion",
        "data": "descripcion",
        "render": function(data) {
            return "<p>" + data + "</p>";
        }
    },
    {
        "title": "Cantidad",
        "data":  "cantidad"
    },
    {
        "title": "Categorias",
        "data": "categorias",
        "render": "[, ].nombre"
    },
    {
        "title": "Subcategorias",
        "data": "subcategorias",
        "render": "[, ].nombre"
    },
    {
        "title": "Subsubcategorias",
        "data": "subsubcategorias",
        "render": "[, ].nombre"
    },
    {
        "title": "Valuacion",
        "data": "ultima_valuacion.pivot.monto",
        "render": function(data = "0", type, row){
            var direccion = url + "avaluos/" + row.numero_control;
            if( data === "0" ) {
                return "<a href='" + direccion + "'><botton type='button' class='btn btn-warning btn-sm'>" + "$" + data.toLocaleString() + "</button></a>"
            } else {
                return "<a href='" + direccion + "'><botton type='button' class='btn btn-info btn-sm'>" + "$" + data.toLocaleString() + "</button></a>"
            }
        }
    },
    {
        "title":"Creditos Fiscales",
        "data": "creditos",
        "render": "[, ].folio"
    },
    {
        "title": "Imagenes",
        "data": "numero_control",
        "render": function(data,type, row) {
            var direccion = url + "bienes/" + data + "/imagenes";
            return "<a href='" + direccion + "' target='_blank'><button class='btn btn-default btn-sm'><i class='fa fa-picture-o' aria-hidden='true'></i></button></a>";
        }
    },
    {
        "data":"numero_control",
        "title": "Editar",
        "className": "details-articulo",
        "render": function(data) {
            var direccion = url + "bienes/" + data + "/edit";
            return "<a href='" + direccion + "' target='_blank'><button type='button' class='btn btn-success btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a>";
        }
    },
    {
        "data": null,
        "title": "Baja",
        "className": "delete-bien",
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#eliminar_articulo'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    }
];