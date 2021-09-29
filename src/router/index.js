import Vue from 'vue'
import VueRouter from 'vue-router'
import Tarefas from '../views/dashboard/Tarefas.vue'

Vue.use(VueRouter)

const routes = [
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
  },
  {
    path: '/',
    name: 'home',
    component: () => import('../views/site/Home.vue')
  },
  {
    path: '/sobre',
    name: 'sobre',
    component: () => import('../views/site/Sobre.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
