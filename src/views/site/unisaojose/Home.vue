<template>
    <div class="wiki-body">
        <!-- Navbar -->
        <v-app-bar color="indigo darken-3" dark height="65">
            <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
            </template>
            <v-container>
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                            <v-img :src="require('../../../assets/image/logo_usj_white.png')" contain position="left" height="45" />
                        </a>
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
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <h4 class="underline-white">Wiki</h4>
                    </v-col>
                </v-row>
            </v-container>
            <v-img :src="require('../../../assets/image/image_callcenter.png')" contain position="right" class="image" />
        </div>

        <v-container>
            <v-row no-gutters>
                <v-col cols="12" md="8" offset-md="2">
                    <v-row no-gutters>
                        <v-col md="12">
                            <v-text-field label="Pesquisar" filled rounded dense prepend-inner-icon="mdi-magnify" class="mt-5" background-color="#ffffff"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row no-gutters>
                        <section class="grid grid-content">
                            <div class="grid-item">
                                <h3 class="underline">
                                    <v-icon left size="30" color="#0D47A1">mdi-view-quilt</v-icon>Categorias
                                </h3>
                                <div class="wiki-grid">
                                    <div class="wiki-col" v-for="item, index in categorias" v-bind:key="index">
                                        <v-hover>
                                            <template v-slot:default="{ hover }">
                                                <router-link :to="{ name: 'home' }" class="text-decoration-none">
                                                    <v-card :elevation="hover ? 24 : 6" class="mx-auto pa-5" tile>
                                                        <v-icon left size="30" color="#0D47A1">{{ item.icon }}</v-icon> {{ item.name }}
                                                    </v-card>
                                                </router-link>
                                            </template>
                                        </v-hover>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <h3 class="underline">
                                    <v-icon left size="30" color="#0D47A1">mdi-cursor-default-click</v-icon>Artigos mais acessados
                                </h3>
                                <div class="wiki-grid">
                                    <div class="wiki-sidebar">
                                        <v-card v-for="item, index in subcategorias" v-bind:key="index" tile style="margin-bottom: 1px;">
                                            <v-list-item>
                                                <v-list-item-content>
                                                    <a :href="item.link">{{ item.name }}</a>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-card>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>

        <!-- Footer -->
        <v-container fluid class="white mt-5">
            <v-row>
                <v-container>
                    <v-row>
                        <v-col cols="12" md="8" offset-md="2">
                            <v-row>
                                <footer class="footer footer-content">
                                    <div class="footer-item">
                                        <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                                            <v-img :src="require('../../../assets/image/logo_usj_blue.png')" contain position="left" height="45" />
                                        </a>
                                    </div>
                                    <div class="footer-item">
                                        <span>&copy; Todos os direito reservados - Centro Universitário São José (UniSãoJosé) - Departamento de Tecnologia da Informação</span>
                                    </div>
                                </footer>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-container>
            </v-row>
        </v-container>
    </div>
</template>

<script>
    export default ({
        name: "Home",
        data: () => ({
            wikiLinks: [
                {
                    text: 'Página Inicial',
                    href: 'http://localhost:8080/unisaojose',
                }
            ],
            categorias: [
                { icon: 'mdi-view-quilt', name: 'Sistema Unimestre'},
                { icon: 'mdi-view-quilt', name: 'Sistema RM Totvs'},
                { icon: 'mdi-view-quilt', name: 'Portal do Aluno'},
                { icon: 'mdi-view-quilt', name: 'Sistema CRM'},
                { icon: 'mdi-view-quilt', name: 'Biblioteca Virtual'},
                { icon: 'mdi-view-quilt', name: 'Cursos'},
                { icon: 'mdi-view-quilt', name: 'Emissão de Boleto'},
                { icon: 'mdi-view-quilt', name: 'Login do Sistema'},
                { icon: 'mdi-view-quilt', name: 'Emissão de Declarações'}
            ],
            subcategorias: [
                { name: 'Como gerar relatórios no sistema UniMestre?', link: 'https://google.com' },
                { name: 'Como gerar relatórios no sistema RM Totvs?', link: 'https://google.com' },
                { name: 'Como faço para acessar o portal do aluno?', link: 'https://google.com' },
                { name: 'Passo a passo do portal do aluno UniMestre.', link: 'https://google.com' },
                { name: 'Não consigo utilizar a bilbioteca virtual.', link: 'https://google.com' },
                { name: 'Onde encontro informações sobre meu curso?', link: 'https://google.com' },
                { name: 'Meu boleto está com data de vencimento errada.', link: 'https://google.com' },
                { name: 'Não consigo recuperar minha senha do portal.', link: 'https://google.com' },
                { name: 'Como excluir disciplina da minha grade?', link: 'https://google.com' },
            ]
        })
    })
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap');

    .wiki-body {
        width: 100%;
        height: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        background: #f0f2f5 !important;
    }

    .wiki-splash {
        display: flex;
        position: relative;
        padding: 0 20px;
        width: 100%;
        height: 300px;
        box-shadow: 0 0 0.3em #595959;
        -moz-box-shadow: 0 0 0.3em #595959;
        -webkit-box-shadow: 0 0 0.3em #595959;
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
    
    /* Grid */
    .grid {
        display: flex;
        width: 100%;
        height: auto;
    }

    .grid-content {
        justify-content: space-between;
    }

    .grid-item {
        padding: 0;
    }

    .grid-item:first-child {
        width: 76.7%;
        margin-right: 20px;
    }

    .grid-item:last-child {
        width: 23.3%;
    }

    @media only screen and (max-width: 1750px) {
        .grid-content {
            flex-direction: column;
        }

        .grid-item:first-child {
            width: 100%;
            margin-right: 0;
        }

        .grid-item:last-child {
            width: 100%;
        }
    }

    /* Wiki Grid */
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
        background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df);
    }

    .wiki-grid .wiki-sidebar a {
        font-size: 14px;
        text-decoration: none;
        color: #595959;
    }

    .wiki-grid .wiki-sidebar a:hover {
        color: #909090;
    }

    /* Underline */

    .underline {
        margin: 0 0 15px 0;
        border-bottom: 1px solid #6a89c3;
        padding-bottom: 15px;
        position: relative;
    }

    .underline:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #6a89c3;
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
        flex: 1;
        padding: 30px 0;
    }

    .footer-content {
        justify-content: space-between;
        align-items: center;
    }

    .footer-item {
        margin: 0;
        padding: 0 10px;
    }

    .footer-item span {
        font-size: 15px;
        color: #afafaf;
    }

    @media only screen and (max-width: 992px) {
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

        .footer-item {
            padding: 0;
            margin: 10px 0;
            text-align: center;
        }
    }
</style>