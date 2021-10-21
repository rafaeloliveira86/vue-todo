<template>
    <div class="wiki-body">
        <div class="wiki-col">
            <SplashComponent />
        </div>
        <div class="wiki-col">
            <div class="wiki-select-box">
                <v-select
                    :items="arrayUnits"
                    v-model="id_unit"
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

                <!-- <div class="text-center loader">
                    <v-progress-circular
                        :size="50"
                        color="primary"
                        indeterminate>
                    </v-progress-circular>
                </div> -->
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
                            Estamos iniciando esta <strong>Wiki</strong> de ajuda e você colaborador pode expandí-la.
                        </p>
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

    const base_url_api = 'http://localhost/wiki/api/v1';

    export default ({
        name: "Default",
        components: {
            SplashComponent
        },
        data: () => ({
            arrayUnits: [],
            id_unit: null
        }),
        beforeDestroy () {
            clearInterval(this.interval);
        },
        created() {
            this.getUnitsAll();
        },
        mounted() {
            //document.querySelector('.loader').style.display = 'none';
            this.removeItemLocalStorage();
        },
        methods: {
            async getUnitsAll () {
                await axios.get(base_url_api + '/unidades')
                .then(res => {
                    this.arrayUnits = [...res.data.data];
                })
                .catch(err => {
                    console.log(err);
                })
            },
            selectUnit() {
                //document.querySelector('.loader').style.display = 'block';

                switch (this.id_unit) {
                    case '1':
                        this.setItemLocalStorage(this.id_unit);
                        this.redirectSite('/unisaojose');
                        break;
                    case '2':
                        this.setItemLocalStorage(this.id_unit);
                        this.redirectSite('/colegiorealengo');
                        break;
                    case '3':
                        this.setItemLocalStorage(this.id_unit);
                        this.redirectSite('/colegioaplicacaotaquara');
                        break;
                    case '4':
                        this.setItemLocalStorage(this.id_unit);
                        this.redirectSite('/colegioaplicacaovilamilitar');
                        break;
                }
            },
            setItemLocalStorage(data) {
                localStorage.setItem("unit", btoa(data)); //btoa (Base 64 encode) - atob (Base 64 decode)
            },
            removeItemLocalStorage() {
                if (localStorage.getItem("unit")) {
                    localStorage.removeItem("unit");
                }

                if (localStorage.getItem("categorie")) {
                    localStorage.removeItem("categorie");
                }

                if (localStorage.getItem("subcategorie")) {
                    localStorage.removeItem("subcategorie");
                }
            },
            redirectSite(data) {
                window.location.href = data;
                /*setInterval(() => {
                    window.location.href = data;
                    this.$router.push(url);
                    this.$router.push({ path: url });
                }, 1000);*/
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
        font-size: 17px;
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