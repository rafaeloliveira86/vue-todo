$(document).ready(function() {
    /* Preloader */
    setTimeout(function() {
        $('body').addClass('loaded');
    }, 3000);

    //Seleciona o controller utilizado no momento da requisição e passa variável controller_action para o footer
    switch (controller_action) {
        case 'usuario':
            var url_create = base_url + '/dashboard/usuario/cadastro';
            var url_read = base_url + '/dashboard/usuario';
            var url_update = base_url + '/dashboard/usuario/editar/';
            var url_delete = base_url + '/dashboard/usuario/deletar';
            var url_details = base_url + "/dashboard/usuario/detalhes/";

            var text_one = 'Deseja excluir o(s) usuário(s) selecionado(s)?';
            var text_two = 'Exclusão de(os) usuário(s) em andamento';
            var text_tree = 'Usuário(s) excluído(s) com sucesso!';
            break;
        case 'socio_individual':
            var url_create = base_url + '/dashboard/socio/individual/cadastro';
            var url_read = base_url + '/dashboard/socio/individual';
            var url_update = base_url + '/dashboard/socio/individual/editar/';
            var url_delete = base_url + "/dashboard/socio/individual/deletar";
            var url_details = base_url + "/dashboard/socio/individual/detalhes/";

            var text_one = 'Deseja excluir o(s) sócio(s) selecionado(s)?';
            var text_two = 'Exclusão de(os) sócio(s) em andamento';
            var text_tree = 'Sócio(s) excluído(s) com sucesso!';
            break;
        case 'socio_institucional':
            var url_create = base_url + '/dashboard/socio/institucional/cadastro';
            var url_read = base_url + '/dashboard/socio/institucional';
            var url_update = base_url + '/dashboard/socio/institucional/editar/';
            var url_delete = base_url + "/dashboard/socio/institucional/deletar";
            var url_details = base_url + "/dashboard/socio/institucional/detalhes/";

            var text_one = 'Deseja excluir o(s) sócio(s) selecionado(s)?';
            var text_two = 'Exclusão de(os) sócio(s) em andamento';
            var text_tree = 'Sócio(s) excluído(s) com sucesso!';
            break;
    }

    //Botão Editar Perfil (NAV Dashboard)
    let btnPerfil = $('#btn_perfil');
    btnPerfil.on('click', function(e) {
        e.preventDefault();
        let id = atob(sessionUserId); //btoa (Base 64 encode) - atob (Base 64 decode)
        window.location.href = base_url + '/dashboard/usuario/editar/' + id;
    });

    //Botão Logout (NAV Dashboard)
    let btnLogout = $('#btn_logout');
    btnLogout.on('click', function(e) {
        e.preventDefault();
        functionLogout();
    });

    //Carregar Modal
    $('a[name=modal-trigger]').on('click', function(e) {
        e.preventDefault();
        var content = $(this).attr('href');
        $('#modal-error').modal('open');
        $('.modal-response').load(content);
    });

    /* Buscar Cep */
    $("#cep").focusout(function() {
        $.ajax({
            url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
            dataType: 'json',
            success: function(res) {
                $("#endereco").val(res.logradouro);
                $("#complemento").val(res.complemento);
                $("#bairro").val(res.bairro);
                $("#cidade").val(res.localidade);
                $("#uf").val(res.uf);
                $("#numero").focus();
            }
        });
    });

    /* Botões Navbar Páginas de Listagem (NAV = Navbar / DT = Datatable) */
    let dtContentNav = $('#dt_content_nav');
    let dtContentTable = $('#dt_content_table');
    let dtContentDetail = $('#dt_content_detail');

    let btnNavDetalhes = $('#btn_nav_detalhes');
    let btnAdicionar = $('#btn_nav_adicionar, #btn_dt_adicionar');
    let btnNavEditar = $('#btn_nav_editar');
    let btnNavExcluir = $('#btn_nav_excluir');

    dtContentDetail.hide();

    btnNavDetalhes.addClass('disabled');
    btnNavEditar.addClass('disabled');
    btnNavExcluir.addClass('disabled');

    //Botão NAV Detalhes
    btnNavDetalhes.on('click', function(e) {
        e.preventDefault();

        dtContentDetail.removeClass('animate__animated animate__backOutUp');
        dtContentNav.removeClass('animate__animated animate__bounceInDown');
        dtContentTable.removeClass('animate__animated animate__bounceInDown');

        dtContentNav.addClass('animate__animated animate__bounceOutDown');
        dtContentTable.addClass('animate__animated animate__backOutUp');
        setTimeout(function() {
            dtContentNav.slideUp();
            dtContentTable.slideUp();
        }, 500);

        let id = $("input[name='cbx_dt_selecionar_individual[]']:checked").val();
        if (id) {
            dtContentDetail.load(url_details + id);
            dtContentDetail.addClass('animate__animated animate__bounceInDown');
            setTimeout(function() {
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

                dtContentDetail.slideDown();
            }, 800);
        }
    });

    //Botão NAV/DT Adicionar
    btnAdicionar.on('click', function(e) {
        e.preventDefault();
        window.location.href = url_create;
    });

    //Botão NAV Editar
    btnNavEditar.on('click', function(e) {
        e.preventDefault();
        let id = $("input[name='cbx_dt_selecionar_individual[]']:checked").val();
        window.location.href = url_update + id;
    });

    //Botão NAV Excluir
    btnNavExcluir.on('click', function(e) {
        e.preventDefault();
        if (document.querySelector('.cbx_dt_selecionar_individual') != null) {
            let id = new Array();
            $("input[name='cbx_dt_selecionar_individual[]']:checked").each(function() {
                id.push(parseInt($(this).val()));
            });
            functionDelete(text_one, url_delete, id, text_two, text_tree, url_read);
        }
    });

    /*$(document).on('click', '[id="btn_nav_voltar"]', function(e) {
        e.preventDefault();
        dtContentDetail.slideUp('slow');
        dtContentNav.slideDown('slow');
        dtContentTable.slideDown('slow');
    });*/

    $(document).on('click', '[id="btn_nav_voltar"]', function(e) {
        e.preventDefault();
        dtContentNav.removeClass('animate__animated animate__bounceOutDown');
        dtContentTable.removeClass('animate__animated animate__backOutUp');
        dtContentDetail.removeClass('animate__animated animate__bounceInDown');

        dtContentDetail.addClass('animate__animated animate__backOutUp');
        setTimeout(function() {
            dtContentDetail.slideUp();
        }, 500);

        dtContentNav.addClass('animate__animated animate__bounceInUp');
        dtContentTable.addClass('animate__animated animate__bounceInDown');
        setTimeout(function() {
            dtContentNav.slideDown();
            dtContentTable.slideDown();
        }, 600);
    });

    //Checkbox Selecionar Total (DataTable)
    let cbxDtSelecionarTotal = $('#cbx_dt_selecionar_total');
    cbxDtSelecionarTotal.on('click', function() {
        if ($(this).is(':checked')) {
            btnNavEditar.addClass('disabled');
            btnNavExcluir.removeClass('disabled');
            $('input:checkbox').prop('checked', true);
        } else {
            btnNavExcluir.addClass('disabled');
            $('input:checkbox').prop('checked', false);
        }
    });

    //Checkbox Selecionar Individual (DataTable)
    $(document).on('click', '[class="cbx_dt_selecionar_individual"]', function() {
        let cbxSelecionado = $().verificarCheckbox();
        if (cbxSelecionado == 1) {
            btnNavDetalhes.removeClass('disabled');
            btnNavEditar.removeClass('disabled');
            btnNavExcluir.removeClass('disabled');
        } else if (cbxSelecionado > 1) {
            btnNavDetalhes.addClass('disabled');
            btnNavEditar.addClass('disabled');
        } else {
            btnNavDetalhes.addClass('disabled');
            btnNavEditar.addClass('disabled');
            btnNavExcluir.addClass('disabled');
        }
    });

    //Verificar Checkbox Selecionado
    $.fn.verificarCheckbox = function() {
        var cont = 0;
        $('input[type="checkbox"]:checked').each(function() {
            cont++;
        });
        return cont;
    };
});

