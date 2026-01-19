/**
 * Infinite Slider Component JavaScript
 * Handles hover pause functionality for CSS-based infinite slider
 */

(function() {
	'use strict';

	/**
	 * Initialize Infinite Slider hover pause
	 */
	const initInfiniteSlider = function() {
		const sliderWrapper = document.querySelector('[data-infinite-slider]');
		
		if (!sliderWrapper) {
			return;
		}

		const sliderTrack = sliderWrapper.querySelector('.infinite-slider-track');
		
		if (!sliderTrack) {
			return;
		}

		// Pause animation on hover
		sliderWrapper.addEventListener('mouseenter', function() {
			sliderTrack.style.animationPlayState = 'paused';
		});

		// Resume animation on mouse leave
		sliderWrapper.addEventListener('mouseleave', function() {
			sliderTrack.style.animationPlayState = 'running';
		});
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initInfiniteSlider);
		} else {
			// DOM already loaded
			initInfiniteSlider();
		}
	};

	// Start initialization
	init();

})();

