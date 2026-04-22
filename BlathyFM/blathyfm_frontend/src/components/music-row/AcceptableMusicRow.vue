<script>
export default {
  name: "AcceptableMusicRow",
  props: {
    music: {
      required: true,
      type: Object
    }
  },
  methods: {
    onOpenLink() {
      this.$emit("open-link", this.music.link)
    },
    onAccept() {
      this.$emit("accept", {id: this.music.id, accepted: true})
    },
    onDecline() {
      this.$emit("decline", {id: this.music.id, accepted: false})
    }
  },
  emits: ["open-link", "accept", "decline"]
}
</script>

<template>
  <table>
    <tr>
      <th>{{ music.author }} - {{ music.title }} ({{ music.length }})</th>
      <th class="th">
        <button class="uploadButton" @click="onOpenLink">
          <i class="bi bi-box-arrow-in-up-right"/>
        </button>
        <button class="acceptButton" @click="onAccept">
          <i class="bi bi-check"/>
        </button>
        <button class="declineButton" @click="onDecline">
          <i class="bi bi-x"/>
        </button>
      </th>
    </tr>
  </table>
</template>

<style scoped>
table {
  border: 2px solid black;
  margin: 1vh;
  padding: 1vh;
}
th {
  font-weight: normal !important;
  padding: 1.25vh;
}
.th {
  width: 18%;
}
button {
  border: 2px solid black;
}
.uploadButton {
  background-color: #89DBFE;
}
.acceptButton {
  background-color: #9F2;
}
.declineButton {
  background-color: #FA7;
}
</style>