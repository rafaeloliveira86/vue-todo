<template>
    <div class="wiki-body">
        <div class="wiki-col">
            <SplashComponent />
        </div>
        <div class="wiki-col">
            <div class="wiki-container">
                <div class="wiki-box">
                    <div class="wiki-box-col">
                        <v-img :src="require('../../assets/image/image_page_not_found.png')" contain width="500" />
                    </div>
                    <div class="wiki-box-col">
                        <h5>Erro 404</h5>
                        <p>Oops! Página não encontrada!</p>
                        <small>Desculpe, não podemos encontrar a página que você está procurando.</small>
                        <div class="text-center">
                            <v-btn rounded :loading="loading" :disabled="loading" color="primary" @click="loader = 'loading'" class="ma-5">
                                Página Inicial
                            </v-btn>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="wiki-foot wiki-foot-content">
                <div class="wiki-foot-item" v-for="(item, index) in arrayUnits" :key="index">
                    <div align="center"><v-img :src="require(`../../assets/image/${item.icon_footer}`)" width="40" /></div>
                    <a :href="item.site" target="_blank">{{ item.unit_name }}</a>
                </div>
            </footer>
            <v-footer dark tile elevation="24">
                <v-col class="text-center" cols="12">
                    &COPY; Todos os direitos reservados - Departamento de Tecnologia da Informação - {{ new Date().getFullYear() }}
                </v-col>
            </v-footer>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import SplashComponent from '../../components/site/SplashComponent.vue';

    const base_url_api = 'http://localhost/api/v1';

    export default ({
        name: "Default",
        components: {
            SplashComponent
        },
        data: () => ({
            arrayUnits: [],
            loader: null,
            loading: false,
            loading2: false,
            loading3: false,
            loading4: false,
            loading5: false
        }),
        created() {
            this.getUnitsAll();
        },
        watch: {
            loader () {
                const l = this.loader;
                this[l] = !this[l];

                setTimeout(() => {
                    (this[l] = false);
                    this.redirectSite();
                }, 3000);

                this.loader = null;
            }
        },
        methods: {
            async getUnitsAll () {
                await axios.get(base_url_api + '/units')
                .then(res => {
                    this.arrayUnits = [...res.data.data];
                })
                .catch(err => {
                    console.log(err);
                })
            },
            redirectSite() {
                window.location.href = '/';
            }
        }
    })
</script>

<style>
    /* Body */
    .wiki-body {
        display: flex;
        display: -webkit-flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
        background: #f0f2f5;
        /* background-image: linear-gradient(to right, #333333, #555555); */
    }

    /* Cols */
    .wiki-col {
        width: 100%;
        height: auto;
    }

    .wiki-col:first-child {
        z-index: 0;
    }

    .wiki-col:last-child {
        z-index: 1;
        box-shadow: 0 -10px 5px -10px #595959;
        -moz-box-shadow: 0 -10px 5px -10px #595959;
        -webkit-box-shadow: 0 -10px 5px -10px #595959;
    }

    /* Container */
    .wiki-container {
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
    }

    /* Box */
    .wiki-box {
        display: flex;
        display: -webkit-flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        margin: 50px 0;
    }

    .wiki-box-col {
        width: 100%;
        height: 100%;
    }

    .wiki-box-col:first-child {
        background: transparent;
    }

    .wiki-box-col:last-child {
        text-align: center;
        background: transparent;
    }

    .wiki-box-col .v-image {
        margin: 0 auto;
    }

    .wiki-box-col h5 {
        font-size: 30px;
        color: #b20000;
    }

    .wiki-box-col p {
        font-size: 25px;
        color: #333333;
    }

    .wiki-box-col small {
        font-size: 17px;
        color: #333333;
    }

    /* Button Loader */
    .custom-loader {
        animation: loader 1s infinite;
        display: flex;
    }

    @-moz-keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }
    
    @-webkit-keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }
    
    @-o-keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }
    
    @keyframes loader {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* Footer */

    .wiki-foot {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: auto;
    }

    .wiki-foot-content {
        align-content: flex-end;
        align-items: center;
    }

    .wiki-foot-item {
        flex: 1;
        height: 100%;
        text-align: center;
        padding: 25px 0;
        /*background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df);*/
        background: #415c8e;
    }

    .wiki-foot-item a {
        font-size: 15px;
        text-decoration: none;
        color: #ffffff;
    }

    .wiki-foot-item a:hover {
        color: #e1e1e1;
    }

    .v-footer {
        font-size: 15px;
    }

    @media only screen and (max-width: 992px) {
        /* Container */
        .wiki-container {
            width: 100%;
            padding: 0 15px;
        }

        /* Box */
        .wiki-box {
            flex-direction: column;
            margin: 20px 0;
        }

        .wiki-box-col {
            padding: 20px 0;
        }

        /* Select Box */

        .wiki-select-box {
            left: calc((100% - 270px) / 2); /* 400px = largura do select */
        }

        .wiki-select-input {
            width: 270px;
        }

        /* Footer */
        .wiki-foot-item {
            height: 130px;
        }

        .wiki-foot-item a {
            font-size: 13px;
        }

        .v-footer {
            font-size: 13px;
        }
    }
</style>