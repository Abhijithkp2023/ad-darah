/**
 * Common JavaScript Initialization
 * Initializes common functionality that should work on all pages
 */

(function() {
	'use strict';

	/**
	 * Initialize Header Scroll Behavior (works on all pages)
	 */
	const initHeaderScroll = function() {
		const headerSection = document.getElementById('headerMainSection');
		if (!headerSection) {
			return;
		}

		const initialHeaderContainer = document.getElementById('headerInitialContainer');
		const scrollHeaderContainer = document.getElementById('headerScrollContainer');
		const SCROLL_THRESHOLD = 700;
		let isScrolled = false;

		const handleScroll = function() {
			let scrollY;
			
			// Use Lenis scroll if available, otherwise use window scroll
			if (window.lenisInstance) {
				scrollY = window.lenisInstance.scroll;
			} else {
				scrollY = window.scrollY || window.pageYOffset;
			}

			// Handle initial header visibility (700px threshold)
			if (scrollY >= SCROLL_THRESHOLD) {
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.add('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.add('header-active');
				}
				headerSection.classList.add('header-scroll-active');
			} else {
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.remove('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.remove('header-active');
				}
				headerSection.classList.remove('header-scroll-active');
			}

			// Handle scrolled class for styling
			if (scrollY > 1) {
				if (!isScrolled) {
					isScrolled = true;
					headerSection.classList.add('scrolled');
				}
			} else {
				if (isScrolled) {
					isScrolled = false;
					headerSection.classList.remove('scrolled');
				}
			}
		};

		// Use Lenis scroll event if available
		if (window.lenisInstance) {
			window.lenisInstance.on('scroll', ({ scroll }) => {
				handleScroll();
			});
		} else {
			// Fallback to window scroll
			window.addEventListener('scroll', handleScroll, { passive: true });
		}

		// Check initial scroll position
		handleScroll();
	};

	/**
	 * Initialize VideoForm Choices.js selects
	 */
	const initVideoFormChoices = function() {
		if (typeof Choices === 'undefined') {
			return;
		}

		const selects = document.querySelectorAll('.video-form-choices-select');
		
		if (selects.length === 0) {
			return;
		}
		
		selects.forEach(function(select) {
			// Skip if already initialized
			if (select.choices) {
				return;
			}

			const placeholderOption = select.querySelector('option[value=""]');
			
			try {
				const choices = new Choices(select, {
					searchEnabled: false,
					itemSelectText: '',
					placeholder: true,
					placeholderValue: placeholderOption ? placeholderOption.textContent : null,
					shouldSort: false,
					removeItemButton: false,
					classNames: {
						containerOuter: 'choices video-form-choices',
						containerInner: 'choices__inner video-form-choices__inner',
						input: 'choices__input',
						inputCloned: 'choices__input--cloned',
						list: 'choices__list',
						listItems: 'choices__list--multiple',
						listSingle: 'choices__list--single',
						listDropdown: 'choices__list--dropdown',
						item: 'choices__item',
						itemSelectable: 'choices__item--selectable',
						itemDisabled: 'choices__item--disabled',
						itemChoice: 'choices__item--choice',
						placeholder: 'choices__placeholder',
						group: 'choices__group',
						groupHeading: 'choices__heading',
						button: 'choices__button',
						activeState: 'is-active',
						focusState: 'is-focused',
						openState: 'is-open',
						disabledState: 'is-disabled',
						highlightedState: 'is-highlighted',
						selectedState: 'is-selected',
						flippedState: 'is-flipped',
						loadingState: 'is-loading',
						noResults: 'has-no-results',
						noChoices: 'has-no-choices'
					}
				});

				// Find container after Choices.js creates it
				const container = select.closest('.video-form-choices') || select.parentElement;
				
				// Check initial state
				if (container) {
					const initialValue = choices.getValue(true);
					if (initialValue && initialValue !== '') {
						container.classList.add('has-value');
					}
				}

				// Update color when choice is made
				select.addEventListener('addItem', function() {
					const container = select.closest('.video-form-choices') || select.parentElement;
					if (container) {
						container.classList.add('has-value');
					}
				});

				// Remove has-value class when placeholder is shown
				select.addEventListener('removeItem', function() {
					const container = select.closest('.video-form-choices') || select.parentElement;
					if (container && choices) {
						const selectedValue = choices.getValue(true);
						if (!selectedValue || selectedValue === '') {
							container.classList.remove('has-value');
						}
					}
				});
			} catch (error) {
				console.error('Common: Error initializing Choices.js for VideoForm:', error);
			}
		});
	};

	/**
	 * Initialize VideoForm date input
	 */
	const initVideoFormDate = function() {
		const dateInput = document.getElementById('video-form-date');
		
		if (!dateInput) {
			return;
		}

		// Check if Flatpickr is available
		if (typeof flatpickr !== 'undefined') {
			flatpickr(dateInput, {
				altInput: false,
				dateFormat: 'Y-m-d',
				allowInput: true,
				clickOpens: true,
				placeholder: 'Select or Type Event Date'
			});
		}
	};

	/**
	 * Initialize VideoForm video autoplay
	 */
	const initVideoFormAutoplay = function() {
		const section = document.querySelector('[data-video-form-section]');
		const video = document.querySelector('[data-video-form-video]');
		
		if (!section || !video) {
			return;
		}

		let hasPlayed = false;

		const handleIntersection = function(entries, observer) {
			entries.forEach(function(entry) {
				const sectionHeight = entry.boundingClientRect.height;
				const visibleHeight = entry.intersectionRect.height;
				const visiblePercentage = (visibleHeight / sectionHeight) * 100;

				if (visiblePercentage >= 1 && !hasPlayed) {
					video.play().catch(function(error) {
						console.log('Video autoplay prevented:', error);
					});
					hasPlayed = true;
					observer.unobserve(section);
				}
			});
		};

		const observerOptions = {
			root: null,
			rootMargin: '0px',
			threshold: [0, 0.01, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0]
		};

		const observer = new IntersectionObserver(handleIntersection, observerOptions);
		observer.observe(section);
	};

	/**
	 * Initialize all common functionality
	 */
	const init = function() {
		// Initialize header scroll on all pages
		initHeaderScroll();

		// Initialize VideoForm components if they exist
		const initVideoForm = function() {
			// Retry Choices.js initialization if not available yet
			if (typeof Choices !== 'undefined') {
				initVideoFormChoices();
			} else {
				setTimeout(function() {
					if (typeof Choices !== 'undefined') {
						initVideoFormChoices();
					}
				}, 500);
			}

			// Initialize date input
			if (typeof flatpickr !== 'undefined') {
				initVideoFormDate();
			} else {
				setTimeout(function() {
					if (typeof flatpickr !== 'undefined') {
						initVideoFormDate();
					}
				}, 500);
			}

			// Initialize video autoplay
			initVideoFormAutoplay();
		};

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', function() {
				initVideoForm();
			});
			window.addEventListener('load', function() {
				// Retry on window load
				setTimeout(initVideoForm, 200);
			});
		} else {
			initVideoForm();
			window.addEventListener('load', function() {
				setTimeout(initVideoForm, 200);
			});
		}
	};

	// Start initialization
	init();

})();

