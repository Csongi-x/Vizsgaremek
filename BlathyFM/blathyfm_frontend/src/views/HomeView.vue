<script>
export default{
  name: "Home",
  methods:{
    login(){
      this.$router.push({name: 'login'})
    }
  }
}
</script>

<template>
  <!--Ez lesz a bejelentkezés blokk-->
  <button class="title border-bottom border-dark" @click="login">Bejelentkezés</button>
  <p>A program teljes értékű használatához a Bláthy-ba járó diákok és az ott dolgozó személyzet jogosult.</p>
</template>

<style>
p{
  padding: 10px;
  margin: 0;
  font-size: 0.9rem;
}

button.title{
  width: 100%;
  text-align: center;
  background: none;
  border-bottom: 3px solid black !important;
  cursor: pointer;
  display: block;
}
</style>