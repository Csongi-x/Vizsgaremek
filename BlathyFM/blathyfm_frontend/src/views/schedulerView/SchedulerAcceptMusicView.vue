<script>
import AcceptableMusicRow from '@/components/music-row/AcceptableMusicRow.vue'
import SavableMusicRow from '@/components/music-row/SavableMusicRow.vue'
import savableMusicRow from "@/components/music-row/SavableMusicRow.vue";

export default {
  name: "AdminView",
  components: {
    AcceptableMusicRow,
    SavableMusicRow
  },
  data() {
    return {
      pendingMusic: [], // ide a várólista táblát
      savableMusic: [], // itt a már elfogadott vagy elutasított, de még el nem mentett zenék listája van
    }
  },
  methods: {
    openLink(link) {
      open(link)
    },
    acceptOrDecline({id, accepted}) {
      const music = this.pendingMusic.find(m => m.id === id)
      if (music) this.savableMusic.push({
        id: music.id,
        author: music.author,
        length: music.length,
        link: music.link,
        accepted: accepted
      })
    },
    saveChanges() {
      const acceptedMusic = this.savableMusic.filter(m => m.accepted)
      const declinedMusic = this.savableMusic.filter(m => !m.accepted)
      /* acceptedMusic beküldése a többi zene közé, declinedMusic pedig
         megy az elutasított zenék táblába */
    },
    deleteChanges() {

    }
  }
}
</script>

<template>
<section class="row">
  <article class="col-12 col-sm-12 col-lg-6 col-xl-6">
    <div class="list-group list-group-flush">
      <div class="musicGrid list-group-item" v-for="music in pendingMusic" :key="music.id">
        <AcceptableMusicRow :music="music" @open-link="openLink" @accept="acceptOrDecline" @decline="acceptOrDecline" />
      </div>
    </div>
  </article>
  <article class="col-12 col-sm-12 col-lg-6 col-xl-6">
    <div class="list-group list-group-flush">
      <div class="list-group-item" v-for="music in savableMusic" :key="music.id">
        <SavableMusicRow :music="music"/>
      </div>
    </div>
    <button @click="saveChanges">Mentés</button>
    <button @click="deleteChanges">Mentés</button>
  </article>
</section>
</template>

<style scoped>
/* Készítette: Susán Csongor */
article {
  border: 3px solid black;
  margin: 5vh;
  background-color: white;
}

.musicGrid {
  border: 2px solid black;
  padding: .75rem;
  margin: .5rem;
}
</style>