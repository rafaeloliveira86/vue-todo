$(document).ready(function() {
    //Botão Nav Voltar
    let btnNavVoltar = $('#btn_nav_voltar_editar_usuario');
    btnNavVoltar.on('click', function(e) {
        e.preventDefault();
        window.location.href = base_url + '/dashboard/usuario';
    });

    /* Submit Form */
    let formRegister = $("#form_editar_usuario");
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
        text: 'Deseja atualizar o usuário selecionado?',
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
                url: base_url + "/dashboard/usuario/editar/"+userId,
                data: formData,
                cache: false,
                async: true,
                success: function(res) {
                    res = JSON.parse(res);
                    if (!res.validation) {
                        $('.modal-response').html(res.message_error);
                        $('#modal-error').modal('open');
                    } else {
                        swal({
                            title: '',
                            text: 'Atualização de cadastro de usuário em andamento',
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
                                    swal('', 'Usuário atualizado com sucesso!', 'success');
                                    $('.swal2-confirm').click(function() {
                                        window.location.href = base_url + "/dashboard/usuario";
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
                console.log('Não desejo cadastrar um novo usuário.');
            }
        }
    );
}