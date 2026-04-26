<script>
export default {
  name: "SchedulerMusicRow",
  props: {
    song: {
      required: true,
      type: Object
    }
  },
  methods: {
    addToPlaylist() {
      this.$emit('add-to-playlist', this.song)
      this.$emit('update:playlist')
    },
    openMessage() {
      this.$emit('message', this.song.message)
    }
  },
  emits: ["add-to-playlist", "update:playlist", "message"]
}
</script>

<template>
  <table>
    <tr>
      <th>{{ song.author }} - {{ song.title }} ({{ song.length }})</th>
      <th class="buttons" :class="song.message ? 'wider' : ''">
        <button class="message" v-if="song.message" @click="openMessage">
          <i class="bi bi-chat"/>
        </button>
        <button class="addToPlaylistButton" @click="addToPlaylist">
          <i class="bi bi-chevron-right"/>
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
  width: 96%;
}
th {
  font-weight: normal;
}
.buttons {
  width: 15%;
}
.wider {
  width: 25% !important;
}
.addToPlaylistButton, .message {
  background-color: gold;
  border: 2px solid black;
  margin: .5vh;
  padding: .5vh;
}
.message {
  background-color: #89DBFE;
}
</style>