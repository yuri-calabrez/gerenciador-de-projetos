<template>
  <v-app>
    <app-header/>
    <v-content>
      <v-container>
        <router-view/>
      </v-container>
    </v-content>
    <v-footer app class="pa-3">
      <v-spacer></v-spacer>
      <span>&copy; <a href="https://github.com/yuri-calabrez">Project Manager</a> - {{ year }}</span>
    </v-footer>
  </v-app>
</template>

<script>
import Header from '@/components/partials/Header'

export default {
  name: 'App',
  components: {
    'app-header': Header
  },
  computed: {
    year() {
      return (new Date()).getFullYear()
    }
  }
}
</script>
