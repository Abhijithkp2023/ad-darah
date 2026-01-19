/**
 * NewsArticles Component JavaScript
 * 
 * Handles Swiper slider initialization for News & Articles section
 * Shows 3 items per view
 */

(function() {
	'use strict';

	/**
	 * Initialize News Articles Swiper
	 */
	const initNewsArticlesSwiper = function() {
		// Check if Swiper is loaded
		if (typeof Swiper === 'undefined') {
			console.warn('NewsArticles: Swiper library is not loaded');
			return;
		}

		const swiperElement = document.querySelector('[data-news-articles-swiper]');
		if (!swiperElement) {
			console.warn('NewsArticles: Swiper element not found');
			return;
		}

		// Check if already initialized
		if (swiperElement.swiper || swiperElement._swiperInstance) {
			console.log('NewsArticles: Swiper already initialized');
			return;
		}

		const swiperWrapper = swiperElement.querySelector('.swiper-wrapper');
		if (!swiperWrapper) {
			console.warn('NewsArticles: Swiper wrapper not found');
			return;
		}

		const slides = swiperWrapper.querySelectorAll('.swiper-slide');
		if (slides.length === 0) {
			console.warn('NewsArticles: No slides found');
			return;
		}

		const sectionElement = swiperElement.closest('.news-articles-container');
		const prevButton = sectionElement ? sectionElement.querySelector('.news-articles-prev-btn') : null;
		const nextButton = sectionElement ? sectionElement.querySelector('.news-articles-next-btn') : null;

		// Build Swiper config - 3 items per view with centered slides
		const swiperConfig = {
			spaceBetween: 30,
			slidesPerView: 1,
			centeredSlides: true, // Enable centered slides - center slide is always active
			loop: slides.length > 3, // Only loop if more than 3 slides
			speed: 800,
			// autoplay: {
			// 	delay: 3000,
			// 	disableOnInteraction: false,
			// 	pauseOnMouseEnter: true,
			// },
			breakpoints: {
				640: {
					slidesPerView: 1.5,
					spaceBetween: 20,
					centeredSlides: true,
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 25,
					centeredSlides: true,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 30,
					centeredSlides: true,
				},
			},
		};

		// Add navigation only if buttons exist
		if (prevButton && nextButton) {
			swiperConfig.navigation = {
				nextEl: nextButton,
				prevEl: prevButton,
				enabled: true,
			};
		}

		// Initialize Swiper
		try {
			const newsArticlesSwiper = new Swiper(swiperElement, swiperConfig);

			// Store swiper instance
			swiperElement._swiperInstance = newsArticlesSwiper;
			window.newsArticlesSwiperInstance = newsArticlesSwiper; // Store globally for debugging

			console.log('NewsArticles: Swiper initialized successfully', {
				swiper: newsArticlesSwiper,
				slides: slides.length,
				hasNavigation: !!swiperConfig.navigation
			});
		} catch (error) {
			console.error('NewsArticles: Error initializing Swiper', error);
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
						initNewsArticlesSwiper();
					} else {
						retryInit();
					}
				}, 100);
			});
		} else {
			setTimeout(function() {
				if (typeof Swiper !== 'undefined') {
					initNewsArticlesSwiper();
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
					initNewsArticlesSwiper();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error('NewsArticles: Failed to load Swiper after multiple retries.');
		}
	};

	// Initialize when ready
	waitForReady();

})();

