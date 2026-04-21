<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "NavBar"
})
</script>

<template>
<nav class="navbar">
  <h1 class="h4">BláthyFM</h1>
</nav>
</template>

<style scoped>
/* padding módosítása 0.5remről 1remre, középre igazítás, h4->h1: Susán Csongor
 minden más: El-Nabulsy Csongor */
.navbar{
  justify-content: center !important;
  background-color: gold;
  border-bottom: 2px solid black !important;
  padding: 1rem !important;
}
</style>