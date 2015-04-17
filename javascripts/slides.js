jQuery(function($) {

$.extend(true, $.deck.defaults, {
  automatic: {
    startRunning: true,    // true or false
    cycle: true,           // true or false
    slideDuration: 10000 // duration in milliseconds
  }
});

$.deck('.slide');

$(document).bind('deck.change', function(event, from, to) {
   var currentSlide = $.deck('getSlide', to);
   var slideId = currentSlide.attr('id');
    $('body').attr('class', slideId);
});

});
