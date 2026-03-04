<script lang="ts">
import NavBar from '@/components/NavBar.vue';

export default{
  name: "StudentHomePage",
  components:{
    NavBar
  },
  methods:{
    logout(){
      this.$router.push({name: 'home'})
    },
    send(){
      this.$router.push({name: 'send'})
    },
    request(){
      this.$router.push({name: 'request'})
    }
  }
}
</script>

<template>
  <header>
    <NavBar/>
  </header>

  <main class="fm-container">
    <!-- ez a Főképernyő login előtt-->
    <!-- ez a bal oldali sáv ahol a lejátszási listát lehet látni-->
    <section class="card-container playlist-main">
      <h2 class="yellow-box title">{{song.title}}</h2>
      <ul class="song-list">
        <li v-for="song in playlist" :key="song.time">{{song.artist}} - {{song.title}} - ({{song.time}})</li>
      </ul>
    </section>

    <!--Ez a kiejelentkezés/zene beküldés/zene bekérés blokk-->
    <section class="yellow-box login-info">
      <button class="title border-bottom border-dark" @click="logout">Kijelentkezés</button>
      <button class="title border-bottom border-dark" @click="send">Zene beküldés</button>
      <button class="title border-bottom border-dark" @click="request">Meglévő zene bekérése</button>
      <p>Meglévő: már beküldött vagy eleve bekérhető zene.</p>
    </section>

    <!--Már lejátszott számok-->
    <section class="card-container history">
      <h2 class="yellow-box title">Lejátszott zenék</h2>
      <ul class="song-list">
        <li v-for="song in history" :key="song.time">{{song.artist}} - {{song.title}} - ({{song.time}})</li>
      </ul>
    </section>

  </main>



</template>

<style scoped>
@media(max-width: 768px){
  .fm-container{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-areas:
  "head"
  "right-top"
  "left"
  "right-bottom";
    gap: 10px;
    background-color: #333;
    padding: 10px;
    min-height: 100vh;
    color: black;
  }
}


/*elemek elhelyezése*/
.playlist-main{
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
.yellow-box{
  background-color: yellow;
  border: 1px solid black;
  font-weight: bold;
  padding: 8px;
}

.card-container{
  border: 1px solid black;
  background: white;
}

.title{
  margin: 0;
  font-size: 1rem;
}

.song-list{
  list-style: none;
  padding: 15px;
  margin: 0;
  background: white;
  flex-grow: 1;
}

p{
  padding: 10px;
  margin: 0;
  font-size: 0.9rem;
}
</style>