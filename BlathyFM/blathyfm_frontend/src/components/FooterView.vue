<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Footer"
})
</script>

<template>
  <hr>
  <!--Ki kell ezeket még tölteni-->
  <p class="yellowLine">
    <router-link class="a yellowLine" to="">Impresszum</router-link> -
    <router-link class="a yellowLine" to="">Szabályzat</router-link> -
    <router-link class="a yellowLine" to="">Hogy működik?</router-link> -
    <router-link class="a yellowLine" to="">Technika</router-link>
  </p>

  <p class="whiteLine">
    <small>&copy; 2026 2songor. Minden jog fenntartva.</small>
  </p>

</template>

<style scoped>
.a {
  text-decoration: none;
}
hr{
  border: 2px solid black;
}
.yellowLine, .whiteLine {
  text-align: center;
  padding: 0.5rem;
}
.yellowLine{
  color: gold;
}
.yellowLine:hover {
  color: #FFA;
}
.whiteLine{
  color: white;
}
</style>