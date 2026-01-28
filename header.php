<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package addarah
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Favicon -->
	<link rel="icon" type="image/svg+xml"
		href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fav.png'); ?>">
	<link rel="icon" type="image/png"
		href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fav.png'); ?>">
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fav.png'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="headerMainSection" class="main-header">
		<div class="container header-container header-initial-container" id="headerInitialContainer">
			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main-logo.svg'); ?>"
						alt="<?php bloginfo('name'); ?>">
				</a>
			</div>

			<!-- Navigation -->
			<nav class="header-nav">
				<?php
				if (has_nav_menu('menu-1')) {
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
						'container' => false,
						'menu_class' => 'nav-menu',
						'fallback_cb' => false,
					));
				} else {
					// Custom Navigation if menu not set
					echo '<ul class="nav-menu">';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/about')) . '">About Us</a></li>';
					echo '<li class="nav-item nav-item-with-dropdown">';
					echo '<a href="#" class="nav-link-with-dropdown">';
					echo 'Services';
					echo '<span class="dropdown_arrow" data-dropdown="services">';
					echo '<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">';
					echo '<path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';
					echo '</svg>';
					echo '</span>';
					echo '</a>';
					echo '</li>';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/all-news')) . '">Media Center</a></li>';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '">Contact Us</a></li>';
					echo '</ul>';
				}
				?>
			</nav>

			<!-- Utility Icons -->
			<div class="header-utilities">
				<div class="header-search-container">
					<a href="#" class="header-icon search-icon" aria-label="Search" data-header-search-toggle>
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>"
							alt="Search">
					</a>
					<form class="header-search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get"
						data-header-search-form>
						<input type="search" name="s" class="header-search-input" placeholder="Search..."
							aria-label="Search">
						<button type="submit" class="header-search-submit" aria-label="Submit search">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>"
								alt="">
						</button>
					</form>
				</div>
				<a href="#" class="header-icon lang-icon" aria-label="Language">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/lang.svg.svg'); ?>"
						alt="Language">
				</a>
				<span class="header-icon mobile-menu-toggle" id="menuIconInitial" aria-label="Menu">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/hamburger.svg'); ?>"
						alt="Menu">
				</span>
			</div>
		</div>

		<!-- Services Dropdown -->
		<div id="dropdown-services" class="dropdown_menu_fullwidth">
			<div class="dropdown-container container">
				<div class="dropdown-content">
					<h3 class="dropdown-title">Our Services</h3>
					<div class="dropdown-columns">
						<div class="dropdown-column">
							<a href="<?php echo esc_url(home_url('/corporate-services')); ?>">
								<h4 class="dropdown-column-title">Corporate Services</h4>
							</a>
							<ul class="dropdown-list">
								<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>"
										class="dropdown_item">Conferences & Exhibitions</a></li>
								<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>"
										class="dropdown_item">Meeting Rooms & Workshops</a></li>
								<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>"
										class="dropdown_item">Government Events (B2G)</a></li>
								<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>"
										class="dropdown_item">VIP Majlis</a></li>
							</ul>
						</div>
						<div class="dropdown-column">
							<a href="<?php echo esc_url(home_url('/weddings-social-services')); ?>">
								<h4 class="dropdown-column-title">Weddings & Social Services</h4>
							</a>
							<ul class="dropdown-list">
								<li><a href="<?php echo esc_url(home_url('/weddings-social-services-detail')); ?>"
										class="dropdown_item">Female Packages</a></li>
								<li><a href="<?php echo esc_url(home_url('/weddings-social-services-detail')); ?>"
										class="dropdown_item">Male Packages</a></li>
							</ul>
						</div>
						<div class="dropdown-column">
							<a href="<?php echo esc_url(home_url('/catering-services')); ?>">
								<h4 class="dropdown-column-title">Catering Services</h4>
							</a>
							<ul class="dropdown-list">
								<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>"
										class="dropdown_item">On-site Catering</a></li>
								<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>"
										class="dropdown_item">Off-site Catering</a></li>
								<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>"
										class="dropdown_item">Seasonal & Ramadan Packages</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Scroll Header (appears after 700px scroll) -->
		<div class="container header-container header-scroll-container" id="headerScrollContainer">
			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main-logo.svg'); ?>"
						alt="<?php bloginfo('name'); ?>">
				</a>
			</div>

			<!-- Booking Form -->
			<form class="header-booking-form" action="#" method="post">
				<span class="header-booking-form-inputs">
					<div class="header-form-field-wrapper header-form-field-fullname">
						<span class="header-form-field-display">Full Name</span>
						<input type="text" name="full_name" placeholder="Full Name"
							class="header-form-input header-form-input-small" required>
					</div>
					<div class="header-form-field-wrapper header-form-field-email">
						<span class="header-form-field-display">Email Address</span>
						<input type="email" name="email" placeholder="Email Address"
							class="header-form-input header-form-input-small" required>
					</div>
					<div class="header-form-field-wrapper header-form-field-phone">
						<span class="header-form-field-display">Phone No.</span>
						<input type="tel" name="phone" placeholder="Phone No."
							class="header-form-input header-form-input-small" required>
					</div>
					<div class="header-form-field-wrapper header-form-field-event-type">
						<span class="header-form-field-display">Event Type</span>
						<select name="event_type" id="headerEventType" class="header-form-input header-form-input-large"
							required>
							<option value="">Event Type</option>
							<option value="wedding">Wedding</option>
							<option value="corporate">Corporate</option>
							<option value="social">Social</option>
						</select>
					</div>
					<div class="header-form-field-wrapper header-form-date-wrapper header-form-field-event-date">
						<span class="header-form-field-display">Event Date</span>
						<input type="text" name="event_date" id="headerEventDate" class="header-form-input"
							placeholder="Event Date" required>
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header_calendar.svg'); ?>"
							alt="Calendar" class="header-form-calendar-icon">
					</div>
					<div class="header-form-field-wrapper header-form-field-preferred-time">
						<span class="header-form-field-display">Preferred Time</span>
						<select name="preferred_time" id="headerPreferredTime"
							class="header-form-input header-form-input-large" required>
							<option value="">Preferred Time</option>
							<option value="morning">Morning</option>
							<option value="afternoon">Afternoon</option>
							<option value="evening">Evening</option>
						</select>
					</div>
				</span>
				<button type="submit" class="primary-button header-form-button">Book a Visit</button>
			</form>

			<!-- Utility Icons -->
			<div class="header-utilities">
				<div class="header-search-container">
					<a href="#" class="header-icon search-icon" aria-label="Search" data-header-search-toggle>
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>"
							alt="Search">
					</a>
					<form class="header-search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get"
						data-header-search-form>
						<input type="search" name="s" class="header-search-input" placeholder="Search..."
							aria-label="Search">
						<button type="submit" class="header-search-submit" aria-label="Submit search">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>"
								alt="">
						</button>
					</form>
				</div>
				<a href="#" class="header-icon lang-icon" aria-label="Language">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/lang.svg.svg'); ?>"
						alt="Language">
				</a>
				<span class="header-icon desktop-menu-toggle" id="menuIconScroll" aria-label="Menu">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/hamburger.svg'); ?>"
						alt="Menu">
				</span>
			</div>
		</div>



		<!-- Full Screen Navigation Menu -->
		<div id="fullscreenNavMenu" class="fullscreen-nav-menu">
			<!-- Left Panel -->
			<div class="fullscreen-nav-left">
				<div class="fullscreen-nav-decor">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/open_nav_decor_left.png'); ?>"
						alt="Decoration">
				</div>
				<div class="fullscreen-nav-left-content">
					<!-- Logo and Grid Container -->
					<div class="fullscreen-nav-main-content" id="fullscreenNavMainContent">
						<!-- Logo -->
						<div class="fullscreen-nav-logo">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/nav_logo.svg'); ?>"
								alt="<?php bloginfo('name'); ?>">
						</div>
						<!-- Contact Grid -->
						<div class="fullscreen-nav-grid">
							<div class="fullscreen-nav-grid-item">
								<h4 class="fullscreen-nav-grid-heading">EMAIL</h4>
								<p class="fullscreen-nav-grid-sub">info@ad-darah.com</p>
							</div>
							<div class="fullscreen-nav-grid-item">
								<h4 class="fullscreen-nav-grid-heading">PHONE</h4>
								<p class="fullscreen-nav-grid-sub">+966 11 457 5757</p>
							</div>
							<div class="fullscreen-nav-grid-item">
								<h4 class="fullscreen-nav-grid-heading">SOCIAL</h4>
								<p class="fullscreen-nav-grid-sub">P.O. Box 4146, Riyadh 12348, Saudi Arabia</p>
							</div>
							<div class="fullscreen-nav-grid-item">
								<h4 class="fullscreen-nav-grid-heading">LEGAL</h4>
								<div class="fullscreen-nav-grid-social">
									<a href="#" class="fullscreen-nav-grid-sub">Instagram</a>
									<a href="#" class="fullscreen-nav-grid-sub">Twitter</a>
									<a href="#" class="fullscreen-nav-grid-sub">LinkedIn</a>
									<a href="#" class="fullscreen-nav-grid-sub">Facebook</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Submenu Content (shown when submenu is active) -->
					<div class="fullscreen-nav-submenu-content" id="fullscreenNavSubmenuContent">
						<!-- Submenu contents will be displayed here via CSS classes -->
						<?php
						// Loop through all submenu data and render them (hidden by default)
						// This will be populated from backend/JSON later
						?>
						<div class="fullscreen-nav-submenu-wrapper" data-submenu-id="services">
							<div class="fullscreen-nav-submenu-categories">
								<div class="fullscreen-nav-submenu-category">
									<a href="<?php echo esc_url(home_url('/corporate-services')); ?>">
										<h4
											class="fullscreen-nav-submenu-category-heading fullscreen-nav-category-with-arrow">
											Corporate Services</h4>
									</a>
									<ul class="fullscreen-nav-submenu-category-list">
										<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">Conferences
												& Exhibitions</a></li>
										<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">Meeting
												Rooms & Workshops</a></li>
										<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">Government
												Events (B2G)</a></li>
										<li><a href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">VIP
												Majlis</a></li>
									</ul>
								</div>
								<div class="fullscreen-nav-submenu-category">
									<a href="<?php echo esc_url(home_url('/weddings-social-services')); ?>">
										<h4
											class="fullscreen-nav-submenu-category-heading fullscreen-nav-category-with-arrow">
											Weddings & Social Services</h4>
									</a>
									<ul class="fullscreen-nav-submenu-category-list">
										<li><a
												href="<?php echo esc_url(home_url('/weddings-social-services-detail')); ?>">Female
												Packages</a></li>
										<li><a
												href="<?php echo esc_url(home_url('/weddings-social-services-detail')); ?>">Male
												Packages</a></li>
									</ul>
								</div>
								<div class="fullscreen-nav-submenu-category">
									<a href="<?php echo esc_url(home_url('/catering-services')); ?>">
										<h4
											class="fullscreen-nav-submenu-category-heading fullscreen-nav-category-with-arrow">
											Catering Services</h4>
									</a>
									<ul class="fullscreen-nav-submenu-category-list">
										<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>">On-site
												Catering</a></li>
										<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>">Off-site
												Catering</a></li>
										<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>">Seasonal
												& Ramadan Packages</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Right Panel -->
			<div class="fullscreen-nav-right">
				<!-- Close Icon -->
				<button class="fullscreen-nav-close" id="fullscreenNavClose" aria-label="Close Menu">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/close icon.svg'); ?>"
						alt="Close">
				</button>
				<!-- Menu Items -->
				<nav class="fullscreen-nav-menu-items">
					<ul class="fullscreen-nav-list">
						<li class="fullscreen-nav-item">
							<a href="<?php echo esc_url(home_url('/about')); ?>" class="fullscreen-nav-link">About
								Us</a>
						</li>
						<li class="fullscreen-nav-item fullscreen-nav-item-has-submenu" data-submenu="services">
							<a href="#" class="fullscreen-nav-link fullscreen-nav-link-with-arrow">
								<span>Services</span>
								<span class="fullscreen-nav-arrow">
									<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/opennav_arrow.svg'); ?>"
										alt="Arrow">
								</span>
							</a>
							<div class="fullscreen-nav-submenu-data-mobile" data-submenu-id="services">
								<div class="fullscreen-nav-submenu-categories">
									<div class="fullscreen-nav-submenu-category">
										<a href="<?php echo esc_url(home_url('/corporate-services')); ?>">
											<h4
												class="fullscreen-nav-submenu-category-heading fullscreen-nav-category-with-arrow">
												Corporate Services</h4>
										</a>
										<ul class="fullscreen-nav-submenu-category-list">
											<li><a
													href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">Conferences
													& Exhibitions</a></li>
											<li><a
													href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">Meeting
													Rooms & Workshops</a></li>
											<li><a
													href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">Government
													Events (B2G)</a></li>
											<li><a
													href="<?php echo esc_url(home_url('/corporate-services-detail')); ?>">VIP
													Majlis</a></li>
										</ul>
									</div>
									<div class="fullscreen-nav-submenu-category">
										<a href="<?php echo esc_url(home_url('/weddings-social-services')); ?>">
											<h4 class="fullscreen-nav-submenu-category-heading">Weddings & Social
												Services
											</h4>
											<ul class="fullscreen-nav-submenu-category-list">
												<li><a
														href="<?php echo esc_url(home_url('/weddings-social-services-detail')); ?>">Female
														Packages</a></li>
												<li><a
														href="<?php echo esc_url(home_url('/weddings-social-services-detail')); ?>">Male
														Packages</a></li>
											</ul>
									</div>
									<div class="fullscreen-nav-submenu-category">
										<a href="<?php echo esc_url(home_url('/catering-services')); ?>">
											<h4
												class="fullscreen-nav-submenu-category-heading fullscreen-nav-category-with-arrow">
												Catering Services</h4>
										</a>
										<ul class="fullscreen-nav-submenu-category-list">
											<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>">On-site
													Catering</a></li>
											<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>">Off-site
													Catering</a></li>
											<li><a href="<?php echo esc_url(home_url('/catering-services-detail')); ?>">Seasonal
													& Ramadan Packages</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="fullscreen-nav-item">
							<a href="<?php echo esc_url(home_url('/all-news')); ?>" class="fullscreen-nav-link">Media
								Center</a>
						</li>
						<li class="fullscreen-nav-item">
							<a href="<?php echo esc_url(home_url('/contact')); ?>" class="fullscreen-nav-link">Contact
								Us</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<!-- Inline script to ensure menu toggle works on all pages -->
	<script>
		(function () {
			'use strict';

			// Mark as initialized immediately to prevent Header.js from attaching listeners
			window.fullscreenMenuInitialized = true;

			// Initialize menu toggle functionality immediately
			function initMenuToggle() {
				const menuIconScroll = document.getElementById('menuIconScroll');
				const menuIconInitial = document.getElementById('menuIconInitial');
				const fullscreenNav = document.getElementById('fullscreenNavMenu');
				const fullscreenNavClose = document.getElementById('fullscreenNavClose');

				if (!fullscreenNav) {
					return;
				}

				// Function to open fullscreen menu
				function openFullscreenMenu() {
					// Wait for GSAP if not loaded yet
					if (typeof gsap === 'undefined') {
						// Retry after a short delay
						setTimeout(function () {
							if (typeof gsap !== 'undefined') {
								openFullscreenMenu();
							} else {
								// Fallback if GSAP still not loaded - just show menu
								fullscreenNav.classList.add('fullscreen-nav-open');
								document.body.classList.add('fullscreen-nav-open');
							}
						}, 100);
						return;
					}

					const leftPanel = fullscreenNav.querySelector('.fullscreen-nav-left');
					const rightPanel = fullscreenNav.querySelector('.fullscreen-nav-right');
					const gridHeadings = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-heading');
					const allGridSubs = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-sub');
					const gridSocialLinks = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-social a');
					const menuItems = fullscreenNav.querySelector('.fullscreen-nav-menu-items');

					if (!leftPanel || !rightPanel) {
						fullscreenNav.classList.add('fullscreen-nav-open');
						document.body.classList.add('fullscreen-nav-open');
						return;
					}

					const regularGridSubs = Array.from(allGridSubs).filter(function (sub) {
						return !sub.closest('.fullscreen-nav-grid-social');
					});

					fullscreenNav.classList.add('fullscreen-nav-open');
					fullscreenNav.classList.add('animating');
					document.body.classList.add('fullscreen-nav-open');

					const isMobile = window.innerWidth <= 600;

					if (isMobile) {
						gsap.set(rightPanel, { x: '100%' });
						gsap.set(menuItems, { opacity: 0, x: 30 });
					} else {
						gsap.set(leftPanel, { x: '-100%' });
						gsap.set(rightPanel, { x: '100%' });
						gsap.set(gridHeadings, { opacity: 0 });
						gsap.set(regularGridSubs, { opacity: 0, y: -30 });
						gsap.set(gridSocialLinks, { opacity: 0, y: -30 });
						gsap.set(menuItems, { opacity: 0, x: 30 });
					}

					const tl = gsap.timeline({
						onComplete: function () {
							fullscreenNav.classList.remove('animating');
						}
					});

					if (isMobile) {
						tl.to(rightPanel, {
							x: 0,
							duration: 0.6,
							ease: 'power2.out'
						})
							.to(menuItems, {
								opacity: 1,
								x: 0,
								duration: 0.4,
								ease: 'power2.out'
							}, '-=0.2');
					} else {
						tl.to(leftPanel, {
							x: 0,
							duration: 0.8,
							ease: 'power2.out'
						})
							.to(rightPanel, {
								x: 0,
								duration: 0.8,
								ease: 'power2.out'
							}, '-=0.8')
							.to(gridHeadings, {
								opacity: 1,
								duration: 0.3,
								ease: 'power2.out'
							}, '-=0.4')
							.to(regularGridSubs, {
								opacity: 1,
								y: 0,
								duration: 0.4,
								stagger: 0.05,
								ease: 'power2.out'
							}, '-=0.2')
							.to(gridSocialLinks, {
								opacity: 1,
								y: 0,
								duration: 0.4,
								stagger: 0.05,
								ease: 'power2.out'
							}, '-=0.4')
							.to(menuItems, {
								opacity: 1,
								x: 0,
								duration: 0.4,
								ease: 'power2.out'
							}, '-=0.2');
					}
				}

				// Function to close fullscreen menu
				function closeFullscreenMenu() {
					// Wait for GSAP if not loaded yet
					if (typeof gsap === 'undefined') {
						// Retry after a short delay
						setTimeout(function () {
							if (typeof gsap !== 'undefined') {
								closeFullscreenMenu();
							} else {
								// Fallback if GSAP still not loaded
								fullscreenNav.classList.remove('fullscreen-nav-open');
								document.body.classList.remove('fullscreen-nav-open');
							}
						}, 100);
						return;
					}

					const leftPanel = fullscreenNav.querySelector('.fullscreen-nav-left');
					const rightPanel = fullscreenNav.querySelector('.fullscreen-nav-right');
					const gridHeadings = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-heading');
					const allGridSubs = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-sub');
					const gridSocialLinks = fullscreenNav.querySelectorAll('.fullscreen-nav-grid-social a');
					const menuItems = fullscreenNav.querySelector('.fullscreen-nav-menu-items');

					if (!leftPanel || !rightPanel) {
						fullscreenNav.classList.remove('fullscreen-nav-open');
						document.body.classList.remove('fullscreen-nav-open');
						return;
					}

					const regularGridSubs = Array.from(allGridSubs).filter(function (sub) {
						return !sub.closest('.fullscreen-nav-grid-social');
					});

					const isMobile = window.innerWidth <= 600;

					fullscreenNav.classList.add('animating');

					const tl = gsap.timeline({
						onComplete: function () {
							fullscreenNav.classList.remove('fullscreen-nav-open');
							fullscreenNav.classList.remove('animating');
							document.body.classList.remove('fullscreen-nav-open');
						}
					});

					if (isMobile) {
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
							}, '-=0.8');
					}
				}

				// Toggle function
				function toggleFullscreenMenu(e) {
					if (e) {
						e.preventDefault();
						e.stopPropagation();
					}

					// Prevent multiple rapid clicks during animation
					if (fullscreenNav.classList.contains('animating')) {
						return;
					}

					const isOpen = fullscreenNav.classList.contains('fullscreen-nav-open');

					if (isOpen) {
						closeFullscreenMenu();
					} else {
						openFullscreenMenu();
					}
				}

				// Add event listeners (always add since we marked as initialized at top)
				if (menuIconScroll) {
					menuIconScroll.addEventListener('click', toggleFullscreenMenu);
				}
				if (menuIconInitial) {
					menuIconInitial.addEventListener('click', toggleFullscreenMenu);
				}
				if (fullscreenNavClose) {
					fullscreenNavClose.addEventListener('click', function (e) {
						e.preventDefault();
						e.stopPropagation();
						closeFullscreenMenu();
					});
				}

				// Close on escape key
				document.addEventListener('keydown', function (event) {
					if (event.key === 'Escape') {
						if (fullscreenNav.classList.contains('fullscreen-nav-open')) {
							closeFullscreenMenu();
						}
					}
				});
			}

			// Initialize immediately if DOM is ready, otherwise wait
			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', initMenuToggle);
			} else {
				initMenuToggle();
			}
		})();
	</script>

	<div id="content" class="site-content">