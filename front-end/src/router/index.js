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
    path: '/:unit_slug',
    component: () => import('../views/site/Home.vue'),
    children: [
      {
        path: '/:unit_slug',
        component: CategoriesComponent,
        meta: {
          breadcrumb: [
            { text: 'Home', href: '/unisaojose', disabled: false },
            { text: 'Categorias', href: '/unisaojose', disabled: false },
          ]
        }
      },
      {
        path: '/:unit_slug/:categorie_slug',
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
        path: '/:unit_slug/:categorie_slug/:subcategorie_slug/:article_slug',
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