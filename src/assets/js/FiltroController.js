$(document).ready(function() {
    //Carregar componentes do Materialize Framework
    $('select').formSelect();
    $('.datepicker').datepicker({
        yearRange: 100,
        firstDay: true,
        format: 'dd/mm/yyyy',
        i18n: {
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok',
            previousMonth: '‹',
            nextMonth: '›',
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S']
        },
        container: 'body'
    });

    //Checkbox Todo o Período
    let dataInicial = $('#data_inicial');
    let dataFinal = $('#data_final');
    let cbxTodoPeriodo = $('#cbx_todo_o_periodo');
    cbxTodoPeriodo.on('click', function() {
        if ($(this).is(':checked')) {
            dataInicial.prop('disabled', true);
            dataFinal.prop('disabled', true);
        } else {
            dataInicial.prop('disabled', false);
            dataFinal.prop('disabled', false);
        }
    });

    /* Submit Form */
    let formFilter = $("#form_filtro");
    formFilter.submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = form.serialize();
        if (formData) {
            M.toast({
                html: 'Filtro Ativo',
                completeCallback: function() {
                    console.log('Atenção! Para visualizar a listagem completa, apague a configuração de filtro selecionada.')
                }
            });
            let action = 'setFilter';
            let text_one = 'Deseja filtrar o(s) dado(s) selecionado(s)?';
            let text_two = 'Carregando Filtro';
            /* URLs do campo hidden do form de filtro */
            let url_filter = this.url_filter.value;
            let url_read = this.url_read.value;
            filterAction(text_one, url_filter, action, formData, text_two, url_read);
        }
    });

    /* Botão Apagar Filtro */
    let btnApagarFiltro = $("#btn_apagar_filtro");
    btnApagarFiltro.on('click', function(e) {
        e.preventDefault();
        let action = 'unsetFilter';
        let text_one = 'Deseja apagar o filtro com o(s) dado(s) selecionado(s)?';
        let text_two = 'Apagando Filtro';
        let url_filter = $('#url_filter').val();
        let url_read = $('#url_read').val();
        filterAction(text_one, url_filter, action, '', text_two, url_read);
    });
});

/* Functions */
function filterAction(text_one, url_filter, action, formData, text_two, url_read) {
    swal({
        title: '',
        text: text_one,
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
            url: url_filter,
            data: {
                'action': action,
                'formData': formData
            },
            cache: false,
            async: true,
            success: function() {
                swal({
                    title: '',
                    text: text_two,
                    type: 'success',
                    confirmButtonColor: '#0f2a79',
                    timer: 5000,
                    timerProgressBar: false,
                    onOpen: function() {
                        swal.showLoading()
                    }
                }).then(function() {},
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            window.location.href = url_read;
                            console.log('Fui fechado pelo temporizador');
                        }
                    }
                );
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            console.log('Não desejo realizar nenhuma ação.');
        }
    });
}