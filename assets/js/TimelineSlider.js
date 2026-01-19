/**
 * Timeline Slider Component JavaScript
 * 
 * Handles Swiper slider initialization with timeline navigation
 */

(function() {
	'use strict';

	/**
	 * Initialize Timeline Slider Swiper
	 */
	const initTimelineSwiper = function() {
		// Check if Swiper is loaded
		if (typeof Swiper === 'undefined') {
			console.warn('TimelineSlider: Swiper library is not loaded');
			return;
		}

		const sectionElement = document.querySelector('[data-timeline-slider]');
		if (!sectionElement) {
			console.warn('TimelineSlider: Section element not found');
			return;
		}

		const swiperElement = sectionElement.querySelector('[data-timeline-main-swiper]');
		if (!swiperElement) {
			console.warn('TimelineSlider: Swiper element not found');
			return;
		}

		// Check if already initialized
		if (swiperElement.swiper || swiperElement._swiperInstance) {
			console.log('TimelineSlider: Swiper already initialized');
			return;
		}

		const prevButton = sectionElement.querySelector('.timeline-swiper-prev');
		const nextButton = sectionElement.querySelector('.timeline-swiper-next');
		const yearButtons = sectionElement.querySelectorAll('.timeline-year-btn');
		const progressBar = sectionElement.querySelector('[data-timeline-progress]');

		// Build Swiper config
		const swiperConfig = {
			spaceBetween: 30,
			slidesPerView: 'auto',
			speed: 1200,
			loop: true,
			effect: 'slide',
			easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
			breakpoints: {
				768: {
					// slidesPerView: 1.5,
					spaceBetween: 30,
				},
				1024: {
					// slidesPerView: 2,
					spaceBetween: 30,
				},
				1280: {
					// slidesPerView: 1.8,
					spaceBetween: 30,
				},
			},
		};

		// Add navigation if buttons exist
		if (prevButton && nextButton) {
			swiperConfig.navigation = {
				nextEl: nextButton,
				prevEl: prevButton,
				enabled: true,
			};
		}

		// Initialize Swiper
		try {
			const timelineSwiper = new Swiper(swiperElement, swiperConfig);

			// Store swiper instance
			swiperElement._swiperInstance = timelineSwiper;

			// Get total number of slides (use year buttons count for accurate count)
			const totalSlides = yearButtons.length > 0 ? yearButtons.length : timelineSwiper.slides.length;

			// Smooth progress bar animation variables
			let progressAnimationFrame = null;
			let currentProgress = progressBar && totalSlides > 0 ? ((1) / totalSlides) * 100 : 0;
			let targetProgress = currentProgress;
			
			// Smooth progress bar animation function
			const animateProgress = function() {
				if (Math.abs(currentProgress - targetProgress) > 0.1) {
					currentProgress += (targetProgress - currentProgress) * 0.1;
					if (progressBar) {
						progressBar.style.width = currentProgress + '%';
					}
					progressAnimationFrame = requestAnimationFrame(animateProgress);
				} else {
					currentProgress = targetProgress;
					if (progressBar) {
						progressBar.style.width = currentProgress + '%';
					}
				}
			};

			// Update active year button and progress bar on slide change
			const updateActiveYear = function() {
				let activeIndex = timelineSwiper.activeIndex;
				
				// When loop is enabled, get the real index
				if (timelineSwiper.params.loop) {
					activeIndex = timelineSwiper.realIndex;
				}
				
				// Update year buttons
				yearButtons.forEach(function(btn, index) {
					if (index === activeIndex) {
						btn.classList.add('active');
					} else {
						btn.classList.remove('active');
					}
				});

				// Update progress bar smoothly
				if (progressBar && totalSlides > 0) {
					targetProgress = ((activeIndex + 1) / totalSlides) * 100;
					if (progressAnimationFrame) {
						cancelAnimationFrame(progressAnimationFrame);
					}
					progressAnimationFrame = requestAnimationFrame(animateProgress);
				}
			};

			// Update progress bar during transition for smoother animation
			const updateProgressDuringTransition = function() {
				if (progressBar && totalSlides > 0) {
					let activeIndex = timelineSwiper.activeIndex;
					// When loop is enabled, get the real index
					if (timelineSwiper.params.loop) {
						activeIndex = timelineSwiper.realIndex;
					}
					targetProgress = ((activeIndex + 1) / totalSlides) * 100;
					if (progressAnimationFrame) {
						cancelAnimationFrame(progressAnimationFrame);
					}
					progressAnimationFrame = requestAnimationFrame(animateProgress);
				}
			};

			// Handle year button clicks
			yearButtons.forEach(function(btn, index) {
				btn.addEventListener('click', function() {
					const slideIndex = parseInt(btn.getAttribute('data-slide-index'), 10);
					timelineSwiper.slideTo(slideIndex);
				});
			});

			// Update progress during transition start
			timelineSwiper.on('slideChangeTransitionStart', function() {
				updateProgressDuringTransition();
			});

			// Update active year and progress on slide change
			timelineSwiper.on('slideChange', function() {
				updateActiveYear();
			});

			// Update active year and progress initially
			updateActiveYear();

			console.log('TimelineSlider: Swiper initialized successfully', {
				swiper: timelineSwiper,
				slides: timelineSwiper.slides.length,
				hasNavigation: !!swiperConfig.navigation
			});
		} catch (error) {
			console.error('TimelineSlider: Error initializing Swiper', error);
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
						initTimelineSwiper();
					} else {
						retryInit();
					}
				}, 100);
			});
		} else {
			setTimeout(function() {
				if (typeof Swiper !== 'undefined') {
					initTimelineSwiper();
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
					initTimelineSwiper();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error('TimelineSlider: Failed to load Swiper after multiple retries.');
		}
	};

	// Initialize when ready
	waitForReady();

})();
