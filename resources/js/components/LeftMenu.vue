<template>
  <div>
    <div class="left-menu-area" >
      <div class="left-menu-item1-container">

        <div class="left-menu-item1">
          <div> 
            <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272317/samples/inspirations/home_hmxzoy.svg" alt="dashboard icon" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "dashboardRoute" > DASHBOARD </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589273052/samples/inspirations/following_guhswc.svg" alt="view profile icon" class="left-menu-icon" >
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "viewProfileRoute"> VIEW PROFILE </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272373/samples/inspirations/posts_jbdfhv.png" alt="posts icon" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "postsRoute"> POSTS </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272391/samples/inspirations/draft_s5t5he.png" alt="drafts icon" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "draftsRoute"> DRAFTS </a></div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589273033/samples/inspirations/followers_fxhhsb.svg" alt="followers icon" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href="followersRoute"> FOLLOWERS </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589273052/samples/inspirations/following_guhswc.svg" alt="following icon" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "followingRoute"> FOLLOWING </a>
            </div>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: [
      'dashboardRoute', 
      'viewProfileRoute', 
      'postsRoute', 
      'draftsRoute',
      'followersRoute',
      'followingRoute'
    ]
  }
</script>
<style scoped>
  .left-menu-area {
    height: 100vh;
    width: 300px;
    margin-right: 50px;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    background-color: #2C3135;
  }
  .left-menu-item1-container {
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    align-content: start;
  }
  .left-menu-item1 {
    display: flex;
    margin-top: 50px;
  }
  .left-menu-item1-text {
    margin-left: 20px;
    font-size: 20px;
    color: #FAF0F8;
  }
  .left-menu-item1-text a {
    color: #FAF0F8;
  }
  .left-menu-item1-text a:hover {
    color: #FAF0C8;
    text-decoration: none;
  }
  .left-menu-icon {
    width: 24px;
    height: 27px;
  }
   @media (max-width: 754px) {
    .left-menu-area {
      display: none;
    }
  }
</style>