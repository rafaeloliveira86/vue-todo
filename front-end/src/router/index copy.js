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
    path: '/:slug',
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
    path: '/colegio-realengo',
    //name: 'colegiorealengo',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'colegio-realengo/categorias',
        component: CategoriesComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/colegio-realengo' },
            { text: 'Categorias', href: '/colegio-realengo' },
          ]
        }
      },
      {
        path: '/colegio-realengo/:any',
        name: 'colegio-realengo/subcategorias',
        component: SubcategorieComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/colegio-realengo' },
            { text: 'Categorias', href: '/colegio-realengo'  },
            { text: 'Subcategorias', href: '/colegio-realengo/subcategorias' }
          ]
        }
      },
      {
        path: '/colegio-realengo/:categories/:subcategories',
        name: 'colegio-realengo/artigos',
        component: ArticleComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/colegio-realengo' },
            { text: 'Categorias', href: '/colegio-realengo'  },
            { text: 'Subcategorias', href: '/colegio-realengo/subcategorias' },
            { text: 'Artigos' }
          ]
        }
      },
    ]
  },
  //Colégio Aplicação Taquara (Site)
  {
    path: '/colegio-aplicacao-taquara',
    //name: 'colegio-aplicacao-taquara',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'colegio-aplicacao-taquara/categorias',
        component: CategoriesComponent
      },
      {
        path: '/colegio-aplicacao-taquara/:any',
        name: 'colegio-aplicacao-taquara/subcategorias',
        component: SubcategorieComponent
      },
      {
        path: '/colegio-aplicacao-taquara/:categories/:subcategories',
        name: 'colegio-aplicacao-taquara/artigos',
        component: ArticleComponent
      },
    ]
  },
  //Colégio Aplicação Vila Militar (Site)
  {
    path: '/colegio-aplicacao-vilamilitar',
    //name: 'colegio-aplicacao-vilamilitar',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/',
        name: 'colegio-aplicacao-vilamilitar/categorias',
        component: CategoriesComponent
      },
      {
        path: '/colegio-aplicacao-vilamilitar/:any',
        name: 'colegio-aplicacao-vilamilitar/subcategorias',
        component: SubcategorieComponent
      },
      {
        path: '/colegio-aplicacao-vilamilitar/:categories/:subcategories',
        name: 'colegio-aplicacao-vilamilitar/artigos',
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
