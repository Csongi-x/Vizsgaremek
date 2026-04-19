<script>
import SchedulerMusicRow from "@/components/music-row/SchedulerMusicRow.vue";
import RequestView from "@/views/studentsView/RequestView.vue";
import {http} from '@/utils/http.js'
import Spinner from "@/components/Spinner.vue";
import PlaylistMusicRow from "@/components/music-row/PlaylistMusicRow.vue";

//music, requestedMusic, playlist -» ezek kellenek
export default{
  name: "SchedulerView",
  components: {PlaylistMusicRow, Spinner, SchedulerMusicRow, RequestView},
  data(){
    return{
      songs:[],// Minden zene
      playlist:[],//lesz egy gomb a zenék mellett és ha rányom a rendező akkor egy methoddal hozzáadja a playlist-hez
      requestedSongs:[],
      loading: false,
      error: ''
    }
  },
  methods:{
    async fetchMusic(){
      this.loading = true
      this.error = '';
      try{
        //BACKEND CONTROLLERBEN /music AZ ÚTVONAL
        const response = await http.get('/api/music');
        this.songs = response.data.musicJson;
      }catch(error){
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    addMusicToPlaylist(song){
      const exists = this.playlist.find(item => item.id === song.id)
      if(!exists){
        this.playlist.push(song)//csak akkor adja hozzá ha még nincs benne
      }
    },
    async loadData(){
      this.loading = true;
      this.error = ''
      try{
        const [music, requestedMusic, playlist] = await Promise.all([
          axios.get('http://api/music'),
          axios.get('http://api/requestedMusic'),
          axios.get('http://api/playlist')
        ])
        this.songs = music.data
        this.requestedSongs = requestedMusic.data
        this.playlist = playlist.data
      }catch(err){
        this.error = err.message
      }finally{
        this.loading = false;
      }
    },
    up(id) {
      if (id > 1) {
        // feljebb rakni
      }
    },
    down(id) {
      // lejjebb rakni
    },
    deleteFromPlaylist(id) {
      // törölni
    }
  },
  mounted(){
    //itt hívom meg az adatlekérést hogy betöltse a songs tömböt
    this.fetchMusic();
    this.loadData();
  }
}
</script>

<template>
  <section class="row px-5 m-2">
    <!--1. oszlop ami minden zene-->
    <article class="col-12 col-md-6 col-lg-4"><!-- itt azt nézze meg hogy be lett e kérve ez a zene-->
        <h1 class="h2 row">
          <span class="col-12 col-md-6 col-lg-6">
            Zenék
          </span>
          <span class="query col-12 col-md-6 col-lg-6 row justify-content-center">
            <i class="bi bi-search col-2"/>
            <input class="fullBorder mw-100 col-10">
          </span>
        </h1>
      <div class="allMusic">
        <Spinner v-if="loading"/>
        <SchedulerMusicRow v-for="song in songs" :key="song.id" :song="song" @add-to-playlist="addMusicToPlaylist"/>
      </div>
    </article>

    <!--2. oszlop amibe elágazással hogy bekért zene e vagy nem-->
    <article class="requestedMusic col-12 col-md-6 col-lg-4">
      <Spinner v-if="loading"/>
      <SchedulerMusicRow v-for="requestData in requestedSongs" :song="requestData" @add-to-playlist="addMusicToPlaylist"/>
    </article>

    <!--3. oszlop megint elágazással, amelyik meg be lett rakva a lejátszási listára-->
    <article class="col-12 col-md-6 col-lg-4">
      <h1 class="h2"></h1>
      <div v-if="playlist.length === 0">A lejátszási lista üres</div>
      <div v-else>
        <div v-for="song in playlist" :key="song.id">
          <PlaylistMusicRow v-for="music in playlist" :key="music.id" :music="music" @up="up" @down="down"
                            @delete="deleteFromPlaylist"/>
        </div>
      </div>
    </article>
  </section>
</template>

<style scoped>
article {
  border: 3px solid black;
  background-color: white;
  height: 85vh;
}
.allMusic, .requestedMusic {
  overflow: scroll;
  height: 75vh;
}
.fullBorder {
  border: 3px solid black;
}
.h2 {
  border-bottom: 3px solid black;
  background-color: gold;
}
.query {
  border-left: 3px solid black;
}
i::before {
  left: 8vh
}
input {
  height: 90%;
}
</style>