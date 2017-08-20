// function to show/hide search in menu bar
(function($) {

// trigger class when scroll down page

if ( $('body').is('.page-template-about') || $('body').is('.home') ) {

  var bannerHeight = $('#hero-banner').height();
  /*eslint-disable */
  var inhabitentUri = wpInhabitentScript.templateUri; 
   /*eslint-enable */

  $(window).on('scroll', function() {
      var yScrollPosition = window.pageYOffset;
      var scrollMax = bannerHeight;

      if(yScrollPosition > scrollMax) {
        $('#masthead').removeClass('dark-header');
        $('.site-branding img').attr( 'src', inhabitentUri + '/images/logos/inhabitent-logo-tent.svg') 
      } else {
        $('#masthead').addClass('dark-header');
        $('.site-branding img').attr( 'src', inhabitentUri + '/images/logos/inhabitent-logo-tent-white.svg') 
      }
  });
}

// show when click search icon
$('.search-toggle').on('click', function () {
  if (!$('.search-field').hasClass('search-field-show')) {
    $('.search-field').addClass('search-field-show').trigger('focus');
  }
});

// hide when losing focus
$('.search-field').blur(function() {
  $('.search-field').removeClass('search-field-show');
});

})(jQuery);