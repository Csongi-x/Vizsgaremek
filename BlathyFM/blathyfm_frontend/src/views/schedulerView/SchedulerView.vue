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
      playlistSongs:[],//lesz egy gomb a zenék mellett és ha rányom a rendező akkor egy methoddal hozzáadja a playlist-hez
      requestedSongs:[],
      loading: false,
      error: '',
      searchQuery: '',
    }
  },
  methods:{
    async fetchAllMusic(){
      this.loading = true
      this.error = '';
      try{
        //BACKEND CONTROLLERBEN /music AZ ÚTVONAL
        const response = await http.get('api/music');
        this.songs = response.data.musicJson;
      }catch(error){
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    async fetchSentMusic(){
      this.loading = true
      this.error = '';
      try{
        const response = await http.get('api/request');
        this.requestedSongs = response.data.requested_music;
      }catch(error){
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },async fetchPlaylist(){
      this.loading = true
      this.error = '';
      try{
        const response = await http.get('api/playlist');
        this.playlistSongs = response.data.playlist;
      }catch(error){
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    addMusicToPlaylist(song){
      console.log("Hozzáado zene adatai: ", song);
      const exists = this.playlistSongs.find(item => item.id === song.id)
      if(!exists){
        this.playlistSongs.push({...song})//csak akkor adja hozzá ha még nincs benne
      }else{
        alert("Ez a zene már szerepel a listán");
      }
    },

    up(id) {
      const index = this.playlistSongs.findIndex(song => song.id === id);
      if(index > 0){
        const element = this.playlistSongs.splice(index, 1)[0];
        this.playlistSongs.splice(index - 1, 0, element);
      }
    },
    down(id) {
      // lejjebb rakni
      const index = this.playlistSongs.findIndex(song => song.id === id);
      if(index !== -1 && index < this.playlistSongs.length -1){
        const element = this.playlistSongs.splice(index, 1)[0];
        this.playlistSongs.splice(index + 1, 0, element);
      }
    },
    deleteFromPlaylist(id) {
      // törölni
      const index = this.playlistSongs.findIndex(song => song.id === id);
      if(index !== -1){
        this.playlistSongs.splice(index, 1);
      }
    }
  },
  computed:{
    filteredSongs(){
      if(!this.searchQuery){
        return this.songs;
      }
      const query = this.searchQuery.toLowerCase();

      return this.songs.filter(song => song.title.toLowerCase().includes(query) || song.author.toLowerCase().includes(query));
  },
  },
  mounted(){
    //itt hívom meg az adatlekérést hogy betöltse a songs tömböt
    this.fetchAllMusic();
    //this.loadData();
    this.fetchSentMusic();
    this.fetchPlaylist();
  },
}
</script>

<template>
  <section class="row px-5 m-2">
    <!--1. oszlop ami minden zene-->
    <article class=" col-12 col-md-6 col-lg-4"><!-- itt azt nézze meg hogy be lett e kérve ez a zene-->
        <h1 class="h2 row">
          <span class="col-12 col-md-6 col-lg-6">
            Zenék
          </span>
          <span class="query col-12 col-md-6 col-lg-6 d-flex align-items-center">
            <i class="bi bi-search col-2"></i>
            <!--Kereső mező-->

            <input v-model="searchQuery"  type="search" placeholder="search" class="fullBorder mw-100 col-10">
          </span>
        </h1>
      <div class="allMusic">
        <Spinner v-if="loading"/>
        <SchedulerMusicRow v-for="song in filteredSongs" :key="song.id" :song="song" @add-to-playlist="addMusicToPlaylist"/>
      </div>
    </article>

    <!--2. oszlop amibe elágazással hogy bekért zene e vagy nem-->
    <article class="requestedMusic col-12 col-md-6 col-lg-4">
      <h1 class="h2 row">
        <span class="col-12 col-md-6 col-lg-6">Bekért zenék</span>
      </h1>
      <div class="requestedMusic">
      <Spinner v-if="loading"/>
      <SchedulerMusicRow v-for="song in requestedSongs" :key="song.id" :song="song" @add-to-playlist="addMusicToPlaylist"/>
      </div>
    </article>

    <!--3. oszlop megint elágazással, amelyik meg be lett rakva a lejátszási listára-->
    <article class="col-12 col-md-6 col-lg-4">
      <h1 class="h2 row">
        <span class="col-12 col-md-6 col-lg-6">Lejátszási lista</span>
      </h1>
      <div v-if="playlistSongs.length === 0"><strong>A lejátszási lista üres!</strong></div>
      <div v-else>
        <Spinner v-if="loading"/>
          <PlaylistMusicRow v-for="music in playlistSongs" :key="music.id" :music="music" @up="up" @down="down"
                            @delete="deleteFromPlaylist"/>
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