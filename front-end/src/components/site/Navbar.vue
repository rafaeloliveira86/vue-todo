<template>
    <div>
        <v-app-bar v-for="(item, index) in arrayUnit" :key="index" :color="item.class" dark>
            <!-- <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
            </template> -->
            <div class="wiki-app-bar-body">
                <div class="wiki-app-bar-container">
                    <div class="wiki-app-bar">
                        <div class="wiki-app-bar-col">
                            <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                                <v-img :src="require(`../../assets/image/${item.logo_navbar}`)" contain position="left" content-class="wiki-app-bar-logo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <v-container>
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                            <v-img :src="require(`../../assets/image/${item.logo_navbar}`)" contain position="left" height="50" />
                        </a>
                        <v-spacer></v-spacer>
                        <v-btn icon>
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container> -->
        </v-app-bar>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url = 'http://localhost:8080';
    const base_url_api = 'http://localhost/api/v1';

    export default {
        name: "Navbar",
        data: () => ({
            arrayUnit: [],
            //unit: null,
            wikiLinks: [
                {
                    text: 'Página Inicial',
                    href: base_url + '/unisaojose',
                }
            ]
        }),
        created() {
            this.getUnitByID();
        },
        methods: {
            async getUnitByID () {
                let id_unit = atob(localStorage.getItem("unit")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/unit/' + id_unit)
                .then(res => {
                    this.arrayUnit = [...res.data.data];
                })
                .catch(err => {
                    console.log(err);
                })
            },
        }
    }
</script>

<style>
    .v-app-bar {
        z-index: 1;
        box-shadow: 0 0 0.2em #000000 !important;
        -moz-box-shadow: 0 0 0.2em #000000 !important;
        -webkit-box-shadow: 0 0 0.2em #000000 !important;
    }

    .wiki-app-bar-body {
        display: flex;
        padding: 0;
        width: 100%;
        height: auto;
    }

    .wiki-app-bar-container {
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
    }

    .wiki-app-bar {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .wiki-app-bar-col {
        margin: 0;
    }

    .wiki-app-bar-logo {
        width: 150px !important;
    }

    @media only screen and (max-width: 992px) {
        .v-app-bar {
            height: 55px !important;
        }

        .wiki-app-bar {
            flex-direction: column;
        }

        .wiki-app-bar-logo {
            width: 125px !important;
        }
    }
</style>