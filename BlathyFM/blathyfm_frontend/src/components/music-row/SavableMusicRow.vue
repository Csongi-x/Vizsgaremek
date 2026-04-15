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
  <p>
    {{ music.author }} - {{ music.title }} ({{ music.length }})
    <span :class="music.accepted ? 'accepted' : 'declined'">
    {{ music.accepted ? 'Elfogadva' : 'Elutasítva' }}
    </span>
  </p>
</template>

<style scoped>
p {
  border: 2px solid black;
  margin: .25rem 0 .25rem 0;
}
span {
  text-align: center;
  padding: 1vh;
  right: 1vh;
}
.accepted {
  border: 2px solid #5F5;
  color: #5F5;
}
.declined {
  border: 2px solid red;
  color: red;
}
</style>