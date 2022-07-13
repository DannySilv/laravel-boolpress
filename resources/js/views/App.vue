<template>
  <div>
    <Header />
    <router-view></router-view>
  </div>
</template>

<script>
import Posts from '../components/Posts.vue';
import Header from '../components/Header.vue';

export default {
  name: 'App',
  components: {
    Posts,
    Header,
  }
}
</script>

<style>
</style> 