<template>
  <div class="comment-form-container">
      <h3> Leave a comment </h3>
       <p v-if = "isAuth"> You are logged in as {{authUsername}} </p>
      <div v-if = "!isAuth">
        <label for="name"> Name </label> <br>
        <input type="text" name="name" id="name" required>
      </div>
      <div>
        <label for="comment"> Comment </label> <br>
        <textarea name="comment" id="comment" required></textarea>
      </div>
      <div>
        <input type="submit" value="SUBMIT">
      </div>
    
  </div>
</template>
<script>
export default {
  props: ['authUsername', 'isAuth']
}
</script>
<style lang="scss" scoped>
  .comment-form-container {
    letter-spacing: 1.08px;
    margin: 20px 0px;
  }
  textarea {
    width: 100%;
    height: 200px;
    padding-left: 10px;
    outline: none;
  }
  input {
    width: 100%;
    outline: none;
    padding: 5px;
  }
  input[type="submit"] {
    color: #FAF0F8;
    background-color: #501A3E;
    font-size: 18px;
  }
</style>