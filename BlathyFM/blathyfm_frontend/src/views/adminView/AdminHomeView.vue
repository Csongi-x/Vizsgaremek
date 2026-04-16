<script>
export default {
  name: 'AdminHomeView',
  methods: {
    logout() {
      // kijelentkezés
      this.$router.push({name: 'main-home'})
    },
    checkUsers() {
      this.$router.push({name: 'admin-check-users'})
    }
  }
}
</script>

<template>
  <button class="title border-bottom border-dark" @click="logout">Kijelentkezés</button>
  <button class="title border-bottom border-dark" @click="checkUsers">Regisztráló felhasználók ellenőrzése</button>
  <p>Kérjük, hogy a zenéket a szabályzatnak megfelelően ellenőrizze és döntsön róluk!</p>
</template>

<style scoped>

</style>