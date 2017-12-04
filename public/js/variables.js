'use strict';
var tabla_creditos, tabla_articulos, credito_fiscal = {
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
        "titleAttr": "Mostrar Formulario",
        "action": function () {
            window.location = "/creditos/create";
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
            if(data.nombre){
                nombre = data.nombre + " " + data.apellido_paterno + " " + data.apellido_materno;
            } else {
                nombre = data.razon_social;
            }
            return "<a href='contribuyentes/" + data.id + "' target='_blank'><button type='button' class='btn btn-link'>" + nombre + "</button></a>";
        }
    },
    {
        "title": "Ver Bienes",
        "defaultContent": "<button type='button' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-eye-open'></i></button>",
        "data": null,
        "className": "view-bienes"
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
        "render": function(data){
            return "<a href='/creditos/" + data + "/add' target='_blank><button type='button' class='btn btn-primary btn-sm''><i id='add_credito' class='fa fa-plus' aria-hidden='true'></i></button></a>";
        }
    },
],
columnas_bienes = [
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
            return data.calle + " " + "#" + data.int + " " + "ext" + " " + data.ext + " " + data.colonia + " " + " " + "C.P" + " " +  data.cp + " " + data.estado.nombre;
        }
    },
    {
        "title": "Articulos",
        "data": null,
        "className": "view-bienes",
        "defaultContent": "<button type='button' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-eye-open'></i></button>"
    },
    {
        "title": "Cantidad de Articulos",
        "data": "cantidad"
    },
    {
        "title": "Créditos Fiscales",
        "data": "creditos",
        "render": "[, ].folio"
    },
    {
        "title": "Editar",
        "data": null,
        "defaultContent": "<button type='button' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit'></i></button>"
    },
    {
        "title": "Baja",
        "data": null,
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    }
],
columnas_articulos = [
    {
        "title": "#",
        "data": "id"
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
        "data": "categorias",
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
            return data.calle + " " + data.int + " " + data.ext + " " + data.colonia + " " + data.estado.nombre;
        }
    },
    {
        "title": "Valuacion",
        "data": "ultima_valuacion.pivot.monto",
        "render": function(data = "0", type, row){
            if( data === "0" ) {
                return "<a href='http://localhost:8000/avaluos/" + row.id  + "' target='_blank'><botton type='button' class='btn btn-warning btn-sm'>" + "$" + data.toLocaleString() + "</button></a>";
            } else {
                return "<a href='http://localhost:8000/avaluos/" + row.id  + "' target='_blank'><botton type='button' class='btn btn-info btn-sm'>" + "$" + data.toLocaleString() + "</button></a>"
            }
        }
    },
    {
        "title": "Imagenes",
        "data": "id",
        "render": function(data,type, row) {
            return "<a href='/creditos/" + data + "/imagenes' target='_blank'><i class='fa fa-picture-o' aria-hidden='true'></i></a>";
        }
    },
    {
        "data":"id",
        "title": "Editar",
        "render": function(data) {
            return "<a href='http://localhost:8000/bienes/" + data + "/edit' target='_blank'><button type='button' class='btn btn-success btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a>";
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
            var nombre = "";
            if(row.razon_social){
                nombre = row.razon_social;
            } else {
                nombre = row.nombre + " " + row.apellido_paterno + " " + row.apellido_materno;
            }
            return "<a href='contribuyentes/" + row.id + "'><button type='button' class='btn btn-link'>" + nombre + "</button></a>";
        }
    },
    {
        "title": "Domicilio",
        "data": "domicilio",
        "render": function(data, type, row){
            return data.calle + " " + data.int + " " + data.ext + " " + data.colonia + " " + data.estado;
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
    {
        "title": "Bienes",
        "defaultContent": "<button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-eye-open'></button>",
        "data": null,
        "className": "view-bienes"
    },
    {
        "title": "Editar",
        "defaultContent": "<button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></button>",
        "data": null,
        "className": "details-control"
    },
    {
        "title": "Baja",
        "className": "delete-control",
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    },
    {
        "data": "folio",
        "title": "Agregar Bienes",
        "titleAttr": "Agregar Bién",
        "render": function(data){
            return "<a href='/creditos/" + data + "/add' target='_blank><button type='button' class='btn btn-primary btn-sm''><i id='add_credito' class='fa fa-plus' aria-hidden='true'></i></button></a>";
        }
    }
],

columnas_articulos_bienes = [
    {
        "title": "#",
        "data": "id"
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
        "render": "[, ].descripcion"
    },
    {
        "title": "Valuacion",
        "data": "ultima_valuacion.pivot.monto",
        "render": function(data = "0", type, row){
            if( data === "0" ) {
                return "<a href='http://localhost:8000/avaluos/" + row.id  + "'><botton type='button' class='btn btn-warning btn-sm'>" + "$" + data.toLocaleString() + "</button></a>"
            } else {
                return "<a href='http://localhost:8000/avaluos/" + row.id  + "'><botton type='button' class='btn btn-info btn-sm'>" + "$" + data.toLocaleString() + "</button></a>"
            }
        }
    },
    {
        "title":"Creditos Fiscales",
        "data": "bien.creditos",
        "render": "[, ].folio"
    },
    {
        "title": "Imagenes",
        "data": "id",
        "render": function(data,type, row) {
            return "<a href='/creditos/" + data + "/imagenes' target='_blank'><button class='btn btn-default btn-sm'><i class='fa fa-picture-o' aria-hidden='true'></i></button></a>";
        }
    },
    {
        "data":"id",
        "title": "Editar",
        "className": "details-articulo",
        "render": function(data) {
            return "<a href='http://localhost:8000/bienes/" + data + "/edit'><button type='button' class='btn btn-success btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a>";
        }
    },
    {
        "data":null,
        "title": "Baja",
        "className": "delete-bien",
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    }
];