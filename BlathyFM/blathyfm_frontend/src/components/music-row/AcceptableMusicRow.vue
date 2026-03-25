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
<p>
  {{ music.author }} - {{ music.title }} ({{ music.length }})
  <span>
    <button class="uploadButton" @clik="onOpenLink">
      <i class="bi bi-box-arrow-in-up-right"/>
    </button>
    <button class="acceptButton" @clik="onAccept">
      <i class="bi bi-check"/>
    </button>
    <button class="declineButton" @clik="onDecline">
      <i class="bi bi-x"/>
    </button>
  </span>
</p>
</template>

<style scoped>
button {
  border: 2px solid black;
  width: 1.5rem;
  height: 1.5rem;
}
.uploadButton {
  background-color: #89DBFE;
}
.acceptButton {
  background-color: #8F8;
}
.declineButton {
  background-color: #DDA577;
}
</style>