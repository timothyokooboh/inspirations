<template>
    <div>
        <button class="follow" @click="followUser" v-text="buttonText"> </button>
    </div>
</template>
<script>
export default {
   props: ['userId', 'follows'],
   data(){
       return {
           status: this.follows
       }
   },
   computed: {
       buttonText() {
        if(this.status) {
            return 'UNFOLLOW'
        } else {
            return 'FOLLOW'
        }
       }
   },
   methods: {
       followUser(){
           axios.post ('/follow/' + this.userId)
           .then((res) => {
               this.status = !this.status
               console.log(res.data)
           })
           .catch((error) => {
               window.location = '/login'
           })
       }
   }
}
</script>
<style lang="scss" scoped>
    .follow {
        background-color: #501A3E;
        color: #FAF0F8;
        border-radius: 4px;
        border:none;
        outline: none;
        letter-spacing: 1.08px;
        font-size: 14px;
    }
    
</style>