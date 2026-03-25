<script>

export default{
  name: "RequestView",
  data(){
    return{
      songs:[], //elérhető zenék
      selectedSong: null,
      message: ""
    }
  },
  methods:{
    requestSong(){
      //hiba lehetőségek
      //legyen kiválasztva zene
      if(!this.selectedSong){
        alert("Válassz egy zenét")
        return
      }

      const requestData = {
        songId: this.selectedSong,
        message: this.message
      }
      this.$emit('add-to-playlist', this.requestData.song)
      alert("A zene bekérése elküldve!")

      //kiüríted a változókat
      this.selectedSong = null
      this.message = ""
    },

  }
}
</script>

<template>
  <!--Bal oldalt mutatja az elérhető zenéket, jobb oldalt egy bekérés form, -->
  <main class="fm-container">
    <!--Bal oldal-->
    <section class="card-container playlist-main">
      <h1 class="h4 yellow-box title">Elérhető zenék</h1>
      <ul class="song-list">;
        <li v-for="song in songs" :key="song.id">{{song.author}} - {{song.title}}</li>
      </ul>
    </section>

    <!--jobb oldal-->
    <section class="yellow-box request-box">
      <h1 class="title">Zene bekérése</h1>
      <select v-model="selectedSong">
        <option>Válassz zenét</option>
        <option v-for="song in songs" :key="song.id" :value="song.title">{{song.author}} - {{song.title}}</option>
      </select>
    </section>

    <textarea v-model="message" placeholder="Üzenet (opcionális)"></textarea>
    <button @click="requestSong">Bekérés elküldése</button>

  </main>
</template>
<style scoped>
/* style nagyrész az App.Vue-ban található */

.playlist-main{
  grid-area:left;
}

.request-box{
  grid-area:right;
}
</style>