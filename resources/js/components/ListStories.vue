<template>
  <div class = "post-container lazyload" >
    <div v-if = "isCoverPhoto">
      <a :href = "viewPost" > 
        <img :src = "postCoverPhoto" loading = 'lazy' alt = "cover photo of the post" class ="cover-image">
      </a>
    </div>
    <div class="flex-me" >
      <div v-if = "authorPhotoExists" > 
        <a :href = "viewProfile" >
          <img :src = "authorPhoto" loading = 'lazy' alt = "profile picture of the author" class = "profile-pix" >
        </a>
      </div>
      <div v-else>
        <a :href = "viewProfile" >
          <img src="/images/profilePicture.svg" loading = 'lazy' alt = "profile picture of the author" class="profile-pix">
        </a>
      </div>

      <div > 
        <a :href = "viewPost" >
          <h3 class = "title" > {{ postTitle }} </h3>
          <p v-if = "postTags !== '' "> Tags: {{ postTags }} </p>
          <p> By {{postAuthor}} </p>
          <p> {{postDate}} </p>
          <p> 
          <img src = "/images/heart.svg" loading = 'lazy' alt="heart icon" class = "heart-icon" > 
          {{ postLikesCount }} 
        </p>
        </a>
      </div>

    </div>
    <hr>
  </div>    
</template>
<script>
export default {
  props: [
    'postTitle', 
    'postAuthor',
    'authorPhotoExists',
    'authorPhoto',
    'viewProfile',
    'postTags',
    'postDate', 
    'viewPost', 
    'isCoverPhoto',
    'postCoverPhoto',
    'postLikesCount',
    
  ],
  mounted () {
    const observees = document.querySelectorAll('.lazyload');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.animation = `animate 1s ease-out forwards`
        } else {
          entry.target.style.animation = 'none'
        }
      })
    })
    observees.forEach((observee) => {
      observer.observe(observee)
    })
  }

}
</script>
<style lang="scss" scoped>
  .flex-me {
    display: flex;
    align-items: baseline;
  }
  .flex-me img {
    margin-right: 15px;
  }
  .post-container {
    margin-top: 20px;
    letter-spacing: 1.08px;
    color: #501A3E;
  }
  .post-container div a {
    color: #501A3E;
    text-decoration: none;
  }
  .title {
    line-height: 40px;
  }
  .cover-image {
    object-fit: cover;
    width: 100%;
    height: 300px;
    margin-bottom: 10px;
  }

  .heart-icon {
    object-fit: cover;
    width: 13px;
    height: 13px;
  }
  .profile-pix {
    object-fit: cover;
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
  .lazyload {
    opacity: 0;
  }
  @keyframes animate {
    from {
      opacity: 0;
      transform: translateY(-100px);
    }
    to {
      opacity: 1;
      transform: translateY(0px);
    }
  }
  
</style>