/**
 * HomeVideo Component JavaScript
 * 
 * Handles GSAP ScrollTrigger scale animation for the home video wrapper
 * Animates the video wrapper to scale to full width when section comes into view
 */

(function() {
	'use strict';

	// Ensure GSAP and ScrollTrigger are available globally
	const gsap = window.gsap;
	const ScrollTrigger = window.ScrollTrigger;

	/**
	 * Initialize HomeVideo Component
	 */
	const initHomeVideo = function() {
		// Get the home video wrapper element
		const videoWrapperRef = document.querySelector('.home-video-wrapper');
		const videoContainerRef = document.querySelector('.home-video-container');

		// Validate required elements
		if (!videoWrapperRef || !videoContainerRef) {
			console.warn('HomeVideo: Required elements not found');
			return;
		}

		// Check if GSAP is loaded
		if (typeof gsap === 'undefined') {
			console.error('HomeVideo: GSAP library is not loaded');
			return;
		}

		// Check if ScrollTrigger is available
		if (typeof ScrollTrigger === 'undefined') {
			console.warn('HomeVideo: ScrollTrigger not found, using basic GSAP animations');
			initBasicAnimations(videoWrapperRef);
		} else {
			// Register ScrollTrigger plugin
			gsap.registerPlugin(ScrollTrigger);
			initScrollAnimations(videoWrapperRef, videoContainerRef);
		}
	};

	/**
	 * Initialize Scroll-Triggered Scale Animation
	 * Scales the video wrapper to full screen width when section comes into view
	 */
	const initScrollAnimations = function(videoWrapperRef, videoContainerRef) {
		// Calculate the scale needed to fit full viewport width (no padding)
		const calculateFullWidthScale = function() {
			const wrapperWidth = videoWrapperRef.offsetWidth;
			const screenWidth = window.innerWidth;
			// Scale to full viewport width (no padding since container has padding-x-0)
			return screenWidth / wrapperWidth;
		};

		// Set initial state - wrapper at normal size
		gsap.set(videoWrapperRef, {
			scale: 1,
			opacity: 1,
			transformOrigin: "center center",
			force3D: true, // Force hardware acceleration
		});

		// Get the scale value for full width
		const fullWidthScale = calculateFullWidthScale();

		// Create scale animation triggered by scroll
		// scrub: true makes animation progress with scroll position
		gsap.to(videoWrapperRef, {
			scale: fullWidthScale,
			ease: "power2.out",
			force3D: true,
			scrollTrigger: {
				trigger: videoContainerRef,
				start: "top 80%", // Start animation when top of section is 80% down the viewport
				end: "top 20%", // End animation when top of section reaches 20% of viewport
				scrub: true, // Animation tied to scroll position - works on each scroll
				onUpdate: function(self) {
					// Recalculate scale on window resize
					if (window.innerWidth !== window.lastWidth) {
						window.lastWidth = window.innerWidth;
						const newScale = calculateFullWidthScale();
						gsap.set(videoWrapperRef, { scale: newScale });
					}
				}
			},
		});

		// Store initial width for resize handling
		window.lastWidth = window.innerWidth;

		// Handle window resize
		let resizeTimeout;
		window.addEventListener('resize', function() {
			clearTimeout(resizeTimeout);
			resizeTimeout = setTimeout(function() {
				const newScale = calculateFullWidthScale();
				gsap.set(videoWrapperRef, { scale: newScale });
			}, 250);
		});
	};

	/**
	 * Initialize Basic Animations (fallback if ScrollTrigger not available)
	 */
	const initBasicAnimations = function(videoWrapperRef) {
		// Set initial state
		gsap.set(videoWrapperRef, {
			scale: 0.8,
			opacity: 0.8,
			transformOrigin: "center center",
		});

		// Simple fade and scale animation
		gsap.to(videoWrapperRef, {
			scale: 1,
			opacity: 1,
			duration: 1.2,
			ease: "power2.out",
			delay: 0.3,
		});
	};

	/**
	 * Wait for DOM and GSAP to be ready
	 */
	const waitForReady = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', function() {
				// Wait a bit for GSAP to load if it's loaded via script tag
				setTimeout(function() {
					if (typeof gsap !== 'undefined') {
						initHomeVideo();
					} else {
						// Retry if GSAP not loaded yet
						retryInit();
					}
				}, 100);
			});
		} else {
			// DOM already loaded
			setTimeout(function() {
				if (typeof gsap !== 'undefined') {
					initHomeVideo();
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
	const retryInit = function() {
		if (retryCount < maxRetries) {
			retryCount++;
			setTimeout(function() {
				if (typeof gsap !== 'undefined') {
					initHomeVideo();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error('HomeVideo: Failed to load GSAP after multiple retries.');
		}
	};

	// Initialize when ready
	waitForReady();

})();

