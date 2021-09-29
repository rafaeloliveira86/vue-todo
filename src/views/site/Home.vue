<template>
    <div class="wiki-body">
        <!-- Navbar -->
        <v-app-bar color="indigo darken-3" dark height="65">
            <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
            </template>
            <v-container>
                <v-row>
                    <v-col cols="12">
                        <v-img :src="require('../../assets/image/logo_usj_white.png')" contain position="left" height="45" />
                        <!-- <v-spacer></v-spacer>
                        <v-btn icon>
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn> -->
                    </v-col>
                </v-row>
            </v-container>
        </v-app-bar>
        
        <!-- splash -->
        <div class="wiki-splash">
            <v-container>
                <v-row>
                    <v-col cols="12">
                        <h4 class="underline-white">Wiki</h4>
                    </v-col>
                </v-row>
            </v-container>
            <v-img :src="require('../../assets/image/image_callcenter.png')" contain position="right" class="image" />
        </div>

        <v-container>
            <v-row no-gutters>
                <v-col cols="12" md="8" offset-md="2">
                    <v-row no-gutters>
                        <!-- Pesquisar -->
                        <v-col md="12">
                            <v-text-field label="Pesquisar" filled rounded dense prepend-inner-icon="mdi-magnify" class="mt-5" background-color="#ffffff"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <!-- Categorias -->
                        <v-col cols="12" md="9">
                            <h3 class="underline">
                                <v-icon left size="30" color="#0D47A1">mdi-view-quilt</v-icon>Categorias
                            </h3>
                            <div class="wiki-grid">
                                <div class="wiki-col" v-for="item, index in categorias" v-bind:key="index">
                                    <v-hover>
                                        <template v-slot:default="{ hover }">
                                            <router-link :to="{ name: 'home' }" class="text-decoration-none">
                                                <v-card :elevation="hover ? 24 : 6" class="mx-auto pa-6" tile>
                                                    <v-icon dark>mdi-web</v-icon>{{ item.name }}
                                                </v-card>
                                            </router-link>
                                        </template>
                                    </v-hover>
                                </div>
                            </div>
                        </v-col>

                        <!-- Sidebar -->
                        <v-col cols="12" md="3">
                            <h3 class="underline">
                                <v-icon left size="30" color="#0D47A1">mdi-cursor-default-click</v-icon>Artigos mais acessados
                            </h3>
                            <div class="wiki-grid">
                                <div class="wiki-sidebar indigo darken-2">
                                    <v-card v-for="item, index in subcategorias" v-bind:key="index" tile>
                                        <v-list-item>
                                            <v-list-item-content>
                                                {{ item.name }}
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-card>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>

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
        data: () => ({
            categorias: [
                { name: 'Sistema Unimestre'},
                { name: 'Sistema RM Totvs'},
                { name: 'Portal do Aluno'},
                { name: 'Sistema CRM'},
                { name: 'Biblioteca Virtual'},
                { name: 'Cursos'},
                { name: 'Emissão de Boleto'},
                { name: 'Login do Sistema'},
                { name: 'Emissão de Declarações'}
            ],
            subcategorias: [
                { name: 'Como gerar relatórios no sistema UniMestre?' },
                { name: 'Como gerar relatórios no sistema RM Totvs?' },
                { name: 'Como faço para acessar o portal do aluno?' },
                { name: 'Passo a passo do portal do aluno UniMestre.' },
                { name: 'Não consigo utilizar a bilbioteca virtual.' },
                { name: 'Onde encontro informações sobre meu curso?' },
                { name: 'Meu boleto está com data de vencimento errada.' },
                { name: 'Não consigo recuperar minha senha do portal.' },
                { name: 'Como excluir disciplina da minha grade?' },
            ]
        })
    })
</script>

<style>
    .wiki-body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: #f0f2f5 !important;
    }

    .wiki-splash {
        display: flex;
        position: relative;
        padding: 0 20px;
        width: 100%;
        height: 250px;
        border-bottom: 1px solid #ffffff;
        /*background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);*/
        background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df);
    }

    .wiki-splash h4 {
        margin: 55px 0;
        font-size: 50px;
        font-weight: 900;
        color: #ffffff;
    }

    .wiki-splash .image {
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
        width: 100%;
        height: 100%;
        padding: 15px;
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