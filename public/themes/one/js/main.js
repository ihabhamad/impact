'use strict';
$(document).ready(function() {


/* ==================================================================
                    COMPARE BTN TOGGLE
================================================================== */
$('.gl-compare-icon .gl-compare-btn-wrapper').on('click', function(event) {
  event.preventDefault();

  $(this).parent().find('#gl-compare-menu').toggleClass('gl-compare-menu-visible');
});

/* ==================================================================
                    MODAL
================================================================== */
$('[data-remodal-id=modal], [data-remodal-id=modal-share]').remodal({
    hashTracking : false
});

/* ==================================================================
                    WOW JS
================================================================== */
  var e = new WOW({
      boxClass: "appear",
      animateClass: "animated",
      offset: 100,
      mobile: !1,
      live: !0,
      callback: function(e) {}
  });
  e.init();

/* ==================================================================
                    MAGNIFIC POPUP
================================================================== */
$('.gl-lightbox-img').magnificPopup({
  type: 'image',
  gallery:{
    enabled:true
  }
});

/* ==================================================================
                    MATCH HEIGHT
================================================================== */
$('.gl-footer-widget, .gl-same-height').matchHeight();


/* ==================================================================
                    SELECT2
================================================================== */
$(".gl-category-dropdown-selection").select2({
  placeholder: "Category",
  minimumResultsForSearch: Infinity,
  dropdownCssClass: "gl-big-search-drop"
});

 $(".gl-realestate-category-selection").select2({
  placeholder: "Category",
  minimumResultsForSearch: Infinity,
  dropdownCssClass: "gl-realestate-drop"
});

 $(".gl-realestate-type-selection").select2({
  placeholder: "Type",
  minimumResultsForSearch: Infinity,
  dropdownCssClass: "gl-realestate-drop"
});

$(".gl-location-selection").select2({
  placeholder: "Canada",
  minimumResultsForSearch: Infinity,
  dropdownCssClass: "gl-location-drop"
});

$(".gl--search-category-selection").select2({
  placeholder: "Category",
  minimumResultsForSearch: Infinity,
  dropdownCssClass: "gl-search-category-drop"
});

$(".gl-sort-selection").select2({
  placeholder: "Category",
  minimumResultsForSearch: Infinity,
  dropdownCssClass: "gl-sorting-drop"
});

/* ==================================================================
                    SMOOTH SCROLL
================================================================== */
$('a.gl-scroll-down').smoothScroll();


/* ==================================================================
                    SKILLBAR
================================================================== */
$('.gl-skillbar').waypoint(function(direction) {
    $('.gl-skillbar[data-percent]').each(function () {
        var skillbarWrapper = $(this);
        var progress = $(this).find('span.skill-bar-percent');
        var percentage = Math.ceil($(this).attr('data-percent'));
            $({countNum: 0}).animate({countNum: percentage}, {
              duration: 3000,
              step: function() {
                // What todo on every count
              var pct = '';
              if(percentage == 0){
                pct = Math.floor(this.countNum) + '%';
              }else{
                pct = Math.floor(this.countNum+1) + '%';
              }
              progress.text(pct) && skillbarWrapper.find('.gl-skillbar-bar').css('width',pct);
              }
            });
          })
        this.destroy()
    }, {
    offset: 'bottom-in-view'
});


/* ==================================================================
                    RANGE SLIDER
================================================================== */
$("#gl-salary-range, #gl-adv-search-range").ionRangeSlider({
    type: "double",
    min: 50,
    max: 10000,
    step: 50,
    from: 500,
    to: 7000,
    hide_min_max: true,
    // hide_from_to: true,
    grid: false,
});

var $result = $(".gl-range-value");
var track = function (data) {
    $result.html('$' + data.from + ' - ' + '$' + data.to);
};

$("#gl-search-range").ionRangeSlider({
    type: "double",
    min: 50,
    max: 10000,
    step: 50,
    from: 500,
    to: 7000,
    hide_min_max: true,
    hide_from_to: true,
    grid: false,
    onStart: track,
    onChange: track,
});

/* ==================================================================
                    ISOTOPE
================================================================== */
// BLOG
var $blogGridContainer = $('.gl-blog-grid-wrapper');
var $blogContainer = $('.gl-blog-content');

// $blogContainer.infinitescroll({
//   navSelector  : '#gl-blog-next-page-nav',    // selector for the paged navigation
//   nextSelector : '#gl-blog-next-page-nav a',  // selector for the NEXT link (to page 2)
//   itemSelector : '.gl-blog-items',     // selector for all items you'll retrieve
//   animate: true,
//   loading: {
//     msgText: "",
//     speed: 500,
//     animate: false,
//       finishedMsg: 'No more items to load.',
//       img: 'images/loader.png'
//     }
//   }
// );

$blogGridContainer.imagesLoaded(function() {
  $blogGridContainer.isotope({
      itemSelector: ".gl-blog-items",
      masonry: {
          columnWidth: 1
      }
  })
});

  // $blogGridContainer.infinitescroll({
  //     navSelector  : '#gl-blog-next-page-nav',    // selector for the paged navigation
  //     nextSelector : '#gl-blog-next-page-nav a',  // selector for the NEXT link (to page 2)
  //     itemSelector : '.gl-blog-items',     // selector for all items you'll retrieve
  //     animate: true,
  //     loading: {
  //       msgText: "",
  //       speed: 500,
  //       animate: false,
  //         finishedMsg: 'No more items to load.',
  //         img: 'images/loader.png'
  //       }
  //   },
  //   function(newElements) {
  //     $blogGridContainer.imagesLoaded(function() {
  //         $blogGridContainer.isotope("appended", $(newElements))
  //     })
  // });

  // ISOTOPE
  var $portfolioContainer = $('.gl-listing-categories-wrapper');

    $portfolioContainer.imagesLoaded(function(){
      $portfolioContainer.isotope({
        itemSelector: '.gl-listing-cat-item',
        percentPosition: true,
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: 1
        }
      });
    });

    // ISOTOPE Rest
  var $popularCatList = $('.gl-popular-cat-wrapper');

    $popularCatList.imagesLoaded(function(){
      $popularCatList.isotope({
        itemSelector: '.gl-popular-cat-item',
        percentPosition: true,
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: 1
        }
      });
    });



