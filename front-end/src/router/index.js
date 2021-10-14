import Vue from 'vue';
import VueRouter from 'vue-router';
import Tarefas from '../views/dashboard/Tarefas.vue';

Vue.use(VueRouter);

const CategoriesComponent = () => import("../components/site/Categories.vue");
const SubcategorieComponent = () => import("../components/site/SubcategorieComponent.vue");

const routes = [
  {
    path: '/',
    name: 'Página Inicial',
    component: () => import('../views/site/Default.vue')
  },
  //UniSãoJosé (Site)
  { 
    path: '/unisaojose',
    name: 'unisaojose',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'home',
        component: CategoriesComponent
      },
      {
        path: '/unisaojose/subcategorie/:id_categorie',
        name: 'unisaojose/subcategorie',
        component: SubcategorieComponent
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
    name: 'colegiorealengo',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'home',
        component: CategoriesComponent
      },
      {
        path: '/colegiorealengo/subcategorie/:id_categorie',
        name: 'colegiorealengo/subcategorie',
        component: SubcategorieComponent
      },
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
    name: 'colegioaplicacaotaquara',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'home',
        component: CategoriesComponent
      },
      {
        path: '/colegioaplicacaotaquara/subcategorie/:id_categorie',
        name: 'colegioaplicacaotaquara/subcategorie',
        component: SubcategorieComponent
      },
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
    name: 'colegioaplicacaovilamilitar',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'home',
        component: CategoriesComponent
      },
      {
        path: '/colegioaplicacaovilamilitar/subcategorie/:id_categorie',
        name: 'colegioaplicacaovilamilitar/subcategorie',
        component: SubcategorieComponent
      },
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
