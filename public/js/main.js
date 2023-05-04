$(document).ready(function () {
    $('#table-enderecos').DataTable({
        order: [1, 'asc'],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - Desculpe",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de um total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sLoadingRecords": "Carregando...",
            "oPaginate": {
                "sNext":    "Seguinte",
                "sPrevious": "Anterior"
            }
        }
    });
});