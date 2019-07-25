(function($){

	const $GeneralScope = {

		// Constructor
		init: function() {
			this.menuScripts();
		},

		// scripts for Menu
		menuScripts: function() { 
			$(window).scroll(function() {

				let scroll    = $(window).scrollTop();
				let header_el = $('.navbar');

				if (scroll >= 100) {
					header_el.addClass("scroll_menu");
				} else {
					header_el.removeClass("scroll_menu");
				}
			});
		},
	}

	// -- Home -- //
	const $HomeScope = {

		// Constructor
		init: function() {
			// Instance functions
			this.homeSlider();
			this.homePartners();
		},


		// scripts for banner
		homeSlider: function() {
			let $SliderWrapper = $('.hero-slider');
			let $SliderItems   = $SliderWrapper.find('.hero-slider__row');
			let $SlidesOpts = {
				dots: true,
				arrows: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}

			if($SliderItems.length > 0) {
				$SliderWrapper.slick($SlidesOpts);
			}
		},

		homePartners: function() {
			let $partnerWrapper = $('.partners ul');
			let $SlidesOpts = {
				dots: true,
				arrows: true,
				slidesToShow: 4,
				slidesToScroll: 4,
				autoplay: true,
				autoplaySpeed: 6000,
				responsive: 
				[
					{
						breakpoint: 1024,
						settings: {
							slidesToScroll: 2,
							slidesToShow: 2,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToScroll: 1,							
							slidesToShow: 1,							
						}
					}
				]
			}

			if($partnerWrapper.length > 0) {
				$partnerWrapper.slick($SlidesOpts);
			}
		},
	}

	// -- Single -- //
	const $SingleScope = {

		// Constructor
		init: function() {
			// Instance functions
			this.gallerySlider();
		},


		// scripts for banner
		gallerySlider: function() {
			let $SliderWrapper = $('.gallery-slider');
			let $SliderItems   = $SliderWrapper.find('.gallery-slider__row');
			let $SlidesOpts = {
				dots: true,
				arrows: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: true
			}

			if($SliderItems.length > 0) {
				$SliderWrapper.slick($SlidesOpts);
			}
		},
	}

	// Trigger 
	$GeneralScope.init();

	// Home Scripts
	if($('body').hasClass('home')) {
		$HomeScope.init();
	}

	// Home Scripts
	if($('body').hasClass('single')) {
		$SingleScope.init();
	}

})(jQuery);