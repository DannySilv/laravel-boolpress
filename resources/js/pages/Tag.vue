<template>
  <div class="container">
    <section v-if="tag">
      <h1>Tag: {{ tag.name }}</h1>
      <h2>Posts:</h2>
      <div class="row row-cols-3">
        <div v-for="post in tag.posts" :key="post.id" class="col">
          <Card :post="post"/>
        </div>
      </div>
    </section>
    <section v-else>
      <h2>Loading</h2>
    </section>
  </div>
</template>

<script>
import Card from "../components/Card.vue";

export default {
  name: "Tag",
  components: {
    Card
  },
  data() {
    return {
      tag: null,
    }
  },
  created() {
    this.getTagInfo();
  },
  methods: {
    getTagInfo() {
      const slug = this.$route.params.slug;
      axios.get(`/api/tags/${slug}`).then((resp) => {
        if (resp.data.success) {
          this.tag = resp.data.results;
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