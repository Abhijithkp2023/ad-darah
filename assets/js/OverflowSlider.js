/**
 * Overflow Slider Component JavaScript
 */

(function () {
	"use strict";

	console.log("OverflowSlider: Script loaded");

	/**
	 * Initialize Overflow Slider Swiper
	 */
	const initOverflowSliderSwiper = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			return;
		}

		const swiperElement = document.querySelector("[data-overflow-slider-swiper]");

		if (!swiperElement) {
			return;
		}

		if (swiperElement.swiper || swiperElement._swiperInstance) {
			return;
		}

		const slides = swiperElement.querySelectorAll(".swiper-slide");

		if (slides.length === 0) {
			console.warn("OverflowSlider: No slides found");
			return;
		}

		try {
			const swiperConfig = {
				spaceBetween: 20,
				slidesPerView: 1,
				autoplay: false,
				breakpoints: {
					768: {
						slidesPerView: 2,
						spaceBetween: 20,
					},
					1024: {
						slidesPerView: 3,
						spaceBetween: 20,
					},
					1200: {
						slidesPerView: 2.8,
						spaceBetween: 20,
					},
				},
			};

			console.log("OverflowSlider: Config:", swiperConfig);
			const swiperInstance = new Swiper(swiperElement, swiperConfig);
			swiperElement._swiperInstance = swiperInstance;

			// Explicitly stop autoplay if it exists
			if (swiperInstance.autoplay) {
				swiperInstance.autoplay.stop();
			}
		} catch (error) {
			console.error("OverflowSlider: Error initializing Swiper:", error);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initOverflowSliderSwiper, 100);
			});
		} else {
			setTimeout(initOverflowSliderSwiper, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();

