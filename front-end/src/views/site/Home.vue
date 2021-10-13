<template>
    <div class="wiki-body">
        <LoaderComponent />
        <Navbar />

        <div class="wiki-col">
            <Splash />
        </div>
        <div class="wiki-col">
            <v-container fluid>
                <div class="wiki-container pt-7">
                    <v-text-field label="Pesquisar" filled solo rounded prepend-inner-icon="mdi-magnify" class="wiki-search" background-color="#f0f2f5"></v-text-field>
                </div>
            </v-container>
            <div class="wiki-container mt-8 mb-8">
                <div class="wiki-box">
                    <div class="wiki-box-col">
                        <router-view></router-view>
                        <Categories />
                    </div>
                    <div class="wiki-box-col">
                        <Sidebar />
                    </div>
                </div>
            </div>
            
            <Footer />
        </div>
    </div>
</template>

<script>
    import LoaderComponent from '../../components/LoaderComponent.vue';
    import Navbar from '../../components/site/Navbar.vue';
    import Splash from '../../components/site/Splash.vue';
    import Categories from '../../components/site/Categories.vue';
    import Sidebar from '../../components/site/Sidebar.vue';
    import Footer from '../../components/site/Footer.vue';

    export default ({
        name: "Home",
        components: {
            LoaderComponent,
            Navbar,
            Splash,
            Categories,
            Sidebar,
            Footer
        }
    })
</script>

<style>
    /* Body */
    .wiki-body {
        display: flex;
        display: -webkit-flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
        background: #f0f2f5;
    }

    /* Cols */
    .wiki-col {
        width: 100%;
        height: auto;
    }

    .wiki-col:first-child {
        z-index: 0;
    }

    .wiki-col:last-child {
        z-index: 1;
        box-shadow: 0 -10px 5px -10px #595959;
        -moz-box-shadow: 0 -10px 5px -10px #595959;
        -webkit-box-shadow: 0 -10px 5px -10px #595959;
    }

    /* Container */
    .wiki-container {
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
    }

    .container--fluid {
        border-top: 1px solid #ebebeb;
        border-bottom: 1px solid #ebebeb;
    }

    /* Box */
    .wiki-box {
        display: flex;
        display: -webkit-flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        height: auto;
    }

    .wiki-box-col {
        width: 100%;
        height: 100%;
    }

    .wiki-box-col:first-child {
        width: 76.7%;
        margin-right: 20px;
        background: transparent;
    }

    .wiki-box-col:last-child {
        width: 23.3%;
        background: transparent;
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

    @media only screen and (max-width: 1750px) {
        .wiki-box {
            flex-direction: column;
        }

        .wiki-box-col:first-child {
            width: 100%;
            margin-right: 0;
        }

        .wiki-box-col:last-child {
            width: 100%;
        }
    }

    @media only screen and (max-width: 992px) {
        .wiki-container {
            width: 100%;
            padding: 0 15px;
        }
    }
</style>