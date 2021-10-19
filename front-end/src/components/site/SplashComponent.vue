<template>
    <div>
        <div class="wiki-splash">
            <div id="wiki_background"></div>
            <div class="wiki-splash-content">
                <h4 class="underline-white">
                    Wiki<small v-for="(item, index) in arrayUnit" :key="index" v-show="item.unit_nickname">.{{ item.unit_nickname }}</small>
                </h4>
            </div>
            <v-img :src="require('../../assets/image/image_callcenter.png')" contain position="right" class="image" />
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    const base_url_api = 'http://localhost/api/v1';

    export default {
        name: "SplashComponent",
        data: () => ({
            arrayUnit: []
        }),
        created() {
            this.getUnitByID();
            //console.log(this.$refs);
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
    .wiki-splash {
        display: flex;
        position: relative;
        padding: 0;
        width: 100%;
        height: 300px;
        /* background-image: url('../../assets/image/splash_image.png'); */
        background-image: url('../../assets/image/splash_image.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /* background-image: linear-gradient(to right, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1); */
        /* background: linear-gradient(45deg, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1); */
    }

    #wiki_background {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #18335d, #2d4775, #415c8e, #5572a8, #6a89c3, #6c97d1, #6fa5df, #71b3ec, #62bbed, #57c2eb, #51c9e7, #53cfe1);
        opacity: .8;
    }

    .wiki-splash-content {
        width: 900px;
        min-width: 61.6%;
        height: auto;
        margin: 0 auto;
        padding: 0;
    }

    .wiki-splash h4 {
        margin: 75px 0;
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

    /* Underline */

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
        height: 2px;
    }

    @media only screen and (max-width: 992px) {
        .wiki-splash-content {
            width: 100%;
            padding: 0 15px;
        }

        .wiki-splash .image {
            opacity: unset;
        }
    }
</style>