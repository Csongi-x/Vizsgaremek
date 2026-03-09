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
              component: () => import('@/views/HomeView.vue'),
              meta: {
                  title: "Főoldal"
              }
          },
          {
              path: 'student/home',
              name: 'student-home',
              component: () => import('@/views/studentsView/StudentHomeView.vue'),
              meta: {
                  title: "Főoldal"
              }
          },
          {
              path: 'admin/home',
              name: 'admin-home',
              component: () => import('@/views/adminView/AdminHomeView.vue'),
              meta: {
                  title: "Főoldal"
              }
          },
          {
              path: 'scheduler/home',
              name: 'scheduler-home',
              component: () => import('@/views/schedulerView/SchedulerHomeView.vue'),
              meta: {
                  title: "Főoldal"
              }
          }
      ]
    },
    { // Bejelentkezési képernyő
      path: '/login',
      name: 'login',
      component: LoginView,
        meta: {
            title: "Bejelentkezés"
        }
    },
  { // Tanulói nézetek (nem ugyanolyan struktúrájúak, éppen ezért nem lesz gyerek komponensezés!)
      path: '/student/request',
      name: 'request',
      component: RequestView,
      meta: {
          title: "Kérés"
      }
  },
  {
      path: '/student/send',
      name: 'send',
      component: SendView,
      meta: {
          title: "Küldés"
      }
  },
  {
      path: '/scheduler/schedule',
      name: 'scheduler',
      component: SchedulerHomeView,
      meta: {
          title: "Ütemezés"
      }
  },
  {
      path: '/admin',
      name: 'admin',
      component: AdminView,
      meta: {
          title: "Zenék ellenőrzése"
      }
  }
  ]
})

router.beforeEach((to, from, next) => {
    document.title = `${to.meta.title} - BláthyFM`
    // autentikáció
    next()
})

export default router
