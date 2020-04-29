<template>
  <div>
   <div class="create-post-icon">
    <a :href = "createPostRoute"> 
      <img src="/images/create.svg" alt="create post icon"> 
    </a>
    <span> Create Post </span>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['createPostRoute']
  }
</script>
<style scoped>
  .create-post-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    cursor: pointer;  
  }
  .create-post-icon span {
    display: none
  }
  .create-post-icon:hover span {
    display: block;
    z-index: 1;
    background-color: #501A3E;
    text-align: center;
    color: #FAF0F8;
    width: 120px;
    border-radius: 10px;
    position: absolute;
    bottom: 40px;
    right: 80px;
    padding: 10px 0px;
    text-decoration: none
  }
</style>