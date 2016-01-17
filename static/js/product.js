(function($) {

  Product.prototype.bindHandlers = function() {
    var THIS = this;
    if ($('.swiper-container')) {
      this.createGalleries();
    }
  }

  Product.prototype.createGalleries = function() {

    var slides = $(window).width() > 500 ? 1.5 : 1,
        slidePos = $(window).width() > 500 ? true : false;


    $('.ps-gallery').each(function(){

      var $sc = $(this).find('.swiper-container');

      $sc.swiper({
        speed: 400,
        keyboardControl: true,
        loop: true,
        centeredSlides: true,
        slidesPerView: slides,
        nextButton: '.ps-next',
        prevButton: '.ps-prev'
      });

    });
  }

  function Product() {
    this.Product = false;
    this.bindHandlers();
  }

  $(window).on("load", function() {
      new Product();
  });

})(jQuery);
