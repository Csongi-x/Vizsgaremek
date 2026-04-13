<script>
import NavBar from "@/components/NavBar.vue";
import FooterView from "@/components/FooterView.vue"
import {http} from "@/utils/http.js";

export default {
  name: 'App',
  components: {
    NavBar,
    FooterView
  },
  data() {
    return {
      email: "",
      role: "",
      error: ""
    }
  },
  methods: {
    login({email, password}) {
      this.role = this.check({email, password})
      if (this.role === 'NONE') {

      } else {
        this.email = email
        this.password = password
      }
    },
    check({email, password}) {
      // adatbázisban megnézi, hogy van-e egyezés, ha van, akkor onnan kinyeri a rangot (role),
      // ha nem, akkor hibaüzenetre készteti majd az appot
      const credentials = {
        email: email,
        password: password
      } // email, jelszó (true, ha egyezik, egyébként false), role
      if (!credentials) return 'NONE'
      else if (!credentials.password) return 'INCORRECT_PASSWORD'
      else return credentials[2]
    },
    async register({fullName, email, password, passwordAgain, role, status}) { // regisztráció (adminnak beküldeni a fiókot)
      const response = await http.post('api/register', {
        full_name: fullName,
        email: email,
        password: password,
        password_again: passwordAgain,
        role: role,
        status: status
      })
    }
  }
}

</script>

<template>
  <header>
    <NavBar/>
  </header>
  <main class="container">
    <router-view @login="login" @register="register" :email="email" :role="role"/>
  </main>
  <footer>
    <FooterView/>
  </footer>
</template>

<style>
/* ami itt van: Susán Csongor
  minden más: El-Nabulsy Csongor */
* {
  font-family: Arial;
}
body {
  background-image: url('../public/20260310_221404.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  background-position: center;
}
main {
  min-height: 88.5vh;
}
.center-error {
  text-align: center;
  color: gold;
  padding: 4vh;
  font-size: 4rem;
  font-weight: 200;
}
.center-error-header {
  text-align: center;
  color: white;
  font-weight: lighter;
}
</style>
