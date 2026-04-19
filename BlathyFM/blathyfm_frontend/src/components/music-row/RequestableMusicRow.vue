<script>
export default {
  name: 'RequestableMusicRow',
  props: {
    music: {
      required: true,
      type: Object
    }
  },
  methods: {
    open() {
      open(this.music.link)
    }
  }
}
</script>

<template>
  <table>
    <tr>
      <th>{{ music.author }} - {{ music.title }} ({{ music.length }})</th>
      <th class="buttons">
        <span>
          <button class="requestLink" @click="open">
            <i class="bi bi-box-arrow-in-up-right"/>
          </button>
          <RouterLink :to="{name: 'request-verify', params: {id: music.id}}" class="requestAdd">
            <i class="bi bi-plus"/>
          </RouterLink>
          </span>
      </th>
    </tr>
  </table>
</template>

<style scoped>
tr {
  padding: 5vh;
  border: 2px solid black;
}
th {
  font-weight: normal;
}
.buttons {
  width: 20%;
}
button, .requestAdd {
  border: 1px solid black;
  color: black;
  width: 30%;
  height: 30%;
}
.requestLink {
  background-color: #89DBFE;
}
.requestAdd {
  background-color: gold;
}
</style>