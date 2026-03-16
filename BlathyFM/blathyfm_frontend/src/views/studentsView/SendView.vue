<script>
export default{
  name: "SendView",
  data(){
    return{
      author: "",
      title: "",
      message: ""
    }
  },
  methods:{
    sendSong(){
      //hiba kerülés
      if(!this.author || !this.title){
        alert("Előadó és cím kötelező!")
        return
      }
      const songData = {
        author: this.author,
        title: this.title,
        message: this.message
      }

      alert("Zene sikeresen beküldve!")

      //Kiürítés
      this.author = ""
      this.title = ""
      this.message = ""
    }
  }
}
</script>

<template>
  <main class="fm-container">
    <section class="card-container send-form">
      <!--rendező-->
      <label>Rendező: </label>
      <input type="text" v-model="author" placeholder="Előadó neve">
      <!--Cím-->
      <label>Cím: </label>
      <input type="text" v-model="title" placeholder="Zene címe"></input>

      <label>Üzenet:</label>
      <textarea v-model="message" placeholder="(opcionális)"></textarea>

      <button @click="sendSong">Zene beküldése</button>
    </section>
  </main>
</template>

<style scoped>
.send-form{
  background:white;
  padding:20px;
  border:1px solid black;
  width:400px;
  display:flex;
  flex-direction:column;
  gap:10px;
}

input, textarea{
  padding:6px;
  border:1px solid black;
}

button{
  background:yellow;
  border:1px solid black;
  padding:8px;
  cursor:pointer;
  font-weight:bold;
}

button:hover{
  background:black;
  color:white;
}
</style>