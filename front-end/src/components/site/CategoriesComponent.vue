<template>
    <div>
        <h3 class="underline mb-5 wiki-cat-title">Categorias</h3>

        <div class="wiki-cat">
            <div class="wiki-cat-col" v-for="(categorie, index) in arrayCategories" :key="index">
                <v-hover>
                    <template v-slot:default="{ hover }">
                        <!-- <router-link :to="`${$route.path}/subcategorias`" class="text-decoration-none">
                            <v-card :elevation="hover ? 6 : 3" class="mx-auto pa-5" tile @click="selectCategorie(categorie.id)">
                                <v-icon left size="30" color="#555555">mdi-view-quilt</v-icon> {{ categorie.categorie_name }}
                            </v-card>
                        </router-link> -->
                        <router-link :to="`${$route.path}/subcategorias/${categorie.slug}`" class="text-decoration-none">
                            <v-card :elevation="hover ? 6 : 3" class="mx-auto pa-5" tile @click="selectCategorie(categorie.id)">
                                <v-icon left size="30" color="#555555">mdi-view-quilt</v-icon> {{ categorie.categorie_name }}
                            </v-card>
                        </router-link>
                    </template>
                </v-hover>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url_api = 'http://localhost/api/v1';

    export default {
        name: "CategoriesComponent",
        data: () => ({
            arrayCategories: []
        }),
        created() {
            this.getCategoriesByUnitID();
        },
        methods: {
            async getCategoriesByUnitID() {
                let id_unit = atob(localStorage.getItem("unit")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/categorie/unit/' + id_unit)
                .then(res => {
                    this.arrayCategories = [...res.data.data];
                })
                .catch(err => {
                    console.log(err);
                })
            },
            selectCategorie(data) {
                this.setItemLocalStorage(data);
            },
            setItemLocalStorage(data) {
                localStorage.setItem("categorie", btoa(data)); //btoa (Base 64 encode) - atob (Base 64 decode)
            }
        }
    }
</script>

<style>
    .wiki-cat-title {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: normal;
        color: #222222;
    }

    .wiki-cat {
        display: flex;
        flex-wrap: wrap;
    }

    .wiki-cat .wiki-cat-col {
        flex: 1 0 25%;
        margin: 0 20px 20px 0;        
    }

    .wiki-cat .wiki-cat-col .v-card {
        font-size: 13px;
        text-decoration: none;
        color: #333333;
    }

    .wiki-cat .wiki-cat-col .v-card:hover {
        color: #01579B;      
    }

    @media only screen and (max-width: 992px) {
        .wiki-cat {
            flex-direction: column;
        }

        .wiki-cat .wiki-cat-col {
            margin-right: 0;
        }
    }
</style>