<?php
/**
 * addarah functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package addarah
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function addarah_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on addarah, use a find and replace
	 * to change 'addarah' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('addarah', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'addarah'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'addarah_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'addarah_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function addarah_content_width()
{
	$GLOBALS['content_width'] = apply_filters('addarah_content_width', 640);
}
add_action('after_setup_theme', 'addarah_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function addarah_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'addarah'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'addarah'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'addarah_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function addarah_scripts()
{
	// Enqueue main.css (Footer component styles)
	wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/scss/main.css', array(), _S_VERSION);

	// Enqueue Lenis Smooth Scroll library (CDN) - loaded on all pages
	wp_enqueue_script('lenis', 'https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js', array(), '1.0.42', false);

	// Enqueue smooth scroll initialization (loaded on all pages)
	wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array('lenis'), _S_VERSION, true);

	// Enqueue Header component script (loaded on all pages)
	// Enqueue Choices.js and Flatpickr globally for header form
	wp_enqueue_style('choices-css', 'https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/styles/choices.min.css', array(), '10.2.0');
	wp_enqueue_script('choices-js', 'https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/scripts/choices.min.js', array(), '10.2.0', true);
	wp_enqueue_style('flatpickr-css', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', array(), '4.6.13');
	wp_enqueue_script('flatpickr-js', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js', array(), '4.6.13', true);

	wp_enqueue_script('header-script', get_template_directory_uri() . '/assets/js/Header.js', array('choices-js', 'flatpickr-js'), _S_VERSION, true);

	// Enqueue Footer component script (loaded on all pages)
	wp_enqueue_script('footer-script', get_template_directory_uri() . '/assets/js/Footer.js', array(), _S_VERSION, true);

	// Enqueue ButtonPrimary component scripts (loaded on all pages - used in header)
	wp_enqueue_script('button-primary-script', get_template_directory_uri() . '/assets/js/ButtonPrimary.js', array(), _S_VERSION, true);

	// Enqueue PageTabs component script (loaded on all pages - can be used on any inner page)
	wp_enqueue_script('page-tabs-script', get_template_directory_uri() . '/assets/js/PageTabs.js', array(), _S_VERSION, true);

	// Enqueue AOS (Animate On Scroll) CSS (CDN) - loaded on all pages
	wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), '2.3.4');

	// Enqueue AOS (Animate On Scroll) library (CDN) - loaded on all pages
	wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), '2.3.4', true);

	// Initialize AOS after DOM is ready (global initialization for all pages)
	wp_add_inline_script('aos-js', 'document.addEventListener("DOMContentLoaded", function() { if (typeof AOS !== "undefined") { AOS.init({ duration: 800, once: false }); } });', 'after');

	// Check if current page uses Company Detail, Investments Detail, or AdDarah Modern Support Services template
	$is_company_detail_page = false;
	$is_addarah_modern_support_page = false;
	$is_group_companies_page = false;
	$is_news_and_media_page = false;
	$is_gallery_page = false;
	$is_about_page = false;
	$is_contact_page = false;
	$is_press_release_detail_page = false;
	$is_all_news_page = false;
	$is_weddings_social_services_page = false;
	if (is_page()) {
		$template = get_page_template_slug();
		$is_company_detail_page = ($template === 'page-company-detail.php' || $template === 'page-investments-detail.php' || $template === 'page-addarah-modern-support-services.php');
		$is_addarah_modern_support_page = ($template === 'page-addarah-modern-support-services.php');
		$is_group_companies_page = ($template === 'page-group-companies.php');
		$is_news_and_media_page = ($template === 'page-news-and-media.php');
		$is_gallery_page = ($template === 'page-gallery.php');
		$is_about_page = ($template === 'page-about.php' || is_page('about') || is_page_template('page-about.php'));
		$is_contact_page = ($template === 'page-contact.php' || is_page('contact') || is_page_template('page-contact.php'));
		$is_press_release_detail_page = ($template === 'page-press-release-detail.php' || is_page_template('page-press-release-detail.php'));
		$is_all_news_page = ($template === 'page-all-news.php' || is_page_template('page-all-news.php'));
		$is_weddings_social_services_page = ($template === 'page-weddings-social-services.php' || is_page_template('page-weddings-social-services.php'));
	}

	// Enqueue Swiper CSS and JS globally (available on all pages)
	if (!wp_style_is('swiper-css', 'enqueued')) {
		wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
	}
	if (!wp_script_is('swiper-js', 'enqueued')) {
		wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
	}

	// Enqueue component styles
	if (is_front_page()) {
		// Enqueue GSAP library (CDN)
		wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', false);

		// Enqueue GSAP ScrollTrigger plugin (CDN)
		wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '3.12.5', false);

		// Enqueue Choices.js CSS (CDN) - for styled select dropdowns
		wp_enqueue_style('choices-css', 'https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/styles/choices.min.css', array(), '10.2.0');

		// Enqueue Choices.js library (CDN)
		wp_enqueue_script('choices-js', 'https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/scripts/choices.min.js', array(), '10.2.0', true);

		// Enqueue Marzipano JS (CDN) - for 360-degree virtual tour
		wp_enqueue_script('marzipano-js', 'https://cdn.jsdelivr.net/npm/marzipano@0.9.0/dist/marzipano.js', array(), '0.9.0', true);





		// Enqueue component scripts
		wp_enqueue_script('main-banner-script', get_template_directory_uri() . '/assets/js/MainBanner.js', array('gsap'), _S_VERSION, true);
		wp_enqueue_script('banner-script', get_template_directory_uri() . '/assets/js/Banner.js', array('gsap', 'swiper-js'), _S_VERSION, true);
		wp_enqueue_script('home-video-script', get_template_directory_uri() . '/assets/js/HomeVideo.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		wp_enqueue_script('who-we-are-script', get_template_directory_uri() . '/assets/js/WhoWeAre.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		wp_enqueue_script('where-ever-script', get_template_directory_uri() . '/assets/js/WhereEver.js', array(), _S_VERSION, true);
		wp_enqueue_script('text-anim-script', get_template_directory_uri() . '/assets/js/TextAnim.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		wp_enqueue_script('our-story-script', get_template_directory_uri() . '/assets/js/OurStory.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		wp_enqueue_script('subsidiaries-script', get_template_directory_uri() . '/assets/js/Subsidiaries.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('news-slider-script', get_template_directory_uri() . '/assets/js/NewsSlider.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('news-articles-script', get_template_directory_uri() . '/assets/js/NewsArticles.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('statistics-script', get_template_directory_uri() . '/assets/js/Statistics.js', array(), _S_VERSION, true);
		wp_enqueue_script('services-stack-script', get_template_directory_uri() . '/assets/js/ServicesStack.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		wp_enqueue_script('vision-mission-stack-script', get_template_directory_uri() . '/assets/js/VisionMissionStack.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		wp_enqueue_script('testimonials-script', get_template_directory_uri() . '/assets/js/Testimonials.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('virtual-tour-script', get_template_directory_uri() . '/assets/js/VirtualTour.js', array('marzipano-js'), _S_VERSION, true);
	}


	// Contact page specific scripts
	// Load Swiper and CompanyServices script on Company Detail pages
	if ($is_company_detail_page) {
		// Enqueue Swiper JS (CDN) - only if not already loaded on front page
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}
	}

	// Load Swiper for News and Media page
	if ($is_news_and_media_page) {
		// Enqueue Swiper JS (CDN) - only if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}

		// Enqueue PressReleases script (depends on Swiper)
		wp_enqueue_script('press-releases-script', get_template_directory_uri() . '/assets/js/PressReleases.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load Swiper for Gallery page
	if ($is_gallery_page) {
		// Enqueue Swiper JS (CDN) - only if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}

		// Enqueue VideoGallery script (depends on Swiper)
		wp_enqueue_script('video-gallery-script', get_template_directory_uri() . '/assets/js/VideoGallery.js', array('swiper-js'), _S_VERSION, true);
	}

	// Check if current page is news detail page
	$is_news_detail_page = false;

	// Check for page template
	if (is_page()) {
		$template = get_page_template_slug();
		// Check for exact match, basename match, or template name match
		if ($template) {
			$is_news_detail_page = (
				$template === 'single-news.php' ||
				basename($template) === 'single-news.php' ||
				strpos($template, 'single-news') !== false
			);
		}
	}

	// Also check for single posts (regular posts)
	if (!$is_news_detail_page && is_single() && get_post_type() === 'post') {
		$is_news_detail_page = true;
	}

	// Also check if we're on any singular page that might use the RelatedPressReleases component
	// This is a fallback to ensure the script loads
	if (!$is_news_detail_page && is_singular()) {
		// Check if the page/post might be using the single-news template
		$template = get_page_template_slug();
		if ($template && (strpos($template, 'single-news') !== false || strpos($template, 'news') !== false)) {
			$is_news_detail_page = true;
		}
	}

	// Enqueue scripts for news detail pages
	if ($is_news_detail_page) {
		// Enqueue Swiper if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}
		wp_enqueue_script('news-sidebar-script', get_template_directory_uri() . '/assets/js/NewsSidebar.js', array(), _S_VERSION, true);
		wp_enqueue_script('related-press-releases-script', get_template_directory_uri() . '/assets/js/RelatedPressReleases.js', array('swiper-js'), _S_VERSION, true);
	}


	// Load Swiper for About page

	if ($is_about_page) {

		// Enqueue GSAP library (CDN) if not already loaded
		if (!wp_script_is('gsap', 'enqueued')) {
			wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', false);
		}

		// Enqueue GSAP ScrollTrigger plugin (CDN) if not already loaded
		if (!wp_script_is('gsap-scrolltrigger', 'enqueued')) {
			wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '3.12.5', false);
		}

		// Enqueue Swiper CSS if not already loaded

		if (!wp_style_is('swiper-css', 'enqueued')) {

			wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

		}

		// Enqueue Swiper JS if not already loaded

		if (!wp_script_is('swiper-js', 'enqueued')) {

			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

		}

		// Enqueue VenueAtAGlance script (depends on Swiper)

		wp_enqueue_script('venue-at-a-glance-script', get_template_directory_uri() . '/assets/js/VenueAtAGlance.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('timeline-slider-script', get_template_directory_uri() . '/assets/js/TimelineSlider.js', array('swiper-js'), _S_VERSION, true);
		
		// Enqueue ServicesStack script (depends on GSAP and ScrollTrigger)
		wp_enqueue_script('services-stack-script', get_template_directory_uri() . '/assets/js/ServicesStack.js', array('gsap', 'gsap-scrolltrigger'), _S_VERSION, true);
		
		// Enqueue DualSlider script (depends on Swiper)
		wp_enqueue_script('dual-slider-script', get_template_directory_uri() . '/assets/js/DualSlider.js', array('swiper-js'), _S_VERSION, true);
		
		// Enqueue Statistics script for number animation
		wp_enqueue_script('statistics-script', get_template_directory_uri() . '/assets/js/Statistics.js', array(), _S_VERSION, true);

	}

	// Load page-specific scripts
	$is_weddings_page = is_page_template('page-weddings-social-services.php');

	if ($is_weddings_page) {
		wp_enqueue_script('perfect-day-slider-script', get_template_directory_uri() . '/assets/js/PerfectDaySlider.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('single-testimonial-script', get_template_directory_uri() . '/assets/js/SingleTestimonial.js', array('swiper-js'), _S_VERSION, true);

		// Debug: Add inline script to verify page detection
		wp_add_inline_script('single-testimonial-script', 'console.log("Weddings page detected - SingleTestimonial script should be loaded");', 'before');
	}

	// Load Swiper for Corporate Services page
	$is_corporate_services_page = is_page_template('page-corporate-services.php');

	if ($is_corporate_services_page) {
		wp_enqueue_script('overflow-slider-script', get_template_directory_uri() . '/assets/js/OverflowSlider.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('single-testimonial-script', get_template_directory_uri() . '/assets/js/SingleTestimonial.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load Swiper for Catering Services page
	$is_catering_services_page = is_page_template('page-catering-services.php');

	if ($is_catering_services_page) {
		wp_enqueue_script('container-slider-script', get_template_directory_uri() . '/assets/js/ContainerSlider.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('single-testimonial-script', get_template_directory_uri() . '/assets/js/SingleTestimonial.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load scripts for Weddings & Social Services Detail page
	$is_weddings_detail_page = is_page_template('page-weddings-social-services-detail.php');

	if ($is_weddings_detail_page) {
		wp_enqueue_script('full-video-section-script', get_template_directory_uri() . '/assets/js/FullVideoSection.js', array(), _S_VERSION, true);
	}

	// Load scripts for Corporate Services Detail page
	$is_corporate_services_detail_page = is_page_template('page-corporate-services-detail.php');

	if ($is_corporate_services_detail_page) {
		wp_enqueue_script('full-video-section-script', get_template_directory_uri() . '/assets/js/FullVideoSection.js', array(), _S_VERSION, true);
		wp_enqueue_script('container-slider-script', get_template_directory_uri() . '/assets/js/ContainerSlider.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load scripts for Catering Services Detail page
	$is_catering_services_detail_page = is_page_template('page-catering-services-detail.php');

	if ($is_catering_services_detail_page) {
		wp_enqueue_script('full-video-section-script', get_template_directory_uri() . '/assets/js/FullVideoSection.js', array(), _S_VERSION, true);
	}


	// Load Contact Map script for Contact page
	if ($is_contact_page) {
		wp_enqueue_script('contact-map-script', get_template_directory_uri() . '/assets/js/ContactMap.js', array(), _S_VERSION, true);
	}

	// Load scripts for Press Release Detail page
	if ($is_press_release_detail_page) {
		// Enqueue Swiper if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}
		// Enqueue Swiper CSS if not already loaded
		if (!wp_style_is('swiper-css', 'enqueued')) {
			wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
		}
		wp_enqueue_script('related-press-releases-script', get_template_directory_uri() . '/assets/js/RelatedPressReleases.js', array('swiper-js'), _S_VERSION, true);
		wp_enqueue_script('related-news-script', get_template_directory_uri() . '/assets/js/RelatedNews.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load scripts for All News page
	if ($is_all_news_page) {
		// Enqueue Swiper if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}
		// Enqueue Swiper CSS if not already loaded
		if (!wp_style_is('swiper-css', 'enqueued')) {
			wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
		}
		wp_enqueue_script('all-news-swiper-script', get_template_directory_uri() . '/assets/js/AllNewsSwiper.js', array('swiper-js'), _S_VERSION, true);
		// Also enqueue RelatedNews script since RelatedNews component is used on this page
		wp_enqueue_script('related-news-script', get_template_directory_uri() . '/assets/js/RelatedNews.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load scripts for Weddings & Social Services page
	if ($is_weddings_social_services_page) {
		// Enqueue Swiper if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}
		// Enqueue Swiper CSS if not already loaded
		if (!wp_style_is('swiper-css', 'enqueued')) {
			wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
		}
		wp_enqueue_script('single-testimonial-script', get_template_directory_uri() . '/assets/js/SingleTestimonial.js', array('swiper-js'), _S_VERSION, true);
	}

	// Load scripts for Weddings & Social Services page
	if ($is_weddings_social_services_page) {
		// Enqueue Swiper if not already loaded
		if (!wp_script_is('swiper-js', 'enqueued')) {
			wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
		}
		// Enqueue Swiper CSS if not already loaded
		if (!wp_style_is('swiper-css', 'enqueued')) {
			wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
		}
		wp_enqueue_script('single-testimonial-script', get_template_directory_uri() . '/assets/js/SingleTestimonial.js', array('swiper-js'), _S_VERSION, true);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'addarah_scripts');

