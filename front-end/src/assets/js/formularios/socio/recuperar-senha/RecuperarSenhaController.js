$(document).ready(function() {
    /* Submit Form */
    let formRecuperarSenha = $("#form_recuperar_senha");
    formRecuperarSenha.submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = form.serialize();
        submitForm(formData);
    });
});

/* Functions */
function submitForm(formData) {
    console.log(formData);
    swal({
        title: '',
        text: 'Deseja recuperar a senha de acesso do E-mail informado?',
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
            url: base_url + "/socio/recuperar/senha",
            data: formData,
            cache: false,
            async: true,
            success: function(res) {
                res = JSON.parse(res);
                if (!res.validation) {
                    $('#recovery_pass_error').html(res.message);
                } else {
                    swal({
                        title: '',
                        text: 'Processo de recuperação de senha em andamento.',
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
                                swal(
                                    '',
                                    'Prezado(a) associado(a), sua nova senha de acesso ao sistema ABENO foi enviada para o E-mail informado. Verifique sua Caixa Postal e não se esqueça também de verificar o Lixo Eletrônico e Spam.',
                                    'success'
                                );
                                $('.swal2-confirm').click(function() {
                                    window.location.href = base_url + "/socio";
                                });
                                console.log('Fui fechado pelo temporizador');
                            }
                        }
                    );
                }
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            console.log('Cancelado!');
        }
    });
}