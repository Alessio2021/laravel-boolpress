<template>
    <div>
        Home
        <Main :posts='posts' ></Main>
    </div>
</template>


<script>
import Axios from 'axios';
import Main from '../components/Main.vue';

export default {
    name: "Main",
    components: {
        Main
    },
    data() {
        return {
            posts: []
        }
    },
    created() {
        Axios.get('http://127.0.0.1:8000/api/posts').then((results) => {
                this.posts = results.data.results.posts;
            }
        );
    }

}
</script>

<style>

</style>