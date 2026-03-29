<script>
export default {
  name: "SavableMusicRow",
  props:{
    music: {
      required: true,
      type: Object
    }
  }
}
</script>

<template>
{{ music.author }} - {{ music.title }} ({{ music.length }})
  <span :class="music.accepted ? 'accepted' : 'declined'">
    {{ music.accepted ? 'Elfogadva' : 'Elutasítva' }}
  </span>
</template>

<style scoped>
span {
  text-align: center;
  padding: 3vh;
}
.accepted {
  background-color: #5F5;
  color: #5F5;
}
.declined {
  background-color: red;
  color: red;
}
</style>