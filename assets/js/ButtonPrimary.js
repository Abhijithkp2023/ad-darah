/**
 * ButtonPrimary Component JavaScript
 * Handles hover effects for primary buttons
 */

(function() {
	'use strict';

	/**
	 * Initialize ButtonPrimary hover effects
	 */
	const initButtonPrimary = function() {
		// Select both data attribute and class selector, plus primary-button class and contact-us-button
		const buttons = document.querySelectorAll('[data-button-primary], .btn_primary, .primary-button, .contact-us-button');

		buttons.forEach(function(button) {
			let isHovered = false;
			let mouseX = 0;
			let mouseY = 0;

			// Create circle element if it doesn't exist
			let circle = button.querySelector('.su_button_circle');
			if (!circle) {
				circle = document.createElement('span');
				circle.className = 'su_button_circle';
				button.appendChild(circle);
			}

			// Mouse enter - add hovered class and explode circle
			button.addEventListener('mouseenter', function(e) {
				isHovered = true;
				button.classList.add('hovered');
				
				// Get mouse position relative to button
				const rect = button.getBoundingClientRect();
				mouseX = e.clientX - rect.left;
				mouseY = e.clientY - rect.top;
				
				// Position circle at mouse location and explode
				circle.style.left = mouseX + 'px';
				circle.style.top = mouseY + 'px';
				circle.classList.remove('desplode-circle');
				circle.classList.add('explode-circle');
			});

			// Mouse leave - remove hovered class and desplode circle
			button.addEventListener('mouseleave', function(e) {
				isHovered = false;
				button.classList.remove('hovered');
				
				// Get mouse position relative to button
				const rect = button.getBoundingClientRect();
				mouseX = e.clientX - rect.left;
				mouseY = e.clientY - rect.top;
				
				// Position circle at mouse location and desplode
				circle.style.left = mouseX + 'px';
				circle.style.top = mouseY + 'px';
				circle.classList.remove('explode-circle');
				circle.classList.add('desplode-circle');
				
				// Add cursor pointer left class for smooth exit
				button.classList.add('cursor_pointer_left');
				
				// Remove cursor pointer left class after transition
				setTimeout(function() {
					button.classList.remove('cursor_pointer_left');
				}, 500);
			});

			// Mouse move - track cursor position for advanced effects (if needed)
			button.addEventListener('mousemove', function(e) {
				if (isHovered) {
					const rect = button.getBoundingClientRect();
					mouseX = e.clientX - rect.left;
					mouseY = e.clientY - rect.top;
				}
			});
		});
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initButtonPrimary);
		} else {
			// DOM already loaded
			initButtonPrimary();
		}
	};

	// Start initialization
	init();

})();

