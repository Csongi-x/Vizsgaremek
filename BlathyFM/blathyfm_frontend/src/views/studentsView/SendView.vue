<script>
import {http} from "@/utils/http.js";
import AcceptableMusicRow from "@/components/music-row/AcceptableMusicRow.vue";
import SavableMusicRow from "@/components/music-row/SavableMusicRow.vue";
import BeforeAcceptMusicRow from "@/components/music-row/BeforeAcceptMusicRow.vue";
import acceptableMusicRow from "@/components/music-row/AcceptableMusicRow.vue";

export default {
  name: 'SendView',
  components: {
    SavableMusicRow,
    AcceptableMusicRow,
    BeforeAcceptMusicRow
  },
  data() {
    return {
      author: '',
      title: '',
      minute: '',
      second: '',
      link: '',
      genre: '',
      genres: ["hit", "rock", "metal", "pop", "hip-hop", "jazz", "reggae", "alternative", "vaporwave", "country", "electronic", "folk", "other"],
      genresHu: ["Sláger", "Rock and roll", "Metal", "Pop", "Hip-hop", "Jazz", "Reggae", "Alternatív", "Vaporwave", "Vidékies/Country", "Elektronikus", "Népzene", "Egyéb"],
      acceptedAndDeclinedMusic: [],
      loading: false,
      error: ''
    }
  },
  computed: {
    length() {
      const second = this.second < 10 ? `0${this.second}` : `${this.second}`
      return `${this.minute}:${second}`
    },
  },
  methods: {
    loadGenres() {
      let x = 0
      const select = document.querySelector("select")
      for (let genre of this.genres) {
        let option = document.createElement("option")
        option.value = genre
        option.textContent = this.genresHu[x]
        select.add(option)
        x++
      }
    },
    async loadMusic() {
      this.loading = true
      this.error = ''
      try {
        const response = await http.get('/api/accepted_music')
        this.acceptedAndDeclinedMusic = response.data.acceptedMusic
      } catch (error) {
        this.error = `Hiba: ${error}`
      } finally {
        this.loading = false
      }
    },
    isIn(string, array) {
      for (let element of array) if (string === element) return true
      return false
    },
    async isTheLinkUnique(linkToCheck) {
      try {
        let response = await http.get('/api/acceptable_music')
        let response2 = await http.get('/api/music')
        let response3 = await http.get('/api/accepted_music')
        response = response.data.acceptableMusic
        response2 = response2.data.musicJson
        response3 = response2.data.acceptedMusic
        if (response.some(m => m.link === linkToCheck)) return false
        if (response2.some(m => m.link === linkToCheck)) return false
        if (response3.some(m => m.link === linkToCheck)) return false
      } catch (_) { }
      return true
    },
    async send() {
      this.error = ''
      // validáció
      if (this.author === '') this.error = 'Az előadó nevét kötelező megadni!'
      else if (this.author.length > 100) this.error = 'Az előadó neve nem lehet hosszabb 100 karakternél!'
      else if (this.title === '') this.error = 'A zene címét kötelező megadni!'
      else if (this.title.length > 100) this.error = 'A zene címe nem lehet hosszabb 100 karakternél!'
      else if ( // tartomány vizsgálat
          this.length.length !== 4
          || this.minute < 1
          || this.minute > 9
          || isNaN(this.minute)
          || isNaN(this.second)
          || this.second < 0
          || this.second > 59
      ) {
        this.error = 'A hossz formátuma nem megfelelő, vagy az elfogadható tartományon kívülre (1:00-9:59) esik!'
      }
      else if (!this.isIn(this.genre, this.genres)) this.error = 'A műfaj érvénytelen!'
      else if (this.link === '') this.error = 'A zene linkjét kötelező megadni!'
      else if (!await this.isTheLinkUnique(this.link)) this.error = 'Ennek a zenének a linkje már szerepel az adatbázisban!'
      else if (this.link.length > 100) this.error = 'A link nem lehet hosszabb 100 karakternél!'
      else {
        const newMusic = {
          author: this.author,
          title: this.title,
          length: this.length,
          genre: this.genre,
          link: this.link
        }
        this.$emit('send', newMusic)
      }
    }
  },
  mounted() {
    this.loadGenres()
    this.loadMusic()
  },
  emits: ['send']
}
</script>

<template>
  <section class="row">
    <article class="leftCard col-12 col-sm-12 col-md-6 col-lg-6">
      <form @submit.prevent="send">
        <table>
          <tr>
            <td class="label">Előadó:</td>
            <td class="input">
              <input id="author" name="author" v-model="author" max="100" required>
            </td>
          </tr>
          <tr>
            <td class="label">Cím:</td>
            <td class="input">
              <input id="title" name="title" v-model="title" max="100" required>
            </td>
          </tr>
          <tr>
            <td class="label">Hossz:</td>
            <td class="input">
              <input type="number" min="1" max="9" id="minute" name="minute" v-model="minute" required>
              &nbsp;:&nbsp;
              <input type="number" min="0" max="59" id="second" name="second" v-model="second" required>
            </td>
          </tr>
          <tr>
            <td class="label">Link:</td>
            <td class="input">
              <input id="link" name="link" v-model="link" max="100" required>
            </td>
          </tr>
          <tr>
            <td class="label">Műfaj:</td>
            <td class="input">
              <select name="genre" id="genre" v-model="genre">

              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">Elfogadott oldalak: YouTube</td>
          </tr>
          <tr class="spaceFiller">
            <td colspan="2" class="error" v-if="error !== ''">{{error}}</td>
          </tr>
          <tr>
            <td colspan="2">
              <button type="submit">Beküldés</button>
            </td>
          </tr>
        </table>
      </form>
    </article>
    <article class="rightCard col-12 col-sm-12 col-md-6 col-lg-6">
        <SavableMusicRow :music="music" v-for="music in acceptedAndDeclinedMusic" :key="music.id"/>
    </article>
  </section>
</template>

<style scoped>
article {
  border: 2px solid black;
  padding: .5vh;
  width: 49%;
  margin: .5%;
  height: 80vh;
}

.leftCard {
  background-color: gold;
}

.rightCard {
  background-color: white;
  overflow: scroll;
}

.error {
  border: 2px solid #200;
  background-color: #F44;
  padding: 2vh;
}

.spaceFiller {
  height: 50vh;
}

input, select, button {
  background-color: white;
  width: 100%;
}

input#minute {
  width: 5rem;
}

input#second {
  width: 10rem;
}

input, select {
  border: 2px solid black;
}

button {
  background-color: gold;
  border: 2px solid black;
  text-align: center;
}

.label {
  width: 20%;
  text-indent: .2rem;
}

table, .input {
  width: 100%;
}
</style>