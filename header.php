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
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/media-center')) . '">Media Center</a></li>';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '">Contact Us</a></li>';
					echo '</ul>';
				}
				?>
			</nav>

			<!-- Utility Icons -->
			<div class="header-utilities">
				<a href="#" class="header-icon search-icon" aria-label="Search">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>"
						alt="Search">
				</a>
				<a href="#" class="header-icon lang-icon" aria-label="Language">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/lang.svg.svg'); ?>"
						alt="Language">
				</a>
				<button class="mobile-menu-toggle" id="menuIcon" aria-label="Menu">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/hamburger.svg'); ?>"
						alt="Menu">
				</button>
			</div>
		</div>

		<!-- Services Dropdown -->
		<div id="dropdown-services" class="dropdown_menu_fullwidth">
			<div class="dropdown-container container">
				<div class="dropdown-content">
					<h3 class="dropdown-title">Our Services</h3>
					<div class="dropdown-columns">
						<div class="dropdown-column">
							<h4 class="dropdown-column-title">Corporate Services</h4>
							<ul class="dropdown-list">
								<li><a href="#" class="dropdown_item">Conferences & Exhibitions</a></li>
								<li><a href="#" class="dropdown_item">Meeting Rooms & Workshops</a></li>
								<li><a href="#" class="dropdown_item">Government Events (B2G)</a></li>
								<li><a href="#" class="dropdown_item">VIP Majlis</a></li>
							</ul>
						</div>
						<div class="dropdown-column">
							<h4 class="dropdown-column-title">Weddings & Social Services</h4>
							<ul class="dropdown-list">
								<li><a href="#" class="dropdown_item">Female Packages</a></li>
								<li><a href="#" class="dropdown_item">Male Packages</a></li>
							</ul>
						</div>
						<div class="dropdown-column">
							<h4 class="dropdown-column-title">Catering Services</h4>
							<ul class="dropdown-list">
								<li><a href="#" class="dropdown_item">On-site Catering</a></li>
								<li><a href="#" class="dropdown_item">Off-site Catering</a></li>
								<li><a href="#" class="dropdown_item">Seasonal & Ramadan Packages</a></li>
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
					<div class="header-form-field-wrapper">
						<span class="header-form-field-display">Full Name</span>
						<input type="text" name="full_name" placeholder="Full Name"
							class="header-form-input header-form-input-small" required>
					</div>
					<div class="header-form-field-wrapper">
						<span class="header-form-field-display">Email Address</span>
						<input type="email" name="email" placeholder="Email Address"
							class="header-form-input header-form-input-small" required>
					</div>
					<div class="header-form-field-wrapper">
						<span class="header-form-field-display">Phone No.</span>
						<input type="tel" name="phone" placeholder="Phone No."
							class="header-form-input header-form-input-small" required>
					</div>
					<div class="header-form-field-wrapper">
						<span class="header-form-field-display">Event Type</span>
						<select name="event_type" id="headerEventType" class="header-form-input header-form-input-large"
							required>
							<option value="">Event Type</option>
							<option value="wedding">Wedding</option>
							<option value="corporate">Corporate</option>
							<option value="social">Social</option>
						</select>
					</div>
					<div class="header-form-field-wrapper header-form-date-wrapper">
						<span class="header-form-field-display">Event Date</span>
						<input type="text" name="event_date" id="headerEventDate" class="header-form-input"
							placeholder="Event Date" required>
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header_calendar.svg'); ?>"
							alt="Calendar" class="header-form-calendar-icon">
					</div>
					<div class="header-form-field-wrapper">
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
				<a href="#" class="header-icon search-icon" aria-label="Search">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>"
						alt="Search">
				</a>
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
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main-logo.svg'); ?>"
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
									<h4 class="fullscreen-nav-submenu-category-heading">Corporate Services</h4>
									<ul class="fullscreen-nav-submenu-category-list">
										<li><a href="#">Conferences & Exhibitions</a></li>
										<li><a href="#">Meeting Rooms & Workshops</a></li>
										<li><a href="#">Government Events (B2G)</a></li>
										<li><a href="#">VIP Majlis</a></li>
									</ul>
								</div>
								<div class="fullscreen-nav-submenu-category">
									<h4 class="fullscreen-nav-submenu-category-heading">Weddings & Social Services</h4>
									<ul class="fullscreen-nav-submenu-category-list">
										<li><a href="#">Female Packages</a></li>
										<li><a href="#">Male Packages</a></li>
									</ul>
								</div>
								<div class="fullscreen-nav-submenu-category">
									<h4 class="fullscreen-nav-submenu-category-heading">Catering Services</h4>
									<ul class="fullscreen-nav-submenu-category-list">
										<li><a href="#">On-site Catering</a></li>
										<li><a href="#">Off-site Catering</a></li>
										<li><a href="#">Seasonal & Ramadan Packages</a></li>
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
							<div class="fullscreen-nav-submenu-data" data-submenu-id="services">
								<h3 class="fullscreen-nav-submenu-heading">Services</h3>
								<div class="fullscreen-nav-submenu-categories">
									<div class="fullscreen-nav-submenu-category">
										<h4 class="fullscreen-nav-submenu-category-heading">Corporate Services</h4>
										<ul class="fullscreen-nav-submenu-category-list">
											<li><a href="#">Conferences & Exhibitions</a></li>
											<li><a href="#">Meeting Rooms & Workshops</a></li>
											<li><a href="#">Government Events (B2G)</a></li>
											<li><a href="#">VIP Majlis</a></li>
										</ul>
									</div>
									<div class="fullscreen-nav-submenu-category">
										<h4 class="fullscreen-nav-submenu-category-heading">Weddings & Social Services
										</h4>
										<ul class="fullscreen-nav-submenu-category-list">
											<li><a href="#">Female Packages</a></li>
											<li><a href="#">Male Packages</a></li>
										</ul>
									</div>
									<div class="fullscreen-nav-submenu-category">
										<h4 class="fullscreen-nav-submenu-category-heading">Catering Services</h4>
										<ul class="fullscreen-nav-submenu-category-list">
											<li><a href="#">On-site Catering</a></li>
											<li><a href="#">Off-site Catering</a></li>
											<li><a href="#">Seasonal & Ramadan Packages</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="fullscreen-nav-item">
							<a href="<?php echo esc_url(home_url('/media-center')); ?>"
								class="fullscreen-nav-link">Media Center</a>
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

	<div id="content" class="site-content">