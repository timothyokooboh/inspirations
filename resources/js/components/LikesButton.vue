<template>
  <div class="likes-container">
    <div class="likes-icon-container">
      <img src="/images/heart.svg" alt="" class="likes-icon" @click="like" ref="likesIcon" >
    </div>
    <div> {{postCounter}} </div>
  </div>
</template>
<script>
export default {
  props: ['postId', 'likes', 'postCount'],
  data () {
    return {
      status: this.likes,
      postCounter: this.postCount
    }
  },
  
  methods: {
    like () {
      axios.post('/like/'+this.postId )
      .then((res) => {
        console.log(res)
        console.log(this.postId)
        this.status = !this.status
       if(this.status) {
         this.postCounter++
         this.$refs.likesIcon.style.backgroundColor = 'pink'
       } else {
         this.postCounter--
         this.$refs.likesIcon.style.backgroundColor = 'transparent'
       }
          
      })
      .catch((error) => {
        console.log(error)
        window.location = '/login'
      })
    }
  }
}
</script>
<style lang="scss" scoped>
  .likes-icon {
    width: 25px;
    height: 25px;
    padding: 5px;
    cursor: pointer;
    border: 1px solid #18988b;
    border-radius: 50%;
    margin-right: 10px;
  }
  .likes-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }
</style>