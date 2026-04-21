<script>
export default {
  name: 'TechnologyView'
}
</script>

<template>
  <section class="p-4">
    <h1>Technika</h1>
    <h2>Az oldal lekódolása</h2>
    <dl>
      <dt>Az oldal teljes forráskódjának megírása: </dt>
      <dd>PhpStorm</dd>
    </dl>
    <h2>Az oldal technikai felépítése</h2>
    <dl>
      <dt>A weboldal megjelenítéséhez használt keretrendszerek</dt>
      <dd>
        <ul>
          <li>Vue.js</li>
          <li>Bootstrap + Bootstrap Icons</li>
        </ul>
      </dd>
    </dl>
    <dl>
      <dt>Adatbázis technikai részletei</dt>
      <dd>
        <ul>
          <li>Típus: MySQL</li>
          <li>Felépítéséhez, kezeléséhez használt keretrendszer: Laravel</li>
        </ul>
      </dd>
    </dl>
    <h2>A webalkalmazást működtető szolgáltatások</h2>
    <dl>
      <dt>Weboldal-adatbázis közti kapcsolat</dt>
      <dd>
        <ul>
          <li>Technológia: Axios</li>
          <li>Backend-port: 8000 (Futtató: Laravel)</li>
          <li>Frontend-port: 5173 (Futtató: Vite)</li>
        </ul>
      </dd>
    </dl>
    <h2>A webalkalmazás tesztelése</h2>
    <dl>
      <dt>Az alkalmazást tesztelő és fejlesztő gépek</dt>
      <dd>
        <ul>
          <li>HP Pavilion // OS: Windows 11</li>
          <li>MacBook Air // OS: macOS</li>
        </ul>
      </dd>
    </dl>
    <dl>
      <dt>Teszteléshez használt webböngésző</dt>
      <dd>Firefox</dd>
    </dl>
    <h2>Dokumentáció</h2>
    <dl>
      <dt>Az alkalmazás dokumentációjához használt szoftverek</dt>
      <dd>
        <ul>
          <li>Microsoft Word (hivatalos)</li>
          <li>Notes (Apple, ideiglenes)</li>
        </ul>
      </dd>
    </dl>
  </section>
</template>

<style scoped>
* {
  color: white;
}
ul {
  background-color: transparent;
  list-style-type: none;
}
dt {
  color: gold;
}
h2{
  color: #0a0a0a;
}
</style>