<script>
export default {
  name: "SchedulerMusicRow",
  props: {
    song: {
      required: true,
      type: Object
    }
  },
  emits: ["add-to-playlist"]
}
</script>

<template>
  <table>
    <tr>
      <th>{{ song.author }} - {{ song.title }} ({{ song.length }})</th>
      <th class="buttons">
        <button class="addToPlaylistButton" @click="$emit('add-to-playlist')">
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
.addToPlaylistButton {
  background-color: gold;
  border: 2px solid black;
  margin: .5vh;
  padding: .5vh;
}
</style>