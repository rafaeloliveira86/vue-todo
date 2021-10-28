<template>
    <div class="wiki-body">
        <!-- <LoaderComponent /> -->

        <section v-if="loading">
            <div id="wiki-loader-wrapper">
                <div id="wiki-loader"></div>
                <div :class="`wiki-loader-section ${loadClass}`"></div>
            </div>
        </section>

        <section>
            <NavbarComponent />

            <div class="wiki-col">
                <SplashComponent />
            </div>
            <div class="wiki-col">
                <v-container fluid class="white">
                    <div class="wiki-container pt-7">
                        <v-text-field label="Pesquisar" filled solo rounded prepend-inner-icon="mdi-magnify" class="wiki-search" background-color="#f0f2f5"></v-text-field>
                    </div>
                </v-container>

                <BreadcrumbComponent />

                <div class="wiki-container mt-6 mb-6">
                    <div class="wiki-box">
                        <div class="wiki-box-col">
                            <router-view></router-view>
                        </div>
                        <div class="wiki-box-col">
                            <SidebarComponent />
                        </div>
                    </div>
                </div>
                
                <FooterComponent />
            </div>
        </section>
    </div>
</template>

<script>
    //import LoaderComponent from '../../components/LoaderComponent.vue';
    import NavbarComponent from '../../components/site/NavbarComponent.vue';
    import SplashComponent from '../../components/site/SplashComponent.vue';
    import BreadcrumbComponent from '../../components/site/BreadcrumbComponent.vue';
    import SidebarComponent from '../../components/site/SidebarComponent.vue';
    import FooterComponent from '../../components/site/FooterComponent.vue';

    export default ({
        name: "Home",
        data: () => ({
            loading: true,
            //unitSlug: [],
            class: []
        }),
        components: {
            NavbarComponent,
            SplashComponent,
            BreadcrumbComponent,
            SidebarComponent,
            FooterComponent
        },
        computed: {
            loadClass() {
                return this.selectUnitClass();
            }
        },
        mounted() {
            this.loaderInit();
        },
        created() {
            this.selectUnitClass();
        },
        methods: {
            loaderInit() {
                setTimeout(() => {
                    var element = document.querySelector("body");
                    element.classList.add("loaded");
                    this.loading = false;
                }, 3000);
            },
            selectUnitClass() {
                this.$store.commit('getItemLocalStorage', { key: 'unit' });
                console.log(this.$store.state.localStorage);

                switch (this.$store.state.localStorage) {
                    case 'unisaojose':
                        this.class = 'blue darken-4'
                        break;
                    case 'colegio-realengo':
                        this.class = 'red darken-4'
                        break;
                    case 'colegio-aplicacao-taquara':
                        this.class = 'teal darken-2'
                        break;
                    case 'colegio-aplicacao-vilamilitar':
                        this.class = 'teal darken-2'
                        break;
                }

                return this.class;
            }
        }
    })
</script>

<style>
    /* Loader */
    #wiki-loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }

    #wiki-loader {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #ffffff;
        -webkit-animation: spin 2s linear infinite;
        /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 2s linear infinite;
        /* Chrome, Firefox 16+, IE 10+, Opera */
        z-index: 1001;
    }

    #wiki-loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #ffffff;
        -webkit-animation: spin 3s linear infinite;
        /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite;
        /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #wiki-loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #ffffff;
        -webkit-animation: spin 1.5s linear infinite;
        /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 1.5s linear infinite;
        /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    @-webkit-keyframes spin {
      0% {
          -webkit-transform: rotate(0deg);
          /* Chrome, Opera 15+, Safari 3.1+ */
          -ms-transform: rotate(0deg);
          /* IE 9 */
          transform: rotate(0deg);
          /* Firefox 16+, IE 10+, Opera */
      }
      100% {
          -webkit-transform: rotate(360deg);
          /* Chrome, Opera 15+, Safari 3.1+ */
          -ms-transform: rotate(360deg);
          /* IE 9 */
          transform: rotate(360deg);
          /* Firefox 16+, IE 10+, Opera */
      }
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);
            /* IE 9 */
            transform: rotate(0deg);
            /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);
            /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);
            /* IE 9 */
            transform: rotate(360deg);
            /* Firefox 16+, IE 10+, Opera */
        }
    }

    #wiki-loader-wrapper .wiki-loader-section {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        /* background: rgba(0, 0, 0, .8);
        background: #b20000; */
        z-index: 1000;
        -webkit-transform: translateX(0);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(0);
        /* IE 9 */
        transform: translateX(0);
        /* Firefox 16+, IE 10+, Opera */
    }

    .loaded #wiki-loader-wrapper .wiki-loader-section {
        -webkit-transform: translateX(-100%);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(-100%);
        /* IE 9 */
        transform: translateX(-100%);
        /* Firefox 16+, IE 10+, Opera */
        -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #wiki-loader {
        opacity: 0;
        -webkit-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }

    .loaded #wiki-loader-wrapper {
        visibility: hidden;
        -webkit-transform: translateY(-100%);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateY(-100%);
        /* IE 9 */
        transform: translateY(-100%);
        /* Firefox 16+, IE 10+, Opera */
        -webkit-transition: all 0.3s 1s ease-out;
        transition: all 0.3s 1s ease-out;
    }

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

    /* Container Vuetify */
    .container--fluid {
        border-top: 1px solid #ebebeb;
        border-bottom: 1px solid #ebebeb;
        padding: 0;
    }

    /* Container */
    .wiki-container {
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
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