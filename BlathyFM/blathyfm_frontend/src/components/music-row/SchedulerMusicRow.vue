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
  <p>
    {{ song.author }} - {{ song.title }} ({{ song.length }})
  <span>
    <button class="addToPlaylistButton" @click="$emit('add-to-playlist')">
      <i class="bi bi-chevron-right"/>
    </button>
  </span>
  </p>
</template>

<style scoped>
p {
  border: 2px solid black;
  margin: 1vh;
  padding: 1vh;
}
.addToPlaylistButton {
  background-color: gold;
  border: 2px solid black;
  margin: .5vh;
  padding: .5vh;
}
</style>