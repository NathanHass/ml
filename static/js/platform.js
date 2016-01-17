(function($) {

  // declare swiper varibles
  var techSwiper,
      ideaSwiper;

  Platform.prototype.init = function() {
    this.initTechSwiper();
    this.initIdeaSwiper();
  }

  Platform.prototype.bindHandlers = function() {
    this.watchTechButtons();
    this.watchIdeaButtons();
  }

  Platform.prototype.initTechSwiper = function() {
      techSwiper = new Swiper ('.platform-techSwiperMod', {
      calculateHeight:true,
      setWrapperSize: true,
      direction: 'horizontal',
      onTransitionStart: function() {
        $('.platform-techMod').attr('class', 'platform-techMod slide-' + techSwiper.activeIndex);
        console.log(techSwiper.activeIndex);
      }
    })
  }

  Platform.prototype.watchTechButtons = function() {
    $('.platform-button1').click(function() {
      techSwiper.slideTo(0)
    })
    $('.platform-button2').click(function() {
      techSwiper.slideTo(1)
    })
    $('.platform-button3').click(function() {
      techSwiper.slideTo(2)
    })
  }

  Platform.prototype.initIdeaSwiper = function() {
    ideaSwiper = new Swiper ('.platform-ideasSwiperMod', {
      // Optional parameters
      // slideClass: ,
      calculateHeight:true,
      direction: 'horizontal',
      onTransitionStart: function() {
        $('.platform-ideasMod').attr('class', 'platform-ideasMod slide-' + ideaSwiper.activeIndex);
        console.log('slide-' + ideaSwiper.activeIndex);
      }
    })
  }


  Platform.prototype.watchIdeaButtons = function() {
    $('.platform-button4').click(function() {
      ideaSwiper.slideTo(0)
    })
    $('.platform-button5').click(function() {
      ideaSwiper.slideTo(1)
    })
    $('.platform-button6').click(function() {
      ideaSwiper.slideTo(2)
    })
  }

  function Platform() {
    this.Platform = false;
    this.init();
    this.bindHandlers();
  }

  $(window).on("load", function() {
      new Platform();
  });

})(jQuery);

