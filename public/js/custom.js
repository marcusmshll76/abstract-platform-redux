// Content slide open
$(function(){
  $('.menu-button').click(function(){
      $('.navbar-mobile .nav-item').slideToggle( "300" );
  });
});

// owl carousel
$(document).ready(function() {
  $('.default-slider').owlCarousel({
    items: 1,
    loop: false,
    center: true,
    margin: 0,
    nav:true,
    mouseDrag: false,
    touchDrag: false,
    callbacks: true,
    autoHeight:false,
    URLhashListener: true,
    autoplayHoverPause: false,
    startPosition: 'URLHash',
    autoplay:false,
    autoplayTimeout:6000,
    autoplaySpeed:1500,
    autoplayHoverPause:false,
    smartSpeed:800,
  });
})
$(document).ready(function() {
  $('.new-image').owlCarousel({
    items: 4,
    loop: true,
    margin: 0,
    nav:true,
    mouseDrag: true,
    touchDrag: true,
    autoHeight:false,
    autoplayHoverPause: false,
    autoplay:false,
    autoWidth:true,
  });
})

// Content slide open
$(document).ready(function () {
  $('#close-search').click(function(){
      $('#search-result').slideUp(400, 'easeOutSine');
      $('#close-search').fadeOut('fast');
  });
  $('.showMore').click(function(){
      $('.longValue').toggleClass('open');
  });
  $('.toggle-title').click(function(){
      $(this).siblings('.toggle-content').slideToggle(300, 'easeOutSine');
  });
})

// Dropdown
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});

// add class  
$(document).ready(function(){
  $(".sidebar-toggle.open").click(function(){
      $(".right-sidebar").removeClass("shrink");
      $(".section-content-toggle").removeClass("col-md-offset-3");
  });
})

// smooth scroll
$(document).ready(function() {
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
});

// select
$(document).ready(function() {
  [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {  
    new SelectFx(el);
  } );
});

// Date picker
$(function(){
  $.datepicker.setDefaults(
    $.extend( $.datepicker.regional[ '' ] )
  );
  $( '.datepicker' ).datepicker();
});

// tooltips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

// selection-option
$(document).on('change', '.analysis-mode', function() {
  var target = $(this).data('target');
  var show = $("option:selected", this).data('show');
  $(target).children().addClass('hide');
  $(show).removeClass('hide');
});
$(document).ready(function(){
  $('.analysis-mode').trigger('change');
});
$(document).ready(function(){
$( '.company-table' ).on( 'mousewheel DOMMouseScroll', function ( e ) {
    var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;

    this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
    e.preventDefault();
});
});

// section-tab
$(document).ready(function() {
    $('.section-tab .col').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
    });
});

$(document).ready(function(){
  if( jQuery(".toggle .title-name").hasClass('active') ){
      jQuery(".toggle .title-name.active").closest('.toggle').find('.toggle-inner').show();
    }
    jQuery(".toggle .title-name").click(function(){
      if( jQuery(this).hasClass('active') ){
        jQuery(this).removeClass("active").closest('.toggle').find('.toggle-inner').slideUp(200);
      }
      else{ jQuery(this).addClass("active").closest('.toggle').find('.toggle-inner').slideDown(200);
      }
    });
});

