<script>
import NavBar from "@/components/NavBar.vue";
import FooterView from "@/components/FooterView.vue";
export default{
  name: "Home",
  components:{NavBar, FooterView},
  data(){
    return{
      playlist:[],
      history:[]
    }
  },
  methods:{
    login(){
      this.$router.push({name: 'login'})
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
      <h2 class="yellow-box title">{{playlist[0]?.title || 'Aktuális lejátszási lista'}}</h2>
      <ul class="song-list">
        <li v-for="(song, index) in playlist" :key="index">{{song.artist}} - {{song.title}} - ({{song.time}})</li>
      </ul>
    </section>

    <!--Ez lesz a bejelentkezés blokk-->
    <section class="yellow-box login-info">
      <button class="title border-bottom border-dark" @click="login">Bejelentkezés</button>
      <p>A program teljes értékű használatához a Bláthy-ba járó diákok és az ott dolgozó személyzet jogosult.</p>
    </section>

    <!--Már lejátszott számok-->
    <section class="card-container history">
      <h2 class="yellow-box title">Lejátszott zenék</h2>
      <ul class="song-list">
        <li v-for="(song, index) in history" :key="index">{{song.artist}} - {{song.title}} - ({{song.time}})</li>
      </ul>
    </section>

  </main>
  <footer>
    <FooterView/>
  </footer>
</template>

<style>
/*Rácsos elrendezés*/
.fm-container{
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-areas:
  "right-top"
  "left right-bottom";
  gap: 15px;
  background-color: #333;
  padding: 20px;
  min-height: 100vh;
  color: black;
}
@media (max-width: 768px) {
  .fm-container {
    grid-template-columns: 1fr;
    grid-template-areas:
      "right-top"
      "left"
      "right-bottom";
  }
}
/*elemek elhelyezése*/
.playlist-main{
  grid-area: left;
  display: flex;
  flex-direction: column;
  height: 100%;
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

button.title{
  width: 100%;
  text-align: center;
  background: none;
  border-bottom: 10px;
  cursor: pointer;
  display: block;
}
button.title:hover{
  background-color: rgba(0,0,0,0.85);
}

</style>