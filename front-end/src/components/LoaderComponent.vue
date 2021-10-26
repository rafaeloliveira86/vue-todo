<template>
    <div>
        <div id="wiki-loader-wrapper" v-for="(item, index) in arrayUnit" :key="index">
          <div id="wiki-loader"></div>
          <div :class="`wiki-loader-section ${item.class}`"></div>
        </div>
    </div>
</template>

<script>
  import api from "../api";

  export default {
    name: 'LoaderComponent',
    data: () => ({
      arrayUnit: []
    }),
    created() {
      this.loaderInit();
      this.getUnitByID();
    },
    methods: {
      loaderInit() {
        setTimeout(function() {
          var element = document.querySelector("body");
          element.classList.add("loaded");
        }, 3000);
      },
      async getUnitByID () {
        let unit_slug = this.$route.params.unit_slug;

        await api.get('/unidade/' + unit_slug)
        .then(res => {
            this.arrayUnit = [...res.data.data];
            console.log(this.arrayUnit);
        })
        .catch(err => {
            console.log(err);
        })
      }
    }
  }
</script>

<style>
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
</style>