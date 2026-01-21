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
			initDateInputs(form);
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
	 * Initialize date inputs
	 */
	const initDateInputs = function(form) {
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
	};

	/**
	 * Update date input color based on value
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

