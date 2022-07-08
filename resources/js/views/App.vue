<template>
  <div>
    <a class="btn btn-primary" href="/login">Login</a>
    <a class="btn btn-secondary" href="/register">Register</a>
    <h1>Front Office | Home</h1>
    <ExampleComponent />
  </div>
</template>

<script>
import ExampleComponent from '../components/ExampleComponent.vue';
export default {
  name: 'App',
  components: {
    ExampleComponent
  }
}
</script>

<style>
</style> 