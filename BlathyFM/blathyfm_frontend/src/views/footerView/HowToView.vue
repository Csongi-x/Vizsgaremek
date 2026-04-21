<script>
export default {
  name: 'HowToView'
}
</script>

<template>
  <div class="how-it-works-page">
    <div class="container">
      <header class="text-center mb-5">
        <h1 class="display-4 fw-bold">🎙️ Suli Rádió</h1>
        <p class="lead">Hogyan juttasd el a kedvenc zenédet a szünetekbe?</p>
      </header>

      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="step-card">
            <div class="step-num">1</div>
            <h3>Keress és válassz</h3>
            <p>Böngéssz az összes elérhető zene között, vagy használd a keresőt, hogy megtaláld a kedvenc előadódat.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="step-card highlight">
            <div class="step-num">2</div>
            <h3>Küldd be!</h3>
            <p>Kattints a sárga nyílra! Ezzel a zene a szerkesztők elé kerül a "Bekért zenék" listájába.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="step-card">
            <div class="step-num">3</div>
            <h3>Élvezd a zenét</h3>
            <p>A rádiós csapat összeállítja a listát, te pedig a következő nagy szünetben már hallhatod is a választottad!</p>
          </div>
        </div>
      </div>

      <footer class="text-center mt-5">
        <button class="btn btn-gold btn-lg shadow" @click="$router.push('/')">Vissza a rádióhoz</button>
      </footer>
    </div>
  </div>
</template>

<style scoped>
/* Teljes képernyős háttér gradienssel */
.how-it-works-page {
  min-height: 100vh;
  padding: 60px 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #2d3436;
}

header h1 {
  text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
  color: #000;
}

/* Kártya stílusok */
.step-card {
  background: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(10px); /* Modern üveghatás */
  border: 3px solid #000;
  padding: 30px;
  height: 100%;
  border-radius: 15px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
}

.step-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

/* Kiemelt kártya (középső) */
.highlight {
  background: #fff;
  border-width: 5px;
}

/* Lépésszámláló körök */
.step-num {
  background: gold;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 1.5rem;
  border: 3px solid #000;
  margin-bottom: 20px;
}

h3 {
  font-weight: 800;
  margin-bottom: 15px;
  text-transform: uppercase;
  font-size: 1.2rem;
}

/* Gomb stílus */
.btn-gold {
  background-color: gold;
  border: 3px solid #000;
  color: #000;
  font-weight: bold;
  padding: 12px 30px;
  transition: all 0.2s;
}

.btn-gold:hover {
  background-color: #000;
  color: gold;
  transform: scale(1.05);
}

/* Mobil optimalizálás */
@media (max-width: 768px) {
  .how-it-works-page {
    padding: 30px 10px;
  }
}
</style>