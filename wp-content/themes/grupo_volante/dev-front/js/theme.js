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
				arrows: true,
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
				arrows: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: true
			}

			if($SliderItems.length > 0) {
				$SliderWrapper.slick($SlidesOpts);
			}
		},
	}

	// -- Map -- //
	const $MapScope = {
		// Constructor
		init: function() {
			this.mapScripts();
		},

		mapScripts: function() {
			let map = L.map('theMap', {
					center: [4.7166516,-74.033964],
					zoom: 15
				});

			let gl = L.mapboxGL({
				attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
				accessToken: 'no-token',
				style: 'https://api.maptiler.com/maps/43f011b7-9356-4679-8ddb-44ad5bc907e1/style.json?key=4ByPNrAy6wHbEZdnwieo'
			}).addTo(map);

			let div_circle = L.divIcon({ className: 'circle'});
			let markerItem = L.marker([4.7163797,-74.0311245],{icon: div_circle}).addTo(map).bindPopup('<h3>Carrera 7c bis # 139-18</h3><p>Oficina 806 Bogotá – Colombia</p>').openPopup();

			map.on('click', function () {
				sidebar.hide();
			})
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

	// Contact Page
	if($('body').hasClass('page-template-_contacto-tpl')) {
		$MapScope.init();
	}

})(jQuery);