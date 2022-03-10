<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col" v-for="(post, index) in posts" :key="index">
        <div class="card">
          <img :src="'/storage/'+ post.image" class="card-img-top" :alt="post.title">
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <h5 class="card-title">{{ post.author }}</h5>
            <p class="card-text">{{ post.content }}</p>
            <router-link class="btn btn-info" :to="{name: 'post', params: { id: post.id}}">View</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
    name: "Main",
    props:['posts']
}
</script>

<style>

</style>