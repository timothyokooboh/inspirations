<template>

    <div class="share-stories">
        <div class="lazy-load">
            <h2>Are you a Covid-19 survivor?</h2>
            <h4>Share your story. Someone needs to hear it to keep hope alive.</h4>
            <div>
              <a :href = "allStories">See all stories</a>
            </div>
        </div>
        <div  class="lazy-load">
            <h2>Are you a breast cancer survivor?</h2>
            <h4>Share your experience. Uplift a soul.</h4>
            <div>
              <a :href = "allStories">See all stories</a>
            </div>
        </div>
        <div  class="lazy-load">
            <h2> Finally got your dream job? </h2>
            <h4> Share your insights. Someone could learn from you. </h4>
            <div>
              <a :href = "allStories">See all stories</a>
            </div>
        </div>
        <div class="lazy-load">
            <h2>What success secrets have paved a way for you?</h2>
            <h4>Share your knowledge. Sharing is caring.</h4>
            <div>
              <a :href = "allStories" >See all stories</a>
            </div>
        </div>
    </div>
    
</template>
<script>
export default {
  props: ['allStories'],
  mounted () {
    const observees = document.querySelectorAll('.lazy-load');
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
<style >
  .share-stories {
    color: #501A3E;
    margin-top: 40px;
    padding: 0px 50px;
    display: grid;
    width: 100%;
    grid-template-columns: auto auto;
    justify-content: space-around;
    column-gap: 150px;
    row-gap: 50px;
  }
  .share-stories a {
    color: #501A3E;
    text-decoration: underline;
  }
  .lazy {
    opacity: 0;
    letter-spacing: 1.08px;
  }
  @keyframes animate {
    from {
      opacity: 0;
      transform: translateX(-100px);
    }
    to {
      opacity: 1;
      transform: translateX(0px);
    }
  }

  @media (max-width:760px) {
    .share-stories {
      grid-template-columns: auto;
      text-align: center;
      row-gap: 50px;
      padding: 0px 0px;
    }
  }

</style>