<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand">Boolpress</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" :to="{name: 'home'}">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" :to="{name: 'about'}">About</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" :to="{name: 'blog'}">Blog</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" :to="{name: 'contacts'}">Contacts</router-link>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item mb-2 mb-lg-0">
              <a class="btn btn-primary" aria-current="page" href="/login">Login</a>
            </li>
            <li class="nav-item ml-lg-2">
              <a class="btn btn-secondary" aria-current="page" href="/register">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style>

</style>