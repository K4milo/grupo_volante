/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


(function ($) {

	var $GeneralScope = {

		// Constructor
		init: function init() {
			this.menuScripts();
		},

		// scripts for Menu
		menuScripts: function menuScripts() {
			$(window).scroll(function () {

				var scroll = $(window).scrollTop();
				var header_el = $('.navbar');

				if (scroll >= 100) {
					header_el.addClass("scroll_menu");
				} else {
					header_el.removeClass("scroll_menu");
				}
			});
		}
	};

	// -- Home -- //
	var $HomeScope = {

		// Constructor
		init: function init() {
			// Instance functions
			this.homeSlider();
			this.homePartners();
		},

		// scripts for banner
		homeSlider: function homeSlider() {
			var $SliderWrapper = $('.hero-slider');
			var $SliderItems = $SliderWrapper.find('.hero-slider__row');
			var $SlidesOpts = {
				dots: true,
				arrows: true,
				slidesToShow: 1,
				slidesToScroll: 1
			};

			if ($SliderItems.length > 0) {
				$SliderWrapper.slick($SlidesOpts);
			}
		},

		homePartners: function homePartners() {
			var $partnerWrapper = $('.partners ul');
			var $SlidesOpts = {
				dots: true,
				arrows: true,
				slidesToShow: 4,
				slidesToScroll: 4,
				autoplay: true,
				autoplaySpeed: 6000,
				responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToScroll: 2,
						slidesToShow: 2
					}
				}, {
					breakpoint: 480,
					settings: {
						slidesToScroll: 1,
						slidesToShow: 1
					}
				}]
			};

			if ($partnerWrapper.length > 0) {
				$partnerWrapper.slick($SlidesOpts);
			}
		}
	};

	// -- Single -- //
	var $SingleScope = {

		// Constructor
		init: function init() {
			// Instance functions
			this.gallerySlider();
		},

		// scripts for banner
		gallerySlider: function gallerySlider() {
			var $SliderWrapper = $('.gallery-slider');
			var $SliderItems = $SliderWrapper.find('.gallery-slider__row');
			var $SlidesOpts = {
				dots: true,
				arrows: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: true
			};

			if ($SliderItems.length > 0) {
				$SliderWrapper.slick($SlidesOpts);
			}
		}
	};

	// -- Map -- //
	var $MapScope = {
		// Constructor
		init: function init() {
			this.mapScripts();
		},

		mapScripts: function mapScripts() {
			var map = L.map('theMap', {
				center: [4.7166516, -74.033964],
				zoom: 15
			});

			var gl = L.mapboxGL({
				attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
				accessToken: 'no-token',
				style: 'https://api.maptiler.com/maps/43f011b7-9356-4679-8ddb-44ad5bc907e1/style.json?key=4ByPNrAy6wHbEZdnwieo'
			}).addTo(map);

			var div_circle = L.divIcon({ className: 'circle' });
			var markerItem = L.marker([4.7163797, -74.0311245], { icon: div_circle }).addTo(map).bindPopup('<h3>Carrera 7c bis # 139-18</h3><p>Oficina 806 Bogotá – Colombia</p>').openPopup();

			map.on('click', function () {
				sidebar.hide();
			});
		}
	};

	// Trigger
	$GeneralScope.init();

	// Home Scripts
	if ($('body').hasClass('home')) {
		$HomeScope.init();
	}

	// Home Scripts
	if ($('body').hasClass('single')) {
		$SingleScope.init();
	}

	// Contact Page
	if ($('body').hasClass('page-template-_contacto-tpl')) {
		$MapScope.init();
	}
})(jQuery);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
module.exports = __webpack_require__(1);


/***/ })
/******/ ]);