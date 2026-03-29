<script>
export default {
  name: 'HomeLayout',
  data() {
    return {
      playedSongs: [
        {
          id: 1,
          author: "Falco",
          title: "Europa",
          length: "5:08",
          link: "https://www.youtube.com/watch?=..."
        },
        {
          id: 2,
          author: "Alphaville",
          title: "Big in Japan",
          length: "4:45",
          link: "https://www.youtube.com/watch?=..."
        }
      ], // már lejátszott zenék
      playlist: [
        {
          id: 1,
          author: "Falco",
          title: "Einzelhaft",
          length: "4:01",
          link: "https://www.youtube.com/watch?=..."
        },
        {
          id: 2,
          author: "C418",
          title: "Haunt Muskie",
          length: "6:02",
          link: "https://www.youtube.com/watch?=..."
        }
      ], // lejátszandó zenék, az első lesz az, ami aktuálisan megy
    }
  },
  computed: {
    actualSong() {
      return this.playlist[0]
    },
    upcomingMusic() {
      return this.playlist.filter(music => music.id !== this.actualSong.id)
    }
  }
}
</script>

<template>
  <section class="fm-container">
    <!--Baloldali kártya article-->
    <article class="card-container playlist-main">
      <h2 class="title">{{`${this.actualSong.author} - ${this.actualSong.title}`}}</h2>
      <ul>
        <li v-for="song in upcomingMusic" :key="song.id">
          {{song.author}} - {{song.title}} - ({{song.time}})
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
  background-color: #333;
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
  padding: 2px 0;
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