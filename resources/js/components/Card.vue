<template>
  <div class="card mb-4">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
    <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="category-text">Category: {{ categoryName }}</p>
        <p class="card-text">{{ truncateText(post.content, 50) }}</p>
    </div>
    <div class="card-body">
        <router-link :to="{ name: 'post', params: { slug: post.slug } }" class="card-link">Read More</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    post: Object
  },
  computed: {
    categoryName() {
      return this.post.category ? this.post.category.name : "No Category";
    }
  },
  methods: {
    truncateText(text, maxCharNumber) {
      if (text.length > maxCharNumber) {
          return text.substr(0, maxCharNumber) + "...";
      } else {
          return text;
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  .category-text {
    font-size: 0.7rem;
    color: gray;
  }
</style>