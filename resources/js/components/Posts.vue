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
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item" :class="{ disabled: currentPage === 1 }">
                <a @click="getPosts(currentPage - 1)" class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li v-for="n in lastPage" :key="n" class="page-item" :class="{ active: currentPage === n }"><a @click="getPosts(n)" class="page-link" href="#">{{ n }}</a></li>
                <li class="page-item" :class="{ disabled: currentPage === lastPage}">
                <a @click="getPosts(currentPage + 1)" class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        name: 'Posts',
        data() {
            return {
                posts: [],
                currentPage: 1,
                lastPage: 0,
            }
        },
        created() {
            this.getPosts(1);
        },
        methods: {
            getPosts(page) {
                axios.get("http://127.0.0.1:8000/api/posts", {
                params: {
                    page: page,
                }
                })
                .then(resp => {
                    this.posts = resp.data.results.data;
                    this.currentPage = resp.data.results.current_page;
                    this.lastPage = resp.data.results.last_page;
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
