import Vue from 'vue'
import VueRouter from 'vue-router'
import Tarefas from '../views/dashboard/Tarefas.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Página Inicial',
    component: () => import('../views/site/Default.vue')
  },
  {
    path: '/select',
    name: 'select',
    component: () => import('../views/site/Select.vue')
  },
  {
    path: '/unisaojose',
    name: 'home',
    component: () => import('../views/site/unisaojose/Home.vue')
  },
  {
    path: '/unisaojose/sobre',
    name: 'sobre',
    component: () => import('../views/site/unisaojose/Sobre.vue')
  },
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
