<template>
    <div>
        <h3 class="underline mb-5 wiki-subcat-title">Subcategorias</h3>

        <section v-if="error">
            <v-alert text prominent icon="mdi-alert-circle" outlined type="error" v-if="(status_error != null) && (message_error != null)">
                <v-row align="center" no-gutters>
                    <v-col class="grow">
                        {{ 'Erro ' + status_error + ' - ' + message_error }}
                    </v-col>
                    <v-col class="shrink">
                        <v-btn rounded color="error"><v-icon>mdi-arrow-left</v-icon></v-btn>
                    </v-col>
                </v-row>
            </v-alert>
        </section>

        <section v-else>
            <!-- <div v-if="loading">Carregando...</div> -->

            <div v-if="loading">
                <div class="wiki-subcat">
                    <div class="wiki-subcat-col">
                        <v-sheet :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="pa-3">
                            <v-skeleton-loader class="mx-auto" max-width="100%" type="image"></v-skeleton-loader>
                        </v-sheet>
                    </div>
                </div>
            </div>

            <div class="wiki-subcat" v-else>
                <div class="wiki-subcat-col">
                    <v-expansion-panels accordion tile>
                        <v-expansion-panel v-for="(subcategorie, index) in arraySubcategories" :key="index" @click="selectSubcategorie(subcategorie.id_subcategorie)">
                            <v-expansion-panel-header>
                                <template v-slot:actions>
                                    <v-icon size="30" color="#999999">mdi-forum</v-icon>
                                </template>
                                <strong>{{ subcategorie.subcategorie_name }}</strong>
                            </v-expansion-panel-header>

                            <v-expansion-panel-content>
                                <v-divider></v-divider>
                                <br>
                                <div v-for="(articles, index) in arrayArticles" :key="index">
                                    <router-link :to="`${$route.path}/artigos`" class="text-decoration-none">
                                        {{ articles.article_name }}
                                    </router-link>
                                </div>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </v-expansion-panels>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url_api = 'http://localhost/wiki/api/v1';

    export default {
        name: "SubcategorieComponent",
        inject: {
            theme: {
                default: { isDark: false },
            },
        },
        data: () => ({
            loading: true,
            error: false,
            status_error: null,
            message_error: null,
            arraySubcategories: [],
            arrayArticles: []
        }),
        mounted() {
            console.log(this.$route.params.slug);
        },
        created() {
            this.getSubcategoriesByCategorieAndUnitID();
            this.getArticleBySubategorieID();
        },
        methods: {
            async getSubcategoriesByCategorieAndUnitID() {
                let id_unit = atob(localStorage.getItem("unit")); //btoa (Base 64 encode) - atob (Base 64 decode)
                let id_categorie = atob(localStorage.getItem("categorie")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/subcategoria/categoria/' + id_categorie + '/unidade/' + id_unit)
                .then(res => {
                    this.arraySubcategories = [...res.data.data];
                })
                .catch(err => {
                    this.error = true;

                    if (err.response) { //Solicitação feita e resposta do servidor                        
                        console.log(err.response.data);
                        console.log(err.response.status);
                        console.log(err.response.headers);

                        this.status_error = err.response.data.error;
                        this.message_error = err.response.data.messages.error;
                    } else if (err.request) { //A solicitação foi feita, mas nenhuma resposta foi recebida                        
                        console.log(err.request);
                    } else { //Algo aconteceu na configuração da solicitação que acionou um erro                        
                        console.log('Error', err.message);
                    }
                })
                .finally(() => this.loading = false)
            },
            async getArticleBySubategorieID() {
                let id_subcategorie = atob(localStorage.getItem("subcategorie")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/artigo/subcategoria/' + id_subcategorie)
                .then(res => {
                    this.arrayArticles = [...res.data.data];
                    console.log(this.arrayArticles);
                })
                .catch(err => {
                    this.error = true;

                    if (err.response) { //Solicitação feita e resposta do servidor                        
                        console.log(err.response.data);
                        console.log(err.response.status);
                        console.log(err.response.headers);

                        this.status_error = err.response.data.error;
                        this.message_error = err.response.data.messages.error;
                    } else if (err.request) { //A solicitação foi feita, mas nenhuma resposta foi recebida                        
                        console.log(err.request);
                    } else { //Algo aconteceu na configuração da solicitação que acionou um erro                        
                        console.log('Error', err.message);
                    }
                })
                .finally(() => this.loading = false)
            },
            selectSubcategorie(data) {
                //console.log(data);
                this.setItemLocalStorage(data);
            },
            setItemLocalStorage(data) {
                localStorage.setItem("subcategorie", btoa(data)); //btoa (Base 64 encode) - atob (Base 64 decode)
            }
        }
    }
</script>

<style>
    .wiki-error {
        color: #b20000 !important;
    }

    .wiki-subcat-title {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: normal;
        color: #222222;
    }

    .wiki-subcat {
        display: flex;
        flex-direction: column;
    }

    .wiki-subcat .wiki-subcat-col {
        flex: 1;
        margin-bottom: 20px;        
    }

    .wiki-subcat .wiki-subcat-col .v-card {
        font-size: 13px;
        text-decoration: none;
        color: #333333;
    }

    .wiki-subcat .wiki-subcat-col .v-card:hover {
        color: #01579B;      
    }

    @media only screen and (max-width: 992px) {
        .wiki-subcat {
            flex-direction: column;
        }

        .wiki-subcat .wiki-subcat-col {
            margin-right: 0;
        }
    }
</style>