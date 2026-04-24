# BláthyFM - Vizsgaremek
## Ez a BláthyFM webalkalmazás repositoryja
### Készítette:
 
- Susán Csongor György
- El-Nabulsy Csongor Alan

### Projekt elindítása
##### Frontend
1. cd BlathyFM
2. cd blathyfm_frontend
3. npm i
4. npm run dev
##### Backend
1. cd BlathyFM
2. cd blathyfm_backend
3. copy .env.example .env
4. composer i
5. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed
8. php artisan serve

### A projekt célja
 - Az alkalmazás célja az, hogy a Bláthy-ba járó diákok előre meghatározott szünetekben kedvenc zenéjüket tudják majd hallgatni anélkül, hogy nekik kelljen azt maguknak vagy másoknak lejátszani.Ráadásul az is, hogy az iskola az ő zenéjüket játsza, akár egy általuk kijelölt időpontban(ezt üzenetben írhatják le), mégtöbb élményt ad, és azt az érzést, hogy a zenéjük- és ezzel együtt önmaguk is megvannak becsülve.

### Fejlesztői dokumentáció
#### Az alkalmazás elkészítéséhez használt programok
 - Frontend: Vue.js
 - Backend: Laravel
 - Adatbázis: MySQL

### Felhasználói dokumentáció
#### Itt található néhány adat a különböző szerepkörű oldalak működésének teszteléséhez
- Diák	:
  - E-mail: susan.csongor.gyorgy@blathy.info
  - Jelszó: kiscica92

- Rendező:   
  - E-mail: klebesz.kinga@blathy.info
  - Jelszó: kutyi8888887

- Admin: 
  - E-mail: rendszergazda@blathy.info
  - Jelszó: kutyi8888888

### Repository tartalma: 
- BlathyFM - Fő mappa, amin belül található a frontend és backend rész
- README.md - A projekt alapvető ismertetője, telepítési útmutatóval
- documentation.docx - Teljes projekt dokumentációja, egészen a kezdetektől
- test_documentation.docx - A projektről készült teszt képek, folyamatok alatt
- user.docx - Felhasználói útmutató	 

#### BlathyFM mappa szerkezete Frontend része
- blathyfm_frontend/
- Komponensek(components)/
  - layouts/
  - music-row/
- Routerek(routes)/
- Utils/
- Nézetek(views)/
  - Admin nézetek/
  - Hiba nézetek/
  - Lábjegyzet nézetek/
  - Rendezői nézetek/
  - Diák nézetek/
- App.vue
- main.js

#### BlathyFM mappa szerkezete Backend része
- blathyfm_backend
- app/
  - Http/
    - Controllers/
      - Api/
    - Middleware/
    - Requests/
  - Models/  
  - Providers/
- database/
  - migrations/
  - seeders/
- routes/