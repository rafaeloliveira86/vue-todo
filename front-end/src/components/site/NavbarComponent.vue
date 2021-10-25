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
                            <a href="/unisaojose">
                                <v-img :src="require(`../../assets/image/${item.logo_navbar}`)" contain position="left" content-class="wiki-app-bar-logo" />
                            </a>
                        </div>
                        <div class="wiki-app-bar-col">
                            <v-spacer></v-spacer>
                            <v-btn icon :to="`/${item.slug}`">
                                <v-icon>mdi-home</v-icon>
                            </v-btn>
                            <v-menu left bottom>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn icon v-bind="attrs" v-on="on">
                                        <v-icon>mdi-dots-vertical</v-icon>
                                    </v-btn>
                                </template>
                                <v-list>
                                    <v-list-item v-for="(item, index) in arrayUnits" :key="index" v-model="unit" @click="selectUnit(item.slug)">
                                        <v-list-item-title v-text="item.unit_name"></v-list-item-title>
                                    </v-list-item>
                                </v-list>
                            </v-menu>
                        </div>
                    </div>
                </div>
            </div>
        </v-app-bar>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url_api = 'http://localhost/wiki/api/v1';

    export default {
        name: "NavbarComponent",
        data: () => ({
            arrayUnits: [],
            arrayUnit: [],
            unit: null,
        }),
        created() {
            this.getUnitsAll();
            this.getUnitBySlug();
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
            async getUnitBySlug () {
                let unit_slug = this.$route.params.unit_slug;

                await axios.get(base_url_api + '/unidade/' + unit_slug)
                .then(res => {
                    this.arrayUnit = [...res.data.data];
                })
                .catch(err => {
                    console.log(err);
                })
            },
            selectUnit(data) {
                window.location.href = data;
            }
        }
    }
</script>

<style>
    .v-app-bar {
        z-index: 1;
        box-shadow: 0 0 0.2em #000000 !important;
        -moz-box-shadow: 0 0 0.2em #000000 !important;
        -webkit-box-shadow: 0 0 0.2em #000000 !important;
        height: auto !important;
        padding: 5px 0 !important;
    }

    .v-toolbar__content, .v-toolbar__extension {
        padding: 4px 0 !important;
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
        justify-content: space-between;
    }

    .wiki-app-bar-col {
        margin: 0;
    }

    .wiki-app-bar-logo {
        width: 150px !important;
    }

    @media only screen and (max-width: 992px) {
        .wiki-app-bar-col {
            margin: 0 15px;
        }

        .wiki-app-bar-logo {
            width: 125px !important;
        }
    }
</style>