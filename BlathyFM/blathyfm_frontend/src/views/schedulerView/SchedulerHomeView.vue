<script>
export default{
  name: "SchedulerView",
  methods:{
    logout(){
      //Bejelentkezési adatok üresre állítása

      this.$router.push({name: 'main-home'})
      this.$emit('logged-out')
    },
    orderMusic(){
      this.$router.push({name: 'scheduler'})
    },
    acceptOrDecline() {
      this.$router.push({name: 'admin'})
    }
  },
}
</script>

<template>
    <button class="title border-bottom border-dark" @click="logout">Kijelentkezés</button>
    <button class="title border-bottom border-dark" @click="acceptOrDecline">Új zenék ellenőrzése</button>
    <button class="title border-bottom border-dark" @click="orderMusic">Zenék rendezése</button>
    <p>Kérjük legalább aznap 12:55-ig határozza meg, hogy milyen zenék játszódjanak le az iskolarádióban!</p>
</template>

<style scoped>
/* Főképernyő ütemezői (scheduler) variánsát létrehozta: El-Nabulsy Csongor Alan
   Széttagolta a layout-gyerek viszony létrehozása miatt,
   a tanulói nézet arra alkalmas részét a layoutba helyezte át,
   valamint a zeneelfogadó funkciót az admintól ide helyezte át: Susán Csongor György */
</style>