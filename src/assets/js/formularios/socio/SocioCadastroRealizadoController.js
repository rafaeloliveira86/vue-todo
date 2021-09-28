$(document).ready(function() {
    //Preloader
    setTimeout(function() {
        $('body').addClass('loaded');
    }, 3000);

    //Fixar o footer ao final da página
    //$('footer').addClass('foot-fixed');

    //Selecionar o tipo de sócio
    let tipoSocio = $('#tipo_socio').val();
    switch (tipoSocio) {
        case '1': //Sócio Individual
            //var url_pagamento = 'https://pag.ae/7WSrRciw5';
            var url_post = base_url + '/socio/individual/cadastro-realizado';
            var text_one = 'Deseja realizar o pagamento da anuidade de Sócio Individual?';
            var text_two = 'Aguarde! Processando as informações. Em alguns instantes você será redirecionado para o sistema PagSeguro.';
            var status_pagamento = 1;
            var valor_anuidade = 75;
            console.log('Sócio Individual - ' + tipoSocio);
            break;
        case '2': //Sócio Institucional
            //var url_pagamento = 'https://pag.ae/7WSrSKqM7';
            var url_post = base_url + '/socio/institucional/cadastro-realizado';
            var text_one = 'Deseja realizar o pagamento da anuidade de Sócio Institucional?';
            var text_two = 'Aguarde! Processando as informações. Em alguns instantes você será redirecionado para o sistema PagSeguro.';
            var status_pagamento = 1;
            var valor_anuidade = 600;
            console.log('Sócio Institucional - ' + tipoSocio);
            break;
    }

    let url_pagamento = $('#link_pagamento').val();

    //Botão de Pagamento
    let btnPagamento = $('#btn_pagamento');
    btnPagamento.on('click', function(e) {
        e.preventDefault();
        let data = {
            'url_pagamento': url_pagamento,
            'url_post': url_post,
            'text_one': text_one,
            'text_two': text_two,
            'status_pagamento': status_pagamento,
            'valor_anuidade': valor_anuidade
        }
        loadPayment(data);
    });
});

//Functions
function loadPayment(data) {
    console.log(data);
    swal({
        title: '',
        text: data.text_one,
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
            url: data.url_post,
            data: {
                'status_pagamento': data.status_pagamento,
                'valor_anuidade': data.valor_anuidade
            },
            cache: false,
            async: true,
            success: function(res) {
                swal({
                    title: '',
                    text: data.text_two,
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
                            window.location.href = data.url_pagamento;
                            console.log(res);
                        }
                    }
                );
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            console.log('Cancelado!');
        }
    });
}