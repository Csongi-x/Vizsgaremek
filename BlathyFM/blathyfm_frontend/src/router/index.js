import { createRouter, createWebHistory } from 'vue-router'
import HomeLayout from '@/components/layouts/HomeLayout.vue'
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
import SchedulerAcceptMusicView from "@/views/schedulerView/SchedulerAcceptMusicView.vue";
import App from "@/App.vue";


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
                  role: 'student'
              }
          },
          {
              path: 'admin/home',
              name: 'admin-home',
              component: () => import('@/views/adminView/AdminHomeView.vue'),
              meta: {
                  title: "Főoldal",
                  requiresAuth: true,
                  role: 'admin'
              }
          },
          {
              path: 'scheduler/home',
              name: 'scheduler-home',
              component: () => import('@/views/schedulerView/SchedulerHomeView.vue'),
              meta: {
                  title: "Főoldal",
                  requiresAuth: true,
                  role: 'scheduler'
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
          path: '/waiting',
          name: 'waiting',
          component: () => import('@/views/WaitingView.vue'),
          meta: {
              title: 'Regisztráltatás',
              requiresAuth: false
          }
      },
      {
          //RequestVerifyView
          path: '/requestverify/:id',
          name: 'request-verify',
          component: RequestVerifyView,
          meta:{
              title: "Kérés megerősítése",
              requiresAuth: true,
              role: 'student'
          }
      },
    { // Tanulói nézetek (nem ugyanolyan struktúrájúak, éppen ezért nem lesz gyerek komponensezés!)
        path: '/student/request',
        name: 'request',
        component: RequestView,
        meta: {
          title: "Kérés",
          requiresAuth: true,
          role: 'student'
        }
    },
  {
      path: '/student/send',
      name: 'send',
      component: SendView,
      meta: {
          title: "Küldés",
          requiresAuth: true,
          role: 'student'
      }
  },
      {
          path: '/student/beforeaccept',
          name: 'before-accept',
          component: () => import('@/views/studentsView/StudentPendingMusicView.vue'),
          meta: {
              title: "Ellenőrzés előtti zenék",
              requiresAuth: true,
              role: 'student'
          }
      },
      {
          path: '/scheduler/check',
          name: 'scheduler-check',
          component: SchedulerAcceptMusicView,
          meta: {
              title: "Ütemezés",
              requiresAuth: true,
              role: 'scheduler'
          }
      },
      {
          path: '/scheduler/schedule',
          name: 'scheduler',
          component: SchedulerView,
          meta: {
              title: "Ütemezés",
              requiresAuth: true,
              role: 'scheduler'
          }
      },
      {
          path: '/admin/checkusers',
          name: 'admin-check-users',
          component: AdminCheckUsersView,
          meta: {
              title: 'Új felhasználók regisztráltatása',
              requiresAuth: true,
              role: 'admin'
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
    // 1. Cím beállítása
    document.title = `${to.meta.title ?? ''} - BláthyFM`

    // 2. Adatok kinyerése a tárolóból
    const token = localStorage.getItem('token');
    const userRole = localStorage.getItem('role'); // 'admin', 'scheduler', vagy 'student'

    // 3. Autentikáció ellenőrzése
    if (to.meta.requiresAuth && !token) {
        // Ha kellene login, de nincs token -> Irány a bejelentkezés
        return next({ name: 'login' });
    }

    // 4. Jogosultság (Role) ellenőrzése
    if (to.meta.role && to.meta.role !== userRole) {
        // Ha be van lépve, de rossz a rangja (pl. diák admin oldalra akar menni)
        return next({ name: 'forbidden' });
    }

    // Ha minden feltétel teljesül
    next();
});

export default router
