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
      email: '',
      password: '',
      role: '',
      token: '',
      error: ''
    }
  },
  computed: {
    isAuth() {
      return this.email !== '' && this.password !== '' && this.role !== '' && this.token !== ''
    }
  },
  methods: {
    login({email, password}) {
      this.email = email
      this.password = password
      this.$router.push({name : 'waiting'})
    },
    check({email, password}) {
      // adatbázisban megnézi, hogy van-e egyezés, ha van, akkor onnan kinyeri a rangot (role),
      // ha nem, akkor hibaüzenetre készteti majd az appot
    },
    async register({fullName, email, password, passwordAgain, role, status}) { // regisztráció (adminnak beküldeni a fiókot)
      let response = null
      try {
        response = await http.post('api/register', {
          full_name: fullName,
          email: email,
          password: password,
          password_again: passwordAgain,
          role: role,
          status: status
        })
      } catch (error) {
        this.error = ` Hiba: ${error}`
      }
      this.$router.push({name: 'waiting'})
    },
    async send(newMusic) {
      try {
        const response = await http.post('/api/new_music', newMusic)
        alert(response.data.message)
      } catch (error) {
        alert(`Hiba: ${error}`)
      }
    },
    async acceptUser(id) {
      try {
        const response = await http.post('/api/pending_users', {id: id})
        alert(response.data.message)
      } catch (error) {
        alert(`Hiba: ${error}`)
      }
    },
    async declineUser(id) {
      try {
        const response = await http.patch('/api/pending_users', {id: id, status: 'declined'})
        alert(response.data.message)
      } catch (error) {
        alert(`Hiba: ${error}`)
      }
    }
  }
}

</script>

<template>
  <header>
    <NavBar/>
  </header>
  <main class="container">
    <router-view @login="login" @register="register" @send="send"
                 @accept="acceptUser" @decline="declineUser"
                 :email="email" :password="password" :role="role"/>
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
