import { createRouter, createWebHistory } from 'vue-router'
import HomeLayout from '@/components/layouts/HomeLayout.vue'
import AdminView from '@/views/adminView/AdminView.vue'
import SchedulerHomeView from '@/views/schedulerView/SchedulerHomeView.vue'
import RequestView from "@/views/studentsView/RequestView.vue";
import SendView from '@/views/studentsView/SendView.vue'
import LoginView from '@/views/LoginView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { // Főoldal és azok variánsai
      path: '/',
      component: HomeLayout,
      children: [
          {
              path: 'home',
              name: 'main-home',
              component: () => import('@/views/HomeView.vue')
          },
          {
              path: 'student/home',
              name: 'student-home',
              component: () => import('@/views/studentsView/StudentHomeView.vue')
          },
          {
              path: 'admin/home',
              name: 'admin-home',
              component: () => import('@/views/adminView/AdminHomeView.vue')
          },
          {
              path: 'scheduler/home',
              name: 'scheduler-home',
              component: () => import('@/views/schedulerView/SchedulerHomeView.vue')
          }
      ]
    },
    { // Bejelentkezési képernyő
      path: '/login',
      name: 'login',
      component: LoginView,
    },
  { // Tanulói nézetek (nem ugyanolyan struktúrájúak, éppen ezért nem lesz gyerek komponensezés!)
      path: '/student/request',
      name: 'request',
      component: RequestView,
  },
  {
      path: 'student/send',
      name: 'send',
      component: SendView,
  },
  {
      path: '/scheduler/schedule',
      name: 'scheduler',
      component: SchedulerHomeView,
  },
  {
      path: '/admin',
      name: 'admin',
      component: AdminView,
  }
  ]
})

router.beforeEach((to, from, next) => {
    document.title = 'BláthyFM'
    // autentikáció
    next()
})

export default router
