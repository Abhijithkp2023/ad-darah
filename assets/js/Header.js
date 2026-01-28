/**
 * Header Component JavaScript
 * Converted from React to vanilla JavaScript for WordPress
 * 
 * Handles scroll detection, menu toggle, and animations
 */

(function() {
	'use strict';

	/**
	 * Initialize Header Component
	 */
	const initHeader = function() {
		const headerSection = document.getElementById('headerMainSection');
		const menuIcon = document.getElementById('menuIcon');
		const menuIconScroll = document.getElementById('menuIconScroll');
		const menuIconInitial = document.getElementById('menuIconInitial');
		
		if (!headerSection) {
			return;
		}

		// Landing Page 2 (detect by URL): add class on the exact elements you pointed
		const path = (window.location && window.location.pathname) ? window.location.pathname : '';
		const isLanding2Url = path.includes('/landing-2');
		if (isLanding2Url) {
			const applyLanding2Hide = function() {
				headerSection.querySelectorAll('.header-nav').forEach((el) => el.classList.add('landing2-hide'));
				headerSection.querySelectorAll('.header-booking-form').forEach((el) => el.classList.add('landing2-hide'));
				const scrollHamburger = document.getElementById('menuIconScroll');
				if (scrollHamburger) scrollHamburger.classList.add('landing2-hide');
				const mobileHamburger = document.getElementById('menuIconInitial');
				if (mobileHamburger) mobileHamburger.classList.add('landing2-hide');
			};
			applyLanding2Hide();
			setTimeout(applyLanding2Hide, 100);
			setTimeout(applyLanding2Hide, 600);
		}

		let isScrolled = false;
		let isMenuOpen = false;
		const isHomePage = document.body.classList.contains('home');
		// Check for Landing Page 2 - WordPress adds class like 'page-template-page-landing-2'
		const bodyClasses = document.body.className.split(' ');
		const isLandingPage2 = bodyClasses.some(cls => cls.includes('landing-2') || cls.includes('page-landing-2'));

		const initialHeaderContainer = document.getElementById('headerInitialContainer');
		const scrollHeaderContainer = document.getElementById('headerScrollContainer');
		// Home page and Landing Page 2: 700px, Other pages: 500px
		const SCROLL_THRESHOLD = (isHomePage || isLandingPage2) ? 700 : 500;

		// Show header immediately on non-home pages (pages without Banner component)
		if (!isHomePage) {
			// Add class to show header immediately
			document.body.classList.add('header_visible');
		}

		/**
		 * Handle scroll event
		 * Only works above 1200px screen width
		 */
		const handleScroll = function() {
			const windowWidth = window.innerWidth || document.documentElement.clientWidth;
			
			// Only apply scroll behavior above 1200px
			if (windowWidth <= 1200) {
				// Reset classes when below 1200px
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.remove('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.remove('header-active');
				}
				headerSection.classList.remove('header-scroll-active');
				return;
			}
			
			const scrollY = window.scrollY || window.pageYOffset;
			
			// Handle initial header visibility (dynamic threshold: 700px for home/landing-2, 500px for others)
			if (scrollY >= SCROLL_THRESHOLD) {
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.add('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.add('header-active');
				}
				// Add class to main header for white background
				headerSection.classList.add('header-scroll-active');
			} else {
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.remove('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.remove('header-active');
				}
				// Remove class from main header
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

		/**
		 * Toggle menu
		 */
		const toggleMenu = function(e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			
			isMenuOpen = !isMenuOpen;
			
			if (menuIcon) {
				if (isMenuOpen) {
					menuIcon.classList.add('menu_open');
				} else {
					menuIcon.classList.remove('menu_open');
				}
			}
			if (menuIconScroll) {
				if (isMenuOpen) {
					menuIconScroll.classList.add('menu_open');
				} else {
					menuIconScroll.classList.remove('menu_open');
				}
			}

			// Toggle body classes
			document.body.classList.toggle('overflow_body_hidden');
			document.body.classList.toggle('header_activated');
			
			// Toggle mobile menu overlay
			const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
			if (mobileMenuOverlay) {
				if (isMenuOpen) {
					mobileMenuOverlay.classList.add('mobile_menu_open');
				} else {
					mobileMenuOverlay.classList.remove('mobile_menu_open');
				}
			}
		};

		/**
		 * Check current scroll position on load
		 */
		const checkInitialScroll = function() {
			handleScroll();
		};

		// Initialize - check scroll position immediately
		checkInitialScroll();
		
		// Also check after a short delay to ensure DOM is ready
		setTimeout(checkInitialScroll, 100);

		// Use Lenis scroll event if available, otherwise fallback to window scroll
		if (window.lenisInstance) {
			window.lenisInstance.on('scroll', ({ scroll }) => {
				const windowWidth = window.innerWidth || document.documentElement.clientWidth;
				
				// Only apply scroll behavior above 1200px
				if (windowWidth <= 1200) {
					// Reset classes when below 1200px
					if (initialHeaderContainer) {
						initialHeaderContainer.classList.remove('header-inactive');
					}
					if (scrollHeaderContainer) {
						scrollHeaderContainer.classList.remove('header-active');
					}
					headerSection.classList.remove('header-scroll-active');
					return;
				}
				
				// Handle initial header visibility (dynamic threshold: 700px for home/landing-2, 500px for others)
				if (scroll >= SCROLL_THRESHOLD) {
					if (initialHeaderContainer) {
						initialHeaderContainer.classList.add('header-inactive');
					}
					if (scrollHeaderContainer) {
						scrollHeaderContainer.classList.add('header-active');
					}
					// Add class to main header for white background
					headerSection.classList.add('header-scroll-active');
				} else {
					if (initialHeaderContainer) {
						initialHeaderContainer.classList.remove('header-inactive');
					}
					if (scrollHeaderContainer) {
						scrollHeaderContainer.classList.remove('header-active');
					}
					// Remove class from main header
					headerSection.classList.remove('header-scroll-active');
				}

				// Handle scrolled class for styling
				if (scroll > 1) {
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
			});
		} else {
			// Fallback to window scroll event
			window.addEventListener('scroll', handleScroll, { passive: true });
		}
		
		// Also handle resize to check width changes
		let resizeTimeout;
		window.addEventListener('resize', function() {
			clearTimeout(resizeTimeout);
			resizeTimeout = setTimeout(function() {
				handleScroll();
			}, 250);
		}, { passive: true });

		/**
		 * Reset Fullscreen Submenu
		 */
		const resetFullscreenSubmenu = function() {
			const submenuContent = document.getElementById('fullscreenNavSubmenuContent');
			const activeItem = document.querySelector('.fullscreen-nav-item-active');
			const leftContent = document.querySelector('.fullscreen-nav-left-content');
			const decorImage = document.querySelector('.fullscreen-nav-decor');
			
			if (submenuContent) {
				submenuContent.classList.remove('fullscreen-nav-submenu-active');
				// Hide all submenu wrappers
				const allSubmenuWrappers = submenuContent.querySelectorAll('.fullscreen-nav-submenu-wrapper');
				allSubmenuWrappers.forEach(wrapper => {
					wrapper.classList.remove('fullscreen-nav-submenu-wrapper-active');
				});
			}
			
			if (activeItem) {
				activeItem.classList.remove('fullscreen-nav-item-active');
			}

			// Show main content (logo + grid)
			if (leftContent) {
				leftContent.classList.remove('has-submenu-active');
			}

			// Remove class from decor image to show it
			if (decorImage) {
				decorImage.classList.remove('submenu-active');
			}
		};

		/**
		 * Close Fullscreen Navigation Menu
		 * Note: This is now handled by inline script in header.php
		 * Keeping this function for backward compatibility but it won't be called
		 */
		const closeFullscreenMenu = function() {
			// Check if GSAP is available
			if (typeof gsap === 'undefined') {
				console.warn('GSAP is not loaded');
				return;
			}

			const fullscreenNav = document.getElementById('fullscreenNavMenu');
			if (!fullscreenNav) {
				return;
			}

			// Get elements
			const leftPanel = fullscreenNav.querySelector('.fullscreen-nav-left');
			const rightPanel = fullscreenNav.querySelector('.fullscreen-nav-right');
			const gridHeadings = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-heading');
			const allGridSubs = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-sub');
			const gridSocialLinks = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-social a');
			const menuItems = fullscreenNav.querySelector('.fullscreen-nav-menu-items');

			if (!leftPanel || !rightPanel) {
				fullscreenNav.classList.remove('fullscreen-nav-open');
				document.body.classList.remove('fullscreen-nav-open');
				resetFullscreenSubmenu();
				return;
			}

			// Separate regular grid subs from social links
			const regularGridSubs = Array.from(allGridSubs).filter(function(sub) {
				return !sub.closest('.fullscreen-nav-grid-social');
			});

			// Check if mobile (below 600px) - left panel is hidden
			const isMobile = window.innerWidth <= 600;

			// Create reverse timeline
			const tl = gsap.timeline({
				onComplete: function() {
					// Reset after animation completes
					fullscreenNav.classList.remove('fullscreen-nav-open');
					document.body.classList.remove('fullscreen-nav-open');
					// Reset submenu state
					resetFullscreenSubmenu();
				}
			});

			if (isMobile) {
				// Mobile: Skip left panel animations, only animate right panel and menu items
				tl.to(menuItems, {
					opacity: 0,
					x: 30,
					duration: 0.4,
					ease: 'power2.in'
				})
				.to(rightPanel, {
					x: '100%',
					duration: 0.6,
					ease: 'power2.out'
				}, '-=0.2');
			} else {
				// Desktop: Normal reverse sequence with both panels
				tl.to(menuItems, {
					opacity: 0,
					x: 30,
					duration: 0.4,
					ease: 'power2.in'
				})
				.to(gridSocialLinks, {
					opacity: 0,
					y: -30,
					duration: 0.4,
					ease: 'power2.in'
				}, '-=0.2')
				.to(regularGridSubs, {
					opacity: 0,
					y: -30,
					duration: 0.4,
					stagger: 0.05,
					ease: 'power2.in'
				}, '-=0.2')
				.to(gridHeadings, {
					opacity: 0,
					duration: 0.3,
					ease: 'power2.in'
				}, '-=0.2')
				.to(leftPanel, {
					x: '-100%',
					duration: 0.8,
					ease: 'power2.out'
				}, '-=0.2')
				.to(rightPanel, {
					x: '100%',
					duration: 0.8,
					ease: 'power2.out'
				}, '-=0.8'); // Start at same time as left panel
			}
		};

		/**
		 * Open Fullscreen Navigation Menu with GSAP Animation
		 * Note: This is now handled by inline script in header.php
		 * Keeping this function for backward compatibility but it won't be called
		 */
		const openFullscreenMenu = function() {
			// Check if GSAP is available
			if (typeof gsap === 'undefined') {
				console.warn('GSAP is not loaded');
				return;
			}

			const fullscreenNav = document.getElementById('fullscreenNavMenu');
			if (!fullscreenNav) {
				return;
			}

			// Get elements
			const leftPanel = fullscreenNav.querySelector('.fullscreen-nav-left');
			const rightPanel = fullscreenNav.querySelector('.fullscreen-nav-right');
			const gridHeadings = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-heading');
			// Get all grid subs but exclude social links (they're inside .fullscreen-nav-grid-social)
			const allGridSubs = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-sub');
			const gridSocialLinks = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-social a');
			const menuItems = fullscreenNav.querySelector('.fullscreen-nav-menu-items');

			if (!leftPanel || !rightPanel) {
				return;
			}

			// Separate regular grid subs from social links
			const regularGridSubs = Array.from(allGridSubs).filter(function(sub) {
				return !sub.closest('.fullscreen-nav-grid-social');
			});

			// Show menu container
			fullscreenNav.classList.add('fullscreen-nav-open');
			document.body.classList.add('fullscreen-nav-open');

			// Check if mobile (below 600px) - left panel is hidden
			const isMobile = window.innerWidth <= 600;

			// Reset initial states
			if (isMobile) {
				// Mobile: Only set right panel and menu items
				gsap.set(rightPanel, { x: '100%' });
				gsap.set(menuItems, { opacity: 0, x: 30 });
			} else {
				// Desktop: Set all elements
				gsap.set(leftPanel, { x: '-100%' });
				gsap.set(rightPanel, { x: '100%' });
				gsap.set(gridHeadings, { opacity: 0 });
				gsap.set(regularGridSubs, { opacity: 0, y: -30 });
				gsap.set(gridSocialLinks, { opacity: 0, y: -30 });
				gsap.set(menuItems, { opacity: 0, x: 30 });
			}

			// Create timeline for animation sequence
			const tl = gsap.timeline();

			if (isMobile) {
				// Mobile: Skip left panel animations, show right panel and menu items immediately
				tl.to(rightPanel, {
					x: 0,
					duration: 0.6,
					ease: 'power2.out'
				})
				.to(menuItems, {
					opacity: 1,
					x: 0,
					duration: 0.5,
					ease: 'power2.out'
				}, '-=0.3'); // Start slightly before right panel finishes
			} else {
				// Desktop: Normal animation with both panels
				// Step 1: Slide in panels uniformly (slower - 0.8s)
				tl.to(leftPanel, {
					x: 0,
					duration: 0.8,
					ease: 'power2.out'
				})
				.to(rightPanel, {
					x: 0,
					duration: 0.8,
					ease: 'power2.out'
				}, '-=0.8') // Start at the same time as left panel

				// Step 2: Show headings (after panels fully join)
				.to(gridHeadings, {
					opacity: 1,
					duration: 0.4,
					ease: 'power2.out'
				}) // Start after panels animation completes

				// Step 3: Regular grid subs and social links slide down together
				.to(regularGridSubs, {
					opacity: 1,
					y: 0,
					duration: 0.6,
					stagger: 0.08,
					ease: 'power2.out',
					transformOrigin: 'top'
				}) // Start after headings animation

				// Step 4: Social links slide down in parallel at the same time as regular subs
				.to(gridSocialLinks, {
					opacity: 1,
					y: 0,
					duration: 0.6,
					ease: 'power2.out',
					transformOrigin: 'top'
				}, '<') // Start at the same time as regular subs

				// Step 5: Show menu items (after subs/socials finish)
				.to(menuItems, {
					opacity: 1,
					x: 0,
					duration: 0.6,
					ease: 'power2.out'
				}); // Start after subs/socials animation completes
			}
		};

		/**
		 * Toggle Fullscreen Navigation Menu
		 */
		const toggleFullscreenMenu = function(e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			
			const fullscreenNav = document.getElementById('fullscreenNavMenu');
			if (!fullscreenNav) {
				return;
			}
			
			const isOpen = fullscreenNav.classList.contains('fullscreen-nav-open');
			
			if (isOpen) {
				closeFullscreenMenu();
			} else {
				openFullscreenMenu();
			}
		};

		/**
		 * Initialize Fullscreen Navigation Submenu
		 */
		const initFullscreenSubmenu = function() {
			const submenuItems = document.querySelectorAll('.fullscreen-nav-item-has-submenu');
			const submenuContent = document.getElementById('fullscreenNavSubmenuContent');
			const closeBtn = document.getElementById('fullscreenNavClose');
			const leftContent = document.querySelector('.fullscreen-nav-left-content');
			
			if (!submenuItems.length || !submenuContent) {
				return;
			}

			// Close button handler
			if (closeBtn) {
				closeBtn.addEventListener('click', function(e) {
					e.preventDefault();
					closeFullscreenMenu();
				});
			}

			// Submenu item click handlers
			submenuItems.forEach(item => {
				const link = item.querySelector('.fullscreen-nav-link');
				const submenuId = item.getAttribute('data-submenu');
				const submenuDataMobile = item.querySelector('.fullscreen-nav-submenu-data-mobile');
				
				if (link && submenuId) {
					link.addEventListener('click', function(e) {
						e.preventDefault();
						
						const isActive = item.classList.contains('fullscreen-nav-item-active');
						const isMobile = window.innerWidth <= 600;
						
						// Close all other submenus
						submenuItems.forEach(otherItem => {
							if (otherItem !== item) {
								otherItem.classList.remove('fullscreen-nav-item-active');
								// Hide mobile submenu
								const otherSubmenuMobile = otherItem.querySelector('.fullscreen-nav-submenu-data-mobile');
								if (otherSubmenuMobile) {
									otherSubmenuMobile.style.display = 'none';
								}
							}
						});
						
						// Hide all submenu wrappers (for desktop left panel)
						const allSubmenuWrappers = submenuContent.querySelectorAll('.fullscreen-nav-submenu-wrapper');
						allSubmenuWrappers.forEach(wrapper => {
							wrapper.classList.remove('fullscreen-nav-submenu-wrapper-active');
						});
						
						// Toggle current submenu
						const decorImage = document.querySelector('.fullscreen-nav-decor');
						
						if (isActive) {
							item.classList.remove('fullscreen-nav-item-active');
							submenuContent.classList.remove('fullscreen-nav-submenu-active');
							// Show main content (logo + grid) on desktop
							if (leftContent) {
								leftContent.classList.remove('has-submenu-active');
							}
							// Hide mobile submenu
							if (isMobile && submenuDataMobile) {
								submenuDataMobile.style.display = 'none';
							}
							// Remove class from decor image to show it
							if (decorImage) {
								decorImage.classList.remove('submenu-active');
							}
						} else {
							item.classList.add('fullscreen-nav-item-active');
							
							if (isMobile) {
								// Mobile: Show submenu below the category
								if (submenuDataMobile) {
									submenuDataMobile.style.display = 'block';
								}
								// Add class to decor image to hide it on mobile
								if (decorImage) {
									decorImage.classList.add('submenu-active');
								}
							} else {
								// Desktop: Show submenu in left panel
								const targetSubmenuWrapper = submenuContent.querySelector('[data-submenu-id="' + submenuId + '"]');
								
								if (targetSubmenuWrapper) {
									// Show submenu content and hide main content
									targetSubmenuWrapper.classList.add('fullscreen-nav-submenu-wrapper-active');
									submenuContent.classList.add('fullscreen-nav-submenu-active');
									if (leftContent) {
										leftContent.classList.add('has-submenu-active');
									}
									// Add class to decor image to hide it
									if (decorImage) {
										decorImage.classList.add('submenu-active');
									}
								}
							}
						}
					});
				}
			});
		};

		// Add menu toggle event listener
		if (menuIcon) {
			menuIcon.addEventListener('click', toggleMenu);
		}
		// Note: menuIconScroll and menuIconInitial are handled by inline script in header.php
		// Only attach if inline script hasn't initialized (fallback)
		if (!window.fullscreenMenuInitialized) {
			if (menuIconScroll) {
				menuIconScroll.addEventListener('click', toggleFullscreenMenu);
			}
			if (menuIconInitial) {
				menuIconInitial.addEventListener('click', toggleFullscreenMenu);
			}
		}

		// Initialize fullscreen submenu
		initFullscreenSubmenu();

		// Close menu when clicking outside or on menu items
		document.addEventListener('click', function(event) {
			const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
			if (isMenuOpen && mobileMenuOverlay) {
				// Close if clicking outside the menu overlay and menu icons
				const clickedOnMenuIcon = (menuIcon && menuIcon.contains(event.target)) || 
				                          (menuIconScroll && menuIconScroll.contains(event.target));
				if (!mobileMenuOverlay.contains(event.target) && !clickedOnMenuIcon) {
					toggleMenu();
				}
				// Close if clicking on a menu item
				if (mobileMenuOverlay.contains(event.target) && event.target.classList.contains('mobile_menu_item')) {
					setTimeout(toggleMenu, 300); // Small delay to allow navigation
				}
			}
		});

		// Close menu on escape key
		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape') {
				if (isMenuOpen) {
					toggleMenu();
				}
				// Also close fullscreen menu if open
				const fullscreenNav = document.getElementById('fullscreenNavMenu');
				if (fullscreenNav && fullscreenNav.classList.contains('fullscreen-nav-open')) {
					closeFullscreenMenu();
				}
			}
		});

		/**
		 * Initialize Dropdown Functionality
		 */
		const initDropdowns = function() {
			const dropdownArrows = document.querySelectorAll('.dropdown_arrow');
			const dropdownMenus = document.querySelectorAll('.dropdown_menu_fullwidth');
			
			// Close all dropdowns
			const closeAllDropdowns = function() {
				dropdownMenus.forEach(menu => {
					menu.classList.remove('dropdown_open');
				});
				dropdownArrows.forEach(arrow => {
					arrow.classList.remove('dropdown_active');
				});
				// Remove dropdown_open class from header
				if (headerSection) {
					headerSection.classList.remove('dropdown_open');
				}
			};

			// Calculate header height for dropdown positioning
			const updateDropdownPosition = function() {
				const headerSection = document.getElementById('headerMainSection');
				if (headerSection) {
					const headerHeight = headerSection.offsetHeight;
					dropdownMenus.forEach(menu => {
						menu.style.top = headerHeight + 'px';
					});
				}
			};

			// Update position on load and resize
			updateDropdownPosition();
			window.addEventListener('resize', updateDropdownPosition);

			// Handle dropdown toggle (both arrow and parent link)
			const toggleDropdown = function(dropdownId, arrow) {
				const dropdownMenu = document.getElementById('dropdown-' + dropdownId);
				
				if (!dropdownMenu) {
					return;
				}

				const isOpen = dropdownMenu.classList.contains('dropdown_open');

				// Close all dropdowns first
				closeAllDropdowns();

				// Toggle current dropdown if it wasn't open
				if (!isOpen) {
					updateDropdownPosition();
					dropdownMenu.classList.add('dropdown_open');
					if (arrow) {
						arrow.classList.add('dropdown_active');
					}
					// Add dropdown_open class to header
					if (headerSection) {
						headerSection.classList.add('dropdown_open');
					}
				}
			};

			// Handle dropdown arrow click
			dropdownArrows.forEach(arrow => {
				arrow.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					
					const dropdownId = this.getAttribute('data-dropdown');
					toggleDropdown(dropdownId, this);
				});
			});

			// Handle parent link click for dropdowns
			const dropdownLinks = document.querySelectorAll('.nav-link-with-dropdown, .nav-item-with-dropdown > a');
			dropdownLinks.forEach(link => {
				link.addEventListener('click', function(e) {
					// Check if this link has a dropdown
					const parentItem = this.closest('.nav-item-with-dropdown');
					if (parentItem) {
						const arrow = parentItem.querySelector('.dropdown_arrow');
						if (arrow) {
							e.preventDefault();
							e.stopPropagation();
							const dropdownId = arrow.getAttribute('data-dropdown');
							toggleDropdown(dropdownId, arrow);
						}
					}
				});
			});

			// Close dropdowns when clicking on dropdown items or buttons
			dropdownMenus.forEach(menu => {
				menu.addEventListener('click', function(e) {
					if (e.target.classList.contains('dropdown_item') || e.target.classList.contains('btn_primary')) {
						// Close dropdown after a short delay to allow navigation
						setTimeout(closeAllDropdowns, 100);
					}
				});
			});

			// Close dropdowns when clicking outside
			document.addEventListener('click', function(event) {
				const clickedInside = event.target.closest('.nav_item_with_dropdown');
				const clickedInDropdown = event.target.closest('.dropdown_menu_fullwidth');
				if (!clickedInside && !clickedInDropdown) {
					closeAllDropdowns();
				}
			});

			// Close dropdowns on escape key
			document.addEventListener('keydown', function(event) {
				if (event.key === 'Escape') {
					closeAllDropdowns();
				}
			});
		};

		// Initialize dropdowns
		initDropdowns();

		/**
		 * Initialize Mobile Menu Submenu Functionality
		 */
		const initMobileSubmenus = function() {
			const submenuToggles = document.querySelectorAll('.mobile_menu_submenu_toggle');
			
			submenuToggles.forEach(toggle => {
				toggle.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					
					const submenuId = this.getAttribute('data-submenu');
					const submenu = document.getElementById('mobile-submenu-' + submenuId);
					const parentItem = this.closest('.mobile_menu_item_has_submenu');
					
					if (!submenu || !parentItem) {
						return;
					}
					
					const isOpen = submenu.classList.contains('mobile_submenu_open');
					
					// Close all other submenus
					document.querySelectorAll('.mobile_menu_submenu').forEach(menu => {
						if (menu !== submenu) {
							menu.classList.remove('mobile_submenu_open');
						}
					});
					document.querySelectorAll('.mobile_menu_submenu_toggle').forEach(btn => {
						if (btn !== toggle) {
							btn.classList.remove('mobile_submenu_toggle_active');
						}
					});
					
					// Toggle current submenu
					if (isOpen) {
						submenu.classList.remove('mobile_submenu_open');
						toggle.classList.remove('mobile_submenu_toggle_active');
					} else {
						submenu.classList.add('mobile_submenu_open');
						toggle.classList.add('mobile_submenu_toggle_active');
					}
				});
			});
		};

		// Initialize mobile submenus
		initMobileSubmenus();

		/**
		 * Initialize Calendar Icon Click Handler
		 */
		const initCalendarIcon = function() {
			const calendarIcons = document.querySelectorAll('.header-form-calendar-icon');
			const dateInputs = document.querySelectorAll('.header-form-date-wrapper input[type="date"]');
			
			calendarIcons.forEach((icon, index) => {
				// Make icon clickable
				icon.style.pointerEvents = 'auto';
				icon.style.cursor = 'pointer';
				
				icon.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					
					// Find the corresponding date input
					const wrapper = icon.closest('.header-form-date-wrapper');
					if (wrapper) {
						const dateInput = wrapper.querySelector('input[type="date"]');
						if (dateInput) {
							// Focus and show the date picker
							dateInput.focus();
							// Use showPicker if available, otherwise just focus
							if (typeof dateInput.showPicker === 'function') {
								dateInput.showPicker();
							} else {
								// Fallback: trigger click on the input
								dateInput.click();
							}
						}
					}
				});
			});

			// Also ensure date inputs are clickable
			dateInputs.forEach(input => {
				input.addEventListener('click', function(e) {
					// Ensure the date picker opens (browser will handle it)
					// The native date input should open the picker on click
				});
			});
		};

		// Initialize calendar icon
		initCalendarIcon();

		/**
		 * Initialize Choices.js for select dropdowns
		 */
		const initChoicesSelects = function() {
			if (typeof Choices === 'undefined') {
				return;
			}

			const eventTypeSelect = document.getElementById('headerEventType');
			const preferredTimeSelect = document.getElementById('headerPreferredTime');

			if (eventTypeSelect) {
				new Choices(eventTypeSelect, {
					searchEnabled: false,
					itemSelectText: '',
					placeholder: true,
					placeholderValue: 'Event Type',
					shouldSort: false,
					removeItemButton: false,
					classNames: {
						containerOuter: 'choices header-choices',
						containerInner: 'choices__inner header-choices__inner',
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
			}

			if (preferredTimeSelect) {
				new Choices(preferredTimeSelect, {
					searchEnabled: false,
					itemSelectText: '',
					placeholder: true,
					placeholderValue: 'Preferred Time',
					shouldSort: false,
					removeItemButton: false,
					classNames: {
						containerOuter: 'choices header-choices',
						containerInner: 'choices__inner header-choices__inner',
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
			}
		};

		/**
		 * Initialize Flatpickr for date picker
		 */
		const initFlatpickrDate = function() {
			if (typeof flatpickr === 'undefined') {
				return;
			}

			const dateInput = document.getElementById('headerEventDate');
			const calendarIcon = document.querySelector('.header-form-calendar-icon');
			const dateWrapper = document.querySelector('.header-form-date-wrapper');

			if (dateInput) {
				const dateWrapperEl = dateWrapper || dateInput.closest('.header-form-date-wrapper');
				const display = dateWrapperEl ? dateWrapperEl.querySelector('.header-form-field-display') : null;
				
				// Set initial state: show display, hide input
				if (display && dateWrapperEl) {
					display.style.display = 'block';
					dateInput.style.display = 'none';
				}

				const flatpickrInstance = flatpickr(dateInput, {
					dateFormat: 'Y-m-d',
					altInput: false,
					allowInput: true,
					clickOpens: true,
					placeholder: 'Event Date',
					disableMobile: false,
					appendTo: dateWrapper || dateInput.parentElement, // Append to wrapper (which has position: relative)
					onReady: function(selectedDates, dateStr, instance) {
						// Make calendar icon clickable
						if (calendarIcon) {
							calendarIcon.style.pointerEvents = 'auto';
							calendarIcon.style.cursor = 'pointer';
							calendarIcon.addEventListener('click', function(e) {
								e.preventDefault();
								e.stopPropagation();
								// Show input and focus it before opening calendar
								if (display && dateWrapperEl) {
									display.style.display = 'none';
									dateInput.style.display = 'block';
									dateWrapperEl.classList.add('is-focused');
								}
								instance.open();
							});
						}

						// Handle input focus
						dateInput.addEventListener('focus', function() {
							if (display && dateWrapperEl) {
								display.style.display = 'none';
								dateInput.style.display = 'block';
								dateWrapperEl.classList.add('is-focused');
							}
						});

						// Handle input blur
						dateInput.addEventListener('blur', function() {
							if (!dateInput.value || dateInput.value.trim() === '') {
								if (display && dateWrapperEl) {
									dateWrapperEl.classList.remove('is-focused');
									// Keep input visible if calendar is open, otherwise hide it
									setTimeout(function() {
										if (!instance.isOpen) {
											dateInput.style.display = 'none';
											display.style.display = 'block';
										}
									}, 200);
								}
							}
						});
					},
					onOpen: function(selectedDates, dateStr, instance) {
						// Position calendar near the input field
						const calendar = instance.calendarContainer;
						if (calendar && (dateWrapper || dateInput.parentElement)) {
							const container = dateWrapper || dateInput.parentElement;
							calendar.style.position = 'absolute';
							calendar.style.top = '100%';
							calendar.style.left = '0';
							calendar.style.marginTop = '4px';
							calendar.style.zIndex = '10000';
						}
					},
					onClose: function(selectedDates, dateStr, instance) {
						// If no value, hide input and show display after closing
						if (!dateInput.value || dateInput.value.trim() === '') {
							if (display && dateWrapperEl) {
								setTimeout(function() {
									dateInput.style.display = 'none';
									display.style.display = 'block';
									dateWrapperEl.classList.remove('is-focused');
								}, 100);
							}
						}
					},
					onChange: function(selectedDates, dateStr, instance) {
						// Update display when date is selected
						updateFieldDisplay(dateInput);
						// If date is selected, keep input visible
						if (dateStr) {
							if (display && dateWrapperEl) {
								display.style.display = 'none';
								dateInput.style.display = 'block';
								dateWrapperEl.classList.add('has-value');
							}
						}
					}
				});
			}
		};

		/**
		 * Initialize div-based form field interactions
		 */
		const initFormFieldWrappers = function() {
			const fieldWrappers = document.querySelectorAll('.header-form-field-wrapper');

			fieldWrappers.forEach(function(wrapper) {
				const display = wrapper.querySelector('.header-form-field-display');
				const input = wrapper.querySelector('.header-form-input, select');
				const choicesContainer = wrapper.querySelector('.header-choices');
				const isSelect = input && input.tagName === 'SELECT';
				const isDateInput = wrapper.classList.contains('header-form-date-wrapper');
				
				// Skip date inputs - they are handled by Flatpickr
				if (isDateInput) {
					return;
				}
				
				// For selects, always show them and hide display
				if (isSelect) {
					if (display) {
						display.style.display = 'none';
					}
					if (input) {
						input.style.display = 'block';
					}
					if (choicesContainer) {
						choicesContainer.style.display = 'flex';
					}
					return; // Skip the rest for selects
				}

				// Only handle text inputs
				if (!display || !input) return;

				// Set initial state: show display, hide input
				display.style.display = 'block';
				input.style.display = 'none';

				// Update display text based on input value
				const updateDisplay = function() {
					const value = input.value;

					if (value && value.trim() !== '') {
						display.textContent = value;
						wrapper.classList.add('has-value');
					} else {
						display.textContent = input.getAttribute('placeholder') || display.textContent;
						wrapper.classList.remove('has-value');
					}
				};

				// Show input when wrapper is clicked
				wrapper.addEventListener('click', function(e) {
					if (!wrapper.classList.contains('is-focused')) {
						wrapper.classList.add('is-focused');
						display.style.display = 'none';
						input.style.display = 'block';
						
						// Focus the input
						setTimeout(function() {
							input.focus();
						}, 10);
					}
				});

				// Handle input events
				input.addEventListener('input', updateDisplay);
				input.addEventListener('blur', function() {
					updateDisplay();
					if (!input.value || input.value.trim() === '') {
						wrapper.classList.remove('is-focused');
						input.style.display = 'none';
						display.style.display = 'block';
					}
				});

				// Initial update
				updateDisplay();
			});
		};

		/**
		 * Update field display text
		 */
		const updateFieldDisplay = function(input) {
			const wrapper = input.closest('.header-form-field-wrapper');
			if (!wrapper) return;

			const display = wrapper.querySelector('.header-form-field-display');
			if (!display) return;

			let value = '';
			
			if (input.tagName === 'SELECT') {
				const selectedOption = input.options[input.selectedIndex];
				value = selectedOption && selectedOption.value ? selectedOption.text : '';
			} else {
				value = input.value;
			}

			if (value && value.trim() !== '') {
				display.textContent = value;
				wrapper.classList.add('has-value');
			} else {
				display.textContent = input.getAttribute('placeholder') || display.textContent;
				wrapper.classList.remove('has-value');
			}
		};

		// Initialize Choices and Flatpickr
		initChoicesSelects();
		initFlatpickrDate();

		/**
		 * Initialize Header Search (toggle search input near icon)
		 */
		const initHeaderSearch = function() {
			const searchContainers = headerSection.querySelectorAll('.header-search-container');

			if (!searchContainers.length) return;

			searchContainers.forEach(function(container) {
				const toggle = container.querySelector('[data-header-search-toggle]');
				const form = container.querySelector('[data-header-search-form]');
				const input = form ? form.querySelector('.header-search-input') : null;

				if (!toggle || !form || !input) return;

				let open = false;

				const closeSearch = function() {
					container.classList.remove('is-open');
					open = false;
				};

				toggle.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();

					open = !open;
					if (open) {
						container.classList.add('is-open');
						setTimeout(function() {
							input.focus();
						}, 150);
					} else {
						closeSearch();
					}
				});

				// Prevent clicks inside form from closing it
				form.addEventListener('click', function(e) {
					e.stopPropagation();
				});

				// Close when clicking outside
				document.addEventListener('click', function(e) {
					if (!container.contains(e.target) && open) {
						closeSearch();
					}
				});

				// Close on Escape key
				document.addEventListener('keydown', function(e) {
					if (e.key === 'Escape' && open) {
						closeSearch();
					}
				});
			});
		};

		// Initialize header search
		initHeaderSearch();
		
		// Initialize form field wrappers after a short delay to ensure Choices.js is initialized
		setTimeout(function() {
			initFormFieldWrappers();
		}, 100);
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initHeader);
		} else {
			// DOM already loaded
			initHeader();
		}
	};

	// Start initialization
	init();

})();

