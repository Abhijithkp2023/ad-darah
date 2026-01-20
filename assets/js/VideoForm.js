/**
 * Video Form Component JavaScript
 * Handles video autoplay when section is 1% in viewport
 * Initializes Choices.js for select dropdowns
 * Handles date input with calendar picker
 */

(function() {
	'use strict';

	/**
	 * Initialize Video Form autoplay on scroll
	 */
	const initVideoForm = function() {
		const section = document.querySelector('[data-video-form-section]');
		const video = document.querySelector('[data-video-form-video]');
		
		if (!section || !video) {
			return;
		}

		let hasPlayed = false;

		const handleIntersection = function(entries, observer) {
			entries.forEach(function(entry) {
				// Calculate if 1% of the section is visible
				const sectionHeight = entry.boundingClientRect.height;
				const visibleHeight = entry.intersectionRect.height;
				const visiblePercentage = (visibleHeight / sectionHeight) * 100;

				if (visiblePercentage >= 1 && !hasPlayed) {
					video.play().catch(function(error) {
						console.log('Video autoplay prevented:', error);
					});
					hasPlayed = true;
					observer.unobserve(section);
				} else if (visiblePercentage < 1 && hasPlayed) {
					// Optional: pause when less than 1% visible
					// video.pause();
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
	 * Initialize Choices.js for select dropdowns
	 */
	const initChoicesSelects = function(retryCount) {
		retryCount = retryCount || 0;
		const maxRetries = 10;

		// Wait for Choices.js to be available
		if (typeof Choices === 'undefined') {
			if (retryCount < maxRetries) {
				setTimeout(function() {
					initChoicesSelects(retryCount + 1);
				}, 200);
			} else {
				console.error('VideoForm: Choices.js failed to load after', maxRetries, 'retries');
			}
			return;
		}

		const selects = document.querySelectorAll('.video-form-choices-select');
		
		console.log('VideoForm: Found', selects.length, 'select elements with class video-form-choices-select');
		
		if (selects.length === 0) {
			console.log('VideoForm: No select elements found. Checking all selects...');
			const allSelects = document.querySelectorAll('select');
			console.log('VideoForm: Total selects on page:', allSelects.length);
			return;
		}
		
		selects.forEach(function(select) {
			// Skip if already initialized
			if (select.choices) {
				console.log('VideoForm: Select already initialized, skipping');
				return;
			}

			console.log('VideoForm: Initializing Choices.js for select:', select.id || select.name);

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

				console.log('VideoForm: Choices.js initialized successfully for:', select.id || select.name);

				// Find container - Choices.js wraps the select, so container is the parent
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
				console.error('VideoForm: Error initializing Choices.js:', error);
			}
		});
	};

	/**
	 * Initialize date input with Flatpickr (if available) or native date picker
	 */
	const initDateInput = function() {
		const dateInput = document.getElementById('video-form-date');
		
		if (!dateInput) {
			return;
		}

		// Check if Flatpickr is available
		if (typeof flatpickr !== 'undefined') {
			flatpickr(dateInput, {
				altInput: false,
				dateFormat: 'Y-m-d',
				allowInput: true, // Allow manual input
				clickOpens: true,
				placeholder: 'Select or Type Event Date'
			});
		} else {
			// Fallback: Use native date input with type="date" but allow text input
			// Keep as text input to allow manual typing
			dateInput.setAttribute('type', 'text');
		}
	};

	/**
	 * Initialize all components
	 */
	const init = function() {
		console.log('VideoForm: Script loaded, initializing...');
		
		const initializeAll = function() {
			console.log('VideoForm: DOM ready, initializing components...');
			initVideoForm();
			// Initialize Choices.js - it will retry if not available
			initChoicesSelects();
			setTimeout(initDateInput, 400);
		};

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initializeAll);
			// Also try on window load as fallback
			window.addEventListener('load', function() {
				console.log('VideoForm: Window loaded, retrying Choices.js initialization...');
				setTimeout(initChoicesSelects, 100);
			});
		} else {
			// DOM already loaded
			initializeAll();
			// Also try on window load as fallback
			window.addEventListener('load', function() {
				console.log('VideoForm: Window loaded, retrying Choices.js initialization...');
				setTimeout(initChoicesSelects, 100);
			});
		}
	};

	// Start initialization
	init();

})();

