<template>
    <div>
        <h3 class="underline mb-5 wiki-subcat-title">Subcategorias</h3>
        <p>{{ teste }} &raquo;</p>
        <div class="wiki-subcat">
            <div class="wiki-subcat-col" v-for="(item, index) in arraySubcategories" :key="index">
                <v-hover>
                    <template v-slot:default="{ hover }">
                        <router-link :to="`${$route.path}/artigos`" class="text-decoration-none">
                            <v-card :elevation="hover ? 6 : 3" class="mx-auto pa-5" tile>
                                <v-icon left size="30" color="#555555">mdi-view-quilt</v-icon> {{ item.subcategorie_name }}
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
        name: "SubcategorieComponent",
        data: () => ({
            arraySubcategories: [],
            teste: null
        }),
        mounted() {
            console.log(this.$route.params.slug);
            this.teste = this.$route.path;
        },
        created() {
            this.getSubcategoriesByCategorieAndUnitID();
        },
        methods: {
            async getSubcategoriesByCategorieAndUnitID() {
                let id_unit = atob(localStorage.getItem("unit")); //btoa (Base 64 encode) - atob (Base 64 decode)
                let id_categorie = atob(localStorage.getItem("categorie")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/subcategorie/categorie/' + id_categorie + '/unit/' + id_unit)
                .then(res => {
                    this.arraySubcategories = [...res.data.data];
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