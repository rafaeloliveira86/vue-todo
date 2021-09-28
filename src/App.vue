<template>
  <v-app id="inspire">
    <Dashboard />
  </v-app>
</template>

<script>
  import Dashboard from './components/dashboard/Dashboard.vue';

  export default {
    name: 'App',
    components: {
      Dashboard
    }
  }
</script>