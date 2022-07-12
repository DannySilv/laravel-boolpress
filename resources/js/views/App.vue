<template>
  <div>
    <a class="btn btn-primary" href="/login">Login</a>
    <a class="btn btn-secondary" href="/register">Register</a>
    <h1 class="text-center">Front Office | Home</h1>
    <Posts />
  </div>
</template>

<script>
import Posts from '../components/Posts.vue';
export default {
  name: 'App',
  components: {
    Posts
  }
}
</script>

<style>
</style> 