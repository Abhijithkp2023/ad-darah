/**
 * PageTabs Component JavaScript
 * 
 * Handles tab navigation and active state management
 */

(function() {
	'use strict';

	/**
	 * Initialize PageTabs Component
	 */
	const initPageTabs = function() {
		const tabsNav = document.querySelector('[data-page-tabs]');
		if (!tabsNav) {
			return;
		}

		// Support both old and new class names
		let tabItems = tabsNav.querySelectorAll('.news-tabs-item');
		if (tabItems.length === 0) {
			tabItems = tabsNav.querySelectorAll('.page-tabs-item');
		}
		
		// Handle tab click
		tabItems.forEach(item => {
			let link = item.querySelector('.news-tabs-link');
			if (!link) {
				link = item.querySelector('.page-tabs-link');
			}
			
			if (link) {
				link.addEventListener('click', function(e) {
					// If it's a hash link, prevent default and handle tab switching
					if (this.getAttribute('href') === '#' || this.getAttribute('href').startsWith('#')) {
						e.preventDefault();
						
						// Remove active class from all tab items
						tabItems.forEach(tab => {
							tab.classList.remove('active');
						});
						
						// Add active class to clicked tab item
						item.classList.add('active');
						
						// Trigger custom event for tab change
						const tabId = this.getAttribute('data-tab');
						if (tabId) {
							const event = new CustomEvent('tabChanged', {
								detail: { tabId: tabId }
							});
							document.dispatchEvent(event);
						}
					}
				});
			}
		});
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initPageTabs);
		} else {
			initPageTabs();
		}
	};

	// Start initialization
	init();

})();

