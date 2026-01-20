/**
 * Testimonials Component JavaScript
 * Simple infinite scroll slider with hover pause
 */

(function () {
	"use strict";

	/**
	 * Initialize Testimonials Infinite Sliders
	 */
	const initTestimonialsSliders = function () {
		const topWrapper = document.querySelector(".testimonials-slider-top");
		const bottomWrapper = document.querySelector(".testimonials-slider-bottom");

		// No JavaScript needed - CSS handles the animation
		// Just ensure the wrappers exist
		if (topWrapper && bottomWrapper) {
			console.log("Testimonials: Infinite sliders initialized");
		}
	};

	/**
	 * Wait for DOM to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", initTestimonialsSliders);
		} else {
			initTestimonialsSliders();
		}
	};

	// Initialize when ready
	waitForReady();
})();
