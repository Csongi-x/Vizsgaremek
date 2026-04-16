<script>
import NewUser from "@/components/NewUser.vue";
import {http} from "@/utils/http.js";
import Spinner from "@/components/Spinner.vue";

export default {
  name: 'AdminCheckUsersView',
  components: {
    Spinner,
    NewUser
  },
  data() {
    return {
      users: [],
      loading: false,
      error: ''
    }
  },
  methods: {
    async loadUsers() {
      this.error = ''
      this.loading = true
      try {
        const response = await http.get('/api/pending_users')
        this.users = response.data.pending_users
      } catch (error) {
        this.error = 'A regisztrálandó felhasználók adatai jelenleg sajnos nem kérhetőek le. Próbálkozzon később.'
      } finally {
        this.loading = false
      }
    },
    accept(id) {
      this.$emit('accept', id)
    },
    decline(id) {
      this.$emit('decline', id)
    }
  },
  mounted() {
    this.loadUsers()
  },
  emits: ['accept', 'decline']
}
</script>

<template>
  <section>
    <article>
      <h2 class="h3">Új felhasználók regisztráltatása</h2>
      <div class="area">
        <table class="allUsers">
          <thead>
          <tr>
            <th>
              <Spinner v-if="loading"/>
            </th>
          </tr>
          <tr>
            <th v-if="this.error !== ''" class="error">{{ error }}</th>
          </tr>
          <tr class="tr">
            <th>Teljes név</th>
            <th>E-mail cím</th>
            <th>Szerepkör</th>
            <th></th>
          </tr>
          </thead>
          <tbody v-if="users.filter(u => u.status === 'pending') > 0">
          <NewUser :user="user" v-if="user.status === 'pending'" v-for="user in users" :key="user.id"
                   @accept-user="accept" @decline-user="decline"/>
          </tbody>
          <tbody v-else>
          <tr>
            <td colspan="4">
              <span v-if="!loading">Jelenleg nincsenek regisztrálandó felhasználók.</span>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </article>
  </section>
</template>

<style>
section {
  padding: 1.5vh;
}
article {
  border: 2px solid black;
  background-color: white;
}
h2 {
  border-bottom: 2px solid black;
  padding: 1.2vh;
  background-color: gold;
}
.area {
  height: 78vh;
  overflow: scroll;
}
table {
  width: 100%;
  padding: 1rem;
}
.tr {
  border: 1.73px solid black;
  padding: .5rem;
  background-color: #DFDFDF;
}
.tr, td {
  margin: 1rem;
  text-align: center;
}
.error {
  border: 2px solid #200;
  background-color: #F44;
  padding: 2vh;
  margin: 2vh;
}
</style>