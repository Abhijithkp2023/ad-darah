<?php
/**
 * Single Testimonial Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $single_testimonial_title = 'Featured Clients';
 * $single_testimonial_items = array(
 *     array(
 *         'review' => 'This venue is perfect for large celebrations!...',
 *         'name' => 'Sarah Mitchell',
 *         'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
 *         'rating' => 4,
 *     ),
 * );
 * include locate_template('template-parts/SingleTestimonial.php');
 */

// Get variables with defaults
$single_testimonial_title = isset($single_testimonial_title) ? $single_testimonial_title : 'Featured Clients';
$single_testimonial_items = isset($single_testimonial_items) && is_array($single_testimonial_items) ? $single_testimonial_items : array();
$single_testimonial_decor_image = isset($single_testimonial_decor_image) ? $single_testimonial_decor_image : get_template_directory_uri() . '/assets/images/single_testimonial_decor.png';

// Duplicate slides if less than 5
if (count($single_testimonial_items) > 0 && count($single_testimonial_items) < 5) {
	$duplicated_items = $single_testimonial_items;
	
	// Keep duplicating until we have at least 5 items
	while (count($duplicated_items) < 5) {
		$duplicated_items = array_merge($duplicated_items, $single_testimonial_items);
	}
	
	// Use the duplicated items (will have at least 5)
	$single_testimonial_items = $duplicated_items;
}
?>

<section class="single-testimonial-container pt_100 pb_100">
    <div class="single-testimonial-background-image">
        <img src="<?php echo esc_url($single_testimonial_decor_image); ?>"
            alt="Testimonial Decoration">
    </div>

    <!-- Left Overlay -->
    <div class="single-testimonial-overlay single-testimonial-overlay-left"></div>

    <div class="single-testimonial-header">
        <h2 class="single-testimonial-title"><?php echo esc_html($single_testimonial_title); ?></h2>
    </div>

    <div class="single-testimonial-content">
        <div class="single-testimonial-swiper-container">
            <div class="swiper single-testimonial-swiper" data-single-testimonial-swiper>
                <div class="swiper-wrapper">
                    <?php foreach ($single_testimonial_items as $testimonial): ?>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <p class="testimonial-review"><?php echo esc_html($testimonial['review']); ?></p>
                                <div class="testimonial-author">
                                    <img src="<?php echo esc_url($testimonial['image']); ?>"
                                        alt="<?php echo esc_attr($testimonial['name']); ?>" class="testimonial-image">
                                    <div class="testimonial-info">
                                        <h4 class="testimonial-name"><?php echo esc_html($testimonial['name']); ?></h4>
                                        <div class="testimonial-rating">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                $isFilled = $i <= $testimonial['rating'];
                                                $fillColor = $isFilled ? '#C5B17F' : '#CFCFCF';
                                                ?>
                                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="star">
                                                    <path
                                                        d="M9.87417 0.770233C10.2077 -0.25633 11.66 -0.256332 11.9936 0.770231L13.8108 6.36289C13.9599 6.82199 14.3877 7.13281 14.8705 7.13281H20.7509C21.8303 7.13281 22.2791 8.51405 21.4059 9.1485L16.6485 12.605C16.2579 12.8887 16.0945 13.3916 16.2437 13.8507L18.0609 19.4434C18.3944 20.4699 17.2195 21.3236 16.3462 20.6891L11.5888 17.2327C11.1983 16.9489 10.6695 16.9489 10.2789 17.2327L5.52154 20.6891C4.6483 21.3236 3.47335 20.4699 3.8069 19.4434L5.62407 13.8507C5.77323 13.3916 5.60982 12.8887 5.21929 12.605L0.461894 9.1485C-0.411352 8.51405 0.0374355 7.13281 1.11683 7.13281H6.9973C7.48002 7.13281 7.90784 6.82199 8.05701 6.36289L9.87417 0.770233Z"
                                                        fill="<?php echo esc_attr($fillColor); ?>" />
                                                </svg>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Overlay -->
    <div class="single-testimonial-overlay single-testimonial-overlay-right"></div>
</section>