/* ==================================================================
                    LANDING PAGE HERO HEIGHT
================================================================== */
$(window).resize(function() {
  $('.gl-landing-page-template .gl-hero-img-wrapper').height(
    $(window).height()
  );
});

$(window).trigger('resize');

// Minified Header
  $(window).on('scroll', function() {
      if ($(window).scrollTop() > $(window).height()) {
          $('.gl-transparent-header').addClass('minified');
      } else {
          $('.gl-transparent-header').removeClass('minified');
      }
  });




/* ==================================================================
                    FRONTEND SUBMISSION
================================================================== */
  var clearResize;

  function layoutBuilding() {
     var windowHeight = $(window).height(),
      fixedHeader = $('header.up-redq-header-wrapper'),
      mainWrapper = $('.up-redq-frontend--section'),
      fixedSettings = $('.up-redq-settings-options'),
      searchBox = $('.up-redq-search-box-wrapper'),
      leftSideNav = $('.up-redq-leftside-nav'),
      footerBtns = $('.up-redq-floating-fixed-wrapper'),
      
      mainContent = $('.up-redq-main-content'),
      mainContentHeight = windowHeight - fixedHeader.height(),

      formList = $('.up-redq-item-list'),
      formListHeight = windowHeight - (fixedHeader.height() +  searchBox.height() + 1),

      subbmissionWrapper = $('.up-redq-chatbox-form-wrapper, .up-redq-chatbox-wrapper'),
      subbmissionWrapperHeight = mainContentHeight - (fixedSettings.height() + footerBtns.height() + 1);
      

      mainWrapper.outerHeight(windowHeight);
      leftSideNav.outerHeight(windowHeight);
      mainContent.outerHeight(mainContentHeight);
      formList.outerHeight(formListHeight);
      subbmissionWrapper.outerHeight(subbmissionWrapperHeight);
  };


    layoutBuilding();


    $(window).on('resize', function(e) {
        clearTimeout(clearResize);
        clearResize = setTimeout(function() {
          layoutBuilding();
        }, 250);
    });

/*====================================
=            Push Menu           =
====================================*/
// ON DOM READY
$(function() {
  $('.toggle-nav').click(function() {
    // Calling a function in case you want to expand upon this.
    toggleNav();
  });

  $(document).on('click', function(e){
    var navBtnAndWrapper = $(".up-redq-leftside-nav, .toggle-nav");

    if (!navBtnAndWrapper.is(e.target) && navBtnAndWrapper.has(e.target).length === 0)
    {
        $('.up-redq-frontend--section').removeClass('show-nav');
    }
  });
});

