<script>
export default {
  name: "WaitingView",
  data(){
    return{
      checking: false,
      errorMsg: '',
      userStatus: ''
    }
  },
  methods: {
    //frissítés gombal meghivjuk
    async checkStatus(){
      this.checking = true;
      try{//lekéri a saját profilt
        const res = await axios.get('/api/auth/me');
        this.userStatus = res.data.status;

        if(this.userStatus === 'accepted'){
          this.$router.push('/dashboard');
        }else if(this.userStatus === 'rejected'){
          this.errorMsg = 'A regisztrációt elutasították!';
          this.goToRegister();
        }
      }catch(e){
        this.error = 'Hiba történt az ellenőrzés során!'
        this.goToRegister()
      }finally{
        this.checking = false;
      }
    },
    goToRegister(){
      localStorage.clear();
      this.$router.push({name: 'register'});
    }
  }
}
</script>

<template>
  <div class="row">
    <div class="col-12">

      <div v-if="userStatus === 'pending'" class="status-box">
        <div class="spinner"></div> <h1>Feldolgozás alatt...</h1>
        <p>A regisztrációdat rögzítettük.Egy admin hamarosan ellenőrizni fogja hogy Bláthys vagy-e.</p>
        <p class="hint">Ez általában pár percet vesz igénybe tanítási időben.</p>

        <button @click="checkStatus" :disabled="checking" class="refresh-btn">
          {{ checking ? 'Ellenőrzés...' : 'Státusz frissítése' }}
        </button>
      </div>

      <div v-else-if="userStatus === 'rejected'" class="status-box error">
        <h1>Hiba!</h1>
        <p>A regisztrációd el lett utasítva!</p>
        <button @click="goToRegister" class="retry-btn">Újra megpróbálom</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* készítette: El-Nabulsy Csongor Alan */
</style>