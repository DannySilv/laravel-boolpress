<template>
  <div class="container">
    <section v-if="post">
      <h1>{{ post.title }}</h1>
      <p>Category: {{ categoryName }}</p>
      <div class="mb-2">
        <router-link :to="{ name: 'tag', params: { slug: tag.slug } }" v-for="tag in post.tags" :key="tag.id" class="badge badge-pill badge-info">{{ tag.name }}</router-link>
      </div>
      <p>{{ post.content }}</p>
    </section>
    <section v-else>
      <h2>Loading</h2>
    </section>
  </div>
</template>

<script>
export default {
  name: "Post",
  data() {
    return {
      post: null
    }
  },
  created() {
    this.getPostInfo();
  },
  computed: {
    categoryName() {
      return this.post.category ? this.post.category.name : "No Category";
    },
  },
  methods: {
    getPostInfo() {
      const slug = this.$route.params.slug;
      axios.get(`/api/posts/${slug}`).then((resp) => {
        if (resp.data.success) {
          this.post = resp.data.results;
        } else {
          this.$router.push({ name: "not-found" })
        }
      });
    },
  },
}
</script>

<style>

</style>