<script>
import SchedulerMusicRow from "@/components/music-row/SchedulerMusicRow.vue";
import RequestView from "@/views/studentsView/RequestView.vue";
import PlaylistMusicRow from "@/components/music-row/PlaylistMusicRow.vue";
import Spinner from "@/components/Spinner.vue";
import { http } from "@/utils/http.js";

export default {
  name: "SchedulerView",
  components: {
    PlaylistMusicRow,
    Spinner,
    SchedulerMusicRow,
    RequestView
  },
  data() {
    return {
      songs: [],
      playlistSongs: [],
      requestedSongs: [],
      loading: false,
      error: "",
      searchQuery: ""
    };
  },
  methods: {
    async fetchAllMusic() {
      try {
        const response = await http.get("api/music");
        this.songs = response.data.musicJson || [];
      } catch (error) {
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    async fetchSentMusic() {
      try {
        const response = await http.get("api/request");
        this.requestedSongs = response.data.requested_music || [];
      } catch (error) {
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    async fetchPlaylist() {
      try {
        const response = await http.get("api/playlist");
        this.playlistSongs = response.data.playlist || [];
      } catch (error) {
        this.error = error.message;
      }finally{
        this.loading = false;
      }
    },
    addMusicToPlaylist(song) {
      if (!song?.id) return;
      const exists = this.playlistSongs.some(
          item => Number(item.id) === Number(song.id)
      );
      if (!exists) {
        this.playlistSongs.push({ ...song });
      } else {
        alert("Ez a zene már szerepel a listán");
      }
    },
    async savePlaylist() {
      try {
        const playlist = this.playlistSongs
        await http.put('/api/playlist', playlist)
      } catch {
        alert('A lejátszási lista sajnos jelenleg nem rendezhető.')
      }
    },
    message(message) {
      alert(message)
    },
    up(id) {
      const index = this.playlistSongs.findIndex(song => song.id === id);
      if (index > 0) {
        const item = this.playlistSongs.splice(index, 1)[0];
        this.playlistSongs.splice(index - 1, 0, item);
      }
    },
    down(id) {
      const index = this.playlistSongs.findIndex(song => song.id === id);
      if (index !== -1 && index < this.playlistSongs.length - 1) {
        const item = this.playlistSongs.splice(index, 1)[0];
        this.playlistSongs.splice(index + 1, 0, item);
      }
    },
    deleteFromPlaylist(id) {
      const index = this.playlistSongs.findIndex(song => song.id === id);
      if (index !== -1) {
        this.playlistSongs.splice(index, 1);
      }
    },
    isInPlaylist(songId) {
      return this.playlistSongs.some(
          item => Number(item.id) === Number(songId)
      );
    }
  },
  computed: {
    filteredSongs() {
      const query = this.searchQuery.toLowerCase().trim();

      return this.songs
          .filter(song => !this.isInPlaylist(song.id))
          .filter(song => {
            if (!query) return true;

            return (
                song.title?.toLowerCase().includes(query) ||
                song.author?.toLowerCase().includes(query)
            );
          });
    },
    filteredRequested() {
      return this.requestedSongs.filter(m => !this.isInPlaylist(m.id))
    }
  },
  async mounted() {
    this.loading = true;
    await this.fetchAllMusic();
    await this.fetchSentMusic();
    await this.fetchPlaylist();
    this.loading = false;

    //console.log("songs:", this.songs);
    //console.log("requested:", this.requestedSongs);
    //console.log("playlist:", this.playlistSongs);
  }
};
</script>

<template>
  <section class="row px-5 m-2">
    <!-- 1. Minden zene oszlop -->
    <article class="col-12 col-md-6 col-lg-4">
      <h1 class="h2 row">
        <span class="col-6">Zenék</span>
        <span class="query col-6 d-flex align-items-center">
          <i class="bi bi-search col-2"></i>
          <input v-model="searchQuery" type="search" class="fullBorder col-10">
        </span>
      </h1>
      <div class="allMusic">
        <Spinner v-if="loading" />
        <SchedulerMusicRow
            v-for="song in filteredSongs"
            :key="song.id"
            :song="song"
            :disabled="isInPlaylist(song.id)"
            @add-to-playlist="addMusicToPlaylist"
        />
      </div>
    </article>

    <!-- 2. Bekért zenék oszlop-->
    <article class="requestedMusic col-12 col-md-6 col-lg-4">
      <h1 class="h2">Bekért zenék</h1>
      <div class="requestedMusic">
        <Spinner v-if="loading" />
        <SchedulerMusicRow
            v-for="song in filteredRequested"
            :key="song.id"
            :song="song"
            :disabled="isInPlaylist(song.id)"
            @message="message"
            @add-to-playlist="addMusicToPlaylist"
        />
      </div>
    </article>
    <!-- 3. Playlist oszlop-->
    <article class="col-12 col-md-6 col-lg-4">
      <h1 class="h2">Lejátszási lista</h1>
      <div v-if="playlistSongs.length === 0">
        <strong>A lejátszási lista üres!</strong>
      </div>
      <div class="playistScroll">
        <PlaylistMusicRow
            v-for="music in playlistSongs"
            :key="music.id"
            :music="music"
            @up="up"
            @down="down"
            @delete="deleteFromPlaylist"
        />
      </div>
    </article>
  </section>
</template>

<style scoped>
article {
  border: 3px solid black;
  background-color: white;
  height: 85vh;
  display: flex;
  flex-direction: column;
}
.allMusic,
.requestedMusic {
  overflow: scroll;
  height: 75vh;
}
.fullBorder {
  border: 3px solid black;
}
.h2 {
  border-bottom: 3px solid black;
  background-color: gold;
}
.query {
  border-left: 3px solid black;
}
i::before {
  left: 8vh
}
input {
  height: 90%;
}
.playistScroll{
  overflow-y: auto;
  max-height: 75vh;
  padding-right: 5px;
}
.allMusic,
.requestedMusic{
  flex: 1;
  overflow-y: auto;
}
</style>