/**
 * Single Testimonial Component JavaScript
 * Handles Swiper initialization for single testimonial slider
 */

(function () {
	"use strict";

	console.log("SingleTestimonial: Script loaded");

	/**
	 * Initialize Single Testimonial Swiper
	 */
	const initSingleTestimonialSwiper = function () {
		console.log("SingleTestimonial: initSingleTestimonialSwiper called");

		// Check if Swiper is loaded
		console.log(
			"SingleTestimonial: Checking if Swiper is loaded...",
			typeof Swiper
		);
		if (typeof Swiper === "undefined") {
			console.warn("SingleTestimonial: Swiper library is not loaded");
			return;
		}
		console.log("SingleTestimonial: Swiper library is loaded ✓");

		const swiperElement = document.querySelector(
			"[data-single-testimonial-swiper]"
		);
		console.log(
			"SingleTestimonial: Looking for element [data-single-testimonial-swiper]..."
		);
		console.log("SingleTestimonial: Element found:", swiperElement);

		if (!swiperElement) {
			console.warn("SingleTestimonial: Swiper element not found in DOM");
			console.log(
				"SingleTestimonial: Available elements with data attributes:",
				Array.from(document.querySelectorAll("[data-*]")).map((el) =>
					el.getAttributeNames().find((attr) => attr.startsWith("data-"))
				)
			);
			return;
		}

		console.log("SingleTestimonial: Checking if already initialized...");
		console.log(
			"SingleTestimonial: swiperElement.swiper:",
			swiperElement.swiper
		);
		console.log(
			"SingleTestimonial: swiperElement._swiperInstance:",
			swiperElement._swiperInstance
		);
		console.log(
			"SingleTestimonial: Has swiper-initialized class:",
			swiperElement.classList.contains("swiper-initialized")
		);

		// Check if already initialized - check multiple ways
		if (
			swiperElement.swiper ||
			swiperElement._swiperInstance ||
			swiperElement.classList.contains("swiper-initialized")
		) {
			console.log("SingleTestimonial: Swiper already initialized, skipping");
			return;
		}

		const slides = swiperElement.querySelectorAll(".swiper-slide");
		console.log("SingleTestimonial: Found slides:", slides.length);

		if (slides.length === 0) {
			console.warn("SingleTestimonial: No slides found in swiper element");
			console.log(
				"SingleTestimonial: Swiper element HTML:",
				swiperElement.innerHTML.substring(0, 200)
			);
			return;
		}

		console.log("SingleTestimonial: Initializing Swiper with config...");
		try {
			const swiperInstance = new Swiper(swiperElement, {
				slidesPerView: 1,
				spaceBetween: 20,
				speed: 600,
				direction: "horizontal",
				centeredSlides: true,
				initialSlide: 2,
				// autoplay: {
				// 	delay: 5000,
				// 	disableOnInteraction: false,
				// },
				breakpoints: {
					320: {
						slidesPerView: 1,
						spaceBetween: 15,
					},
					768: {
						slidesPerView: 1.5,
						spaceBetween: 20,
					},
					1024: {
						slidesPerView: 2,
						spaceBetween: 20,
					},
					1200: {
						slidesPerView: 3.3,
						spaceBetween: 20,
					},
				},
			});
			swiperElement._swiperInstance = swiperInstance;
			console.log(
				"SingleTestimonial: ✓ Swiper initialized successfully!",
				swiperInstance
			);
			console.log("SingleTestimonial: Swiper instance details:", {
				slides: swiperInstance.slides.length,
				activeIndex: swiperInstance.activeIndex,
				isLocked: swiperInstance.locked,
				autoplay: swiperInstance.autoplay,
			});
		} catch (error) {
			console.error("SingleTestimonial: ✗ Error initializing Swiper:", error);
			console.error("SingleTestimonial: Error stack:", error.stack);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		console.log(
			"SingleTestimonial: waitForReady called, document.readyState:",
			document.readyState
		);
		if (document.readyState === "loading") {
			console.log(
				"SingleTestimonial: Document is loading, waiting for DOMContentLoaded..."
			);
			document.addEventListener("DOMContentLoaded", function () {
				console.log(
					"SingleTestimonial: DOMContentLoaded fired, waiting 100ms..."
				);
				setTimeout(initSingleTestimonialSwiper, 100);
			});
		} else {
			console.log(
				"SingleTestimonial: Document already ready, waiting 100ms..."
			);
			setTimeout(initSingleTestimonialSwiper, 100);
		}
	};

	// Initialize when ready
	console.log("SingleTestimonial: Starting initialization...");
	waitForReady();
})();
