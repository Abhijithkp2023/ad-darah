/**
 * Services Stack Component JavaScript
 * Handles GSAP scroll-triggered stack effect
 * Based on stack_sample reference
 */

(function () {
	"use strict";

	/**
	 * Initialize Services Stack Component
	 */
	const initServicesStack = function () {
		const cards = document.querySelectorAll("[data-services-card]");

		if (cards.length === 0) {
			return;
		}

		// Check if GSAP and ScrollTrigger are available
		if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
			console.warn("ServicesStack: GSAP or ScrollTrigger not loaded");
			return;
		}

		// Register ScrollTrigger plugin
		gsap.registerPlugin(ScrollTrigger);

		// Convert cards to array (like panels in sample)
		const cardsArray = gsap.utils.toArray(cards);

		// Pin each card individually - they will stack on top of each other
		cardsArray.forEach(function (card, index) {
			const isLast = index === cardsArray.length - 1;

			// Set z-index dynamically for proper stacking
			card.style.zIndex = (index + 1).toString();

			ScrollTrigger.create({
				trigger: card,
				start: "top top", // Stack at top of viewport
				end: isLast ? "+=100vh" : undefined, // Last card unpins after scrolling 100vh
				pin: true,
				pinSpacing: isLast ? true : false, // Last card needs spacing to allow normal scroll after
			});
		});

		// Refresh ScrollTrigger after a delay to ensure proper calculation
		// This is especially important on pages with multiple ScrollTrigger instances
		setTimeout(function () {
			ScrollTrigger.refresh();
		}, 200);
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
				if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
					initServicesStack();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error("ServicesStack: Failed to load GSAP after multiple retries.");
		}
	};

	// Initialize when ready - wait for window load to ensure all other scripts have initialized
	const initialize = function () {
		if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
			// Wait a bit longer to ensure other ScrollTrigger instances have initialized
			setTimeout(function () {
				initServicesStack();
			}, 500);
		} else {
			retryInit();
		}
	};

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", function () {
			// Also wait for window load to ensure all scripts are loaded
			if (document.readyState === "complete") {
				initialize();
			} else {
				window.addEventListener("load", initialize);
			}
		});
	} else {
		if (document.readyState === "complete") {
			initialize();
		} else {
			window.addEventListener("load", initialize);
		}
	}
})();
