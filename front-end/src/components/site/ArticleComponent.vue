<template>
    <div>
        <h3 class="underline mb-5 wiki-article-title">Artigos</h3>

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

            <section v-if="loading">
                <div class="wiki-article">
                    <div class="wiki-article-col">
                        <v-sheet :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="pa-3">
                            <v-skeleton-loader class="mx-auto" max-width="100%" type="image"></v-skeleton-loader>
                        </v-sheet>
                    </div>
                </div>
            </section>

            <section v-else>
                <div class="wiki-article">
                    <div class="wiki-article-col">
                        <div v-for="(article, index) in arrayArticles" :key="index">
                            <v-alert
                            border="left"
                            colored-border
                            color="blue"
                            elevation="2"
                            >
                            <h2>{{ article.article_name }}</h2>
                            </v-alert>
                        </div>
                    </div>
                    <div class="wiki-article-col">
                        <div v-for="(article, index) in arrayArticles" :key="index">
                            {{ article.text }}
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url_api = 'http://localhost/wiki/api/v1';

    export default {
        name: "ArticleComponent",
        data: () => ({
            loading: true,
            error: false,
            arrayArticles: []
        }),
        mounted() {
            
        },
        created() {
            this.getArticleByID();
        },
        methods: {
            async getArticleByID() {
                let id_article = atob(localStorage.getItem("article")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/artigo/' + id_article)
                .then(res => {
                    this.arrayArticles = [...res.data.data];
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
            }
        }
    }
</script>

<style>
    .wiki-article-title {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: normal;
        color: #222222;
    }

    .wiki-article {
        display: flex;
        flex-direction: column;
    }

    .wiki-article .wiki-article-col {
        flex: 1;
        margin-bottom: 20px;        
    }

    .v-alert h2 {
        font-size: 23px;
        font-weight: normal;
        color: #595959;
    }

    @media only screen and (max-width: 992px) {
        .wiki-article {
            flex-direction: column;
        }

        .wiki-article .wiki-article-col {
            margin-right: 0;
        }
    }
</style>