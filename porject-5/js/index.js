$('.owl-carousel').owlCarousel({
  loop: true,
  autoplay: false,
  margin: 0,
  nav: false,
  dots: true,
  mouseDrag: false,
  slideBy: 2,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 2,
    },
  },
})

$(document).ready(function () {
  var carousel = $('.owl-carousel')

  $('#prev').click(function () {
    carousel.trigger('prev.owl.carousel')
  })

  $('#next').click(function () {
    carousel.trigger('next.owl.carousel')
  })
})
