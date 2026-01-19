/**
 * Venue At A Glance Component JavaScript
 * 
 * Handles Swiper slider initialization with thumbnail navigation
 */

(function() {
	'use strict';

	/**
	 * Initialize Venue At A Glance Swiper
	 */
	const initVenueSwiper = function() {
		// Check if Swiper is loaded
		if (typeof Swiper === 'undefined') {
			console.warn('VenueAtAGlance: Swiper library is not loaded');
			return;
		}

		const sectionElement = document.querySelector('[data-venue-glance]');
		if (!sectionElement) {
			console.warn('VenueAtAGlance: Section element not found');
			return;
		}

		const mainSwiperElement = sectionElement.querySelector('[data-venue-main-swiper]');
		const thumbnailSwiperElement = sectionElement.querySelector('[data-venue-thumbnail-swiper]');

		if (!mainSwiperElement || !thumbnailSwiperElement) {
			console.warn('VenueAtAGlance: Swiper elements not found');
			return;
		}

		// Check if already initialized
		if (mainSwiperElement.swiper || mainSwiperElement._swiperInstance) {
			console.log('VenueAtAGlance: Swiper already initialized');
			return;
		}

		const prevButton = sectionElement.querySelector('.venue-swiper-prev');
		const nextButton = sectionElement.querySelector('.venue-swiper-next');

		// Initialize Thumbnail Swiper first
		const thumbnailSwiper = new Swiper(thumbnailSwiperElement, {
			spaceBetween: 10,
			slidesPerView: 3,
			freeMode: true,
			watchSlidesProgress: true,
			breakpoints: {
				640: {
					slidesPerView: 4,
					spaceBetween: 15,
				},
				768: {
					slidesPerView: 5,
					spaceBetween: 15,
				},
				1024: {
					slidesPerView: 6,
					spaceBetween: 10,
				},
			},
		});

		// Initialize Main Swiper
		const mainSwiperConfig = {
			spaceBetween: 0,
			slidesPerView: 1,
			loop: true,
			speed: 800,
			// autoplay: {
			// 	delay: 4000,
			// 	disableOnInteraction: false,
			// 	pauseOnMouseEnter: true,
			// },
			thumbs: {
				swiper: thumbnailSwiper,
			},
		};

		// Add navigation if buttons exist
		if (prevButton && nextButton) {
			mainSwiperConfig.navigation = {
				nextEl: nextButton,
				prevEl: prevButton,
				enabled: true,
			};
		}

		// Initialize Main Swiper
		try {
			const mainSwiper = new Swiper(mainSwiperElement, mainSwiperConfig);

			// Store swiper instances
			mainSwiperElement._swiperInstance = mainSwiper;
			thumbnailSwiperElement._swiperInstance = thumbnailSwiper;

			console.log('VenueAtAGlance: Swiper initialized successfully', {
				mainSwiper: mainSwiper,
				thumbnailSwiper: thumbnailSwiper,
				hasNavigation: !!mainSwiperConfig.navigation
			});
		} catch (error) {
			console.error('VenueAtAGlance: Error initializing Swiper', error);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', function() {
				setTimeout(function() {
					if (typeof Swiper !== 'undefined') {
						initVenueSwiper();
					} else {
						retryInit();
					}
				}, 100);
			});
		} else {
			setTimeout(function() {
				if (typeof Swiper !== 'undefined') {
					initVenueSwiper();
				} else {
					retryInit();
				}
			}, 100);
		}
	};

	/**
	 * Retry initialization if Swiper is not loaded
	 */
	let retryCount = 0;
	const maxRetries = 10;
	const retryInit = function() {
		if (retryCount < maxRetries) {
			retryCount++;
			setTimeout(function() {
				if (typeof Swiper !== 'undefined') {
					initVenueSwiper();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error('VenueAtAGlance: Failed to load Swiper after multiple retries.');
		}
	};

	// Initialize when ready
	waitForReady();

})();
