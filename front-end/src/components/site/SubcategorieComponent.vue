<template>
    <div>
        <h3 class="underline mb-5 wiki-subcat-title">Subcategorias</h3>

        <div class="wiki-subcat">
            <div class="wiki-subcat-col" v-for="(item, index) in arraySubcategories" :key="index">
                <v-hover>
                    <template v-slot:default="{ hover }">
                        <router-link :to="`/unisaojose/subcategorie/${item.id}`" class="text-decoration-none">
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
    export default {
        name: "SubcategorieComponent",
        data: () => ({
            arraySubcategories: [
                { id: 1, subcategorie_name: 'Relatórios' },
                { id: 2, subcategorie_name: 'Boletos' },
                { id: 3, subcategorie_name: 'Portal do Aluno' },
                { id: 4, subcategorie_name: 'Estágios' },
                { id: 5, subcategorie_name: 'Leads' },
                { id: 6, subcategorie_name: 'Financeiro' },
                { id: 7, subcategorie_name: 'MLS EAD' },
                { id: 8, subcategorie_name: 'Visualizar Notas' },
                { id: 9, subcategorie_name: 'Requerimentos' },
                { id: 10, subcategorie_name: 'Bolsas' }
            ]
        })
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