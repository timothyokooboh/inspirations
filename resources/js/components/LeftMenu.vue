<template>
  <div>
    <div class="left-menu-area" >
      <div class="left-menu-item1-container">

        <div class="left-menu-item1">
          <div> 
            <img src="/images/home.svg" alt="" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "dashboardRoute" > DASHBOARD </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="/images/profile.png" alt="" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "viewProfileRoute"> VIEW PROFILE </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="/images/posts.png" alt="" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "postsRoute"> POSTS </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="/images/draft.png" alt="" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href = "draftsRoute"> DRAFTS </a></div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="/images/followers.svg" alt="users icon" class="left-menu-icon">
          </div>
          <div class="left-menu-item1-text"> 
            <a :href="followersRoute"> FOLLOWERS </a>
          </div>
        </div>

        <div class="left-menu-item1">
          <div> 
            <img src="/images/following.svg" alt="users icon" class="left-menu-icon">
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
    background-color: #501A3E
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