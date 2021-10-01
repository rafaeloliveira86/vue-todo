<template>
    <div class="wiki-body">
        <div class="grid grid-content">
            <div class="grid-row">
                <v-container>
                    <v-row>
                        <v-col cols="12" md="8" offset-md="2">
                            <h4 class="underline-white">Wiki</h4>
                        </v-col>
                    </v-row>
                </v-container>
                <v-img :src="require('../../assets/image/image_callcenter.png')" class="image" />
            </div>
            <div class="grid-row">
                <div class="grid-input">
                    <!-- <v-select :items="items" label="Selecione" class="select" solo outlined></v-select> -->
                    <select class="select">
                        <option value="" selected>Selecione</option>
                        <option v-for="item in instituicoes" :key="item" :value="item.link">{{ item.name }}</option>
                    </select>
                </div>
                <!-- Footer -->
                <v-container fluid>
                    <v-row>
                        <v-col cols="12" md="8" offset-md="2">
                            <v-row>
                                <div class="grid grid-body">
                                    <div class="grid-col">
                                        <v-img :src="require('../../assets/image/image_help.png')" contain width="400" />
                                    </div>
                                    <div class="grid-col">
                                        <p>
                                            Documentação Colaborativa dos sistemas institucionais UniSãoJosé, Colégio Realengo, Colégio Aplicação Taquara e Colégio Aplicação Vila Militar.<br><br>
                                            <strong>Compartilhamos conhecimento!</strong><br><br>
                                            Estamos iniciando esta Wiki de ajuda e você colaborador pode expandí-la.
                                        </p>
                                    </div>
                                </div>
                            </v-row>
                        </v-col>
                        <v-col cols="12">
                            <v-row>
                                <footer class="footer footer-content">
                                    <div class="footer-item" v-for="item, index in instituicoes" v-bind:key="index">
                                        <div align="center"><v-img :src="require(`../../assets/image/${item.icon}`)" width="40" /></div>
                                        <span>{{ item.name }}</span>
                                    </div>
                                </footer>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </div>
        <v-footer dark tile elevation="24">
            <v-col class="text-center" cols="12">
                &COPY; Todos os direitos reservados - Centro Universitário São José - {{ new Date().getFullYear() }}
            </v-col>
        </v-footer>
    </div>
</template>

<script>
    export default ({
        name: "Default",
        data: () => ({
            wikiLinks: [
                {
                    text: 'Página Inicial',
                    href: 'http://localhost:8080/unisaojose',
                }
            ],
            instituicoes: [
                { name: 'UniSãoJosé', icon: 'icon_usj.png', link: 'http://localhost:8080/unisaojose' },
                { name: 'Colégio Realengo', icon: 'icon_cr.png', link: 'http://localhost:8080/colegiorealengo' },
                { name: 'Colégio Aplicação Taquara', icon: 'icon_cca.png', link: 'http://localhost:8080/colegioaplicacaotaquara' },
                { name: 'Colégio Aplicação Vila Militar', icon: 'icon_cca.png', link: 'http://localhost:8080/colegioaplicacaovilamilitar' }
            ],
            //items: ['UniSãoJosé', 'Colégio Realengo', 'Colégio Aplicação Taquara', 'Colégio Aplicação Vila Militar'],
            items: [
                { text: 'UniSãoJosé', value: 1, disabled: false },
                { text: 'Colégio Realengo', value: 2, disabled: false },
                { text: 'Colégio Aplicação Taquara', value: 3, disabled: false },
                { text: 'Colégio Aplicação Vila Militar', value: 4, disabled: false }
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

    /* Grid */
    .grid {
        display: flex;
        display: -webkit-flex;
        width: 100%;
        height: 100%;
    }

    .grid-content {
        flex-direction: column;
    }

    .grid-body {
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 50px 0;
    }

    .grid-row {
        margin: 0;
        padding: 0;
    }

    .grid-row:first-child {
        position: relative;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);
    }

    .grid-row h4 {
        margin: 100px 12px 70px 12px;
        font-size: 50px;
        font-weight: 900;
        color: #ffffff;
        padding: 0;
    }

    .grid-row .image {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        opacity: 0.8;
    }

    .grid-row:last-child {
        position: relative;
        width: 100%;
        height: 100%;
        box-shadow: 0 0 0.3em #595959;
        -moz-box-shadow: 0 0 0.3em #595959;
        -webkit-box-shadow: 0 0 0.3em #595959;
        background: transparent;
    }

    .grid-col {
        margin: 0;
        padding: 50px 12px;
    }

    .grid-col:first-child {
        position: relative;
        width: 100%;
        height: 100%;
        background: transparent;
    }

    .grid-col:last-child {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        background: transparent;
    }

    .grid-col .v-image {
        margin: 0 auto;
    }

    .grid-col p {
        font-size: 15px;
    }

    .grid-input {
        z-index: 1;
        position: absolute;
        top: -27px;
        left: calc((100% - 400px) / 2); /* 400px = largura do select */
    }

    .select {
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
        background: #ffffff;
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
        flex-wrap: wrap;
        width: 100%;
        min-height: 100%;
    }

    .footer-content {
        align-content: flex-end;
        align-items: center;
    }

    .footer-item {
        flex: 1;
        height: 100%;
        text-align: center;
        color: #ffffff;
        padding: 25px 0;
        border-top: 1px solid #ffffff;
        /*background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df);*/
        background: #415c8e;
    }

    .footer-item span {
        font-size: 15px;
    }

    @media only screen and (max-width: 992px) {
        /* .grid-content {
            flex-direction: row;
        } */

        .grid-body {
            flex-direction: column;
        }

        .grid-col .v-image {
            margin-bottom: 30px;
        }

        .grid-col:first-child {
            display: none;
        }

        .grid-col:last-child {
            padding: 50px 12px;
        }

        .grid-input {
            left: calc((100% - 250px) / 2); /* 250px = largura do select */
        }

        .select {
            width: 250px;
        }

        .footer-item {
            padding: 25px 0;
        }

        .footer-item span {
            font-size: 13px;
        }
    }
</style>