<template>
  <v-app>
    <app-header/>
    <router-view/>
  </v-app>
</template>

<script>
import Header from '@/components/partials/Header'

export default {
  name: 'App',
  components: {
    'app-header': Header
  }
}
</script>
