'use strict';
var botones_credito = [
    {
        "text": "<i id='add_credito' class='fa fa-plus' aria-hidden='true'></i>",
        "className": "btn btn-info",
        "action": function () {
            if ($("#registro_creditos_fiscales").is(":hidden")) {
                $("#registro_creditos_fiscales").show("slow");
                $("#add_credito").removeClass("fa fa-plus");
                $("#add_credito").addClass("fa fa-minus");
                $("#creditos").hide("slow");
            } else {
                $("#registro_creditos_fiscales").slideUp("slow");
                $("#add_credito").removeClass("fa fa-minus");
                $("#add_credito").addClass("fa fa-plus");
                $("#creditos").show("slow");
            }
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
        "render": function (data) {
            return "$" + data;
        }
    },
    {
        "title": "Bienes",
        "defaultContent": "<button type='button' class='btn btn-default btn-lg'><span class='glyphicon glyphicon-eye-open'></button>",
        "data": null,
        "className": "view-bienes"
    },
    {
        "title": "Editar",
        "defaultContent": "<button type='button' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-edit'></span></button>",
        "data": null,
        "className": "details-control"
    },
    {
        "title": "Baja",
        "className": "delete-control",
        "defaultContent": "<button type='button' class='btn btn-danger btn-lg' data-toggle='modal' data-target='#warning'><span class='glyphicon glyphicon-remove'></span></button>"
    }
], 
columnas_bienes = [
    {
        "title": "Numero de Control",
        "data": "numero_control"
    },
    {
        "title": "Categoria",
        "data":  "categoria",
        "render": "[, ]"
    },
    {
        "title": "Subcategoria",
        "data": "subcategoria.0"
    },
    {
        "title": "SubsubCategoria",
        "data": "subsubcategoria"
    },
    {
        "title": "Cantidad",
        "data": "cantidad"
    },
    {
        "title": "Comentarios",
        "data": "comentarios"
    },
    {
        "data":null,
        "className": "delete-bien",
        "defaultContent": "<button type='button' class='btn btn-info'><i class='fa fa-trash-o' aria-hidden='true'></i></button>"
    },
];