<script>
import NavBar from "@/components/NavBar.vue";
import FooterView from "@/components/FooterView.vue"

export default {
  components: {
    NavBar,
    FooterView
  }
}

</script>

<template>
  <header>
    <NavBar/>
  </header>
  <main class="container">
    <router-view/>
  </main>
  <footer>
    <FooterView/>
  </footer>

</template>

<style>
/* ami itt van: Susán Csongor
  minden más: El-Nabulsy Csongor */
body {
  background-color: #333;
}
main {
  height: 88.5vh;
}
</style>
