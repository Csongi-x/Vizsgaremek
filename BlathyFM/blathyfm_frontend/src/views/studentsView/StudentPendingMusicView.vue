<script>
import http from "@/utils/http.js";
import Spinner from "@/components/Spinner.vue";

export default {
  name: 'StudentPendingMusicView',
  components: {Spinner},
  data() {
    return {
      beforeAccept: [],
      loading: false,
      error: ''
    }
  },
  methods: {
    async loadAcceptableMusic() {
      this.loading = true
      this.error = ''
      try {
        const response = await http.get('/api/acceptable_music')
        this.beforeAccept = response.data.acceptable_music
      } catch {
        this.error = 'Sajnos az ellenőrzés előtt álló zenék listája nem kérhető le szerverhiba miatt.'
      } finally {
        this.loading = false
      }
    }
  },
  mounted() {
    this.loadAcceptableMusic()
  }
}
</script>

<template>
  <section class="row g-0">
    <article class="col-md-1 col-lg-1 nothing"></article>
    <article class="col-12 col-sm-12 col-md-10 col-lg-10 main">
      <h1 class="h3">Ellenőrzés előtt álló zenék</h1>
      <div class="musicList">
        <Spinner v-if="loading"/>
        <p class="error" v-if="this.error !== ''">{{error}}</p>
        <p v-for="music in beforeAccept" :key="music.id">
          {{music.author}} - {{music.title}} ({{music.length}})
        </p>
      </div>
    </article>
    <article class="col-md-1 col-lg-1 nothing"></article>
  </section>
</template>

<style scoped>
.nothing {
  background-color: transparent;
  border: 0;
}
.h3 {
  background-color: gold;
  padding: .5vh;
  border-bottom: 2px solid black;
}
.musicList {
  height: 78vh;
  overflow-x: hidden;
  overflow-y: scroll;
}
p {
  margin: 1vh;
  padding: 3vh;
  border: 2px solid black;
}
</style>