<template>
    <div class="wiki-body">
        <Navbar />
        
        <!-- splash -->
        <div class="wiki-splash">
            <v-container>
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <h4 class="underline-white">Wiki</h4>
                    </v-col>
                </v-row>
            </v-container>
            <v-img :src="require('../../assets/image/image_callcenter.png')" contain position="right" class="image" />
        </div>

        <div class="wiki-container">
            <v-row no-gutters>
                <v-text-field label="Pesquisar" filled rounded prepend-inner-icon="mdi-magnify" class="mt-5" background-color="#ffffff"></v-text-field>
            </v-row>
            <v-row no-gutters>
                <section class="grid grid-content">
                    <div class="grid-item">
                        <Categorias />
                    </div>
                    <div class="grid-item">
                        <Sidebar />
                    </div>
                </section>
            </v-row>
        </div>

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
                                            <v-img :src="require('../../assets/image/logo_usj_blue.png')" contain position="left" height="45" />
                                        </a>
                                    </div>
                                    <div class="footer-item">
                                        <span>Departamento de Tecnologia da Informação</span>
                                    </div>
                                </footer>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-container>
            </v-row>
        </v-container>
        <v-footer dark tile elevation="24">
            <v-col class="text-center" cols="12">
                &COPY; Todos os direitos reservados - Centro Universitário São José - {{ new Date().getFullYear() }}
            </v-col>
        </v-footer>
    </div>
</template>

<script>
    import Navbar from '../../components/site/Navbar.vue';
    import Categorias from '../../components/site/Categorias.vue';
    import Sidebar from '../../components/site/Sidebar.vue';

    const base_url = 'http://localhost:8080';

    export default ({
        name: "Home",
        components: {
            Navbar,
            Categorias,
            Sidebar
        },
        data: () => ({
            wikiLinks: [
                {
                    text: 'Página Inicial',
                    href: base_url + '/unisaojose',
                }
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

    .wiki-container {
        display: flex;
        display: -webkit-flex;
        flex-wrap: wrap;
        flex-direction: column;
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 20px 0;
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

    /* Underline */

    .underline {
        margin: 0 0 15px 0;
        border-bottom: 1px solid #415c8e;
        padding-bottom: 15px;
        position: relative;
    }

    .underline:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #415c8e;
        width: 25%;
        height: 3px;
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
        height: 3px;
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
        color: #595959;
    }

    .v-footer {
        font-size: 15px;
    }

    @media only screen and (max-width: 992px) {
        .wiki-splash-content .image {
            opacity: unset;
        }

        .wiki-container {
            width: 100%;
            padding: 20px;
        }

        .footer-content {
            flex-direction: column;
        }

        .footer-item {
            padding: 0;
            margin: 10px 0;
            text-align: center;
        }

        .footer-item span {
            font-size: 13px;
        }

        .v-footer {
            font-size: 13px;
        }
    }
</style>