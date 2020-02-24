
<script type="text/javascript">
	new Vue({
    el: "#article",
    data: function() {
      return {
        images: [],
        slider: null
      }
    },
    mounted() {
      var that = this
      setTimeout(function() {
        that.images.push('')
      }, 300)
    },


    updated () {

        $('.gallery').slick({
        autoplay: false,
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: 'linear',
        fade: true,
        speed: 500,
        infinite: false,
        
        responsive: [
        {
          breakpoint: 1280,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 854,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
      });
    }
  })
</script>