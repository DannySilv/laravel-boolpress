<template>
    <div class="container">
        <h1 class="text-center">Posts List</h1>
        <div class="row row-cols-3">
            <div v-for="post in posts" :key="post.id" class="col">
                <div class="card mb-4">
                    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ truncateText(post.content, 50) }}</p>
                    </div>
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Posts',
        data() {
            return {
                posts: [],
            }
        },
        created() {
            this.getPosts();
        },
        methods: {
            getPosts() {
                axios.get("http://127.0.0.1:8000/api/posts")
                .then(resp => {
                    this.posts = resp.data.results;
                });
            },
            truncateText(text, maxCharNumber) {
                if (text.length > maxCharNumber) {
                    return text.substr(0, maxCharNumber) + "...";
                } else {
                    return text;
                }
            }
        },
    }
</script>
