jQuery(document).ready(function($) {

  //
  // This is where all of the simple site actions live.
  // More complicated interactions for Products, Process, and Platform have been
  // broken up into their own files.
  //


  // open and close nav

  function toggleNav() {
    $('body').toggleClass('on');
  };

  $('.js-navTrigger').click( function() {
    toggleNav();
  });

  $('.contentWrapper').click( function() {
    if ($('body').hasClass('on')) {
      toggleNav();
    };
  })


  // expand advisors

  $('.advisors-more').click( function() {
    $(this).closest('.advisors-item').toggleClass('is-expanded');
  });


  // expand job item

  $('.job-itemTrigger').click( function() {
     $(this).closest('.job-item').toggleClass('is-expanded');
  });


  // fill job form with desired job

  $('.job-goToForm').click( function() {
    var job = $(this).closest('.job-item').find('.job-title').text();
    $('#fscf_field2_5').val(job);
  });


  // FitVids

  function activateFitVid() {
    $('.blog-body iframe').closest('p').addClass('has-iframe-inside');
    $('.ps-body iframe').closest('p').addClass('has-iframe-inside');
    $('.ps-body img').closest('p').addClass('has-image-inside');
    $('.has-iframe-inside').fitVids();
  }

  function maybeInitFitVid() {
    if ($('body').hasClass('single') || $('body').hasClass('single-product')) {
      activateFitVid();
    };
  }

  maybeInitFitVid();

  function maybeInitQuickShare() {
    if ($('body').hasClass('single')) {
      quickShare();
    };
  }
  maybeInitQuickShare();
});
