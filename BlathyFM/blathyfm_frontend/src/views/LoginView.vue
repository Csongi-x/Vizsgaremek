<script>
export default{
  name: "LoginView",
  data(){
    return{
      email: '',
      password: '',
    }
  },
  methods:{
    auth() {
      // autentikáció: jogkör alapján eldöntés vagy jelzés, hogy hibásak a bejelentkezési adatok
      this.$emit("login", {email: this.email, password: this.password})
    }
  },
  emits: ["login"]
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
            <td class="input"><input type="email" name="email" id="email" v-model="email" required></td>
          </tr>
          <!--Jelszó-->
          <tr>
            <td class="label">Jelszó:</td>
            <td class="input"><input type="password" name="password" id="password" v-model="password" required></td>
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