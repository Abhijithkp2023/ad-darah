/**
 * MainBanner Component JavaScript
 *
 * Handles GSAP scale animation for the main banner mask
 * Animates the mask from a larger scale down to reveal the image behind
 */

(function () {
	"use strict";

	/**
	 * Initialize MainBanner Component
	 */
	const initMainBanner = function () {
		// Get the main banner mask element and its image
		const bannerMaskRef = document.querySelector(".main-banner-mask");
		const bannerMaskImgRef = document.querySelector(".main-banner-mask-img");

		// Validate required elements
		if (!bannerMaskRef || !bannerMaskImgRef) {
			console.warn("MainBanner: Required elements not found");
			return;
		}

		// Check if GSAP is loaded
		if (typeof gsap === "undefined") {
			console.error("MainBanner: GSAP library is not loaded");
			return;
		}

		// Initialize GSAP animations
		initMainBannerAnimations(bannerMaskRef, bannerMaskImgRef);

		// Initialize form field styling (wait for Choices.js if needed)
		if (typeof Choices !== "undefined") {
			initFormFieldStyling();
		} else {
			// Wait for Choices.js to load
			setTimeout(function () {
				if (typeof Choices !== "undefined") {
					initFormFieldStyling();
				}
			}, 500);
		}
	};

	/**
	 * Initialize form field styling for selects and date inputs
	 * Uses Choices.js for select dropdowns and handles date inputs
	 */
	const initFormFieldStyling = function () {
		const form = document.querySelector(".main-banner-form");
		if (!form) return;

		// Check if Choices.js is loaded
		if (typeof Choices !== "undefined") {
			// Initialize Choices.js for select dropdowns
			const selects = form.querySelectorAll("select");
			selects.forEach(function (select) {
				const placeholderOption = select.querySelector('option[value=""]');
				const choices = new Choices(select, {
					searchEnabled: false,
					itemSelectText: "",
					placeholder: true,
					placeholderValue: placeholderOption
						? placeholderOption.textContent
						: null,
					shouldSort: false,
					classNames: {
						containerOuter: "choices choices-form",
						containerInner: "choices__inner choices__inner-form",
						input: "choices__input",
						inputCloned: "choices__input--cloned",
						list: "choices__list",
						listItems: "choices__list--multiple",
						listSingle: "choices__list--single",
						listDropdown: "choices__list--dropdown",
						item: "choices__item",
						itemSelectable: "choices__item--selectable",
						itemDisabled: "choices__item--disabled",
						itemChoice: "choices__item--choice",
						placeholder: "choices__placeholder",
						group: "choices__group",
						groupHeading: "choices__heading",
						button: "choices__button",
						activeState: "is-active",
						focusState: "is-focused",
						openState: "is-open",
						disabledState: "is-disabled",
						highlightedState: "is-highlighted",
						selectedState: "is-selected",
						flippedState: "is-flipped",
						loadingState: "is-loading",
						noResults: "has-no-results",
						noChoices: "has-no-choices",
					},
				});

				// Update styling when choice is made
				select.addEventListener("addItem", function () {
					updateChoicesColor(choices);
				});

				select.addEventListener("removeItem", function () {
					updateChoicesColor(choices);
				});

				// Initial color update
				setTimeout(function () {
					updateChoicesColor(choices);
				}, 100);
			});
		}

		// Handle date inputs
		const dateInputs = form.querySelectorAll('input[type="date"]');
		dateInputs.forEach(function (dateInput) {
			// Check initial state
			updateDateInputColor(dateInput);

			// Update on change
			dateInput.addEventListener("change", function () {
				updateDateInputColor(dateInput);
			});

			// Also update on input (for browsers that support it)
			dateInput.addEventListener("input", function () {
				updateDateInputColor(dateInput);
			});
		});
	};

	/**
	 * Update Choices.js color based on selected value
	 */
	const updateChoicesColor = function (choices) {
		const container = choices.containerOuter.element;
		const value = choices.getValue(true);

		if (value && value.length > 0 && value[0] !== "") {
			// Has value - show in black
			container.classList.add("has-value");
		} else {
			// No value - show placeholder in gray
			container.classList.remove("has-value");
		}
	};

	/**
	 * Update date input color based on value
	 */
	const updateDateInputColor = function (dateInput) {
		if (dateInput.value === "" || dateInput.value === null) {
			dateInput.classList.remove("has-value");
		} else {
			dateInput.classList.add("has-value");
		}
	};

	/**
	 * Initialize GSAP Scale Animation
	 * Scales the mask and its image from 100% up to 800% to cover the image
	 * Also animates opacity from 1 to 0, starting after scale begins and ending at 50% of scale duration
	 * Then animates title, subtitle, and form in sequence
	 */
	const initMainBannerAnimations = function (bannerMaskRef, bannerMaskImgRef) {
		// Get elements for text animations
		const titleElement = document.querySelector(".main-banner-title");
		const subtitleElement = document.querySelector(".main-banner-subtitle");
		const formElement = document.querySelector(".main-banner-form");

		// Disable body scroll at start of animation using CSS class
		const body = document.body;
		const html = document.documentElement;
		
		// Store current scroll position
		const scrollY = window.scrollY;
		
		// Prevent scroll events function
		const preventScroll = function(e) {
			e.preventDefault();
			e.stopPropagation();
			return false;
		};
		
		// Prevent keyboard scrolling function
		const preventKeyboardScroll = function(e) {
			// Prevent arrow keys and spacebar from scrolling
			if ([32, 33, 34, 35, 36, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
				e.preventDefault();
				return false;
			}
		};
		
		// Apply classes and styles
		html.classList.add("banner-animating");
		body.classList.add("banner-animating");
		body.style.top = `-${scrollY}px`;
		
		// Add event listeners to prevent scrolling
		window.addEventListener("scroll", preventScroll, { passive: false });
		window.addEventListener("wheel", preventScroll, { passive: false });
		window.addEventListener("touchmove", preventScroll, { passive: false });
		window.addEventListener("keydown", preventKeyboardScroll, { passive: false });

		// Set initial state - mask and image at 100% (normal size) with full opacity
		// Force 3D to enable hardware acceleration and prevent blur
		gsap.set(bannerMaskRef, {
			scale: 1,
			opacity: 1,
			transformOrigin: "center center",
			force3D: true, // Force hardware acceleration
		});

		gsap.set(bannerMaskImgRef, {
			scale: 1,
			opacity: 1,
			transformOrigin: "center center",
			force3D: true, // Force hardware acceleration
		});

		// Set initial states for text elements (hidden)
		if (titleElement) {
			gsap.set(titleElement, {
				x: -100,
				opacity: 0,
				force3D: true,
			});
		}

		if (subtitleElement) {
			gsap.set(subtitleElement, {
				scaleY: 0,
				transformOrigin: "bottom center",
				opacity: 0,
				force3D: true,
			});
		}

		if (formElement) {
			gsap.set(formElement, {
				y: 100,
				opacity: 0,
				force3D: true,
			});
		}

		// Create animation timeline
		const tl = gsap.timeline({
			delay: 0.5, // Small delay before animation starts
			onComplete: function () {
				// Remove event listeners first
				window.removeEventListener("scroll", preventScroll);
				window.removeEventListener("wheel", preventScroll);
				window.removeEventListener("touchmove", preventScroll);
				window.removeEventListener("keydown", preventKeyboardScroll);
				
				// Re-enable body scroll after animation completes
				html.classList.remove("banner-animating");
				body.classList.remove("banner-animating");
				
				// Restore scroll position
				body.style.top = "";
				window.scrollTo(0, scrollY);
				
				// Animation complete
				console.log("MainBanner: All animations completed");
			},
		});

		// Animate scale from 1 (100%) to 8 (800%) for both mask and image (covering the image)
		// force3D: true ensures hardware acceleration and crisp rendering during animation
		// Duration: 2 seconds
		tl.to([bannerMaskRef, bannerMaskImgRef], {
			scale: 8,
			duration: 2,
			ease: "power2.out", // Smooth easing
			force3D: true, // Force hardware acceleration to prevent blur
		});

		// Add opacity animation that starts AFTER 50% of scale duration (after 1 second)
		// Scale duration is 2 seconds, so 50% = 1 second
		// Start opacity fade at 1 second and fade over the remaining 1 second
		tl.to(
			[bannerMaskRef, bannerMaskImgRef],
			{
				opacity: 0,
				duration: 1, // Fade over 1 second (the remaining half of the scale animation)
				ease: "power2.in", // Fade out easing
				force3D: true,
			},
			1 // Start at 1 second (50% of the 2 second scale duration)
		);

		// Animate title from left to right (starts immediately after mask animation completes)
		if (titleElement) {
			tl.to(
				titleElement,
				{
					x: 0,
					opacity: 1,
					duration: 0.8,
					ease: "power2.out",
					force3D: true,
				},
				"-=0.1"
			); // Start 0.1 seconds before mask animation ends (or use "+=0" for exact end)
		}

		// Animate subtitle from bottom to top (like increasing height)
		if (subtitleElement) {
			tl.to(
				subtitleElement,
				{
					scaleY: 1,
					opacity: 1,
					duration: 0.6,
					ease: "power2.out",
					force3D: true,
				},
				"-=0.2"
			); // Start slightly before title animation ends
		}

		// Animate form from bottom to top
		if (formElement) {
			tl.to(
				formElement,
				{
					y: 0,
					opacity: 1,
					duration: 0.8,
					ease: "power2.out",
					force3D: true,
				},
				"-=0.3"
			); // Start slightly before subtitle animation ends
		}
	};

	/**
	 * Wait for DOM and GSAP to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				// Wait a bit for GSAP to load if it's loaded via script tag
				setTimeout(function () {
					if (typeof gsap !== "undefined") {
						initMainBanner();
					} else {
						// Retry if GSAP not loaded yet
						retryInit();
					}
				}, 100);
			});
		} else {
			// DOM already loaded
			setTimeout(function () {
				if (typeof gsap !== "undefined") {
					initMainBanner();
				} else {
					retryInit();
				}
			}, 100);
		}
	};

	/**
	 * Retry initialization if GSAP is not loaded
	 */
	let retryCount = 0;
	const maxRetries = 10;
	const retryInit = function () {
		if (retryCount < maxRetries) {
			retryCount++;
			setTimeout(function () {
				if (typeof gsap !== "undefined") {
					initMainBanner();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error("MainBanner: Failed to load GSAP after multiple retries.");
		}
	};

	// Initialize when ready
	waitForReady();
})();
