<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "NavBar"
})
</script>

<template>
<nav class="navbar">
  <h4>BláthyFM</h4>
</nav>
</template>

<style scoped>
/* padding módosítása 0.5remről 1remre, középre igazítás: Susán Csongor
 minden más: El-Nabulsy Csongor */
.navbar{
  justify-content: center !important;
  background-color: gold;
  border-bottom: 2px solid black !important;
  padding: 1rem !important;
}
</style>