// CUSTOM FUNCTIONS
function toggleNav() {
  if ($('.up-redq-frontend--section').hasClass('show-nav')) {
    // Do things on Nav Close
    $('.up-redq-frontend--section').removeClass('show-nav');
  } else {
    // Do things on Nav Open
    $('.up-redq-frontend--section').addClass('show-nav');
  }
}

  /* ==================================================================
                      SELECT2
  ================================================================== */
  $(".up-redq-select-category").select2({
    placeholder: "",
    minimumResultsForSearch: Infinity,
    dropdownCssClass: "up-dropdown-class"
  });


  /* ==================================================================
                      Header DROPDOWN
  ================================================================== */
  var headerDropDownBtns = $("header .up-dropdown--btn");
  
  headerDropDownBtns.on('click', function(e){
    e.preventDefault();

    if ($(this).children('.up-redq--dropdown').hasClass('animate-dropdown-menu')) {
      $(this).children('.up-redq--dropdown').removeClass('animate-dropdown-menu');
    } else {
     headerDropDownBtns.children('.up-redq--dropdown').removeClass('animate-dropdown-menu');
      $(this).children('.up-redq--dropdown').addClass('animate-dropdown-menu');
    }
  });

  $(document).on('click', function(e){
    if (!headerDropDownBtns.is(e.target) && headerDropDownBtns.has(e.target).length === 0)
    {
        headerDropDownBtns.children('ul').removeClass('animate-dropdown-menu')
    }
  });


  /* ==================================================================
                      DROPDOWN
  ================================================================== */
var dropDownBtns = $(".up-dropdown-toggle-btn");

  dropDownBtns.on('click', function(e){
    e.preventDefault();

    if ($(this).children('.up-redq-option-dropdown').hasClass('open-settings')) {
      $(this).children('.up-redq-option-dropdown').removeClass('open-settings').hide();
    } else {
     dropDownBtns.children('.up-redq-option-dropdown').removeClass('open-settings').hide();
      $(this).children('.up-redq-option-dropdown').addClass('open-settings').show();
    }
  });

  $(document).on('click', function(e){
    if (!dropDownBtns.is(e.target) && dropDownBtns.has(e.target).length === 0)
    {
        dropDownBtns.children('ul').removeClass('open-settings').hide()
    }
  });


  /* ==================================================================
                      NICE SCROLL
  ================================================================== */
  $(".up-redq-leftside-nav, .up-redq-item-list, .up-redq-chatbox-wrapper, .up-redq-friends-profile-wrapper, .up-redq-chatbox-wrapper").niceScroll({
    cursorcolor: "#ff6060", // change cursor color in hex
    cursorwidth: "2px", // cursor width in pixel (you can also write "5px")
    cursorborder: "0px solid #fff", // css definition for cursor border
    cursorborderradius: "0",
    horizrailenabled: false,
    zindex: 10
  });

  $(".up-redq-frontend--section, .up-redq-chatbox-form-wrapper, .up-console-page .up-redq-main-content").niceScroll({
    cursorcolor: "#ff6060", // change cursor color in hex
    cursorwidth: "5px", // cursor width in pixel (you can also write "5px")
    cursorborder: "0px solid #fff", // css definition for cursor border
    cursorborderradius: "0",
    horizrailenabled: false,
    zindex: 10
  });

  // $(".up-redq-chatbox-wrapper").niceScroll({
  //   cursorcolor: "#ff6060", // change cursor color in hex
  //   cursorwidth: "2px", // cursor width in pixel (you can also write "5px")
  //   cursorborder: "0px solid #fff", // css definition for cursor border
  //   cursorborderradius: "0",
  //   horizrailenabled: false,
  //   zindex: 10
  // });




  /* ==================================================================
                      Cross btn functionality
  ================================================================== */
  // $('.up-msg-del-btn').on('click', function(event) {
  //   event.preventDefault();
  //    Act on the event 
  //   confirm(
  //     $(this).parents('.up-redq-single-msg').remove()
  //   );
    
  // });

$('.up-msg-del-btn').on('click', function(e) {
    e.preventDefault();
    var thisMsg = $(this).parents('.up-redq-single-msg');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this message!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#ff6060",
      confirmButtonText: "Delete",
      closeOnConfirm: false,
      html: false
    }, function(isConfirm){
      swal("Deleted!",
      "This message has been deleted.",
      "success");
      if (isConfirm) {
        thisMsg.remove();
      }
    });
});

$("#up-redq-chat-text").emojioneArea({
  pickerPosition: "top",
  tones: false
});

  /* ==================================================================
                      Easy Tabs
  ================================================================== */
$('.up-redq-follow-widgets').easytabs({
  animate: true,
  updateHash: false,
  animationSpeed: 300
}); 

  /* ==================================================================
                      Del Notification
  ================================================================== */
$('.up-redq-notification-close-btn').on('click', function(e) {
  e.preventDefault();
  /* Act on the event */

  $(this).parent().remove()
});


});