<template>
    <div class="wiki-body">
        <div class="grid grid-content">
            <div class="grid-item">
                <v-container>
                    <v-row>
                        <v-col cols="12" md="8" offset-md="2">
                            <h4 class="underline-white">Wiki</h4>
                        </v-col>
                    </v-row>
                </v-container>
                <v-img :src="require('../../assets/image/image_callcenter.png')" class="image" />
            </div>
            <div class="grid-item">
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
                        <v-col cols="12">
                            <v-row>
                                <footer class="footer footer-content">
                                    <div class="footer-item" v-for="item, index in instituicoes" v-bind:key="index">
                                        <span>{{ item.name }}</span>
                                    </div>
                                </footer>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </div>
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
                { name: 'UniSãoJosé', link: 'http://localhost:8080/unisaojose' },
                { name: 'Colégio Realengo', link: 'http://localhost:8080/colegiorealengo' },
                { name: 'Colégio Aplicação Taquara', link: 'http://localhost:8080/colegioaplicacaotaquara' },
                { name: 'Colégio Aplicação Vila Militar', link: 'http://localhost:8080/colegioaplicacaovilamilitar' }
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

    .grid-item {
        margin: 0;
        padding: 0;
    }

    .grid-item:first-child {
        position: relative;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);
    }

    .grid-item:first-child h4 {
        margin: 150px 0;
        font-size: 50px;
        font-weight: 900;
        color: #ffffff;
        padding: 0;
    }

    .grid-item:first-child .image {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        opacity: 0.8;
    }

    .grid-item:last-child {
        position: relative;
        width: 100%;
        height: 100%;
        box-shadow: 0 0 0.3em #595959;
        -moz-box-shadow: 0 0 0.3em #595959;
        -webkit-box-shadow: 0 0 0.3em #595959;
        background: transparent;
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
        position: absolute;
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
        height: 60px;
        text-align: center;
        padding: 20px 0 0 0;
        border-top: 1px solid #ebebeb;
        background: #ffffff;
    }

    @media only screen and (max-width: 992px) {
        
    }
</style>