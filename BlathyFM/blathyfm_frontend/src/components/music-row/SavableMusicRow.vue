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
  <table>
    <tr>
      <th>{{ music.author }} - {{ music.title }} ({{ music.length }})</th>
      <th class="th">
        <span :class="music.accepted ? 'accepted' : 'declined'">
          {{ music.accepted ? 'Elfogadva' : 'Elutasítva' }}
        </span>
      </th>
    </tr>
  </table>
</template>

<style scoped>
table {
  border: 2px solid black;
  margin: .25rem 0 .25rem 0;
}
span {
  text-align: center;
  padding: 1vh;
  right: 1vh;
}
.th {
  width: 15%;
}
th {
  font-weight: normal !important;
  padding: 1.25vh;
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