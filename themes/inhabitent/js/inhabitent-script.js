// function to show/hide search in menu bar
(function($) {

  if ($('#hero-banner').visible(false)) {
    $('#masthead').removeClass('dark-header');
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