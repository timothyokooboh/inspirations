<template>
  <div class="post-card" >
    <div class="post-title hide"> {{ postTitle }} </div>
    <div class="hide" v-if="isCoverphoto">
      <img :src = "postImage" alt="cover photo for the post" class="cover-photo"> 
    </div>
    <div class="hide" v-html="postContent">  </div>
    <div class = "hide" > 
      <img src="/images/heart.svg" class="heart-icon" > 
      {{postLikesCount}} 
    </div>
    <div class="hide"> Posted on {{postDate}} </div>
    <div class="post-card-actions">
      <div>
        <a :href="viewPost"> VIEW </a>
      </div>
      <div v-if="authUser">
        <a :href="editPost"> EDIT </a>
      </div>
    </div>         
  </div>    
</template>
<script>
export default {
  props: [
    'postTitle', 
    'postImage', 
    'postContent', 
    'postDate', 
    'viewPost', 
    'editPost', 
    'authUser',
    'isCoverphoto',
    'postLikesCount'
  ],

}
</script>
<style lang="scss" scoped>
.post-card-container {
  margin-top: 20px;
  display: flex;
  flex-wrap: wrap;
  letter-spacing: 1.08px;
}
.post-card {
  width: 250px;
  height: 350px;
  margin: 10px;
  background-color: #fff;
  color: #501A3E;
  border-radius: 10px;
  text-align: center;
  padding: 5px;
  box-shadow: 2px 2px 20px rgba(0,0,0,0.2);
}
.post-card div {
  padding: 5px;
}
.post-card-actions {
  display: none;
}
.post-card-actions div a {
  text-decoration: none;
  color: #501A3E;
}
.post-card-actions div a:hover {
  text-decoration: none;
}

.post-card:hover {
  background: #FAF0F8;
  .hide {
    display: none;
  }
  .post-card-actions {
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: space-around;
    animation: slideIn 0.5s ease-in-out forwards;
  }
}
.story:after {
  content: ''
}
.heart-icon {
  object-fit: cover;
  width: 13px;
  height: 13px;
  margin-right: 5px;
}
@keyframes slideIn {
  from {
    background-color: '';
    opacity: 0;
    transform: translateY(100px);
  }
  to {
    background: #FAF0F8;
    opacity: 1;
    transform: translateY(0px);
  }

}
.post-title {
  text-transform: uppercase;
}
.cover-photo {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}


</style>