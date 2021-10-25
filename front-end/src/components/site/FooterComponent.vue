<template>
    <div>
        <div v-for="(item, index) in arrayUnit" :key="index">
            <v-container fluid class="white">
                <div class="wiki-container">
                    <footer class="wiki-foot">
                        <div class="wiki-foot-col">
                            <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                                <v-img :src="require(`../../assets/image/${item.logo_footer}`)" position="left" content-class="logo" />
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
                    &COPY; Todos os direitos reservados - {{ item.unit_name }} - {{ new Date().getFullYear() }}
                </v-col>
            </v-footer>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url = 'http://localhost:8080';
    const base_url_api = 'http://localhost/wiki/api/v1';

    export default {
        name: "FooterComponent",
        data: () => ({
            arrayUnit: [],
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
                let unit_slug = this.$route.params.unit_slug;

                await axios.get(base_url_api + '/unidade/' + unit_slug)
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