<script>
export default{
  name: "StudentHomePage",
  methods:{
    logout(){
      this.$router.push({name: 'main-home'})
    },
    send(){
      this.$router.push({name: 'send'})
    },
    request(){
      this.$router.push({name: 'request'})
    }
  }
}
</script>

<template>
      <button class="title border-bottom border-dark" @click="logout">Kijelentkezés</button>
      <button class="title border-bottom border-dark" @click="send">Zene beküldés</button>
      <button class="title border-bottom border-dark" @click="request">Meglévő zene bekérése</button>
      <p>Meglévő: már beküldött vagy eleve bekérhető zene.</p>
</template>

<style scoped>

</style>