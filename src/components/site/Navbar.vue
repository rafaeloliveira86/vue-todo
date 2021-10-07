<template>
    <div>
        <v-app-bar v-for="(item, i) in arrayUnit" :key="i" :color="item.class" dark height="65">
            <!-- <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
            </template> -->
            <v-container>
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                            <v-img :src="require(`../../assets/image/${item.logo_navbar}`)" contain position="left" height="45" />
                        </a>
                        <!-- <v-spacer></v-spacer>
                        <v-btn icon>
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn> -->
                    </v-col>
                </v-row>
            </v-container>
        </v-app-bar>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url = 'http://localhost:8080';
    const base_url_api = 'http://localhost/api/v1';

    export default {
        name: "Navbar",
        data: () => ({
            arrayUnit: [],
            //unit: null,
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

</style>