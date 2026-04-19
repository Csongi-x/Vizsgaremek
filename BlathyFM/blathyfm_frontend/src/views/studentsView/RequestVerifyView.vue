<script>
import {http} from "@/utils/http.js";

export default {
  name: "RequestVerifyView",
  data(){
    return{
      music: {},
      message: ''
    }
  },
  methods:{
    async loadMusicById(id) {
      try {
        const response = await http.get(`/api/music/${id}`)
        this.music = response.data.music
      } catch {
        alert('Sajnos a zene nem kérhető le a szerver meghibásodása vagy leállása miatt.')
      }
    },
    sendSong(){
      this.$emit('request:song', {id: this.music.id, message: this.message})
    }
  },
  mounted() {
    this.loadMusicById(this.$route.params.id)
  },
  emits: ['request:song']
}
</script>

<template>
  <section class="col-md-1 col-lg-3"/>
    <section class="col-12 col-sm-12 col-md-10 col-lg-6 card-container send-form">
      <table>
        <tr>
          <td>Előadó:&nbsp;</td>
          <td class="data">{{ music.author }}</td>
        </tr>
        <tr>
          <td>Cím:&nbsp;</td>
          <td class="data">{{ music.title }}</td>
        </tr>
        <tr>
          <td>Hossz:&nbsp;</td>
          <td class="data">{{ music.length }}</td>
        </tr>
      </table>
      <textarea rows="6" v-model="message" placeholder="Üzenet (opcionális)"></textarea>
      <button class="title" @click="sendSong">Bekérés</button>
    </section>
  <section class="col-md-1 col-lg-3"/>
</template>

<style scoped>
.send-form{
  background:gold;
  padding:20px;
  border:2px solid black;
  width:400px;
  display:flex;
  flex-direction:column;
  gap:10px;
}

input, textarea {
  padding:6px;
  border: 2px solid black;
}

.data {
  background-color: yellow;
  border: 2px solid black;
  width: 88%;
}

button{
  background: gold;
  border: 2px solid black;
  padding: 10px;
  cursor:pointer;
  font-weight:bold;
}

button:hover{
  background:black;
  color:white;
}

.title{
  margin: 0;
  font-size: 1rem;
  width: 100%;
  border-top: 2px solid black;
  text-align: center;
}
</style>