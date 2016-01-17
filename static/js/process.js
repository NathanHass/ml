(function($) {

  // set global vars
  var $window = $(window),
  windowH = $window.height();

  Process.prototype.bindHandlers = function() {
    var THIS = this;

    // execute on scroll
    if ($('html').hasClass('no-touch')) {
      $(window).scroll(function() {
        if ($window.width() >= 900 ) {
          THIS.fixCardSection();
        };
        THIS.fixEachCard();
      })
    }
  };

  Process.prototype.fixCardSection = function() {
    var $cardHead = $('.card-header'),
        $stickyEl = $('.card-stack'),
        stickyElH = $stickyEl.height(),
        elTop = $stickyEl.offset().top - 80,
        elBottom = $stickyEl.offset().top - windowH + stickyElH - 80;


    if ($window.scrollTop() < elTop) {
      $cardHead.removeClass('sticky').removeClass('after');
    } else if ($window.scrollTop() >= elTop &&  $window.scrollTop() <= elBottom){
      $cardHead.addClass('sticky').removeClass('after');
    } else {
      $cardHead.removeClass('sticky').addClass('after');
    }
  }

  Process.prototype.fixEachCard = function() {
    $('.card').each(function() {

      var $count = $(this).data("count"),
          $svgID ='circle--' + $count;

      if ($window.scrollTop() > $(this).offset().top - (windowH * 0.45)) {
        $(this).addClass('active')
        $('#' + $svgID).attr("class", "on");
      } else {
        $(this).removeClass('active')
        $('#' + $svgID).attr("class", "off")
      }
    })

  }

  function Process() {
    this.Process = false;
    this.bindHandlers();
  }

  $(window).on("load", function() {
      new Process();
  });

})(jQuery);
