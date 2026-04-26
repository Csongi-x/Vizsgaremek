<script>
export default {
  name: 'AboutView'
}
</script>

<template>
  <section class="p-4">
    <h1>Impresszum</h1>
    <h2>Készítették:</h2>
    <dl>
      <dt>Susán Csongor György</dt>
      <dd>
        <ul>
          <li>Grafikus tervek és grafika kidolgozása</li>
          <li>Alapvető logika kidolgozása</li>
          <li>Adatbázis megtervezése</li>
          <li>Kód, dokumentáció írása</li>
          <li>Időközben felmerülő hibák kijavítása</li>
        </ul>
      </dd>
      <dt>El-Nabulsy Csongor Alan</dt>
      <dd>
        <ul>
          <li>Nézetek kódolása</li>
          <li>Adatműveletek kidolgozása</li>
          <li>Kód, dokumentáció írása</li>
          <li>Adatok áramlásának kivitelezése</li>
          <li>Autentikáció kidolgozása</li>
        </ul>
      </dd>
    </dl>
    <h2>Szoftverek:</h2>
    <dl>
      <dt>PhpStorm</dt>
      <dd>
        <ul>
          <li>Kódírás, tesztelés</li>
        </ul>
      </dd>
      <dt>Word</dt>
      <dd>
        <ul>
          <li>Dokumentációk megírása</li>
        </ul>
      </dd>
      <dt>Paint</dt>
      <dd>
        <ul>
          <li>Tervezési ábrák megrajzolása</li>
        </ul>
      </dd>
      <dt>Dia</dt>
      <dd>
        <ul>
          <li>Adatbázis EK-diagramjának megrajzolása</li>
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
