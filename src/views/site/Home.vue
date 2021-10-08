<template>
    <div class="wiki-body">
        <Navbar />
        
        <div class="wiki-splash">
            <v-container>
                <v-row no-gutters>
                    <v-col cols="12" md="8" offset-md="2">
                        <h4 class="underline-white">Wiki</h4>
                    </v-col>
                </v-row>
            </v-container>
            <v-img :src="require('../../assets/image/image_callcenter.png')" contain position="right" class="image" />
        </div>

        <div class="wiki-container">
            <div class="wiki-content mt-10 mb-10">
                <v-text-field label="Pesquisar" filled rounded prepend-inner-icon="mdi-magnify" background-color="#ffffff"></v-text-field>
                <div class="grid grid-content">
                    <div class="grid-item">
                        <Categories />
                    </div>
                    <div class="grid-item">
                        <Sidebar />
                    </div>
                </div>
            </div>
        </div>

        <Footer />
    </div>
</template>

<script>
    import Navbar from '../../components/site/Navbar.vue';
    import Categories from '../../components/site/Categories.vue';
    import Sidebar from '../../components/site/Sidebar.vue';
    import Footer from '../../components/site/Footer.vue';

    export default ({
        name: "Home",
        components: {
            Navbar,
            Categories,
            Sidebar,
            Footer
        }
    })
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap');

    .wiki-body {
        width: 100%;
        height: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        background: #f0f2f5 !important;
    }

    .wiki-splash {
        display: flex;
        position: relative;
        padding: 0 20px;
        width: 100%;
        height: 300px;
        background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);
        /* background-image: linear-gradient(to right, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df); */
    }

    .wiki-splash h4 {
        margin: 55px 0;
        font-size: 50px;
        font-weight: 900;
        color: #ffffff;
    }

    .wiki-splash .image {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        opacity: 0.8;
    }

    .wiki-container {
        position: relative;
        z-index: 1;
        display: flex;
        display: -webkit-flex;
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        box-shadow: 0 -10px 5px -10px #595959;
        -moz-box-shadow: 0 -10px 5px -10px #595959;
        -webkit-box-shadow: 0 -10px 5px -10px #595959;
    }

    .wiki-content {
        flex-wrap: wrap;
        flex-direction: column;
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
    }
    
    /* Grid */
    .grid {
        display: flex;
        width: 100%;
        height: auto;
    }

    .grid-content {
        justify-content: space-between;
    }

    .grid-item {
        padding: 0;
    }

    .grid-item:first-child {
        width: 76.7%;
        margin-right: 20px;
    }

    .grid-item:last-child {
        width: 23.3%;
    }

    @media only screen and (max-width: 1750px) {
        .grid-content {
            flex-direction: column;
        }

        .grid-item:first-child {
            width: 100%;
            margin-right: 0;
        }

        .grid-item:last-child {
            width: 100%;
        }
    }

    /* Underline */
    .underline {
        margin: 0 0 15px 0;
        border-bottom: 1px solid #555555;
        padding-bottom: 15px;
        position: relative;
    }

    .underline:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #555555;
        width: 25%;
        height: 3px;
    }

    .underline-white {
        margin: 0 0 15px 0;
        border-bottom: 1px solid #ffffff;
        padding-bottom: 15px;
        position: relative;
    }

    .underline-white:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #ffffff;
        width: 25%;
        height: 3px;
    }

    @media only screen and (max-width: 992px) {
        .wiki-splash-content .image {
            opacity: unset;
        }

        .wiki-container {
            width: 100%;
            padding: 0 15px;
        }
    }
</style>