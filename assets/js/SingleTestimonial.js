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

		// Check if navigation buttons exist
		const contentContainer = swiperElement.closest('.single-testimonial-content');
		const prevButton = contentContainer ? contentContainer.querySelector('.single-testimonial-nav-prev') : null;
		const nextButton = contentContainer ? contentContainer.querySelector('.single-testimonial-nav-next') : null;
		const hasNavigation = prevButton && nextButton;

		console.log("SingleTestimonial: Initializing Swiper with config...");
		console.log("SingleTestimonial: Has navigation buttons:", hasNavigation);
		try {
			// Check if we have enough slides for loop (need at least 6 for smooth loop)
			const slideCount = slides.length;
			const enableLoop = slideCount >= 6 && hasNavigation; // Only enable Swiper loop when navigation is present
			
			// Build Swiper config
			const swiperConfig = {
				slidesPerView: 1,
				spaceBetween: 20,
				speed: 600,
				direction: "horizontal",
				centeredSlides: true,
				loop: enableLoop, // Disable loop when CSS animation is used
				loopAdditionalSlides: enableLoop ? 3 : 0,
				loopedSlides: enableLoop ? Math.ceil(slideCount / 2) : undefined,
				initialSlide: 0,
			};

			// CSS animation will handle auto-sliding when navigation is not present
			// No Swiper autoplay needed - CSS provides uniform linear motion
			console.log("SingleTestimonial: Using CSS animation for auto-slide (no navigation buttons)");

			// Add navigation if buttons exist
			if (hasNavigation) {
				swiperConfig.navigation = {
					nextEl: nextButton,
					prevEl: prevButton,
				};
			}

			// Add breakpoints
			swiperConfig.breakpoints = {
				0: {
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
					slidesPerView: 3.1,
					spaceBetween: 20,
				},
			};
			
			const swiperInstance = new Swiper(swiperElement, swiperConfig);
			swiperElement._swiperInstance = swiperInstance;
			
			// Update loop after initialization to ensure it works correctly (only when navigation is present)
			if (enableLoop && swiperInstance.loop && hasNavigation) {
				swiperInstance.loopDestroy();
				swiperInstance.loopCreate();
				swiperInstance.update();
			}
			
			// When CSS animation is used, prevent Swiper from updating transforms
			if (!hasNavigation) {
				// Disable Swiper's transform updates - CSS animation handles it
				swiperInstance.allowTouchMove = false;
				swiperInstance.allowSlideNext = false;
				swiperInstance.allowSlidePrev = false;
				
				// Override Swiper's setTranslate to completely prevent transform updates
				swiperInstance.setTranslate = function(translate) {
					// Don't let Swiper update transforms - CSS animation handles it
					return;
				};
				
				// Also prevent Swiper from updating transforms on resize
				const originalUpdate = swiperInstance.update;
				swiperInstance.update = function() {
					originalUpdate.call(this);
					// Clear any transform Swiper might have set
					if (this.wrapperEl) {
						this.wrapperEl.style.transform = '';
					}
				};
			}
			
			console.log(
				"SingleTestimonial: ✓ Swiper initialized successfully!",
				swiperInstance
			);
			console.log("SingleTestimonial: Swiper instance details:", {
				slides: swiperInstance.slides.length,
				realIndex: swiperInstance.realIndex,
				activeIndex: swiperInstance.activeIndex,
				loop: swiperInstance.params.loop,
				isLocked: swiperInstance.locked,
			});
		} catch (error) {
			console.error("SingleTestimonial: ✗ Error initializing Swiper:", error);
			console.error("SingleTestimonial: Error stack:", error.stack);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function (retryCount) {
		retryCount = retryCount || 0;
		const maxRetries = 20;

		console.log(
			"SingleTestimonial: waitForReady called, document.readyState:",
			document.readyState,
			"retryCount:",
			retryCount
		);

		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			if (retryCount < maxRetries) {
				console.log(
					"SingleTestimonial: Swiper not loaded yet, retrying in 200ms...",
					retryCount + 1
				);
				setTimeout(function () {
					waitForReady(retryCount + 1);
				}, 200);
				return;
			} else {
				console.error(
					"SingleTestimonial: Swiper failed to load after",
					maxRetries,
					"retries"
				);
				return;
			}
		}

		// Swiper is loaded, now wait for DOM
		if (document.readyState === "loading") {
			console.log(
				"SingleTestimonial: Document is loading, waiting for DOMContentLoaded..."
			);
			document.addEventListener("DOMContentLoaded", function () {
				console.log(
					"SingleTestimonial: DOMContentLoaded fired, waiting 300ms..."
				);
				setTimeout(initSingleTestimonialSwiper, 300);
			});
		} else {
			console.log(
				"SingleTestimonial: Document already ready, waiting 300ms..."
			);
			setTimeout(initSingleTestimonialSwiper, 300);
		}
	};

	// Initialize when ready
	console.log("SingleTestimonial: Starting initialization...");
	waitForReady();

	// Also try on window load as fallback
	if (document.readyState === "complete") {
		// Page already loaded, try immediately
		setTimeout(function () {
			const swiperElement = document.querySelector("[data-single-testimonial-swiper]");
			if (swiperElement && !swiperElement.swiper && !swiperElement._swiperInstance && !swiperElement.classList.contains("swiper-initialized")) {
				console.log("SingleTestimonial: Page already loaded, trying initialization...");
				waitForReady(0);
			}
		}, 100);
	} else {
		window.addEventListener("load", function () {
			console.log("SingleTestimonial: Window loaded, checking if Swiper needs initialization...");
			setTimeout(function () {
				const swiperElement = document.querySelector("[data-single-testimonial-swiper]");
				if (swiperElement && !swiperElement.swiper && !swiperElement._swiperInstance && !swiperElement.classList.contains("swiper-initialized")) {
					console.log("SingleTestimonial: Swiper not initialized, trying again...");
					waitForReady(0);
				}
			}, 500);
		});
	}
})();
