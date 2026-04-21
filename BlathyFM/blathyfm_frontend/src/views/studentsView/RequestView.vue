<script>

import {http} from "@/utils/http.js";
import RequestableMusicRow from "@/components/music-row/RequestableMusicRow.vue";

export default{
  name: "RequestView",
  components: {RequestableMusicRow},
  data(){
    return{
      songs:[], //elérhető zenék
      selectedSong: null,
      query: '',
      loading: false,
      pageNumber: 1, // oldalszám
      error: ''
    }
  },
  computed: {
    maxPageNumber() { // legmagasabb oldalszám
      return Math.ceil(this.songs.length / 12)
    },
    songsToDisplay() { // az oldalszámnak megfelelően jeleníti meg mindig a zenéket
      if (this.songs.length === 0) return []
      let songsToDisplay = []
      const start = (this.pageNumber - 1) * 12
      const end = start + 12
      for (let x = start; x < end; x++) if(x < this.songs.length) songsToDisplay.push(this.songs[x])
      return songsToDisplay
    }
  },
  methods:{
    async loadMusic() {
      this.loading = true
      this.error = ''
      try {
        const response = await http.get('/api/music')
        this.songs = response.data.musicJson
      } catch (error) {
        this.error = 'A zenék jelenleg sajnos nem elérhetőek. Kérjük, próbálkozz később!'
      } finally {
        this.loading = false
      }
    },
    toOne() {
      this.pageNumber = 1
    },
    minusOne() {
      if (this.pageNumber > 0) this.pageNumber--
    },
    plusOne() {
      if (this.pageNumber < this.maxPageNumber) this.pageNumber++
    },
    toLast() {
      this.pageNumber = this.maxPageNumber
    },
    send(){
      this.$router.push({name: 'send'})
    },
    toPlaylist(){
      this.$router.push({name: 'student-home'})
    }
  },
  mounted() {
    this.loadMusic();
  }
}
</script>

<template>
  <section class="fm-container">
    <article class="left-panel">
      <h2 class="h3 search-bar">
        <span class="search-icon">
          <i class="bi bi-search"/>
        </span>
        <input v-model="query">
      </h2>
      <div class="song-grid">
        <RequestableMusicRow v-for="music in songsToDisplay" :key="music.id" :music="music"/>
      </div>
    </article>

    <aside class="right-panel">
      <div class="pagination-box">
        <div class="page-number">
          <input type="number" v-model.number="pageNumber" min="1" :max="maxPageNumber">
          &nbsp;/&nbsp;{{ maxPageNumber }}
        </div>
        <div class="nav-buttons">
          <button @click="toOne">
            <i class="bi bi-chevron-double-left"/>
          </button>
          <button @click="minusOne">
            <i class="bi bi-chevron-left"/>
          </button>
          <button @click="plusOne">
            <i class="bi bi-chevron-right"/>
          </button>
          <button @click="toLast">
            <i class="bi bi-chevron-double-right"/>
          </button>
        </div>
      </div>

      <div class="slots">
        <button class="menu-btn" @click="toPlaylist">Lejátszási lista megtekintése</button>
        <button class="menu-btn active" @click="send">Új zene bekérése</button>
      </div>
    </aside>
  </section>
</template>

<style scoped>
/* Alapszínek és elrendezés */
.fm-container {
  display: grid;
  grid-template-columns: 1fr 250px; /* Bal oldal rugalmas, jobb oldal fix */
  gap: 15px;
  padding: 15px;
  color: black;
}

.right-panel, .slots {
  border: 2px solid black;
  background-color: white;
}

/* Bal oldal */
.left-panel {
  display: flex;
  flex-direction: column;
}

.search-bar {
  background-color: gold;
  border: 3px solid black;
  display: flex;
  align-items: center;
  padding: 2px 8px;
}

.search-bar input {
  outline: none;
  width: 100%;
  background-color: white;
  border: 2px solid black;
  margin-left: 10px;
}

/* Zene kártyák 2 oszlopban */
.song-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}

.song-card {
  background-color: white;
  border: 2px solid black;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-left: 10px;
  height: 45px;
}
 
.add-btn {
  background-color: gold;
  border: none;
  border-left: 2px solid black;
  width: 45px;
  height: 100%;
  font-size: 24px;
  cursor: pointer;
}

/* Jobb oldal */
.right-panel {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.slots {
  background-color: gold;
  border: 2px solid black;
  flex-grow: 1; /* Kitölti a maradék helyet */
}

.pagination-box {
  background-color: white;
  padding: 15px;
  text-align: center;
}

.page-number {
  border: 2px solid black;
  display: inline-block;
  padding: 5px 15px;
  margin-bottom: 10px;
}

.nav-buttons {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
}

.nav-buttons button {
  background-color: gold;
  border: 2px solid black;
  padding: 5px;
  font-weight: bold;
}

.menu-btn {
  background-color: gold;
  border: 2px solid black;
  padding: 15px;
  text-align: left;
  font-size: 14px;
  cursor: pointer;
  width: 100%;
}
</style>