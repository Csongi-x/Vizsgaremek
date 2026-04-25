<script>
export default {
  name: 'HomePageMusicRow',
  props: {
    song: {
      required: true,
      type: Object
    },
    actualAppointment: {
      required: true,
      type: String
    }
  },
  mounted() {
    this.$emit("update:time", this.song.id)
  },
  emits: ["update:time"]
}
</script>

<template>
  <li>
    <strong>{{song.author}} - {{song.title}} - ({{actualAppointment}})</strong>
  </li>
</template>

<style scoped>

</style>