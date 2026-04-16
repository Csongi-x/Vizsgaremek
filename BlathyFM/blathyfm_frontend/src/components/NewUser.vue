<script>
export default {
  name: 'NewUser',
  props: {
    user: {
      required: true,
      type: Object
    }
  },
  methods: {
    acceptUser() {
      this.$emit('accept-user', this.user.id)
    },
    declineUser() {
      this.$emit('decline-user', this.user.id)
    }
  },
  emits: ['accept-user', 'decline-user']
}
</script>

<template>
  <tr>
    <td>{{ user.full_name }}</td>
    <td>{{ user.email }}</td>
    <td>{{ user.role === 'student' ? 'Tanuló' : user.role === 'admin' ? 'Adminisztrátor' : 'Ütemező' }}</td>
    <td>
      <button class="accept" @click="acceptUser">
        <i class="bi bi-check"/>
      </button>
      <button class="decline" @click="declineUser">
        <i class="bi bi-x"/>
      </button>
    </td>
  </tr>
</template>

<style scoped>
tr {
  border: 1.73px solid black;
  padding: .5rem;
}
button {
  border: 1px solid black;
  padding: .2rem;
}
.accept {
  background-color: #43AB43;
}
.decline {
  background-color: #FF4545;
}
.accept:hover {
  background-color: #7D7;
}
.decline:hover {
  background-color: #FF6767;
}
</style>