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
  <main class="fm-container">
    <section class="left-panel">
      <div class="search-bar">
        <span class="search-icon">🔍</span>
        <input type="text" placeholder="Keresés...">
      </div>

      <div class="song-grid">
        <div v-for="song in songs" :key="song.id" class="song-card">
          <div class="song-info">
            {{ song.author }} - {{ song.title }} {{ song.duration ? `(${song.duration})` : '' }}
          </div>
          <button class="add-btn" @click="selectSong(song)">+</button>
        </div>
      </div>
    </section>

    <aside class="right-panel">
      <div class="pagination-box">
        <div class="page-number">1 / 586</div>
        <div class="nav-buttons">
          <button>&lt;&lt;</button>
          <button>&lt;</button>
          <button>&gt;</button>
          <button>&gt;&gt;</button>
        </div>
      </div>

      <button class="menu-btn">Lejátszási lista megtekintése</button>
      <button class="menu-btn active">Új zene bekérése</button>
      <div class="empty-slot"></div>
    </aside>
  </main>
</template>

<style scoped>
/* Alapszínek és elrendezés */
.fm-container {
  display: grid;
  grid-template-columns: 1fr 250px; /* Bal oldal rugalmas, jobb oldal fix */
  gap: 15px;
  background-color: #333;
  padding: 15px;
  color: black;
  font-family: sans-serif;
}

/* Bal oldal */
.left-panel {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.search-bar {
  background-color: #fff;
  border: 3px solid #ffcc00;
  display: flex;
  align-items: center;
  padding: 5px 10px;
}

.search-bar input {
  border: none;
  outline: none;
  width: 100%;
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
  background-color: #ffcc00;
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
  background-color: #ffcc00;
  border: 2px solid black;
  padding: 5px;
  font-weight: bold;
}

.menu-btn {
  background-color: #ffcc00;
  border: 2px solid black;
  padding: 15px;
  text-align: left;
  font-size: 14px;
  cursor: pointer;
}

.empty-slot {
  background-color: #ffcc00;
  border: 2px solid black;
  flex-grow: 1; /* Kitölti a maradék helyet */
}
</style>
