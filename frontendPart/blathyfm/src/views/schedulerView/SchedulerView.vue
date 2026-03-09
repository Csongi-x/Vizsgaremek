<script>
export default{
  name: "SchedulerView",
  components:{

  },
  props:{
    playlist: {
      type: Array,
      required: true
    },
    history:{
      type: Array,
      required: true
    }
  },
  methods:{
    logout(){
      //Bejelentkezési adatok üresre állítása

      this.$router.push({name: 'home'})
      this.$emit('logged-out')
    },
    orderMusic(){
      //Ide kell még az oldalra való route-olás
    }
  },

}
</script>

<template>
  <!--Baloldali kártya section-->
  <section class="card-container playlist-main">
    <h2 class="title">Lejátszási lista</h2>
    <ul>
      <li v-for="song in playlist" :key="song.id">{{song.artist}} - {{song.title}}</li>
    </ul>
  </section>

  <!--Jobb gelső blokk, kijelentkezés, zene rendezés ->gombok-->
  <section class="buttons">
    <button class="button title border-bottom border-dark" @click="logout">Kijelentkezés</button>
    <button class=" button title border-bottom border-dark" @click="orderMusic">Zenék rendezése</button>
    <p>Kérjük legalább aznap 12:55-ig határozza meg, hogy milyen zenék játszódjanak le az iskolarádióban</p>
  </section>

  <!--jobb alsó blokk, llejátszott zenék-->
  <section class="card-container">
    <h2 class="title">Lejátszott zenék</h2>
    <ul>
      <li v-for="song in history" :key="song.id">{{song.artist}} - {{song.title}}</li>
    </ul>
  </section>


</template>

<style scoped>
.fm-container{
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-template-areas:
    "left right-top"
    "left right-bottom";
  gap: 10px;
  background-color: #333;
  padding: 10px;
  min-height: 100vh;
}

/* mobil */
@media(max-width: 768px){
  .fm-container{
    grid-template-columns: 1fr;
    grid-template-areas:
      "right-top"
      "left"
      "right-bottom";
  }
}

/* elhelyezés */
.playlist-main{
  grid-area: left;
  display: flex;
  flex-direction: column;
}

.buttons{
  grid-area: right-top;
}

.history{
  grid-area: right-bottom;
}

/* design */
.card-container{
  border: 1px solid black;
  background: white;
}

.title{
  margin: 0;
  font-size: 1rem;
  padding: 8px;
  background: yellow;
  border: 1px solid black;
  font-weight: bold;
}

ul{
  list-style: none;
  padding: 10px;
  margin: 0;
}

li{
  padding: 4px 0;
}

/* gombok */
button{
  width: 100%;
  display: block;
  background: yellow;
  border: 1px solid black;
  padding: 8px;
  cursor: pointer;
  font-weight: bold;
}

button:hover{
  background: black;
  color: white;
}

p{
  padding: 10px;
  font-size: 0.9rem;
}
</style>