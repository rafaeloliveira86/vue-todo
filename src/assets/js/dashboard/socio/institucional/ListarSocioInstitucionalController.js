let table;

$(document).ready(function() {
    //Ajax (DataTable)
    table = $('#dt_socio_institucional').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing": true,
        "lengthChange": true,
        "displayLength": 10,
        "serverSide": true,
        "filter": true,
        "order": [],
        "ajax": {
            url: base_url + '/dashboard/listar/socio/institucional/datatable',
            type: "POST"
        },
        "oLanguage": {
            "sProcessing": "<div align='center' class='red-text text-darken-4'>Carregando..</div>",
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "<div align='center' class='red-text text-darken-4'>Nenhum registro encontrado</div>",
            "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
            "sInfoFiltered": true,
            "sStripClasses": "",
            "sSearch": "<b>Pesquisar</b>",
            "sSearchPlaceholder": "Insira as palavras-chave aqui",
            "sInfo": "Exibindo de _START_ a _END_ - _TOTAL_ registros",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            },
            "sLengthMenu": '<span>Linhas por página:</span><select class="browser-default">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select></div>'
        },
        "columnDefs": [{
            "targets": [0, 3, 4],
            "orderable": false,
        }],
        bAutoWidth: false
    });
});