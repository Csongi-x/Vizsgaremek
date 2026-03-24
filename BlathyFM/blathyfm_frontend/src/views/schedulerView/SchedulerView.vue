<script>
export default{
  name: "SchedulerView",
  data(){
    return{
      songs:[],
      playlist:[],//lesz egy gomb a zenék mellett és ha rányom a rendező akkor egy methoddal hozzáadja a playlist-hez
      requestedSongs:[],
      loading: false,
      error: '',
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
    addMusicToPlaylist(){

    }
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

  </div>
  <div><!--itt azt nézi meg hogy benne van e a playlistben-->

  </div>
  <div><!--itt pedig az összes többi (v-else)-->

  </div>
  <!--2. oszlop amibe elágazással hogy bekért zene e vagy nem-->

  <!--3. oszlop megint elágazással, amelyik meg be lett rakva a lejátszási listára-->
</section>
</template>

<style scoped>

</style>