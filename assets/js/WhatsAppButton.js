/**
 * WhatsApp Floating Button Component JavaScript
 * 
 * Handles click animation and navigation
 */

(function() {
	'use strict';

	/**
	 * Initialize WhatsApp Button Component
	 */
	const initWhatsAppButton = function() {
		const whatsappButton = document.querySelector('.whatsapp-floating-button');
		
		if (!whatsappButton) {
			return;
		}

		// Button is always visible - no entrance animation needed
		// The button will be visible immediately when the page loads
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initWhatsAppButton);
		} else {
			// DOM already loaded
			initWhatsAppButton();
		}
	};

	// Start initialization
	init();

})();

