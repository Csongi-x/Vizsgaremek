<script>
export default{
  name: "RegisterView",
  data(){
    return{
      fullName: '',
      email: '',
      password: '',
      passwordAgain: '',
      role: '',
      error: ''
    }
  },
  props: {
    error: {
      required: true,
      type: String
    }
  },
  methods:{
    register() {
      // felhasználó regisztrálása (az admin dönt arról, hogy felvegye-e a fiókot majd)
      this.$emit("register", {
        fullName: this.fullName,
        email: this.email,
        password: this.password,
        passwordAgain: this.passwordAgain,
        role: this.role,
        status: 'pending'
      })
    },
    toggle() {
      document.querySelector('[name="password"]').type =
          document.querySelector('[name="password"]').type === 'password'
              ? 'text'
              : 'password'

      document.querySelector('[name="passwordAgain"]').type
          = document.querySelector('[name="passwordAgain"]').type === 'password'
          ? 'text'
          : 'password'
    }
  },
  emits: ["register"]
}
</script>

<template>
  <section class="row align-items-center">
    <div class="col-md-2 col-lg-4"></div>
    <div class="vertical col-12 col-sm-12 col-md-8 col-lg-4">
      <div class="loginPage">
        <form class="w-100 align-items-center" @submit.prevent="register">
          <table>
            <tbody>
            <!--Teljes név-->
            <tr>
              <td class="label">Teljes név: </td>
              <td class="input" colspan="2"><input name="full_name" id="full_name" v-model="fullName" required></td>
            </tr>
            <!--Email cím-->
            <tr>
              <td class="label">E-mail cím: </td>
              <td class="input" colspan="2"><input type="email" name="email" id="email" v-model="email" required></td>
            </tr>
            <!--Jelszó-->
            <tr>
              <td class="label">Jelszó:</td>
              <td class="input"><input type="password" name="password" id="password" v-model="password" required></td>
              <td rowspan="2">
                <button type="button" class="toggle" @click="toggle">
                  <i class="bi bi-eye"/>
                </button>
              </td>
            </tr>
            <!--Jelszó ismét-->
            <tr>
              <td class="label">Jelszó ismét:</td>
              <td class="input"><input type="password" name="passwordAgain" id="passwordAgain" v-model="passwordAgain" required></td>
            </tr>
            <!--Role (lista)-->
            <tr>
              <td class="label">Jogkör:</td>
              <td class="input" colspan="2">
                <select name="role" id="role" v-model="role">
                  <option value="student" selected>Diák</option>
                  <option value="admin">Adminisztrátor</option>
                  <option value="scheduler">Ütemező</option>
                </select>
              </td>
            </tr>
            </tbody>
          </table>
          <!--regisztráció-->
          <button type="submit">Regisztráció</button>
        </form>
      </div>
      <div class="errorPage" v-if="error !== ''"> <!-- Hibaüzenet -->
        <p>{{error}}</p>
      </div>
    </div>
    <div class="col-md-2 col-lg-4"></div>
  </section>
</template>

<style scoped>
/* Származtatta a LoginView-ból: Susán Csongor */
.toggle {
  background-color: aquamarine;
  border: 2px solid black;
}
.loginPage{
  background-color: gold;
  margin: auto;
}
.loginPage, .errorPage {
  border: 2px solid black;
  display: flex;
  justify-content: center;
  align-items: center;
}
.errorPage {
  background-color: #F66;
  margin-top: 5vh;
  color: #311;
  padding: 3vh;
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
input, select {
  margin: .5rem 3rem .25rem -.5rem;
  border: 2px solid black;
  background-color: white;
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