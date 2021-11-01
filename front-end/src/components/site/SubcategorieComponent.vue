<template>
    <div>
        <h3 class="underline mb-5 wiki-subcat-title">Subcategorias</h3>

        <section v-if="error">
            <v-alert text prominent icon="mdi-alert-circle" outlined type="error" v-if="objSubcategories.error">
                <v-row align="center" no-gutters>
                    <v-col class="grow">
                        {{ 'Erro ' + objSubcategories.error }}
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
                            <v-expansion-panel v-for="(subcategorie, index) in objSubcategories" :key="index" @click="selectSubcategorie(subcategorie.id_subcategorie)">
                                <v-expansion-panel-header>
                                    <template v-slot:actions>
                                        <v-icon size="30" color="#999999">mdi-forum</v-icon>
                                    </template>
                                    <strong>{{ subcategorie.subcategorie_name }}</strong>
                                </v-expansion-panel-header>

                                <v-expansion-panel-content v-show="showArticles">
                                    <!-- <section v-if="article_error">
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
                                            <div v-for="(article, index) in objArticle" :key="index">
                                                <div class="wiki-sub-link">
                                                    <router-link :to="`${$route.path + '/' + article.subcategorie_slug + '/' + article.slug}`" class="text-decoration-none">
                                                        {{ article.article_name }}                                                        
                                                    </router-link>
                                                </div>
                                            </div>
                                        </div>
                                    </section> -->
                                    <section>
                                        <div v-if="article_loading">Carregando...</div>
                                        <div v-else>
                                            <v-divider></v-divider>
                                            <br>
                                            <div v-for="(article, index) in objArticle" :key="index">
                                                <div class="wiki-sub-link">                                                
                                                    <div v-if="article_error == false">
                                                        <router-link :to="`${$route.path + '/' + article.subcategorie_slug + '/' + article.slug}`" class="text-decoration-none">
                                                            {{ article.article_name }}                                                        
                                                        </router-link>
                                                    </div>
                                                    <div v-else>
                                                        <v-alert text prominent icon="mdi-alert-circle" outlined type="error">
                                                            <v-row align="center" no-gutters>
                                                                <v-col class="grow">
                                                                    {{ article.error }}
                                                                </v-col>
                                                            </v-row>
                                                        </v-alert>
                                                    </div>
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
    export default {
        name: "SubcategorieComponent",
        inject: {
            theme: {
                default: { isDark: false },
            },
        },
        data: () => ({
            error: false,
            article_error: false,
            showArticles: false
        }),
        computed: {
            loading() {
                return this.$store.state.loading
            },
            article_loading() {
                return this.$store.state.article_loading
            },
            objSubcategories() {
                return this.$store.state.subcategorieSlug
            },
            objArticle() {
                return this.$store.state.article
            }
        },
        created() {
            console.log(this.$store.state.article)
        },
        mounted() {
            this.$store.dispatch("getSubcategoriesByCategorieAndUnitSlug", { 
                loading: true,
                error: this.error,
                status_error: null,
                message_error: null,
                unit_slug: this.$route.params.unit_slug,
                categorie_slug: this.$route.params.categorie_slug
            })
            .then((res) => {
                console.log(res)
            })
            .catch((err) => {
                alert(err)
            });
        },
        methods: {
            selectSubcategorie(id_subcategorie) {
                this.showArticles = true;

                this.$store.dispatch('getArticleBySubategorieID', { 
                    article_loading: this.article_loading, 
                    article_status_error: null,
                    article_message_error: null,
                    id_subcategorie: id_subcategorie 
                });
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
        margin-bottom: 10px;
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