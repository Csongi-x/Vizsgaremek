<script>
export default {
  name: 'HomeLayout',
  data() {
    return {
      playedSongs: [], // már lejátszott zenék
      playlist: [], // lejátszandó zenék, az első lesz az, ami aktuálisan megy
    }
  },
  computed: {
    actualSong() {
      return `${this.playlist[0].author} - ${this.playlist[0].title}`
    },
    upcomingMusic() {
      return this.playlist.filter(music => music.id !== this.actualSong.id)
    }
  }
}
</script>

<template>
  <main class="fm-container">
    <!--Baloldali kártya section-->
    <section class="card-container playlist-main">
      <h2 class="title">{{actualSong}}</h2>
      <ul>
        <li v-for="song in upcomingMusic" :key="song.id">
          {{song.artist}} - {{song.title}} - ({{song.time}})
        </li>
      </ul>
    </section>

    <!--Jobb felső blokk, kijelentkezés, zene rendezés ->gombok-->
    <section class="buttons yellow-box login-info">
      <router-view/>
    </section>

    <!--jobb alsó blokk, lejátszott zenék-->
    <section class="card-container history">
      <h2 class="title">Lejátszott zenék</h2>
      <ul class="song-list">
        <li v-for="song in playedSongs" :key="song.id">
          {{song.artist}} - {{song.title}} - (<!-- amikor indult -->)
        </li>
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