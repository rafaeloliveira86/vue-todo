$(document).ready(function() {
    /* Preloader */
    setTimeout(function() {
        $('body').addClass('loaded');
    }, 3000);

    //Selecionar o tipo de sócio
    let tipoSocio = $('#tipo_socio').val();
    let tipoForm = $('#tipo_form').val();

    switch (tipoSocio) {
        case '1': //Sócio Individual
            if (tipoForm == 'form_cadastro') {
                var url = $('#url_cadastro').val();
                var text_one = 'Deseja cadastrar-se como Sócio Individual?';
                var text_two = 'Cadastro de Sócio Individual em andamento.';
                var text_tree = 'Cadastro de Sócio Individual realizado com sucesso!';
                var url_redirect = base_url + '/socio/individual/cadastro-realizado';
            }
            if (tipoForm == 'form_editar') {
                var url = $('#url_editar').val();
                var text_one = 'Deseja atualizar seu cadastro de Sócio Individual?';
                var text_two = 'Atualização de cadastro de Sócio Individual em andamento.';
                var text_tree = 'Atualização de cadastro de Sócio Individual realizada com sucesso!';
                var url_redirect = base_url + '/socio/individual';
            }
            console.log('Sócio Individual - ' + tipoSocio + ' - ' + tipoForm);
            break;
        case '2': //Sócio Institucional
            if (tipoForm == 'form_cadastro') {
                var url = $('#url_cadastro').val();
                var text_one = 'Deseja cadastrar-se como Sócio Institucional?';
                var text_two = 'Cadastro de Sócio Institucional em andamento.';
                var text_tree = 'Cadastro de Sócio Institucional realizado com sucesso!';
                var url_redirect = base_url + '/socio/institucional/cadastro-realizado';
            }
            if (tipoForm == 'form_editar') {
                var url = $('#url_editar').val();
                var text_one = 'Deseja atualizar seu cadastro de Sócio Institucional?';
                var text_two = 'Atualização de cadastro de Sócio Institucional em andamento.';
                var text_tree = 'Atualização de cadastro de Sócio Institucional realizada com sucesso!';
                var url_redirect = base_url + '/socio/institucional';
            }
            console.log('Sócio Institucional - ' + tipoSocio + ' - ' + tipoForm);
            break;
        default:
            var randomColor = Math.floor(Math.random() * 16777215).toString(16);

            let avatarBall = document.querySelector('.ds-avatar-ball');
            avatarBall.style.backgroundColor = '#' + randomColor;

            let primeiraLetra = avatarBall.textContent.split(' ')[0].charAt(0).toUpperCase();

            if (avatarBall.textContent.split(' ')[1] && avatarBall.textContent.split(' ')[1].length > 3) {
                avatarBall.textContent = primeiraLetra + '' + avatarBall.textContent.split(' ')[1].charAt(0).toUpperCase();
            } else {
                if (avatarBall.textContent.split(' ')[1]) {
                    avatarBall.textContent = primeiraLetra + '' + avatarBall.textContent.split(' ')[2].charAt(0).toUpperCase();
                } else {
                    avatarBall.textContent = primeiraLetra
                }
            }
    }

    /* JQuery Mask */
    $("#fone_residencial").mask("(99)9999-9999");
    $("#fone_comercial").mask("(99)9999-9999");
    $("#fone_celular").mask("(99)99999-9999");
    $("#fone_instituicao").mask("(99)9999-9999");
    $("#fax_instituicao").mask("(99)9999-9999");
    $("#fone_celular_instituicao").mask("(99)99999-9999");
    $("#fone_celular_coordenador").mask("(99)99999-9999");
    $("#cpf").mask("999.999.999-99");
    $("#cnpj").mask("99.999.999/9999-99");
    $("#cep").mask("99999-999");

    /* Buscar Cep */
    $("#cep").focusout(function() {
        $.ajax({
            url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
            dataType: 'json',
            success: function(res) {
                $("#endereco").val(res.logradouro);
                $("#bairro").val(res.bairro);
                $("#endereco_instituicao").val(res.logradouro);
                $("#bairro_instituicao").val(res.bairro);
            }
        });
    });

    //Campo Estado e Cidade
    let cidade = $('#id_cidade');
    $(cidade.parent()[0].children[0]).attr('disabled', true);

    let estado = $('#id_uf');
    estado.on('change', function(e) {
        e.preventDefault();
        if (estado.val() != '') {
            $(cidade.parent()[0].children[0]).attr('disabled', false);

            let data = {
                'url': url,
                'id_estado': estado.val(),
                'id_cidade': cidade
            }

            loadCity(data);
        } else {
            $(cidade.parent()[0].children[0]).attr('disabled', true);
        }
    });
    if (tipoForm == "form_editar") {
        if (estado.val() != '') {
            $(cidade.parent()[0].children[0]).attr('disabled', false);

            let data = {
                'url': url,
                'id_estado': estado.val(),
                'id_cidade': cidade
            }

            loadCity(data);
        } else {
            $(cidade.parent()[0].children[0]).attr('disabled', true);
        }
    }

    //Campo Outra Categoria
    let otherCategory = $('#ds_outra_categoria');
    otherCategory.hide();

    let categoryCheck = $("input[name='id_categoria']:checked");
    if (categoryCheck.attr("value") == 5) {
        otherCategory.show();
    }

    let category = $("input[name='id_categoria']");
    category.click(function(e) {
        if ($(this).attr("value") == 5 && e.target.checked) {
            otherCategory.slideDown();
        } else {
            otherCategory.slideUp();
            otherCategory.val() = '';
        }
    });

    /* Submit Form */
    let formRequest = $("#submit_form");
    formRequest.on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let form_data = form.serialize();
        let data = {
            'url': url,
            'text_one': text_one,
            'text_two': text_two,
            'text_tree': text_tree,
            'form_data': form_data,
            'url_redirect': url_redirect
        }
        submitForm(data);
    });
});

/* Functions */
function submitForm(data) {
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
            url: data.url,
            data: data.form_data,
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
                                swal('', data.text_tree, 'success');
                                $('.swal2-confirm').click(function() {
                                    window.location.href = data.url_redirect;
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

function loadCity(data) {
    $.get(data.url, {
        estadoID: data.id_estado
    }, function(res) {
        let insatance = M.FormSelect.getInstance(data.id_cidade);
        insatance.destroy();

        var options = '<option value="">Selecione</option>';
        JSON.parse(res).forEach(element => {
            options += `<option value="${element.id}" ${element.id == data.id_cidade.attr("edittarget")  ? "selected" : ""}>${element.nome_municipio}</option>`
        });
        data.id_cidade.html(options);

        M.FormSelect.init(data.id_cidade);
    });
}