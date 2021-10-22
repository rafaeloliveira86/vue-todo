import Vue from 'vue';
import VueRouter from 'vue-router';
import Tarefas from '../views/dashboard/Tarefas.vue';

Vue.use(VueRouter);

const CategoriesComponent = () => import("../components/site/CategoriesComponent.vue");
const SubcategorieComponent = () => import("../components/site/SubcategorieComponent.vue");
const ArticleComponent = () => import("../components/site/ArticleComponent.vue");

const routes = [
  //Página não encontrada
  { 
    path: '*',
    name: 'NotFound',
    component: () => import('../views/site/PageNotFound.vue')
  },
  //Página Inicial Unidades
  {
    path: '/',
    name: 'Página Inicial',
    component: () => import('../views/site/Default.vue')
  },
  //UniSãoJosé (Site)
  { 
    path: '/unisaojose',
    //name: 'unisaojose',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'unisaojose/categorias',
        component: CategoriesComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/unisaojose', disabled: false },
            { text: 'Categorias', href: '/unisaojose', disabled: false },
          ]
        }
      },
      {
        path: '/unisaojose/:any',
        name: 'unisaojose/subcategorias',
        component: SubcategorieComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/unisaojose' },
            { text: 'Categorias', href: '/unisaojose'  },
            { text: 'Subcategorias', href: '/unisaojose/subcategorias' }
          ]
        }
      },
      {
        path: '/unisaojose/:categories/:subcategories',
        name: 'unisaojose/artigos',
        component: ArticleComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/unisaojose' },
            { text: 'Categorias', href: '/unisaojose'  },
            { text: 'Subcategorias', href: '/unisaojose/subcategorias' },
            { text: 'Artigos' }
          ]
        }
      },
    ]
  },
  //Colégio Realengo (Site)
  {
    path: '/colegiorealengo',
    //name: 'colegiorealengo',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'colegiorealengo/categorias',
        component: CategoriesComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/colegiorealengo' },
            { text: 'Categorias', href: '/colegiorealengo' },
          ]
        }
      },
      {
        path: '/colegiorealengo/:any',
        name: 'colegiorealengo/subcategorias',
        component: SubcategorieComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/colegiorealengo' },
            { text: 'Categorias', href: '/colegiorealengo'  },
            { text: 'Subcategorias', href: '/colegiorealengo/subcategorias' }
          ]
        }
      },
      {
        path: '/colegiorealengo/:categories/:subcategories',
        name: 'colegiorealengo/artigos',
        component: ArticleComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/colegiorealengo' },
            { text: 'Categorias', href: '/colegiorealengo'  },
            { text: 'Subcategorias', href: '/colegiorealengo/subcategorias' },
            { text: 'Artigos' }
          ]
        }
      },
    ]
  },
  //Colégio Aplicação Taquara (Site)
  {
    path: '/colegioaplicacaotaquara',
    //name: 'colegioaplicacaotaquara',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'colegioaplicacaotaquara/categorias',
        component: CategoriesComponent
      },
      {
        path: '/colegioaplicacaotaquara/:any',
        name: 'colegioaplicacaotaquara/subcategorias',
        component: SubcategorieComponent
      },
      {
        path: '/colegioaplicacaotaquara/:categories/:subcategories',
        name: 'colegioaplicacaotaquara/artigos',
        component: ArticleComponent
      },
    ]
  },
  //Colégio Aplicação Vila Militar (Site)
  {
    path: '/colegioaplicacaovilamilitar',
    //name: 'colegioaplicacaovilamilitar',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'colegioaplicacaovilamilitar/categorias',
        component: CategoriesComponent
      },
      {
        path: '/colegioaplicacaovilamilitar/:any',
        name: 'colegioaplicacaovilamilitar/subcategorias',
        component: SubcategorieComponent
      },
      {
        path: '/colegioaplicacaovilamilitar/:categories/:subcategories',
        name: 'colegioaplicacaovilamilitar/artigos',
        component: ArticleComponent
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
