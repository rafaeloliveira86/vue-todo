$(document).ready(function() {
    //Botão Nav Voltar
    let btnNavVoltar = $('#btn_nav_voltar_editar_usuario');
    btnNavVoltar.on('click', function(e) {
        e.preventDefault();
        window.location.href = base_url + '/dashboard/socio/institucional';
    });

    //Status do Pagamento / Valor Anuidade
    let statusPagamento = $('#status_pagamento');
    let valorAnuidade = $('#valor_anuidade');
    let dataBoleto = $('#data_boleto');
    let status = $('#id_status');
    statusPagamento.on('change', function(e) {
        e.preventDefault();
        //console.log(statusPagamento.val());
        if (statusPagamento.val() == 0) {
            valorAnuidade.attr('disabled', true).val('0,00');
            dataBoleto.attr('disabled', true).val('00/00/0000');
            status.val('2');
        } else {
            var d = new Date();
            Date.prototype.datePTBR = function() {
                var dd = this.getDate().toString();
                var mm = (this.getMonth() + 1).toString();
                var yyyy = this.getFullYear().toString();
                return (dd[1] ? dd : "0" + dd[0]) + "/" + (mm[1] ? mm : "0" + mm[0]) + "/" + yyyy;
            };
            valorAnuidade.attr('disabled', false);
            dataBoleto.attr('disabled', false).val(d.datePTBR());
            status.val('1');
        }
    });

    /* Submit Form */
    let formRegister = $("#form_editar_socio_institucional");
    formRegister.submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = form.serialize();
        if (formData) {
            let formData = form.serializeArray();
            userId = formData[0].value;
            submitForm(formData, userId);
        }
    });
});

/* Functions */
function submitForm(formData, userId) {
    swal({
        title: '',
        text: 'Deseja atualizar o cadastro de Sócio Institucional selecionado?',
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
                url: base_url + "/dashboard/socio/institucional/editar/" + userId,
                data: formData,
                cache: false,
                async: true,
                success: function(res) {
                    res = JSON.parse(res);
                    if (!res.validation) {
                        $('.modal-response').html(res.message_error);
                        $('#modal-error').modal('open');
                    } else {
                        console.log(formData);
                        swal({
                            title: '',
                            text: 'Atualização de cadastro de Sócio Institucional em andamento',
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
                                    swal('', 'Cadastro de Sócio Institucional atualizado com sucesso!', 'success');
                                    $('.swal2-confirm').click(function() {
                                        //window.location.href = base_url + "/dashboard/socio/institucional";
                                        window.location.href = base_url + "/dashboard/socio/institucional/editar/" + userId;
                                    });
                                    console.log('Fui fechado pelo temporizador');
                                }
                            }
                        );
                    }
                }
            });
        },
        function(dismiss) {
            if (dismiss === 'cancel') {
                console.log('Não desejo editar o cadastro de Sócio Institucional.');
            }
        }
    );
}