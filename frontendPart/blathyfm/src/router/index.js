import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminView from '@/views/adminView/AdminView.vue'
import SchedulerView from '@/views/schedulerView/SchedulerView.vue'
import RequestView from "@/views/studentsView/RequestView.vue";
import SendView from '@/views/studentsView/SendView.vue'
import LoginView from '@/views/LoginView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
  {
      path: '/request',
      name: 'request',
      component: RequestView,
  },
  {
      path: '/send',
      name: 'send',
      component: SendView,
  },
  {
      path: '/scheduler',
      name: 'scheduler',
      component: SchedulerView,
  },
  {
      path: '/admin',
      name: 'admin',
      component: AdminView,
  },
  ],
})

router.beforeEach((to, from, next) => {
    document.title = 'BláthyFM'
    // autentikáció
    next()
})

export default router
