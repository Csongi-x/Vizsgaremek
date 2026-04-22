<script>
import AcceptableMusicRow from '@/components/music-row/AcceptableMusicRow.vue'
import SavableMusicRow from '@/components/music-row/SavableMusicRow.vue'
import Spinner from "@/components/Spinner.vue";
import {http} from "@/utils/http.js";

export default {
  name: "AdminView",
  components: {
    Spinner,
    AcceptableMusicRow,
    SavableMusicRow
  },
  data() {
    return {
      pendingMusic: [], // ide a várólista táblát
      savableMusic: [], // a várólistából ide kerülnek majd a zenék elf./elu. után
      pendingMusicBackup: [], // "Mégse" esetén legyen miből visszaállítani a sorrendet
      loading: false,
      error: ''
    }
  },
  methods: {
    async loadAcceptableMusic() {
      this.loading = true
      this.error = ''
      try{
        const response = await http.get('api/acceptable_music');
        this.pendingMusic = response.data.acceptable_music;
      }catch(error){
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    openLink(link) {
      open(link)
    },
    acceptOrDecline({id, accepted}) {
      const music = this.pendingMusic.find(m => m.id === id)
      if (music) this.savableMusic.push({
        id: music.id,
        author: music.author,
        title: music.title,
        length: music.length,
        genre: music.genre,
        link: music.link,
        accepted: accepted
      })
      this.pendingMusic = this.pendingMusic.filter(m => m !== music)
    },
    async saveChanges() {
      const music = this.savableMusic
      console.log(music)
      try {
        const response = await http.post('/api/accepted_music', music)
        alert(response.data.message)
      } catch {
        alert('Sajnos a zenék kiszűrése szerverhiba miatt meghiúsult.')
      }
      this.savableMusic = []
    },
    deleteChanges() {
      this.pendingMusic = this.pendingMusicBackup
      this.savableMusic = []
    }
  },
  mounted() {
    this.loadAcceptableMusic()
    this.pendingMusicBackup = this.pendingMusic
  }
}
</script>

<template>
<section class="row">
  <article class="col-12 col-sm-12 col-lg-6 col-xl-6">
    <div class="list-group list-group-flush">
      <Spinner v-if="loading"/>
      <div class="musicGrid">
        <AcceptableMusicRow  v-for="music in pendingMusic" :key="music.id" :music="music"
                             @open-link="openLink" @accept="acceptOrDecline" @decline="acceptOrDecline" />
      </div>
    </div>
  </article>
  <article class="col-12 col-sm-12 col-lg-6 col-xl-6">
    <div class="musicList">
        <SavableMusicRow v-for="music in savableMusic" :key="music.id" :music="music"/>
    </div>
    <div class="buttons">
      <button @click="saveChanges">Mentés</button>
      <button @click="deleteChanges">Mégse</button>
    </div>
  </article>
</section>
</template>

<style scoped>
/* Készítette: Susán Csongor */
article {
  border: 2px solid black;
  height: 85vh;
  width: 88vh;
  margin: .33vh;
  background-color: white;
  padding: 0;
}

.musicList {
  height: 74.33vh;
  overflow: scroll;
  border-bottom: 1px solid black;
}

.buttons {
  height: 25vh;
}

button {
  text-align: center;
  background-color: gold;
  border: 2px solid black;
  padding: .7vh;
  width: 100%;
}

.musicGrid {
  padding: .75rem;
  margin: .5rem;
  height: 80vh;
  overflow-x: hidden;
  overflow-y: scroll;
}
</style>