<template>
    <div>
        <v-app-bar v-for="(unit, index) in unitSlug" :key="index" :color="unit.class" dark>
            <!-- <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
            </template> -->
            <div class="wiki-app-bar-body">
                <div class="wiki-app-bar-container">
                    <div class="wiki-app-bar">
                        <div class="wiki-app-bar-col">
                            <a href="/unisaojose">
                                <v-img :src="require(`../../assets/image/${unit.logo_navbar}`)" contain position="left" content-class="wiki-app-bar-logo" />
                            </a>
                        </div>
                        <div class="wiki-app-bar-col">
                            <v-spacer></v-spacer>
                            <v-btn icon :to="`/${unit.slug}`">
                                <v-icon>mdi-home</v-icon>
                            </v-btn>
                            <v-menu left bottom>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn icon v-bind="attrs" v-on="on">
                                        <v-icon>mdi-dots-vertical</v-icon>
                                    </v-btn>
                                </template>
                                <v-list>
                                    <v-list-item v-for="(units, index) in unitsAll" :key="index" @click="selectUnit(units.slug)">
                                        <v-list-item-title v-text="units.unit_name"></v-list-item-title>
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
    //import api from "../../api";

    export default {
        name: "NavbarComponent",
        data: () => ({
            
        }),
        computed: {
            unitsAll() {
                return this.$store.state.unitsAll
            },
            unitSlug() {
                return this.$store.state.unitSlug
            }
        },
        mounted() {
            this.$store.dispatch("getUnitsAll");
            this.$store.dispatch("getUnitBySlug", { unit_slug: this.$route.params.unit_slug });
        },
        created() {
            
        },
        methods: {
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