/**
 * Form Popup Component JavaScript
 * 
 * Handles the mobile form popup modal functionality
 */

(function() {
	'use strict';

	/**
	 * Initialize Form Popup
	 */
	const initFormPopup = function() {
		const formButton = document.getElementById('formFloatingButton');
		const popupOverlay = document.getElementById('formPopupOverlay');
		const closeButton = document.getElementById('formPopupClose');
		const form = popupOverlay ? popupOverlay.querySelector('.form-popup-form') : null;

		if (!formButton || !popupOverlay || !closeButton) {
			return;
		}

		// Open popup
		formButton.addEventListener('click', function(e) {
			e.preventDefault();
			openFormPopup();
		});

		// Close popup
		closeButton.addEventListener('click', function(e) {
			e.preventDefault();
			closeFormPopup();
		});

		// Close on overlay click
		popupOverlay.addEventListener('click', function(e) {
			if (e.target === popupOverlay) {
				closeFormPopup();
			}
		});

		// Close on escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && popupOverlay.classList.contains('active')) {
				closeFormPopup();
			}
		});

		// Initialize Choices.js for select dropdowns
		if (form && typeof Choices !== 'undefined') {
			initFormSelects(form);
		} else if (form) {
			// Wait for Choices.js to load
			setTimeout(function() {
				if (typeof Choices !== 'undefined' && form) {
					initFormSelects(form);
				}
			}, 500);
		}

		// Handle date inputs
		if (form) {
			const initializeDatePicker = function() {
				if (typeof flatpickr !== 'undefined') {
					initDateInputs(form);
				} else {
					// Wait for Flatpickr to load
					setTimeout(function() {
						if (typeof flatpickr !== 'undefined' && form) {
							initDateInputs(form);
						}
					}, 500);
				}
			};
			
			// Initialize immediately
			initializeDatePicker();
		}
	};

	/**
	 * Open form popup
	 */
	const openFormPopup = function() {
		const popupOverlay = document.getElementById('formPopupOverlay');
		if (!popupOverlay) {
			return;
		}

		popupOverlay.classList.add('active');
		document.body.classList.add('form-popup-open');
		
		// Prevent body scroll
		const scrollY = window.scrollY;
		document.body.style.top = `-${scrollY}px`;
		document.body.style.position = 'fixed';
		document.body.style.width = '100%';
		
		// Ensure date picker is initialized when popup opens
		const form = popupOverlay.querySelector('.form-popup-form');
		if (form) {
			setTimeout(function() {
				if (typeof flatpickr !== 'undefined') {
					initDateInputs(form);
				}
			}, 100);
		}
	};

	/**
	 * Close form popup
	 */
	const closeFormPopup = function() {
		const popupOverlay = document.getElementById('formPopupOverlay');
		if (!popupOverlay) {
			return;
		}

		popupOverlay.classList.remove('active');
		document.body.classList.remove('form-popup-open');
		
		// Restore body scroll
		const scrollY = document.body.style.top;
		document.body.style.position = '';
		document.body.style.top = '';
		document.body.style.width = '';
		if (scrollY) {
			window.scrollTo(0, parseInt(scrollY || '0') * -1);
		}
	};

	/**
	 * Initialize Choices.js for select dropdowns
	 */
	const initFormSelects = function(form) {
		const selects = form.querySelectorAll('select');
		selects.forEach(function(select) {
			// Skip if already initialized
			if (select.closest('.choices')) {
				return;
			}

			const placeholderOption = select.querySelector('option[value=""]');
			const choices = new Choices(select, {
				searchEnabled: false,
				itemSelectText: '',
				placeholder: true,
				placeholderValue: placeholderOption ? placeholderOption.textContent : null,
				shouldSort: false,
				classNames: {
					containerOuter: 'choices choices-form-popup',
					containerInner: 'choices__inner',
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
					noChoices: 'has-no-choices',
				},
			});

			// Update styling when choice is made
			select.addEventListener('addItem', function() {
				updateChoicesColor(choices);
			});

			select.addEventListener('removeItem', function() {
				updateChoicesColor(choices);
			});

			// Initial color update
			setTimeout(function() {
				updateChoicesColor(choices);
			}, 100);
		});
	};

	/**
	 * Update Choices.js color based on selected value
	 */
	const updateChoicesColor = function(choices) {
		const container = choices.containerOuter.element;
		const value = choices.getValue(true);

		if (value && value.length > 0 && value[0] !== '') {
			container.classList.add('has-value');
		} else {
			container.classList.remove('has-value');
		}
	};

	/**
	 * Initialize date inputs with Flatpickr
	 */
	const initDateInputs = function(form) {
		// Initialize Flatpickr for date picker
		if (typeof flatpickr !== 'undefined') {
			const dateInput = form.querySelector('#popup-event-date');
			const calendarIcon = form.querySelector('.form-calendar-icon');
			const dateWrapper = form.querySelector('.form-date-wrapper');

			if (dateInput && dateWrapper) {
				// Check if already initialized
				if (dateInput._flatpickr) {
					return;
				}
				
				// Initialize display state
				updateDateInputDisplay(dateInput);

				// Store instance reference on wrapper for easy access
				const flatpickrInstance = flatpickr(dateInput, {
					dateFormat: 'Y-m-d',
					altInput: false,
					allowInput: true,
					clickOpens: false, // We handle clicks manually since input is hidden
					placeholder: 'Select Event Date',
					disableMobile: false,
					appendTo: dateWrapper, // Append to wrapper (which has position: relative)
					onReady: function (selectedDates, dateStr, instance) {
						const display = dateWrapper.querySelector('.form-field-display');
						
						// Store instance reference
						dateWrapper._flatpickrInstance = instance;
						
						// Function to show input and open calendar
						const openCalendar = function(e) {
							if (e) {
								e.preventDefault();
								e.stopPropagation();
							}
							
							// Show input and hide display
							if (display) {
								display.style.display = 'none';
							}
							dateInput.style.display = 'block';
							dateWrapper.classList.add('is-focused');
							
							// Focus input first
							dateInput.focus();
							
							// Then open calendar after a brief delay to ensure input is visible
							setTimeout(function() {
								instance.open();
							}, 50);
						};
						
						// Make calendar icon clickable
						if (calendarIcon) {
							calendarIcon.style.pointerEvents = 'auto';
							calendarIcon.style.cursor = 'pointer';
							calendarIcon.addEventListener('click', function (e) {
								openCalendar(e);
							});
						}

						// Make display span clickable
						if (display) {
							display.addEventListener('click', function (e) {
								openCalendar(e);
							});
						}

						// Make wrapper clickable to open calendar
						dateWrapper.addEventListener('click', function (e) {
							// Don't trigger if clicking on calendar icon (it has its own handler)
							if (e.target === calendarIcon) {
								return;
							}
							// Trigger for wrapper or display
							openCalendar(e);
						});
						
						// Also handle direct input clicks (when visible)
						dateInput.addEventListener('click', function (e) {
							e.stopPropagation();
							if (!instance.isOpen) {
								instance.open();
							}
						});

						// Handle focus events
						dateInput.addEventListener('focus', function () {
							dateWrapper.classList.add('is-focused');
							updateDateInputDisplay(dateInput);
						});

						dateInput.addEventListener('blur', function () {
							// Delay removing focus class to allow calendar interaction
							setTimeout(function() {
								if (!instance.isOpen && (!dateInput.value || dateInput.value.trim() === '')) {
									dateWrapper.classList.remove('is-focused');
									updateDateInputDisplay(dateInput);
								}
							}, 200);
						});
					},
					onOpen: function(selectedDates, dateStr, instance) {
						// Position calendar near the input field
						const calendar = instance.calendarContainer;
						if (calendar && dateWrapper) {
							calendar.style.position = 'absolute';
							calendar.style.top = '100%';
							calendar.style.left = '0';
							calendar.style.marginTop = '4px';
							calendar.style.zIndex = '10001'; // Higher than popup overlay (10000)
						}
					},
					onChange: function (selectedDates, dateStr, instance) {
						// Update display when date is selected
						updateDateInputDisplay(dateInput);
					},
				});
			}
		} else {
			// Fallback: Handle native date inputs if Flatpickr is not available
			const dateInputs = form.querySelectorAll('input[type="date"]');
			dateInputs.forEach(function(dateInput) {
				updateDateInputColor(dateInput);

				dateInput.addEventListener('change', function() {
					updateDateInputColor(dateInput);
				});

				dateInput.addEventListener('input', function() {
					updateDateInputColor(dateInput);
				});
			});
		}
	};

	/**
	 * Update date input display based on value
	 */
	const updateDateInputDisplay = function(dateInput) {
		const wrapper = dateInput.closest('.form-date-wrapper');
		if (!wrapper) return;

		const display = wrapper.querySelector('.form-field-display');

		if (dateInput.value && dateInput.value !== '') {
			// Has value - hide display, show input
			if (display) {
				display.style.display = 'none';
			}
			dateInput.style.display = 'block';
			dateInput.classList.add('has-value');
			wrapper.classList.add('has-value');
		} else {
			// No value - show display, hide input
			if (display) {
				display.style.display = 'block';
			}
			dateInput.style.display = 'none';
			dateInput.classList.remove('has-value');
			wrapper.classList.remove('has-value');
		}
	};

	/**
	 * Update date input color based on value (fallback for native date inputs)
	 */
	const updateDateInputColor = function(dateInput) {
		if (dateInput.value === '' || dateInput.value === null) {
			dateInput.classList.remove('has-value');
		} else {
			dateInput.classList.add('has-value');
		}
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initFormPopup);
		} else {
			initFormPopup();
		}
	};

	// Start initialization
	init();

})();

