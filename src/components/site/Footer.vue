<template>
    <div>
        <div v-for="(item, index) in arrayUnit" :key="index">
            <v-container fluid class="white">
                <v-row>
                    <v-container>
                        <v-row>
                            <v-col cols="12" md="8" offset-md="2">
                                <v-row>
                                    <footer class="footer footer-content">
                                        <div class="footer-item">
                                            <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                                                <v-img :src="require(`../../assets/image/${item.logo_footer}`)" contain position="left" height="45" />
                                            </a>
                                        </div>
                                        <div class="footer-item">
                                            <span>Departamento de Tecnologia da Informação</span>
                                        </div>
                                    </footer>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-row>
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
    const base_url_api = 'http://localhost/api/v1';

    export default {
        name: "Footer",
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
                let id_unit = atob(localStorage.getItem("unit")); //btoa (Base 64 encode) - atob (Base 64 decode)

                await axios.get(base_url_api + '/unit/' + id_unit)
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
    .footer {
        display: flex;
        flex: 1;
        padding: 30px 0;
    }

    .footer-content {
        justify-content: space-between;
        align-items: center;
    }

    .footer-item {
        margin: 0;
        padding: 0 10px;
    }

    .footer-item span {
        font-size: 15px;
        color: #595959;
    }

    .v-footer {
        font-size: 15px;
    }

    @media only screen and (max-width: 992px) {
        .footer-content {
            flex-direction: column;
        }

        .footer-item {
            padding: 0;
            margin: 10px 0;
            text-align: center;
        }

        .footer-item span {
            font-size: 13px;
        }

        .v-footer {
            font-size: 13px;
        }
    }
</style>