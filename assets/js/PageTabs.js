/**
 * PageTabs Component JavaScript
 * 
 * Handles tab navigation and active state management
 */

(function() {
	'use strict';

	/**
	 * Scroll active tab into view
	 */
	const scrollActiveTabIntoView = function() {
		const tabsNav = document.querySelector('[data-page-tabs]');
		if (!tabsNav) {
			return;
		}

		const tabsList = tabsNav.querySelector('.news-tabs-list') || tabsNav.querySelector('.page-tabs-list');
		if (!tabsList) {
			return;
		}

		// Check if we're on mobile (below 600px)
		const isMobile = window.innerWidth <= 600;
		
		// Find active tab
		let activeTab = tabsNav.querySelector('.news-tabs-item.active');
		if (!activeTab) {
			activeTab = tabsNav.querySelector('.page-tabs-item.active');
		}

		if (!activeTab || !tabsList) {
			return;
		}

		// Scroll active tab into view (works for all tabs including gallery)
		// Only scroll on mobile where horizontal scrolling is enabled
		if (isMobile) {
			// Calculate scroll position to ensure active tab is visible and centered
			const tabRect = activeTab.getBoundingClientRect();
			const listRect = tabsList.getBoundingClientRect();
			const tabLeft = tabRect.left - listRect.left + tabsList.scrollLeft;
			const tabWidth = tabRect.width;
			const listWidth = tabsList.clientWidth;
			const tabCenter = tabLeft + (tabWidth / 2);
			const listCenter = listWidth / 2;
			
			// Calculate scroll position to center the tab
			const scrollPosition = tabCenter - listCenter;
			
			// Ensure scroll position is within bounds
			const maxScroll = tabsList.scrollWidth - tabsList.clientWidth;
			const finalScrollPosition = Math.max(0, Math.min(scrollPosition, maxScroll));
			
			// Scroll to show the active tab
			tabsList.scrollTo({
				left: finalScrollPosition,
				behavior: 'smooth'
			});
		}
	};

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
		
		// Scroll active tab into view on page load
		// Use multiple timing strategies to ensure it works
		const scrollOnLoad = function() {
			// Try immediately
			scrollActiveTabIntoView();
			
			// Try again after a short delay to ensure layout is complete
			setTimeout(function() {
				scrollActiveTabIntoView();
			}, 100);
			
			// Try again after a longer delay for slower connections
			setTimeout(function() {
				scrollActiveTabIntoView();
			}, 300);
		};
		
		scrollOnLoad();
		
		// Also try after window load (in case images/content affect layout)
		window.addEventListener('load', function() {
			setTimeout(function() {
				scrollActiveTabIntoView();
			}, 50);
		});

		// Also scroll on window resize (in case of orientation change)
		let resizeTimeout;
		window.addEventListener('resize', function() {
			clearTimeout(resizeTimeout);
			resizeTimeout = setTimeout(function() {
				scrollActiveTabIntoView();
			}, 250);
		});
		
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
						
						// Scroll the newly active tab into view
						setTimeout(function() {
							scrollActiveTabIntoView();
						}, 50);
						
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

