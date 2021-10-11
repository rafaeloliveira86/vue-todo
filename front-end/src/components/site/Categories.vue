<template>
    <div>
        <h3 class="underline mb-5 wiki-cat-title">Categorias</h3>
        
        <div class="wiki-cat">
            <div class="wiki-cat-col" v-for="(item, index) in arrayCategories" :key="index">
                <v-hover>
                    <template v-slot:default="{ hover }">
                        <router-link :to="{ name: 'home' }" class="text-decoration-none">
                            <v-card :elevation="hover ? 6 : 3" class="mx-auto pa-5" tile>
                                <v-icon left size="30" color="#555555">mdi-view-quilt</v-icon> {{ item.categorie_name }}
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
        name: "Categories",
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
        font-size: 15px;       
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