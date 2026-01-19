/**
 * TextAnim Component JavaScript
 * Converted from React to vanilla JavaScript for WordPress
 * 
 * Exact conversion from original TextAnim.js
 */

(function() {
	'use strict';

	/**
	 * Check if device is mobile
	 */
	const isMobile = function() {
		return window.innerWidth <= 768;
	};

	/**
	 * Initialize TextAnim for Mobile (Intersection Observer)
	 */
	const initTextAnimMobile = function(element, letterArray) {
		// Set initial state - all letters show only stroke
		gsap.set(letterArray, {
			backgroundPositionX: "100%"
		});

		// Create Intersection Observer
		const observer = new IntersectionObserver(function(entries) {
			entries.forEach(function(entry) {
				if (entry.isIntersecting && !element._textAnimPlayed) {
					element._textAnimPlayed = true;
					
					// Create timeline to animate all letters sequentially
					const tl = gsap.timeline();
					
					letterArray.forEach(function(letter, index) {
						tl.to(letter, {
							backgroundPositionX: "0%",
							duration: 0.1,
							ease: "none"
						}, index * 0.05); // Stagger each letter by 0.05s
					});
					
					// Store timeline reference
					element._textAnimTimeline = tl;
					
					// Unobserve after animation starts
					observer.unobserve(element);
				}
			});
		}, {
			threshold: 0.3, // Trigger when 30% of element is visible
			rootMargin: '0px'
		});

		// Start observing
		observer.observe(element);
		
		// Store observer for cleanup
		element._textAnimObserver = observer;
	};

	/**
	 * Initialize TextAnim for Desktop (ScrollTrigger)
	 */
	const initTextAnimDesktop = function(element, letterArray) {
		// Set initial state - all letters show only stroke
		gsap.set(letterArray, {
			backgroundPositionX: "100%"
		});

		// Create a master ScrollTrigger that controls all letters
		const masterTrigger = ScrollTrigger.create({
			trigger: element,
			start: "top 80%",
			end: "top 20%",
			scrub: 1,
			onUpdate: function(self) {
				const progress = self.progress;
				const totalLetters = letterArray.length;

				// Calculate which letters should be filled based on scroll progress
				letterArray.forEach(function(letter, index) {
					// Each letter gets a portion of the scroll progress
					// First letter starts at 0, last letter completes at 1
					const letterStart = index / totalLetters;
					const letterEnd = (index + 1) / totalLetters;
					const letterDuration = letterEnd - letterStart;

					let letterProgress = 0;

					if (progress >= letterStart) {
						if (progress >= letterEnd) {
							letterProgress = 1; // Letter is fully filled
						} else {
							// Letter is currently filling
							letterProgress = (progress - letterStart) / letterDuration;
						}
					}

					// Animate from 100% (stroke only) to 0% (fully filled)
					const backgroundPos = 100 - (letterProgress * 100);
					gsap.set(letter, {
						backgroundPositionX: backgroundPos + "%"
					});
				});
			}
		});

		// Store trigger reference for cleanup
		element._textAnimTrigger = masterTrigger;
	};

	/**
	 * Initialize TextAnim Component
	 * Matches original React useEffect logic
	 */
	const initTextAnim = async function() {
		try {
			// Check if GSAP is loaded
			if (typeof gsap === 'undefined') {
				console.warn('TextAnim: GSAP not loaded');
				return;
			}

			// Check if ScrollTrigger is needed (for desktop)
			const isMobileDevice = isMobile();
			if (!isMobileDevice) {
				if (typeof ScrollTrigger === 'undefined') {
					console.warn('TextAnim: ScrollTrigger not loaded');
					return;
				}
				// Register ScrollTrigger plugin for desktop
				gsap.registerPlugin(ScrollTrigger);
			}

			// Wait for DOM to be ready
			await new Promise(function(resolve) {
				setTimeout(resolve, 200);
			});

			// Get all text anim elements
			const textAnimElements = document.querySelectorAll('.text[data-text-anim]');

			textAnimElements.forEach(function(element) {
				// Get all letter spans
				const letterSpans = element.querySelectorAll('.letter');

				console.log('TextAnim: Found', letterSpans.length, 'letter spans');

				if (letterSpans.length === 0) {
					console.warn('TextAnim: No letter spans found');
					return;
				}

				// Convert NodeList to Array for GSAP
				const letterArray = Array.from(letterSpans);

				// Initialize based on device type
				if (isMobileDevice) {
					initTextAnimMobile(element, letterArray);
				} else {
					initTextAnimDesktop(element, letterArray);
				}
			});

			// Refresh ScrollTrigger after initialization (only for desktop)
			if (!isMobileDevice && typeof ScrollTrigger !== 'undefined') {
				ScrollTrigger.refresh();
			}
		} catch (error) {
			console.error('Failed to initialize TextAnim:', error);
		}
	};

	/**
	 * Initialize when DOM is ready
	 * Matches original React useEffect pattern
	 */
	const init = function() {
		let retryCount = 0;
		const maxRetries = 10;
		const retryDelay = 500; // ms

		const tryInit = function() {
			// For mobile, only GSAP is needed; for desktop, both GSAP and ScrollTrigger are needed
			const isMobileDevice = isMobile();
			const hasGSAP = typeof gsap !== 'undefined';
			const hasScrollTrigger = typeof ScrollTrigger !== 'undefined';
			const canInit = hasGSAP && (isMobileDevice || hasScrollTrigger);

			if (canInit) {
				// Start async initialization
				initTextAnim();
			} else if (retryCount < maxRetries) {
				retryCount++;
				const missing = !hasGSAP ? 'GSAP' : (!hasScrollTrigger && !isMobileDevice ? 'ScrollTrigger' : '');
				console.warn(`TextAnim: ${missing} not loaded, retrying (${retryCount}/${maxRetries})...`);
				setTimeout(tryInit, retryDelay);
			} else {
				console.error('TextAnim: Failed to load required libraries after multiple retries.');
			}
		};

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', tryInit);
		} else {
			// DOM already loaded
			tryInit();
		}
	};

	// Start initialization
	init();

})();