//Device Identity
function device() {
    let browser = navigator.userAgent || navigator.vendor || window.opera;
    let device = /android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|mobile|o2|opera m(ob|in)i|palm( os)?|p(ixi|re)\/|plucker|pocket|psp|smartphone|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce; (iemobile|ppc)|xiino/i.test(browser) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(browser);
    return device;
}

//Load Shadowbox
function loadShadowbox(url, title) {
    if (device()) {
        //Mobile
        window.open(url, '_blank');
        return true;
    } else {
        //DeskTop
        Shadowbox.open({
            content: url,
            player: "iframe",
            title: title
        });
    }
}

function functionDelete(text_one, url_delete, id, text_two, text_tree, url_read) {
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
            url: url_delete,
            data: {
                'id': id
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
                    timerProgressBar: true,
                    onOpen: function() {
                        swal.showLoading()
                    }
                }).then(function() {},
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            swal('', text_tree, 'success');
                            $('.swal2-confirm').click(function() {
                                window.location.href = url_read;
                            });
                            console.log('Fui fechado pelo temporizador');
                        }
                    }
                );
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            console.log('Não desejo excluir o(s) registro(s) selecionado(s).');
        }
    });
}

function functionLogout() {
    swal({
        title: '',
        text: 'Deseja sair do sistema?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0f2a79',
        cancelButtonColor: '#90050b',
        confirmButtonText: "<i class='material-icons prefix left'>power_settings_new</i>Sair",
        cancelButtonText: "<i class='material-icons prefix left'>cancel</i>Cancelar",
        buttonsStyling: true
    }).then(function() {
        $.ajax({
            type: "GET",
            url: base_url + "/logout",
            cache: false,
            success: function() {
                swal({
                    title: '',
                    text: 'Encerrando a sessão',
                    //type: 'success',
                    timer: 5000,
                    timerProgressBar: true,
                    onOpen: function() {
                        swal.showLoading()
                    }
                }).then(function() {},
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            window.location.href = base_url;
                            console.log('Fui fechado pelo temporizador');
                        }
                    }
                );
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            console.log('Não desejo sair do sistema.');
        }
    });
}