<script>
import NavBar from "@/components/NavBar.vue";
import FooterView from "@/components/FooterView.vue"

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
        this.password = pass
      }
    },
    check({email, password}) {
      // adatbázisban megnézi, hogy van-e egyezés, ha van, akkor onnan kinyeri a rangot (role),
      // ha nem, akkor hibaüzenetre készteti majd az appot
      const credentials = [] // email, jelszó (true, ha egyezik, egyébként false), role
      if (!credentials) return 'NONE'
      else if (!credentials[1]) return 'INCORRECT_PASSWORD'
      else return credentials[2]
    }
  }
}

</script>

<template>
  <header>
    <NavBar/>
  </header>
  <main class="container">
    <router-view @login="login"/>
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
  background-image: url('/../public/20260310_221404_1.jpg');
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
