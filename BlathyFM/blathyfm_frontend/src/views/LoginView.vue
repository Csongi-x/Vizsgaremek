<script>
import http from "@/utils/http.js";

export default{
  name: "LoginView",
  data(){
    return{
      email: '',
      password: '',
    }
  },
  methods:{
    async auth() {
      // Csak akkor küldjük el, ha ki van töltve mindkét mező
      if (this.email && this.password) {
        const email = this.email
        const password = this.password
        const credentials = {email: email, password: password}
        try {
          // 1. Backend hívás
          const res = await http.post('/api/login', credentials);

          // 2. Adatok kinyerése
          const { token, user } = res.data;

          // 3. Mentés a localStorage-ba, hogy a Router lássa
          localStorage.setItem('token', token);
          localStorage.setItem('role', user.role);

          // 4. Irányítás a router meta adatai alapján (vagy fixen)
          if (user.role === 'admin') {
            this.$router.push({ name: 'admin-home' });
          } else if (user.role === 'scheduler') {
            this.$router.push({ name: 'scheduler-home' });
          } else {
            this.$router.push({ name: 'student-home' });
          }

        } catch (error) {
          console.error("Login hiba:", error);
          alert("Hibás felhasználónév vagy jelszó!");
        }
      } else {
        alert("Kérlek töltsd ki az összes mezőt!");
      }
    },
    toggle() {
      document.querySelector('[name="password"]').type =
          document.querySelector('[name="password"]').type === 'password'
              ? 'text'
              : 'password'
    }
  }
}
</script>

<template>

<section class="row align-items-center">
  <div class="col-md-2 col-lg-4"></div>
  <div class="vertical col-12 col-sm-12 col-md-8 col-lg-4">

    <div class="loginPage">
      <form class="w-100 align-items-center" @submit.prevent="auth">
        <table>
          <tbody>
          <!--Email cim-->
          <tr>
            <td class="label">E-mail cím: </td>
            <td class="input" colspan="2"><input type="email" name="email" id="email" v-model="email" required></td>
          </tr>
          <!--Jelszó-->
          <tr>
            <td class="label">Jelszó:</td>
            <td class="input"><input type="password" name="password" id="password" v-model="password" required></td>
            <td>
              <button type="button" class="toggle" @click="toggle">
                <i class="bi bi-eye"/>
              </button>
            </td>
          </tr>
          </tbody>
        </table>
        <!--bejelentkezés-->
        <button type="submit">Bejelentkezés</button>
      </form>
    </div>
  </div>
  <div class="col-md-2 col-lg-4"></div>
</section>
</template>

<style scoped>
.toggle {
  background-color: aquamarine;
  border: 2px solid black;
}
.loginPage{
  background-color: gold;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 2px solid black;
}
.vertical {
  display: grid;
  vertical-align: center;
  margin-top: 32vh;
}
button {
  border: 2px solid black;
  background-color: gold;
  width: 100%;
}
input {
  margin: .5rem 3rem .25rem -.5rem;
  border: 2px solid black;
  width: 100%;
}
.label {
  width: 20%;
  text-indent: .2rem;
}
table, .input {
  width: 100%;
}
</style>