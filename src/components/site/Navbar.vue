<template>
    <div>
        <v-app-bar color="indigo darken-3" dark height="65">
            <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
            </template>
            <v-container>
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <a v-for="(link, i) in wikiLinks" :key="i" :href="link.href">
                            <v-img :src="require('../../assets/image/logo_usj_white.png')" contain position="left" height="45" />
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
    const base_url = 'http://localhost:8080';

    export default {
        name: "Navbar",
        data: () => ({
            wikiLinks: [
                {
                    text: 'Página Inicial',
                    href: base_url + '/unisaojose',
                }
            ]
        })
    }
</script>

<style>

</style>