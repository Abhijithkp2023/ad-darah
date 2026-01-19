/**
 * Testimonials Component JavaScript
 * Handles Swiper initialization for testimonials slider
 */

(function () {
	"use strict";

	/**
	 * Initialize Testimonials Swipers
	 */
	const initTestimonialsSwipers = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			console.warn("Testimonials: Swiper library is not loaded");
			return;
		}

		// Top Swiper (Right to Left)
		const topSwiperElement = document.querySelector("[data-testimonials-swiper-top]");
		if (topSwiperElement && !topSwiperElement.swiper && !topSwiperElement._swiperInstance) {
			const topSwiper = new Swiper(topSwiperElement, {
				slidesPerView: 2.5,
				spaceBetween: 20,
				loop: true,
				speed: 600,
				direction: "horizontal",
				centeredSlides: true,
				autoplay: {
					delay: 5000,
					disableOnInteraction: false,
					reverseDirection: true,
				},
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
						slidesPerView: 2.2,
						spaceBetween: 20,
					},
				},
			});
			topSwiperElement._swiperInstance = topSwiper;
		}

		// Bottom Swiper (Left to Right)
		const bottomSwiperElement = document.querySelector("[data-testimonials-swiper-bottom]");
		if (bottomSwiperElement && !bottomSwiperElement.swiper && !bottomSwiperElement._swiperInstance) {
			const bottomSwiper = new Swiper(bottomSwiperElement, {
				slidesPerView: 2.5,
				spaceBetween: 20,
				loop: true,
				speed: 600,
				direction: "horizontal",
				centeredSlides: true,
				autoplay: {
					delay: 5000,
					disableOnInteraction: false,
					reverseDirection: false,
				},
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
						slidesPerView: 2.2,
						spaceBetween: 20,
					},
				},
			});
			bottomSwiperElement._swiperInstance = bottomSwiper;
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initTestimonialsSwipers, 100);
			});
		} else {
			setTimeout(initTestimonialsSwipers, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();

