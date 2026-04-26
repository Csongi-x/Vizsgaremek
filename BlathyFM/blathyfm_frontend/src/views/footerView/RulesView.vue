<script>
export default {
  name: 'RulesView'
}
</script>

<template>
  <section class="p-4">
    <h1>Szabályzat</h1>
    <h2>Zenék beküldése</h2>
    <ul>
      <li>
        Csak olyan zene mehet a rádióban, amelyet az adminisztrátor jóváhagyott.
      </li>
      <li>
        A zene szövegében nem lehet 1-2-nél több trágár kifejezés, legyen az bármilyen (a magyaron kívül pl. angol,
        német) nyelvű.
      </li>
      <li>
        A zene témája nem lehet felnőtteknek szóló, az iskolába 18 év alatti diákok is járnak.
      </li>
      <li>
        A zenének hivatalosnak kell lennie, tehát nem kérünk olyan linkeket, amelyek zenének nem nevezhető hangsávot
        takarnak.
      </li>
      <li>
        Gyerekdalokat nem kérünk a listára, köszönjük.
      </li>
      <li>
        A zene legalább 1 perc és legfeljebb 9 perc 59 másodperc hosszú lehet. Az ennél hosszabb zenék megkockáztatják
        a többi zene rendszeres kiszorulását a szünetekből.
      </li>
      <li>
        Amennyiben a zene szövege nem ellenőrizhető (pl. nincs a leírásban, vagy keresésre egyáltalán nem található
        meg), akkor a dalt az ütemező végighallgatja, hogy helyénvaló-e, de ez nem kötelező és az ütemező ebben
        az esetben automatikusan elutasíthatja a zenét.
      </li>
      <li>
        Amennyiben egy előadó nézetei, gondolkodásmódja nem helyénvaló vagy veszélyes, akkor az adott előadótól
        semmilyen zenét nem áll módjában az adminisztrátornak elfogadni.
      </li>
      <li>
        Ha az adott zene már szerepel a bekérhető zenék között, az már nem küldhető be újra. Ez az adott dal
        feldolgozásaira is vonatkozik (ha túlságosan hasonlít a két variáns egymásra, akkor nem küldhető be).
      </li>
      <li>
        Ha a zene túlságosan is kaotikus, követhetetlen, vagy durva hangzású, nem fog helyet kapni a zenék listáján.
      </li>
      <li>
        Mivel a fenti, durvasággal és nyelvezettel kapcsolatos szabályoknak a rap, heavy metal és hardcore rock műfajok
        általában nem tesznek eleget, feketelistás műfajoknak számítanak.
      </li>
    </ul>
    <h2>Zenék bekérése</h2>
    <ul>
      <li>
        Adminisztrátor által még nem jóváhagyott vagy elutasított zene nem kérhető be (a listákban sem fognak
        megjelenni).
      </li>
      <li>
        Egy nap egy diák csak 6 zenét kérhet be.
      </li>
      <li>
        Egy zene a lejátszás után egy hétig nem kérhető be.
      </li>
      <li>
        Az olyan bekéréseket, amelyekhez komolytalan vagy trágár üzenet társul, vagy a két fenti szabályba ütközne
        (pl. valaki egy napra 7 vagy több zenét kérne be vagy ugyanazt a zenét ugyanazon a héten többször hallani
        szeretné), az ütemező nem köteles azoknak eleget tenni.
      </li>
    </ul>
    <h2>Szabálykörök megsértése</h2>
    <ul>
      <li>
        Amennyiben kiderül, hogy bárki sikeresen hozzáfér egy nem őhozzá rendelt szerepkörhöz (azaz más, tőle eltérő
        szerepkörű személy fiókjával jelentkezik be) és ezzel jogtalan lépéseket tesz, az diák esetében intővel,
        felnőtt (azaz adminisztrátor vagy ütemező) esetében fizetéslevonással vagy a munkakörtől való megfosztással
        büntetendő.
      </li>
      <li>
        Ha egy nem odaillő zene elfogadásra, majd pedig lejátszásra kerül, az ütemező felelősségre vonható
        a zene elfogadásáért. Ha azért nem ő, hanem egy diák (esetleg adminisztrátor) jogtalan belépésen keresztül
        felelős, akár a tanulói (adminisztrátor esetén munkavállalói) jogviszony megszüntetésével is büntethető. Ez
        természetesen az adott zene szabálytalanságának mértékétől is függ.
      </li>
      <li>
        Szükség esetén az adminisztrátor bejelentkezhet egy ütemezői fiókba is (vagy fordítva), de ehhez speciális
        (pl. igazgatói) engedély szükséges.
      </li>
    </ul>
  </section>
</template>

<style scoped>
h1, ul {
  color: white;
}
h2 {
  color: black;
}
ul {
  list-style-type: disc;
  background-color: transparent;
}
li {
  margin-bottom: 3vh;
  list-style-type: none;
}
</style>