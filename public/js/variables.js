'use strict';
var botones_credito = [
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
            "columns":[0, 1, 2, 3]
        }
    },
    {
        "text": "<i class='fa fa-file-pdf-o'></i>",
        "extend": "pdfHtml5",
        "className": "btn btn-info",
        "titleAttr": "PDF",
        "exportOptions": {
            "columns":[0,1,2,3]
        }
    }
],
botones_bienes = [
    {
        "text": "<i id='add_articulo' class='fa fa-plus' aria-hidden='true'></i>",
        "className": "btn btn-info btn-sm",
        "titleAttr": "Agregar Bién"
    },
    {
        "text": "<i class='fa fa-file-excel-o'></i>",
        "extend": "excelHtml5",
        "className": "btn btn-info btn-sm",
        "titleAttr": "Excel",
        "filename": "reporte",
        "exportOptions": {
            "columns":[0, 1, 2, 3]
        }
    },
    {
        "text": "<i class='fa fa-file-pdf-o'></i>",
        "extend": "pdfHtml5",
        "className": "btn btn-info btn-sm",
        "titleAttr": "PDF",
        "exportOptions": {
            "columns":[0,1,2,3]
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
        "title": "Origen del crédito fiscal",
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
            return "<a href='contribuyentes/" + data.id + "'><button type='button' class='btn btn-link'>" + data.Nombre + " " + data.Apellido_Paterno + " " + data.Apellido_Materno + "</button></a>";
        }
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
    }
],
columnas_bienes = [
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
        "render": "[, ].descripcion"
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
        "data":"id",
        "title": "Editar",
        "className": "details-articulo",
        "render": function(data) {
            return "<a href='bienes/" + data + "/edit'><button type='button' class='btn btn-success btn-sm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button></a>";
        }
    },
    {
        "data":null,
        "title": "Baja",
        "className": "delete-bien",
        "defaultContent": "<button type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    },
];