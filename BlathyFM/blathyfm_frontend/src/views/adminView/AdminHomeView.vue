<script>
export default {
  name: 'AdminHomeView',
  methods: {
    logout(){
      this.$router.push({name: 'main-home'})
    },
    acceptOrDecline() {
      this.$router.push({name: 'admin'})
    }
  }
}
</script>

<template>
  <button class="title border-bottom border-dark" @click="logout">Kijelentkezés</button>
  <button class="title border-bottom border-dark" @click="acceptOrDecline">Új zenék ellenőrzése</button>
  <p>Kérjük, hogy a zenéket a szabályzatnak megfelelően ellenőrizze és döntsön róluk!</p>
</template>

<style scoped>

</style>