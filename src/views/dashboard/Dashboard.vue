<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app>
      <v-list-item class="grey lighten-4">
        <v-list-item-content>
          <!-- <v-list-item-title class="text-h6">
            Vue.JS
          </v-list-item-title>
          <v-list-item-subtitle>
            Lista de Tarefas
          </v-list-item-subtitle> -->
          <v-img src="../../assets/image/logo_usj_blue.png" contain height="40" />
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
        <router-link :to="{ name: 'home' }" class="text-decoration-none">
            <v-icon dark>mdi-web</v-icon>
        </router-link>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
        <router-view></router-view>
    </v-main>

    <v-footer app>
        &COPY; Todos os direitos reservados - Centro Universitário São José 2021
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    name: 'Dashboard',
    data: () => ({ 
      drawer: null,
      items: [
        { title: 'Dashboard', icon: 'mdi-view-dashboard', to: '/dashboard' },
        { title: 'Tarefas', icon: 'mdi-playlist-check', to: '/dashboard/tarefas' },
        { title: 'Sobre', icon: 'mdi-help-box', to: '/dashboard/sobre' },
      ]
    })
  }
</script>

<style>
  .router-link-active {
      color: #ffffff !important;
  }

  .v-footer {
      z-index: 1;
      padding: 15px !important;
      border-top: 1px solid #dddddd !important;
  }
</style>