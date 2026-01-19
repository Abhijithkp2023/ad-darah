/**
 * Perfect Day Slider Component JavaScript
 */

(function () {
	"use strict";

	console.log("PerfectDaySlider: Script loaded");

	/**
	 * Initialize Perfect Day Swiper
	 */
	const initPerfectDaySwiper = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			return;
		}

		const swiperElement = document.querySelector("[data-perfect-day-swiper]");

		if (!swiperElement) {
			return;
		}

		if (swiperElement.swiper || swiperElement._swiperInstance) {
			return;
		}

		const slides = swiperElement.querySelectorAll(".swiper-slide");

		if (slides.length === 0) {
			console.warn("PerfectDaySlider: No slides found");
			return;
		}

		try {
			// Get container padding to match initial spacing
			const container = swiperElement.closest(".container");
			let initialOffset = 20; // Default container padding
			if (container) {
				const containerStyle = window.getComputedStyle(container);
				const paddingLeft = parseInt(containerStyle.paddingLeft) || 20;
				initialOffset = paddingLeft;
			}

			const swiperConfig = {
				spaceBetween: 20,
				slidesPerView: 2,
				autoplay: false,
				slidesOffsetBefore: initialOffset, // Add space before first slide to match container
				breakpoints: {
					768: {
						slidesPerView: 2,
						spaceBetween: 20,
						slidesOffsetBefore: initialOffset,
					},
					1024: {
						slidesPerView: 3,
						spaceBetween: 20,
						slidesOffsetBefore: initialOffset,
					},
					1200: {
						slidesPerView: 3.2,
						spaceBetween: 20,
						slidesOffsetBefore: initialOffset,
					},
				},
			};

			console.log("PerfectDaySlider: Config:", swiperConfig);
			const swiperInstance = new Swiper(swiperElement, swiperConfig);
			swiperElement._swiperInstance = swiperInstance;

			// Explicitly stop autoplay if it exists
			if (swiperInstance.autoplay) {
				swiperInstance.autoplay.stop();
			}
		} catch (error) {
			console.error("PerfectDaySlider: Error initializing Swiper:", error);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initPerfectDaySwiper, 100);
			});
		} else {
			setTimeout(initPerfectDaySwiper, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();
