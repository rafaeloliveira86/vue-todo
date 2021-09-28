$(document).ready(function() {
    //Botão Nav Voltar
    let btnNavVoltar = $('#btn_nav_voltar_cadastro_usuario');
    btnNavVoltar.on('click', function(e) {
        e.preventDefault();
        window.location.href = base_url + '/dashboard/usuario';
    });

    //Form Upload Avatar
    /*let formAvatar = $("#form_avatar");
    formAvatar.submit(function(e) {
        e.preventDefault();

        var files = $("#file")[0].files;

        for (var i = 0; i < files.length; i++) {
            file = files[i];
            fileName = files[i].name;
            fileType = files[i].type;
            //console.log(file);
        }
        if (file) {
            $.ajax({
                type: "POST",
                url: base_url + "/dashboard/usuario/avatar",
                data: {
                    'file': file,
                    //'fileName': fileName,
                    //'fileType': fileType
                },
                cache: false,
                success: function(res) {
                    res = JSON.parse(res);
                    console.log(res);
                    if (!res.validation) {
                        $('.modal-response').html(res.message_error);
                        $('#modal-error').modal('open');
                    } else {
                        location.reload();
                    }
                }
            });
        }
    });*/

    /* Submit Form */
    let formRegister = $("#form_usuario_cadastro");
    formRegister.submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = form.serialize();
        if (formData) {
            submitForm(formData);
        }
    });
});

/* Functions */
function submitForm(formData) {
    swal({
        title: '',
        text: 'Deseja cadastrar o novo usuário?',
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
            url: base_url + "/dashboard/usuario/cadastro",
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
                        text: 'Cadastro de usuário em andamento',
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
                                swal('', 'Cadastro de usuário realizado com sucesso!', 'success');
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
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            console.log('Não desejo cadastrar um novo usuário.');
        }
    });
}