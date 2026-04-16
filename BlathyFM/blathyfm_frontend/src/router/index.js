import { createRouter, createWebHistory } from 'vue-router'
import HomeLayout from '@/components/layouts/HomeLayout.vue'
import SchedulerAcceptMusicView from '@/views/schedulerView/SchedulerAcceptMusicView.vue'
import SchedulerHomeView from '@/views/schedulerView/SchedulerHomeView.vue'
import RequestView from "@/views/studentsView/RequestView.vue";
import SendView from '@/views/studentsView/SendView.vue'
import LoginView from '@/views/LoginView.vue'
import AboutView from "@/views/footerView/AboutView.vue";
import HowToView from "@/views/footerView/HowToView.vue";
import RulesView from "@/views/footerView/RulesView.vue";
import TechnologyView from "@/views/footerView/TechnologyView.vue";
import SchedulerView from "@/views/schedulerView/SchedulerView.vue";
import RegisterView from "@/views/RegisterView.vue";
import AdminCheckUsersView from "@/views/adminView/AdminCheckUsersView.vue";
import RequestVerifyView from "@/views/studentsView/RequestVerifyView.vue";


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
      {
          path: '/',
          redirect: '/home'
      },
    { // Főoldal és azok variánsai
      path: '/',
      component: HomeLayout,
      children: [
          {
              path: 'home',
              name: 'main-home',
              component: () => import('@/views/HomeView.vue'),
              meta: {
                  title: "Főoldal",
                  requiresAuth: false
              }
          },
          {
              path: 'student/home',
              name: 'student-home',
              component: () => import('@/views/studentsView/StudentHomeView.vue'),
              meta: {
                  title: "Főoldal",
                  requiresAuth: true,
                  roles: ['student']
              }
          },
          {
              path: 'admin/home',
              name: 'admin-home',
              component: () => import('@/views/adminView/AdminHomeView.vue'),
              meta: {
                  title: "Főoldal",
                  requiresAuth: true,
                  roles: ['admin']
              }
          },
          {
              path: 'scheduler/home',
              name: 'scheduler-home',
              component: () => import('@/views/schedulerView/SchedulerHomeView.vue'),
              meta: {
                  title: "Főoldal",
                  requiresAuth: true,
                  roles: ['scheduler']
              }
          }
      ]
    },
      { // Bejelentkezési képernyő
          path: '/login',
          name: 'login',
          component: LoginView,
          meta: {
              title: "Bejelentkezés",
              requiresAuth: false
          }
      },
      { // Regisztrációs oldal
          path: '/register',
          name: 'register',
          component: RegisterView,
          meta: {
              title: "Regisztráció",
              requiresAuth: false
          }
      },
      {
          //RequestVerifyView
          path: '/requestverify/:id',
          name: 'requestVerify',
          component: RequestVerifyView,
          meta:{
              title: "RequestVerify",
              requiresAuth: true,
              roles: ['student']
          }
      },
    { // Tanulói nézetek (nem ugyanolyan struktúrájúak, éppen ezért nem lesz gyerek komponensezés!)
        path: '/student/request',
        name: 'request',
        component: RequestView,
        meta: {
          title: "Kérés",
          requiresAuth: true,
          roles: ['student']
        }
    },
  {
      path: '/student/send',
      name: 'send',
      component: SendView,
      meta: {
          title: "Küldés",
          requiresAuth: true,
          roles: ['student']
      }
  },
  {
      path: '/scheduler/schedule',
      name: 'scheduler',
      component: SchedulerView,
      meta: {
          title: "Ütemezés",
          requiresAuth: true,
          roles: ['scheduler']
      }
  },
  {
      path: '/admin',
      name: 'admin',
      component: AdminView,
      meta: {
          title: "Zenék ellenőrzése",
          requiresAuth: true,
          roles: ['admin']
      }
  },
      {
          path: '/admin/checkusers',
          name: 'admin-check-users',
          component: AdminCheckUsersView,
          meta: {
              title: 'Új felhasználók regisztráltatása',
              requiresAuth: true,
              roles: ['admin']
          }
      },
      {
          path: '/about',
          name: 'about',
          component: AboutView,
          meta: {
              title: 'Impresszum',
              requiresAuth: false
          }
      },
      {
          path: '/howto',
          name: 'howto',
          component: HowToView,
          meta: {
              title: 'Hogy működik?',
              requiresAuth: false
          }
      },
      {
          path: '/rules',
          name: 'rules',
          component: RulesView,
          meta: {
              title: 'Szabályzat',
              requiresAuth: false
          }
      },
      {
          path: '/technology',
          name: 'technology',
          component: TechnologyView,
          meta: {
              title: 'Technika',
              requiresAuth: false
          }
      },
  {
      path: '/403',
      name: 'forbidden',
      component: () => import('@/views/errorsView/ForbiddenView.vue'),
      meta: {
          title: 'Jogosultsághiba'
      }
  },
  {
      path: '/:pathMatch(.*)*',
      name: 'not-found',
      component: () => import('@/views/errorsView/NotFoundView.vue'),
      meta: {
          title: 'Nem található'
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
