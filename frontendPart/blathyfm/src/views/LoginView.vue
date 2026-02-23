<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "LoginView"
})
</script>

<template>
<div class="row align-items-center">
  <div class="col-md-2 col-lg-4"></div>
  <div class="col-12 col-sm-12 col-md-8 col-lg-4">
    <div class="loginPage">
      <form class="w-100 align-items-center">
        <p class="p-1">
          <!--Email cim-->
          <label>E-mail cím: </label>
          <input name="email" id="email" required>
          <br>
          <!--Jelszó-->
          <label>Jelszó: </label>
          <input name="password" id="password" required>
        </p>
        <!--bejelentkezés-->
        <button type="submit">Bejelentkezés</button>
      </form>
    </div>
  </div>
  <div class="col-md-2 col-lg-4"></div>
</div>
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
button {
  border: 2px solid black;
  background-color: gold;
  width: 100%;
}
input {
  margin: .25rem;
  border: 2px solid black;
}
</style>