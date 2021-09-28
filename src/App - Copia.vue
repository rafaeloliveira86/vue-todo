<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list-item class="grey lighten-4">
        <v-list-item-content>
          <!-- <v-list-item-title class="text-h6">
            Vue.JS
          </v-list-item-title>
          <v-list-item-subtitle>
            Lista de Tarefas
          </v-list-item-subtitle> -->
          <v-img src="./assets/image/logo_usj_blue.png" class="logo"></v-img>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list-item>
        <v-list-item-avatar>
          <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title>John Leider</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense class="py-0">
        <v-list-item v-for="item in items" :key="item.title" :to="item.to" link>
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- <v-app-bar absolute prominent color="#fcb69f" dark src="https://picsum.photos/1920/1080?random" app> -->
    <v-app-bar color="indigo darken-3" dark app>
      <template v-slot:img="{ props }">
        <v-img v-bind="props" gradient="to top right, rgba(19,84,122,.5), rgba(28,108,199,.8)"></v-img>
      </template>

      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-app-bar-title>WIKI USJ</v-app-bar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-web</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
  export default {
    name: 'App',
    data: () => ({ 
      drawer: null,
      items: [
        { title: 'Tarefas', icon: 'mdi-view-dashboard', to: '/' },
        { title: 'Sobre', icon: 'mdi-help-box', to: '/sobre' },
      ]
    })
  }
</script>

<style>
  .logo {
    width: auto;
    height: 40px;
  }
</style>