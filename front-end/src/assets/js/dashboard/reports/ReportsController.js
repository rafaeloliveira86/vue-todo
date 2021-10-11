$(document).ready(function() {
    let tipoRelatorio = $('#tipo_relatorio').val();

    let filterContent = $('#filter_content');
    filterContent.hide();

    let btnFilterOpen = $('#btn_filter_open');
    let btnFilterClose = $('#btn_filter_close');
    let btnGeneratePDF = $('#btn_pdf');
    let btnGenerateEXCEL = $('#btn_excel');

    btnFilterClose.hide();

    btnFilterOpen.on('click', function(e) {
        e.preventDefault();
        filterContent.slideDown();
        btnFilterOpen.hide();
        btnFilterClose.show();
    });

    btnFilterClose.on('click', function(e) {
        e.preventDefault();
        filterContent.slideUp();
        btnFilterOpen.show();
        btnFilterClose.hide();
    });

    /* Shadowbox */
    Shadowbox.init({
        language: 'pt',
        player: ['html', 'php'],
        skipSetup: true,
        modal: true,
    });

    btnGeneratePDF.on('click', function(e) {
        e.preventDefault();
        swal({
            title: '',
            text: 'Deseja carregar o relatório em PDF?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0f2a79',
            cancelButtonColor: '#90050b',
            confirmButtonText: "<i class='material-icons prefix left'>check</i>Confirmar",
            cancelButtonText: "<i class='material-icons prefix left'>cancel</i>Cancelar",
            buttonsStyling: true
        }).then(function() {
            Shadowbox.open({
                content: base_url + '/dashboard/relatorio/financeiro/pagamento?type='+tipoRelatorio+'&ext=PDF',
                player: "iframe",
                type: "iframe",
                title: "Relatório",
                //height: 350,
                //width: 350
            });
        }, function(dismiss) {
            if (dismiss === 'cancel') {
                console.log('Não desejo realizar nenhuma ação.');
            }
        });
    });

    btnGenerateEXCEL.on('click', function(e) {
        e.preventDefault();
        swal({
            title: '',
            text: 'Deseja exportar o relatório em XLSx?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0f2a79',
            cancelButtonColor: '#90050b',
            confirmButtonText: "<i class='material-icons prefix left'>check</i>Confirmar",
            cancelButtonText: "<i class='material-icons prefix left'>cancel</i>Cancelar",
            buttonsStyling: true
        }).then(function() {
            window.location.href = base_url + '/dashboard/relatorio/financeiro/pagamento?type='+tipoRelatorio+'&ext=XLS';
        }, function(dismiss) {
            if (dismiss === 'cancel') {
                console.log('Não desejo realizar nenhuma ação.');
            }
        });
    });
});