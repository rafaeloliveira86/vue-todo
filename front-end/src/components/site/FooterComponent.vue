<template>
    <div>
        <div v-for="(unit, index) in objUnit" :key="index">
            <v-container fluid class="white">
                <div class="wiki-container">
                    <footer class="wiki-foot">
                        <div class="wiki-foot-col">
                            <a :href="objUnitData.base_url">
                                <v-img :src="require(`../../assets/image/${unit.logo_footer}`)" position="left" content-class="logo" />
                            </a>
                        </div>
                        <div class="wiki-foot-col">
                            <span>Departamento de Tecnologia da Informação</span>
                        </div>
                    </footer>
                </div>
            </v-container>
            <v-footer dark tile elevation="24">
                <v-col class="text-center" cols="12">
                    &COPY; Todos os direitos reservados - {{ unit.unit_name }} - {{ new Date().getFullYear() }}
                </v-col>
            </v-footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FooterComponent",
        data: () => ({
            
        }),
        computed: {
            objUnit() {
                return this.$store.state.unitSlug
            },
            objUnitData() {
                return this.selectUnitData();
            }
        },
        mounted() {
            this.$store.dispatch("getUnitBySlug", { unit_slug: this.$route.params.unit_slug });
        },
        methods: {
            selectUnitData() {
                this.$store.commit('getUnitData', { key: 'unit', base_url: process.env.VUE_APP_BASE_URL });
                return this.$store.state.localStorage;
            }
        }
    }
</script>

<style>
    .logo {
        width: 150px !important;
        height: auto;
    }

    .wiki-foot {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 30px 0;
    }

    .wiki-foot-col {
        margin: 0;
    }

    .wiki-foot-col span {
        font-size: 15px;
        color: #595959;
    }

    .v-footer {
        font-size: 15px;
    }

    @media only screen and (max-width: 992px) {
        .wiki-foot {
            flex-direction: column;
        }

        .wiki-foot-col {
            padding: 0;
            margin: 10px 0;
            text-align: center;
        }

        .wiki-foot-col span {
            font-size: 13px;
        }

        .v-footer {
            font-size: 13px;
        }
    }
</style>