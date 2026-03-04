<script>
import SchedulerView from "@/views/schedulerView/SchedulerView.vue";

export default{
  name: "LoginView",
  components: {SchedulerView},
  data(){
    return{
      email: '',
      password: '',
    }
  },
  methods:{

  }
}
</script>

<template>

<section class="row align-items-center">
  <div class="col-md-2 col-lg-4"></div>
  <div class="vertical col-12 col-sm-12 col-md-8 col-lg-4">
    <div class="loginPage">
      <form class="w-100 align-items-center">
        <table>
          <tbody>
          <!--Email cim-->
          <tr>
            <td class="label" v-model="email">E-mail cím: </td>
            <td class="input"><input type="email" name="email" id="email" required></td>
          </tr>
          <!--Jelszó-->
          <tr>
            <td class="label" v-model="password">Jelszó:</td>
            <td class="input"><input type="password" name="password" id="password" required></td>
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