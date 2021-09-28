import Vue from 'vue'
import VueRouter from 'vue-router'
import Tarefas from '../views/dashboard/Tarefas.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Tarefas',
    component: Tarefas
  },
  {
    path: '/sobre',
    name: 'Sobre',
    component: () => import('../views/dashboard/Sobre.vue')
  },
  {
    path: '/site',
    name: 'Home',
    component: () => import('../views/site/Home.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
