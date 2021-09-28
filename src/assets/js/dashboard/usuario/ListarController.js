let table;

$(document).ready(function() {
    //Ajax (DataTable)
    table = $('#dt_usuarios_ativos_bloqueados').DataTable({
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
            url: base_url + '/dashboard/listar/usuario/datatable',
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

    /*//Botões Nav (DataTable)
    let btnAdicionarUsuario = $('#btn_nav_adicionar_usuario, #btn_dt_adicionar_usuario');
    let btnNavEditarUsuario = $('#btn_nav_editar_usuario');
    let btnNavExcluirUsuario = $('#btn_nav_excluir_usuario');

    btnNavEditarUsuario.addClass('disabled'); //Botão Editar Nav (Datatable) - Default Disabled
    btnNavExcluirUsuario.addClass('disabled'); //Botão Excluir Nav (Datatable) - Default Disabled

    //Botão Nav/DT Adicionar Usuário (DataTable)
    btnAdicionarUsuario.on('click', function(e) {
        e.preventDefault();
        window.location.href = base_url + '/dashboard/usuario/cadastro';
    });

    //Botão Nav Editar Usuário (DataTable)
    btnNavEditarUsuario.on('click', function(e) {
        e.preventDefault();
        let id = $("input[name='cbx_dt_selecionar_usuario_individual[]']:checked").val();
        window.location.href = base_url + '/dashboard/usuario/' + id + '/editar';
    });

    //Botão Nav Excluir Usuário (DataTable)
    btnNavExcluirUsuario.on('click', function(e) {
        e.preventDefault();
        if (document.querySelector('.cbx_dt_selecionar_usuario_individual') != null) {
            let checkeds = new Array();
            $("input[name='cbx_dt_selecionar_usuario_individual[]']:checked").each(function() {
                checkeds.push(parseInt($(this).val()));
            });
            //console.log(checkeds);
            deleteUser(checkeds);
        }
    });

    //Checkbox Selecionar Usuário Total (DataTable)
    let cbxDtSelecionarUsuarioTotal = $('#cbx_dt_selecionar_usuario_total');
    cbxDtSelecionarUsuarioTotal.on('click', function() {
        if ($(this).is(':checked')) {
            btnNavEditarUsuario.addClass('disabled');
            btnNavExcluirUsuario.removeClass('disabled');
            $('input:checkbox').prop('checked', true);
        } else {
            btnNavExcluirUsuario.addClass('disabled');
            $('input:checkbox').prop('checked', false);
        }
    });

    //Checkbox Selecionar Usuário Individual (DataTable)
    $(document).on('click', '[class="cbx_dt_selecionar_usuario_individual"]', function() {
        let cbxSelecionado = $().verificarCheckbox(); //Global JS
        if (cbxSelecionado == 1) {
            btnNavEditarUsuario.removeClass('disabled');
            btnNavExcluirUsuario.removeClass('disabled');
        } else if (cbxSelecionado > 1) {
            btnNavEditarUsuario.addClass('disabled');
        } else {
            btnNavEditarUsuario.addClass('disabled');
            btnNavExcluirUsuario.addClass('disabled');
        }
    });*/
});

/* Functions */
/*function deleteUser(data) {
    swal({
        title: '',
        text: 'Deseja excluir o(s) usuário(s) selecionado(s)?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0f2a79',
        cancelButtonColor: '#90050b',
        confirmButtonText: "<i class='material-icons prefix left'>check</i>Confirmar",
        cancelButtonText: "<i class='material-icons prefix left'>cancel</i>Cancelar",
        buttonsStyling: true
    }).then(function() {
            $.ajax({
                type: "POST",
                url: base_url + "/dashboard/usuario/deletar",
                data: {
                    'id': data
                },
                cache: false,
                async: true,
                success: function() {
                    swal({
                        title: '',
                        text: 'Exclusão de(os) usuário(s) em andamento',
                        type: 'success',
                        confirmButtonColor: '#0f2a79',
                        timer: 5000,
                        timerProgressBar: true,
                        onOpen: function() {
                            swal.showLoading()
                        }
                    }).then(function() {},
                        function(dismiss) {
                            if (dismiss === 'timer') {
                                swal('', 'Usuário(s) excluído(s) com sucesso!', 'success');
                                $('.swal2-confirm').click(function() {
                                    window.location.href = base_url + "/dashboard/usuario";
                                });
                                console.log('Fui fechado pelo temporizador');
                            }
                        }
                    );
                }
            });
        },
        function(dismiss) {
            if (dismiss === 'cancel') {
                console.log('Não desejo excluir o(s) usuário(s) selecionado(s).');
            }
        });
}*/