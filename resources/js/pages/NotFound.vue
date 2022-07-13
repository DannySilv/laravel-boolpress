<template>
  <div class="container">
    <h1>Error 404! Page not found!</h1>
    <router-link :to="{name: 'home'}">Go back</router-link>
  </div>
</template>

<script>
export default {
  name: "NotFound"
}
</script>

<style>

</style>