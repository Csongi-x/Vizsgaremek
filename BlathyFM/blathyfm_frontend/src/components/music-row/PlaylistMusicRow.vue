<script>
export default {
  name: "PlaylistMusicRow",
  props: {
    music: {
      required: true,
      type: Object
    }
  },
  computed: {
    musicId() {
      return this.music.id
    }
  },
  methods: {
    onUp() {
      this.$emit("up", this.musicId)
    },
    onDown() {
      this.$emit("down", this.musicId)
    },
    onDelete() {
      this.$emit("delete", this.musicId)
    }
  },
  emits: ["up", "down", "delete"]
}
</script>

<template>
  <table>
    <tr>
      <th>{{ music.author }} - {{ music.title }} ({{ music.length }})</th>
      <th>
        <button class="upButton" @click="onDown">
          <i class="bi bi-chevron-down"/>
        </button>
        <button class="downButton" @click="onUp">
          <i class="bi bi-chevron-up"/>
        </button>
        <button class="deleteButton" @click="onDelete">
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
button {
  border: 2px solid black;
  width: 1.5rem;
  height: 1.5rem;
}
.downButton {
  background-color: #8F8;
}
.upButton {
  background-color: gold;
}
.deleteButton {
  background-color: #DDA577;
}
</style>