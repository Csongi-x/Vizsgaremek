<script>
import router from
export default{
  name: "SchedulerView",
  components:{

  },
  props:{
    playlist: {
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
      this.$router.push('/scheduler')
    }
  },

}
</script>

<template>
  <!--Baloldali kártya section-->
  <section class="card-container playlist-main">
    <h2 class="title"></h2>
    <ul>
      <li></li>
    </ul>
  </section>

  <!--Jobb gelső blokk, kijelentkezés, zene rendezés ->gombok-->
  <section class="buttons">
    <button class="title border-bottom border-dark" @click="logout">Kijelentkezés</button>
    <button class="title border-bottom border-dark" @click="orderMusic">Zenék rendezése</button>
    <p>Kérjük legalább aznap 12:55-ig határozza meg, hogy milyen zenék játszódjanak le az iskolarádióban</p>
  </section>

  <!--jobb alsó blokk, llejátszott zenék-->
  <section class="card-container">
    <h2 class="title">Lejátszott zenék</h2>
    <ul>
      <li></li>
    </ul>
  </section>


</template>

<style scoped>

</style>