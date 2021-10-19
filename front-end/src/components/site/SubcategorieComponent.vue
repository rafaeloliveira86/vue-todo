<template>
    <div>
        <h3 class="underline mb-5 wiki-subcat-title">Subcategorias</h3>

        <div class="wiki-subcat">
            <div class="wiki-subcat-col">
                <v-expansion-panels accordion tile>
                    <v-expansion-panel v-for="(item, index) in arraySubcategories" :key="index">
                        <v-expansion-panel-header>
                            <template v-slot:actions>
                                <v-icon size="30" color="#999999">mdi-forum</v-icon>
                            </template>
                            <strong>{{ item.subcategorie_name }}</strong>
                        </v-expansion-panel-header>

                        <v-expansion-panel-content>
                            <v-divider></v-divider>
                            <br>
                            <router-link :to="`${$route.path}/artigos`" class="text-decoration-none">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </router-link>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
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
            arraySubcategories: []
        }),
        mounted() {
            console.log(this.$route.params.slug);
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