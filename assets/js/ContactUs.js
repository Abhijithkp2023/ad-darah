/**
 * Contact Us Popup Component JavaScript
 * 
 * Handles the contact us popup modal functionality
 */

(function() {
	'use strict';

	/**
	 * Initialize Contact Us Popup
	 */
	const initContactUsPopup = function() {
		const contactButton = document.getElementById('contactUsButton');
		const popupOverlay = document.getElementById('contactPopupOverlay');
		const closeButton = document.getElementById('contactPopupClose');

		if (!contactButton || !popupOverlay || !closeButton) {
			return;
		}

		// Open popup
		contactButton.addEventListener('click', function(e) {
			e.preventDefault();
			openContactPopup();
		});

		// Close popup
		closeButton.addEventListener('click', function(e) {
			e.preventDefault();
			closeContactPopup();
		});

		// Close on overlay click
		popupOverlay.addEventListener('click', function(e) {
			if (e.target === popupOverlay) {
				closeContactPopup();
			}
		});

		// Close on escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && popupOverlay.classList.contains('active')) {
				closeContactPopup();
			}
		});

		/**
		 * Open Contact Popup
		 */
		function openContactPopup() {
			popupOverlay.classList.add('active');
			document.body.classList.add('contact-popup-open');
		}

		/**
		 * Close Contact Popup
		 */
		function closeContactPopup() {
			popupOverlay.classList.remove('active');
			document.body.classList.remove('contact-popup-open');
		}
	};

	// Initialize when DOM is ready
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', function() {
				setTimeout(initContactUsPopup, 100);
			});
		} else {
			setTimeout(initContactUsPopup, 100);
		}
	};

	init();

})();

