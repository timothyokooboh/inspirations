<template>
  <div class ="post-container"> 

    <div class="cover-photo-container" v-if="isCoverphoto">
      <img :src="coverPhoto" alt="cover photo" class="cover-image">
    </div>

    <div class="post-title"> 
      <h1> {{postTitle}} </h1> 
    </div>

    <div> Tags: {{postTags}} </div>

    <div>
      <small> {{postDate}} </small>
    </div>

    <div class="author">
      <div v-if = "authorPhotoExists" > 
        <a :href = "viewProfile"> 
          <img :src = "photoAuthor" alt="profile picture of author"> 
        </a> 
      </div>
      <div v-else>
        <a :href = "viewProfile"> 
          <img src="/images/profilePicture.svg" alt="profile picture of author" > 
        </a>
      </div>
      <div> 
        <div>
          <a :href="viewProfile"> {{postAuthor}} </a>
        </div>
        <div v-if ="!isAuthor">
          <follow-button
            :user-id = "userId" 
            :follows = 'follows' 
          >
          </follow-button>
        </div>
      </div>
    </div>
    
    <div v-html="postContent"> </div> 

    
  </div>
        
</template>
<script>
import FollowButton from './FollowButton'

export default {
  components: {
    followButton: FollowButton,

  },
  props: [
    'coverPhoto', 
    'postTitle', 
    'postTags', 
    'postDate', 
    'photoAuthor', 
    'postAuthor', 
    'postContent',  
    'isCoverphoto', 
    'authorPhotoExists', 
    'viewProfile',
    'userId',
    'isAuthor',
    'follows'
  ],

  methods: {
    confirmDelete () {
      if (confirm ('Are you sure you want to delete this post? ')) {
        return true
      } else {
        return false
      }
    }
  }
}
</script>
<style lang="scss" scoped>
  
    .post-container div {
      padding-bottom: 10px;
    }
    .post-title {
      color: #501A3E;
      letter-spacing: 1.08px;
    }
    .author {
      display: flex;
      align-items: center;
    }
    .author > div {
      margin-right: 10px;
    }
    .author a {
       color: #501A3E;
    }
    .author img {
      object-fit: cover;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 1px solid #18988b;
    }
    .cover-photo-container {
      width: 100%;
      margin-top: 20px;
    }
    .cover-image {
      object-fit: cover;
      width: 100%;
      height: 300px;
    }
    
    .is-auth-user-author {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
    }
    .is-auth-user-author input[type="submit"] {
      background-color: red;
      color: #fff;
      border-radius: 4px;
      letter-spacing: 1.08px;
    }
    .is-auth-user-author button {
      background-color: #227DC7;
      color: #fff;
      border-radius: 4px;
      letter-spacing: 1.08px;
    }
</style>
