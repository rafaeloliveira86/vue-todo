<template>
    <div>
        <!-- Navbar -->
        <div class="navbar-fixed">
            <nav class="color-darkblue" role="navigation">
                <div class="nav-wrapper container">
                    <a href="#">
                        <img src="../../assets/image/logo_usj_white.png" class="logotipo" />
                    </a>
                </div>
            </nav>
        </div>
        <!-- splash -->
        <div class="wiki-splash">
            <div class="wiki-splash-content">
                <div class="container">
                    <h4 class="underline-white">Wiki</h4>
                </div>
                <img src="../../assets/image/image_callcenter.png" class="image" />
            </div>
        </div>
        <!-- Navbar Search -->
        <nav class="container">
            <div class="nav-wrapper">
                <form>
                    <div class="input-field">
                        <input id="search" type="search" class="white" placeholder="Pesquisar" autofocus>
                        <label class="label-icon" for="search" autofocus>
                            <i class="material-icons">search</i>
                        </label>
                    </div>
                </form>
            </div>
        </nav>
        <div class="container wiki-margin-t">
            <div class="row">
                <div class="col s12 m8">
                    <div class="row">
                        <h6 class="underline">
                            <i class="material-icons right">view_quilt</i>Categorias
                        </h6>
                        <div class="wiki-grid">
                            <div>
                                <v-card
  elevation="2"
  tile
></v-card>
                            </div>
                            <!-- Bloco 01 -->
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema UniMestre
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>

                            <!-- Bloco 2 -->
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema UniMestre
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>
                            <div class="wiki-col">
                                <div class="card-panel hoverable">
                                    <a href="#" class="black-text">
                                        Sistema RM Totvs
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="row">
                        <div class="wiki-grid">
                            <div class="wiki-sidebar">
                                <h6 class="underline">
                                    <i class="material-icons right">insert_link</i>Artigos mais acessados
                                </h6>
                                <div class="card-panel color-darkblue" style="padding-top: 10px; padding-bottom: 15px;">
                                    <div class="collection wiki-margin-t">
                                        <a href="#!" class="collection-item black-text">Como gerar relatórios no sistema UniMestre?</a>
                                        <a href="#!" class="collection-item black-text">Como inserir um novo Prospect no CRM?</a>
                                        <a href="#!" class="collection-item black-text">Passo a passo do portal do aluno.</a>
                                        <a href="#!" class="collection-item black-text">Feira de Empregabilidade. Como se inscrever?</a>
                                        <a href="#!" class="collection-item black-text">Como gerar relatórios no sistema UniMestre?</a>
                                        <a href="#!" class="collection-item black-text">Como inserir um novo Prospect no CRM?</a>
                                        <a href="#!" class="collection-item black-text">Passo a passo do portal do aluno.</a>
                                        <a href="#!" class="collection-item black-text">Feira de Empregabilidade. Como se inscrever?</a>
                                        <a href="#!" class="collection-item black-text">Como gerar relatórios no sistema UniMestre?</a>
                                        <a href="#!" class="collection-item black-text">Como inserir um novo Prospect no CRM?</a>
                                        <a href="#!" class="collection-item black-text">Passo a passo do portal do aluno.</a>
                                        <a href="#!" class="collection-item black-text">Feira de Empregabilidade. Como se inscrever?</a>
                                        <a href="#!" class="collection-item black-text">Como gerar relatórios no sistema UniMestre?</a>
                                        <a href="#!" class="collection-item black-text">Como inserir um novo Prospect no CRM?</a>
                                        <a href="#!" class="collection-item black-text">Passo a passo do portal do aluno.</a>
                                        <a href="#!" class="collection-item black-text">Feira de Empregabilidade. Como se inscrever?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-logo">
                        <a href="#">
                            <img src="../../assets/image/logo_usj_blue.png" class="logotipo" />
                        </a>
                    </div>
                    <div class="footer-copyright">
                        &copy; Todos os direito reservados - Centro Universitário São José (UniSãoJosé) - Departamento de Tecnologia da Informação
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default ({
        name: "Home",
        setup() {

        },
    })
</script>

<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        background: #f0f2f5 !important;
    }

    .wiki-splash {
        display: flex;
        flex-direction: column;
        height: 250px;
        min-height: 100%;
        display: -webkit-flex;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        justify-content: center;
    }

    .wiki-splash-content {
        position: relative;
        width: 100%;
        height: 100%;
        border-bottom: 1px solid #ffffff;
        /*background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);*/
        background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df);
    }

    .wiki-splash-content h4 {
        margin: 85px 0;
        font-size: 50px;
        font-weight: 900;
        color: #ffffff;
    }

    .wiki-splash-content .image {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        opacity: 0.8;
    }

    .wiki-grid {
        display: flex;
        flex-wrap: wrap;
    }

    .wiki-grid .wiki-col {
        flex: 1 0 25%;
        margin: 0 20px 20px 0;        
    }

    .wiki-grid .wiki-sidebar {
        margin-left: 25px;
    }

    .wiki-margin-t {
        margin-top: 20px;
    }

    .card-panel {
        margin: 0;
    }

    .color-darkblue {
        background: #18335d !important;
    }

    .logotipo {
        margin-top: 10px;
        width: 192px;
        height: auto;
    }

    /* Underline */

    .underline {
        margin: 0 0 15px 0;
        border-bottom: 1px solid #18335d;
        padding-bottom: 15px;
        position: relative;
    }

    .underline:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #18335d;
        width: 25%;
        height: 2px;
    }

    .underline-white {
        margin: 0 0 15px 0;
        border-bottom: 1px solid #ffffff;
        padding-bottom: 15px;
        position: relative;
    }

    .underline-white:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #ffffff;
        width: 25%;
        height: 2px;
    }


    /* Footer */

    .footer {
        display: flex;
        width: 100%;
        height: auto;
        padding: 30px 0;
        color: #afafaf;
        background: #ffffff;
    }

    .footer-content {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    @media only screen and (max-width: 992px) {
        .logotipo {
            width: 170px;
            height: auto;
        }

        .wiki-splash-content .image {
            opacity: unset;
        }

        .wiki-grid {
            flex-direction: column;
        }

        .wiki-grid .wiki-col {
            margin-right: 0;
        }

        .wiki-sidebar {
            margin-left: 0 !important;
        }

        .footer-content {
            flex-direction: column;
        }
    }
</style>