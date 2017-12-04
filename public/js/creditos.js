"use strict";
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
        if(data.contribuyente.razon_social){
            $("#info-credito").text(data.contribuyente.razon_social);
        } else {
            $("#info-credito").text(data.contribuyente.Nombre + " " + data.contribuyente.Apellido_Materno + " " + data.contribuyente.Apellido_Paterno);
        }
        tabla_articulos = $("#tabla_articulos").DataTable(crear_tabla(columnas_articulos, "/creditos/bienes", {"folio": data.folio}, botones_bienes));
        // tabla_articulos.on( 'order.dt search.dt', function () {
        //     tabla_articulos.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // } ).draw();
        $("#tabla_articulos").show();
    });
}

$(function(){
    start();
});