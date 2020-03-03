<template>
  <v-card
    color="grey lighten-4"
    flat
    tile
    height="100"
  >
    <v-toolbar dense>

      <v-toolbar-title>Contact App</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn text>
        <router-link to="/">連絡先一覧</router-link>
      </v-btn>

      <v-btn text>
        <router-link to="/create/contact">連絡先を登録する</router-link>
      </v-btn>
    </v-toolbar>
  </v-card>
</template>

<script>
export default {
    
}
</script>