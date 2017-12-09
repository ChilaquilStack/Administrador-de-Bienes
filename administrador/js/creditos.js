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

}

$(function(){
    start();
});