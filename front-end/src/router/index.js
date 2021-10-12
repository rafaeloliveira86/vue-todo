import Vue from 'vue';
import VueRouter from 'vue-router';
import Tarefas from '../views/dashboard/Tarefas.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Página Inicial',
    component: () => import('../views/site/Default.vue')
  },
  //UniSãoJosé (Site)
  { 
    path: '/unisaojose',
    name: 'unisaojose/home',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/unisaojose/subcategorie/:id_categorie',
        name: 'subcategorie',
        component: () => import('../views/site/Subcategorie.vue')
      },
      {
        path: '/unisaojose/sobre',
        name: 'unisaojose/sobre',
        component: () => import('../views/site/unisaojose/Sobre.vue')
      },
    ]
  },
  //Colégio Realengo (Site)
  {
    path: '/colegiorealengo',
    name: 'colegiorealengo/home',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/colegiorealengo/sobre',
        name: 'colegiorealengo/sobre',
        component: () => import('../views/site/colegiorealengo/Sobre.vue')
      },
    ]
  },
  //Colégio Aplicação Taquara (Site)
  {
    path: '/colegioaplicacaotaquara',
    name: 'colegioaplicacaotaquara/home',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/colegioaplicacaotaquara/sobre',
        name: 'colegioaplicacaotaquara/sobre',
        component: () => import('../views/site/colegioaplicacaotaquara/Sobre.vue')
      },
    ]
  },
  //Colégio Aplicação Vila Militar (Site)
  {
    path: '/colegioaplicacaovilamilitar',
    name: 'colegioaplicacaovilamilitar/home',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/colegioaplicacaovilamilitar/sobre',
        name: 'colegioaplicacaovilamilitar/sobre',
        component: () => import('../views/site/colegioaplicacaovilamilitar/Sobre.vue')
      },
    ]
  },
  //Dashboard (Admin)
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: () => import('../views/dashboard/Dashboard.vue'),
    children: [
      {
        path: '/dashboard/tarefas',
        name: 'Tarefas',
        component: Tarefas
      },
      {
        path: '/dashboard/sobre',
        name: 'Sobre',
        component: () => import('../views/dashboard/Sobre.vue')
      }
    ]
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
