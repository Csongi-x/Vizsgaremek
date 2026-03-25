<script>
import SchedulerMusicRow from "@/components/SchedulerMusicRow/SchedulerMusicRow.vue";
import RequestView from "@/views/studentsView/RequestView.vue";

export default{
  name: "SchedulerView",
  components: {SchedulerMusicRow, RequestView},
  data(){
    return{
      songs:[],
      playlist:[],//lesz egy gomb a zenék mellett és ha rányom a rendező akkor egy methoddal hozzáadja a playlist-hez
      requestedSongs:[],
      loading: false,
      error: '',
      requestData:{
        song:{
          required: true,
          type: Object
        }
      }
    }
  },
  methods:{
    async fetchMusic(){
      this.loading = true
      this.error = '';
      try{
        //BACKEND CONTROLLERBEN /songs AZ ÚTVONAL
        const response = await http.get('/songs');
        this.songs = response.data;
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
  },
  mounted(){
    //itt hívom meg az adatlekérést hogy betöltse a songs tömböt
    this.fetchMusic();
  }
}
</script>

<template>
  <section>
    <!--1. oszlop ami minden zene-->
    <div><!-- itt azt nézze meg hogy be lett e kérve ez a zene-->
      <SchedulerMusicRow v-for="song in songs" :key="song.id" :song="song" @add-to-playlist="addMusicToPlaylist"/>
      <div class="playlist">
        <h1 class="h2">Zenék</h1>
        <div v-for="item in playlist" :key="item.id">{{item.author}} - {{item.title}}</div>
      </div>
    </div>

    <!--2. oszlop amibe elágazással hogy bekért zene e vagy nem-->
    <div class="column">
      <RequestView :requestData="requestData" @add-to-playlist="addMusicToPlaylist"/>
    </div>
    <!--3. oszlop megint elágazással, amelyik meg be lett rakva a lejátszási listára-->
    <div class="column">
      <h1 class="h2"></h1>
      <div v-if="playlist.length === 0">Nincs még zene</div>
      <div v-else>
        <div v-for="song in playlist" :key="song.id">
          {{song.author}} - {{song.title}}
        </div>
      </div>
    </div>


  </section>
</template>

<style scoped>

</style>