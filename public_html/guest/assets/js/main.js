// ==================================================
// * Project Name   :  Paradox - Creative Agency HTML5 Template
// * File           :  JS Base
// * Version        :  1.0.1
// * Last change    :  5 May 2023, Saturday
// * Author         :  BDevs (https://themeforest.net/user/bdevs)
// ==================================================

(function($) {
  "use strict";

  // Preloader - Start
  // --------------------------------------------------
	$(window).on('load', function (event) {
		$('#preloader').delay(500).fadeOut(500);
	});
  // Preloader - End
  // --------------------------------------------------

  // carousel - Start
  // --------------------------------------------------
	var bd_rtl = localStorage.getItem('bd_dir');
  let rtl_setting = bd_rtl == 'rtl' ? true : false;
  // carousel - End
  // --------------------------------------------------

  
  // Back To Top - Start
  // --------------------------------------------------
  $(function() {
    $(".scroll").on('click', function() {
      $("html,body").animate({scrollTop: 0}, "slow");
      return false
    });
  });

  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.backtotop.position-fixed:hidden').stop(true, true).fadeIn();
    } else {
      $('.backtotop.position-fixed').stop(true, true).fadeOut();
    }
  });
  // Back To Top - End
  // --------------------------------------------------

  // OffCanvas - Start
  // --------------------------------------------------
  $(".offcanvas__close,.offcanvas__overlay").on("click", function () {
    $(".offcanvas__info").removeClass("info-open");
    $(".offcanvas__overlay").removeClass("overlay-open");
  });
  $(".offcanvas-toggle").on("click", function () {
    $(".offcanvas__info").addClass("info-open");
    $(".offcanvas__overlay").addClass("overlay-open");
  });
  // OffCanvas - End
  // --------------------------------------------------
  
  // sticky header - start
  // --------------------------------------------------
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 0) {
      $('.site_header').addClass("sticky")
    } else {
      $('.site_header').removeClass("sticky")
    }
  });
  // sticky header - end
  // --------------------------------------------------

  // Select - Start
  // --------------------------------------------------
  $('select').niceSelect();

  // Select - End
  // --------------------------------------------------

  // 	Data Css - Start
  // --------------------------------------------------
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});

	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});
  // 	Data Css - End
  // --------------------------------------------------

  // 	Mobile Menu - Start
  // --------------------------------------------------
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "991",
		meanExpand: ['<i class="fal fa-plus"></i>'],
	});
  // Mobile Menu - End
  // --------------------------------------------------

  // wow js - start
  // --------------------------------------------------
  var wow = new WOW({
    animateClass: 'animated',
    offset: 100,
    mobile: true,
    duration: 1000,
  });
  wow.init();
  // wow js - end
  // --------------------------------------------------

  // Tilt - Start
  // --------------------------------------------------
  $('.tilt').tilt({
    maxTilt:        12,
    perspective:    1000,
    scale:          1,
    speed:          1000,
    glare:          false,
    maxGlare:       1
  });
  
  // Tilt - End
  // --------------------------------------------------
  // Mouse Move Parallax - Start
  // --------------------------------------------------
  $('.mouse_move').parallax({
    scalarX: 10.0,
    scalarY: 10.0,
  });
  // Mouse Move Parallax - End
  // --------------------------------------------------

  // Multy Countdown - Start
  // --------------------------------------------------
  $('.countdown_timer').each(function(){
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        var $this = $(this).html(event.strftime(''
          + '<li class="days_count"><div><strong>%D</strong><span>Days</span></div></li>'
          + '<li class="hours_count"><div><strong>%H</strong><span>Hours</span></div></li>'
          + '<li class="minutes_count"><div><strong>%M</strong><span>Mins</span></div></li>'
          + '<li class="seconds_count"><div><strong>%S</strong><span>Secs</span></div></li>'));
      });
    });
  });
  // Multy Countdown - End
  // --------------------------------------------------

  // Videos & Images popup - Start
  // --------------------------------------------------
  $('.popup_video').magnificPopup({
    type: 'iframe',
    preloader: false,
    removalDelay: 160,
    mainClass: 'mfp-fade',
    fixedContentPos: false
  });

  $('.zoom-gallery').magnificPopup({
    delegate: '.popup_image',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function(element) {
        return element.find('img');
      }
    }
    
  });
  // Videos & Images popup - End
  // --------------------------------------------------

  // Odometer Counter - Start
  // --------------------------------------------------
  jQuery('.odometer').appear(function (e) {
    var odo = jQuery(".odometer");
    odo.each(function () {
      var countNumber = jQuery(this).attr("data-count");
      jQuery(this).html(countNumber);
    });
  });
  // Odometer Counter - End
  // --------------------------------------------------

  // Isotope Filter - Start
  // --------------------------------------------------
  // init Isotope
	$(".portfolio-active").imagesLoaded(function () {
		var $grid = $(".grid").isotope({
			itemSelector: ".grid-item",
			itemSelector: ".element-item",
			percentPosition: true,
			masonry: {
				// use outer width of grid-sizer for columnWidth
				columnWidth: 1,
			},
		});

		// filter items on button click
		$(".portfolio-active").on("click", "button", function () {
			var filterValue = $(this).attr("data-filter");
			$grid.isotope({ filter: filterValue });
		});

		//for menu active class
		$(".masonary-menu button").on("click", function (event) {
			$(this).siblings(".active").removeClass("active");
			$(this).addClass("active");
			event.preventDefault();
		});
	});

  // Isotope Filter - End
  // --------------------------------------------------

  // masoney grid layout - Start
  // --------------------------------------------------
  $(".grid").imagesLoaded(function () {
		var $grid = $(".grid").isotope({
			// options
			layoutMode: "fitRows",
		});
		// filter items on button click
		$(".portfolio_button").on("click", "button", function () {
			var filterValue = $(this).attr("data-filter");
			$grid.isotope({ filter: filterValue });
		});

		//for menu active class
		$(".portfolio_button button").on("click", function (event) {
			$(this).siblings(".active").removeClass("active");
			$(this).addClass("active");
			event.preventDefault();
		});
	});

  // masoney grid layout - Start
  // --------------------------------------------------
  var $masoney = $('.masoney-grid').imagesLoaded( function() {
    $masoney.masonry({
      itemSelector: '.grid-item',
      percentPosition: true,
      columnWidth: '.grid-sizer'
    }); 
  });
  // masoney grid layout - End

  // --------------------------------------------------
  

  // Common Carousels - Start
  // --------------------------------------------------
  $('.common_carousel_1col').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    pauseOnHover: true,
    autoplaySpeed: 5000,
    prevArrow: ".cc1c_left_arrow",
    nextArrow: ".cc1c_right_arrow"
  });

  $('.common_carousel_2col').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    pauseOnHover: true,
    autoplaySpeed: 5000,
    rtl: rtl_setting,
    prevArrow: ".cc2c_left_arrow",
    nextArrow: ".cc2c_right_arrow",
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
    ]
  });

  $('.common_carousel_3col').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    pauseOnHover: true,
    autoplaySpeed: 5000,
    rtl: rtl_setting,
    prevArrow: ".cc3c_left_arrow",
    nextArrow: ".cc3c_right_arrow",
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
      },
    },
    {
      breakpoint: 678,
      settings: {
        slidesToShow: 1,
      },
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
      },
    },
    ]
  });

  $('.common_carousel_4col').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    pauseOnHover: true,
    autoplaySpeed: 5000,
    rtl: rtl_setting,
    prevArrow: ".cc4c_left_arrow",
    nextArrow: ".cc4c_right_arrow",
    responsive: [
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
    ]
  });

  $('.common_carousel_centered').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    pauseOnHover: true,
    autoplaySpeed: 5000,
    rtl: rtl_setting,
    prevArrow: ".ccc_left_arrow",
    nextArrow: ".ccc_right_arrow",
  	responsive: [
  		{
  			breakpoint: 1200,
  			settings: {
  				slidesToShow: 2,
  			},
  		},
  		{
  			breakpoint: 992,
  			settings: {
  				slidesToShow: 2,
  			},
  		},
  		{
  			breakpoint: 767,
  			settings: {
  				slidesToShow: 1,
  			},
  		},
  		{
  			breakpoint: 575,
  			settings: {
  				slidesToShow: 1,
  			},
  		},
  	]
  });
  $('.common_carousel_centered_2').slick({
    dots: true,
    speed: 1000,
    arrows: true,
    infinite: true,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 2,
    pauseOnHover: true,
    autoplaySpeed: 5000,
    rtl: rtl_setting,
    prevArrow: ".ccc2_left_arrow",
    nextArrow: ".ccc2_right_arrow",
    responsive: [
  		{
  			breakpoint: 1400,
  			settings: {
  				slidesToShow: 3,
  			},
  		},
  		{
  			breakpoint: 1200,
  			settings: {
  				slidesToShow: 2,
  			},
  		},
  		{
  			breakpoint: 992,
  			settings: {
  				slidesToShow: 2,
  			},
  		},
  		{
  			breakpoint: 768,
  			settings: {
  				slidesToShow: 1,
          centerMode: true,
          centerPadding: '80px',
  			},
  		},
  		{
  			breakpoint: 575,
  			settings: {
  				slidesToShow: 1,
  			},
  		},
    ]
  });
  // Common Carousels - End
  // --------------------------------------------------

  // History Carousel - Start
  // --------------------------------------------------
  $('.history_carousel').slick({
    speed: 10000,
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 5,
    autoplaySpeed: 0,
    cssEase: 'linear',
    pauseOnHover: true,
    rtl: rtl_setting,
    responsive: [
    {
      breakpoint: 1600,
      settings: {
        slidesToShow: 4,
      }
    },
    {
      breakpoint: 1400,
      settings: {
        slidesToShow: 3.5,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2.5,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
      }
    }
    ]
  });
  // History Carousel - End
  // --------------------------------------------------

})(jQuery);

