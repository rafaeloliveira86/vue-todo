<template>
    <div class="wiki-body">
        <div class="wiki-col">
            <div class="wiki-splash">
                <div class="wiki-container">
                    <h4 class="underline-white">Wiki</h4>
                </div>
                <v-img :src="require('../../assets/image/image_callcenter.png')" contain position="right" class="image" />
            </div>
        </div>
        <div class="wiki-col">
            <div class="wiki-select-box">
                <v-select
                    :items="arrayUnits"
                    v-model="unit"
                    label="Selecionar Unidade"
                    item-text="unit_name"
                    item-value="id"
                    prepend-inner-icon="mdi-chevron-right"
                    @change="selectUnit()"
                    solo
                    dark
                    height="55"
                    class="wiki-select-input">
                </v-select>

                <div class="text-center loader">
                    <v-progress-circular
                        :size="50"
                        color="primary"
                        indeterminate>
                    </v-progress-circular>
                </div>
            </div>
            <div class="wiki-container">
                <div class="wiki-box">
                    <div class="wiki-box-col">
                        <v-img :src="require('../../assets/image/image_help.png')" contain width="400" />
                    </div>
                    <div class="wiki-box-col">
                        <p>
                            Documentação Colaborativa dos sistemas institucionais UniSãoJosé, Colégio Realengo, Colégio Aplicação Taquara e Colégio Aplicação Vila Militar.<br><br>
                            <strong>Compartilhamos conhecimento!</strong><br><br>
                            Estamos iniciando esta Wiki de ajuda e você colaborador pode expandí-la.
                        </p>
                    </div>
                </div>
            </div>
            <footer class="wiki-foot wiki-foot-content">
                <div class="wiki-foot-item" v-for="item, index in arrayUnits" v-bind:key="index">
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

    const base_url = 'http://localhost:8080';
    const base_url_api = 'http://localhost/api/v1';

    export default ({
        name: "Default",
        data: () => ({
            arrayUnits: [],
            unit: null,
            wikiLinks: [
                {
                    text: 'Página Inicial',
                    href: base_url + '/unisaojose',
                }
            ]
        }),
        beforeDestroy () {
            clearInterval(this.interval);
        },
        created() {
            this.getUnitsAll();
        },
        mounted() {
            document.querySelector('.loader').style.display = 'none';
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
            selectUnit() {
                document.querySelector('.loader').style.display = 'block';

                switch (this.unit) {
                    case '1':
                        this.setItemLocalStorage(this.unit);
                        this.redirectSite('/unisaojose');
                        break;
                    case '2':
                        this.setItemLocalStorage(this.unit);
                        this.redirectSite('/colegiorealengo');
                        break;
                    case '3':
                        this.setItemLocalStorage(this.unit);
                        this.redirectSite('/colegioaplicacaotaquara');
                        break;
                    case '4':
                        this.setItemLocalStorage(this.unit);
                        this.redirectSite('/colegioaplicacaovilamilitar');
                        break;
                }
            },
            setItemLocalStorage(data) {
                localStorage.setItem("unit", btoa(data)); //btoa (Base 64 encode) - atob (Base 64 decode)
            },
            redirectSite(data) {
                setInterval(() => {
                    window.location.href = data;
                    //this.$router.push(url);
                    //this.$router.push({ path: url });
                }, 1000);
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

    /* Splash */

    .wiki-splash {
        display: flex;
        position: relative;
        padding: 0;
        width: 100%;
        height: 300px;
        background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);
        /* background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df); */
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

    /* Units Loading */
    .v-progress-circular {
        margin: 1rem;
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
        margin: 77px 0;
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

    .wiki-box-col p {
        font-size: 15px;
        color: #595959;
    }

    /* Select Box */

    .wiki-select-box {
        z-index: 1;
        position: absolute;
        top: 273px;
        left: calc((100% - 400px) / 2); /* 400px = largura do select */
    }

    .wiki-select-input {
        width: 400px;
        height: 55px;
        border: none;
        border-radius: 35px;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        -ms-appearance: none;
        appearance: none;
        font-family: "Font Awesome 5 Free", "Roboto";
        font-size: 15px;
        /*background: #ffffff;*/
    }

    /* Underline */

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
        /* Splash */
        .wiki-splash .image {
            opacity: unset;
        }

        /* Container */
        .wiki-container {
            width: 100%;
            padding: 0 15px;
        }

        /* Box */
        .wiki-box {
            flex-direction: column;
            margin: 70px 0 20px 0;
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