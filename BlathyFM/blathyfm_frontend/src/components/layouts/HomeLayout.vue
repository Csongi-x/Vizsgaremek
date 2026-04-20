<script>
import {http} from "@/utils/http.js";

export default {
  name: 'HomeLayout',
  data() {
    return {
      playedSongs: [], // már lejátszott zenék
      playlist: [] // lejátszandó zenék, az első lesz az, ami aktuálisan megy
    }
  },
  computed: {
    actualSong() {
      return this.playlist[0]
    },
    upcomingMusic() {
      return this.playlist.filter(music => music.id !== this.actualSong.id)
    }
  },
  methods:{
    async loadData(){
      this.loading = true
      try{
        let response = await http.get('/api/playlist')
        this.playlist = response.data.playlist
        response = await http.get('/api/playedlist')
        this.playedSongs = response.data.played_list
      }catch(e){
        this.error = e.message
      }finally{
        this.loading = false
      }
    }
  },
  async mounted(){
    this.loadData()
  }
}
</script>

<template>
  <section class="fm-container">
    <!--Baloldali kártya article-->
    <article class="card-container playlist-main">
      <h2 v-if="actualSong !== undefined" class="title">{{`${this.actualSong.author} - ${this.actualSong.title}`}}</h2>
      <h2 v-else class="title">Az iskolarádió jelenleg nem üzemel.</h2>
      <ul>
        <li v-for="song in upcomingMusic" :key="song.id">
          {{song.author}} - {{song.title}} - ({{song.length}})
        </li>
      </ul>
    </article>

    <!--Jobb felső blokk, kijelentkezés, zene rendezés ->gombok-->
    <article class="buttons yellow-box login-info">
      <router-view/>
    </article>

    <!--jobb alsó blokk, lejátszott zenék-->
    <article class="card-container history">
      <h2 class="title">Lejátszott zenék</h2>
      <ul>
        <li v-for="song in playedSongs" :key="song.id">
          {{song.author}} - {{song.title}} (<!-- amikor indult -->)
        </li>
      </ul>
    </article>
  </section>
</template>

<style>
.fm-container{
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-areas:
    "left right-top"
    "left right-bottom";
  gap: 10px;
  background-color: transparent;
  padding: 10px;
  height: 90vh;
}

/* mobil */
@media(max-width: 768px){
  .fm-container{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-areas:
  "left"
  "right-top"
  "right-bottom";
    gap: 10px;
    background-color: #333;
    padding: 10px;
    min-height: 100vh;
    color: black;
  }
}

.title{
  margin: 0;
  font-size: 1rem;
  width: 100%;
}

/*elemek elhelyezése*/
.playlist-main {
  grid-area: left;
  display: flex;
  flex-direction: column;
}
.login-info{
  grid-area: right-top;
}
.history{
  grid-area: right-bottom;
}

/*Styling*/
.yellow-box {
  background-color: gold;
  border: 2px solid black;
  font-weight: bold;
}

.card-container {
  border: 3px solid black;
  background: white;
}

.title {
  padding: 1%;
  border-bottom: 3px solid black;
  font-size: 1.41rem;
  background-color: gold;
}

ul {
  list-style: none;
  padding: 15px;
  margin: 0;
  background: white;
  flex-grow: 1;
}

li {
  padding: 2vh;
  margin: 0 2vh 0 2vh;
  border: 2px solid black;
}

p {
  padding: 10px;
  margin: 0;
  font-size: 0.9rem;
}

button.title:hover{
  background-color: goldenrod;
}
</style>