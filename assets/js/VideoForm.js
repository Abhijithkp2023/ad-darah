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

		// iOS compatibility: Set playsInline property explicitly
		video.playsInline = true;
		video.setAttribute('playsinline', '');
		video.setAttribute('webkit-playsinline', '');
		video.muted = true; // Ensure muted for autoplay
		video.loop = true; // Ensure looping is enabled
		
		// Ensure video restarts when it ends (fallback for browsers that don't respect loop attribute)
		video.addEventListener('ended', function() {
			video.currentTime = 0;
			video.loop = true;
			video.play().catch(function(error) {
				console.log('VideoForm: Error restarting video:', error);
				// Retry after a short delay
				setTimeout(function() {
					video.play().catch(function(err) {
						console.log('VideoForm: Retry failed:', err);
					});
				}, 100);
			});
		}, false);
		
		// Monitor video playback to ensure it stays playing
		video.addEventListener('timeupdate', function() {
			// If video is near the end and loop might not work, prepare to restart
			if (video.currentTime >= video.duration - 0.5 && !video.loop) {
				video.loop = true;
			}
		}, false);
		
		// Ensure video keeps playing continuously
		// Monitor and restart if it stops unexpectedly (but allow brief pauses)
		let pauseTimeout;
		video.addEventListener('play', function() {
			// Clear any pending pause timeout when video plays
			if (pauseTimeout) {
				clearTimeout(pauseTimeout);
				pauseTimeout = null;
			}
			// Ensure loop is always enabled when playing
			video.loop = true;
		}, false);
		
		video.addEventListener('pause', function() {
			// Only auto-resume if pause lasts too long (likely unintentional)
			// This allows for brief pauses without interfering
			const rect = section.getBoundingClientRect();
			const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
			
			if (isVisible && !video.ended) {
				pauseTimeout = setTimeout(function() {
					if (video.paused && !video.ended) {
						video.loop = true;
						video.play().catch(function(error) {
							console.log('VideoForm: Error resuming video:', error);
						});
					}
				}, 500); // Wait 500ms before resuming (allows brief pauses)
			}
		}, false);

		// iOS: Load video first, then try to play
		const loadAndPlayVideo = function() {
			// Check if video is already loaded
			if (video.readyState === 0) {
				// Video not loaded, wait for it to load
				video.addEventListener('loadeddata', function playOnLoad() {
					attemptPlay();
					video.removeEventListener('loadeddata', playOnLoad);
				}, { once: true });
				video.load();
			} else {
				// Video already loaded or loading
				attemptPlay();
			}
		};

		const attemptPlay = function() {
			// Ensure loop is set before playing
			video.loop = true;
			const playPromise = video.play();
			if (playPromise !== undefined) {
				playPromise
					.then(function() {
						console.log('VideoForm: Video playing successfully');
						// Ensure it keeps looping
						video.loop = true;
					})
					.catch(function(error) {
						console.log('VideoForm: Video autoplay prevented:', error);
						// On iOS, user interaction might be required
						// Try again when user interacts with page
						document.addEventListener('touchstart', function tryPlayOnce() {
							video.loop = true;
							video.play().catch(function(err) {
								console.log('VideoForm: Video play failed after touch:', err);
							});
							document.removeEventListener('touchstart', tryPlayOnce);
						}, { once: true });
					});
			}
		};

		let hasPlayed = false;

		const handleIntersection = function(entries, observer) {
			entries.forEach(function(entry) {
				// Calculate if 1% of the section is visible
				const sectionHeight = entry.boundingClientRect.height;
				const visibleHeight = entry.intersectionRect.height;
				const visiblePercentage = (visibleHeight / sectionHeight) * 100;

				if (visiblePercentage >= 1 && !hasPlayed) {
					loadAndPlayVideo();
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

		// iOS fallback: Try to play immediately if video is in viewport
		if (video.readyState >= 2) {
			// Video metadata is loaded
			attemptPlay();
		} else {
			// Wait for metadata to load
			video.addEventListener('loadedmetadata', function() {
				attemptPlay();
			}, { once: true });
		}
	};

	/**
	 * Initialize Choices.js for select dropdowns
	 */
	const initChoicesSelects = function(retryCount) {
		retryCount = retryCount || 0;
		const maxRetries = 15; // Increased retries

		// Wait for Choices.js to be available
		if (typeof Choices === 'undefined') {
			if (retryCount < maxRetries) {
				setTimeout(function() {
					initChoicesSelects(retryCount + 1);
				}, 200);
			} else {
				console.error('VideoForm: Choices.js failed to load after', maxRetries, 'retries');
				// Fallback: Apply placeholder styling to native selects
				const selects = document.querySelectorAll('.video-form-choices-select');
				selects.forEach(function(select) {
					if (select.value === '') {
						select.style.color = '#929292';
					}
					select.addEventListener('change', function() {
						if (this.value === '') {
							this.style.color = '#929292';
						} else {
							this.style.color = '#000';
						}
					});
				});
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
		const dateWrapper = dateInput ? dateInput.closest('.video-form-date-wrapper') : null;
		const calendarIcon = dateWrapper ? dateWrapper.querySelector('.video-form-calendar-icon') : null;
		
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
				placeholder: 'Select or Type Event Date',
				// Important: avoid being clipped by parent overflow:hidden (VideoForm wrapper)
				appendTo: document.body,
				onReady: function() {
					// Make calendar icon clickable: delegate to input click so Flatpickr handles it
					if (calendarIcon) {
						calendarIcon.style.pointerEvents = 'auto';
						calendarIcon.style.cursor = 'pointer';
						calendarIcon.addEventListener('click', function(e) {
							e.preventDefault();
							e.stopPropagation();
							// Focus and click the input so Flatpickr opens reliably
							dateInput.focus();
							dateInput.click();
						});
					}
				},
				onOpen: function(selectedDates, dateStr, fp) {
					// Position calendar under the input (and above overflow:hidden containers)
					const cal = fp.calendarContainer;
					if (cal) {
						const rect = dateInput.getBoundingClientRect();
						const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
						const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

						cal.style.position = 'absolute';
						cal.style.top = (rect.bottom + scrollTop + 4) + 'px';
						cal.style.left = (rect.left + scrollLeft) + 'px';
						cal.style.zIndex = '100000';
					}
				}
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

		// Multiple initialization attempts to ensure it works
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initializeAll);
			// Also try on window load as fallback
			window.addEventListener('load', function() {
				console.log('VideoForm: Window loaded, retrying Choices.js initialization...');
				setTimeout(initChoicesSelects, 100);
				setTimeout(initChoicesSelects, 500);
				setTimeout(initChoicesSelects, 1000);
			});
		} else {
			// DOM already loaded
			initializeAll();
			// Also try on window load as fallback
			window.addEventListener('load', function() {
				console.log('VideoForm: Window loaded, retrying Choices.js initialization...');
				setTimeout(initChoicesSelects, 100);
				setTimeout(initChoicesSelects, 500);
				setTimeout(initChoicesSelects, 1000);
			});
		}

		// Additional fallback: try after a longer delay
		setTimeout(function() {
			if (typeof Choices !== 'undefined') {
				initChoicesSelects();
			}
		}, 2000);
	};

	// Start initialization
	init();

})();

