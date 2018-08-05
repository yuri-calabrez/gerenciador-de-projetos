<template>
  <div>
    <DefaultComponent v-if="isLoggedIn"/>
    <Login v-else/>
  </div>
</template>

<script>
import DefaultComponent from './templates/Default'
import Login from './templates/Login'

export default {
  name: 'App',
  components: {
    DefaultComponent,
    Login
  },
  computed: {
    isLoggedIn() {
      return this.$store.state.auth.isLogged
    }
  }
}
</script>
