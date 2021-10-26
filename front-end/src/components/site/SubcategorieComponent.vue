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

            <div v-else>
                <div class="wiki-subcat">
                    <div class="wiki-subcat-col">
                        <v-expansion-panels accordion tile mandatory>
                            <v-expansion-panel v-for="(subcategorie, index) in arraySubcategories" :key="index" @click="selectSubcategorie(subcategorie.id_subcategorie)">
                                <v-expansion-panel-header>
                                    <template v-slot:actions>
                                        <v-icon size="30" color="#999999">mdi-forum</v-icon>
                                    </template>
                                    <strong>{{ subcategorie.subcategorie_name }}</strong>
                                </v-expansion-panel-header>

                                <v-expansion-panel-content v-show="showArticles">
                                    <section v-if="article_error">
                                        <v-divider></v-divider>
                                        <br>
                                        <v-alert text prominent icon="mdi-alert-circle" outlined type="error" v-if="(article_status_error != null) && (article_message_error != null)">
                                            <v-row align="center" no-gutters>
                                                <v-col class="grow">
                                                    {{ article_message_error }}
                                                </v-col>
                                            </v-row>
                                        </v-alert>
                                    </section>
                                    <section v-else>
                                        <div v-if="article_loading">Carregando...</div>
                                        <div v-else>
                                            <v-divider></v-divider>
                                            <br>
                                            <div v-for="(article, index) in arrayArticles" :key="index">
                                                <div class="wiki-sub-link">
                                                    <router-link :to="`${$route.path + '/' + article.subcategorie_slug + '/' + article.slug}`" class="text-decoration-none">
                                                        <v-btn text color="primary">
                                                            {{ article.article_name }}
                                                        </v-btn>
                                                    </router-link>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </v-expansion-panel-content>
                            </v-expansion-panel>
                        </v-expansion-panels>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import api from "../../api";

    export default {
        name: "SubcategorieComponent",
        inject: {
            theme: {
                default: { isDark: false },
            },
        },
        data: () => ({
            loading: true,
            article_loading: true,
            error: false,
            status_error: null,
            message_error: null,
            article_error: false,
            article_status_error: null,
            article_message_error: null,
            arraySubcategories: [],
            arrayArticles: [],
            showArticles: false
        }),
        mounted() {
            console.log(this.$route.params.unit_slug + '/' + this.$route.params.categorie_slug);
        },
        created() {
            this.getSubcategoriesByCategorieAndUnitSlug();
        },
        methods: {
            async getSubcategoriesByCategorieAndUnitSlug() {
                let unit_slug = this.$route.params.unit_slug;
                let categorie_slug = this.$route.params.categorie_slug;

                await api.get('/subcategoria/categoria/' + categorie_slug + '/unidade/' + unit_slug)
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
            async getArticleBySubategorieID(id_subcategorie) {
                await api.get('/artigo/subcategoria/' + id_subcategorie)
                .then(res => {
                    this.arrayArticles = [...res.data.data];
                    this.article_error = false;
                })
                .catch(err => {
                    this.article_error = true;

                    if (err.response) { //Solicitação feita e resposta do servidor                        
                        console.log(err.response.data);
                        console.log(err.response.status);
                        console.log(err.response.headers);

                        this.article_status_error = err.response.data.error;
                        this.article_message_error = err.response.data.messages.error;
                    } else if (err.request) { //A solicitação foi feita, mas nenhuma resposta foi recebida                        
                        console.log(err.request);
                    } else { //Algo aconteceu na configuração da solicitação que acionou um erro                        
                        console.log('Error', err.message);
                    }
                })
                .finally(() => this.article_loading = false)
            },
            selectSubcategorie(id_subcategorie) {
                this.article_loading = true;

                this.showArticles = true;

                this.getArticleBySubategorieID(id_subcategorie);
            }
        }
    }
</script>

<style>
    .wiki-error {
        color: #b20000 !important;
    }

    .wiki-sub-link {
        font-size: 15px;
        margin-bottom: 5px;
    }

    .wiki-sub-link a:hover {
        color: #595959;
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

    .v-btn {
        font-weight: normal;
        text-transform: none;
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