<?php
/**
 * Testimonials Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/Testimonials');
 */

// Sample testimonials data - replace with actual data source
$testimonials = array(
    array(
        'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
        'name' => 'Sarah Mitchell',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
        'rating' => 4,
    ),
    array(
        'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
        'name' => 'Ryan Lee',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
        'rating' => 4,
    ),
    array(
        'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
        'name' => 'Emma Algunaibet',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
        'rating' => 4,
    ),
    array(
        'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
        'name' => 'Sarah Mitchell',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
        'rating' => 4,
    ),
    array(
        'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
        'name' => 'Ryan Lee',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
        'rating' => 4,
    ),
    array(
        'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
        'name' => 'Emma Algunaibet',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
        'rating' => 4,
    ),
);
?>

<section class="testimonials-container pt_80 pb_80">
    <div class="testimonials-background-image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial_vector.png" alt="Testimonials Background">
    </div>

    <div class="testimonials-header">
        <h5 class="testimonials-tag">TESTIMONIALS</h5>
        <h2 class="testimonials-title">What Our Clients Say</h2>
    </div>

    <div class="testimonials-swiper-section">
        <!-- Left Overlay -->
        <div class="testimonials-overlay testimonials-overlay-left"></div>

        <!-- Top Swiper (Right to Left) -->
        <div class="testimonials-swiper-wrapper testimonials-swiper-top">
            <!-- Swiper Container -->
            <div class="testimonials-swiper-container">
                <div class="swiper testimonials-swiper" data-testimonials-swiper-top>
                    <div class="swiper-wrapper">
                        <?php
                        // Reverse array for right-to-left (top swiper)
                        $top_testimonials = array_reverse($testimonials);
                        foreach ($top_testimonials as $testimonial):
                            ?>
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
                                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M9.87417 0.770233C10.2077 -0.25633 11.66 -0.256332 11.9936 0.770231L13.8108 6.36289C13.9599 6.82199 14.3877 7.13281 14.8705 7.13281H20.7509C21.8303 7.13281 22.2791 8.51405 21.4059 9.1485L16.6485 12.605C16.2579 12.8887 16.0945 13.3916 16.2437 13.8507L18.0609 19.4434C18.3944 20.4699 17.2195 21.3236 16.3462 20.6891L11.5888 17.2327C11.1983 16.9489 10.6695 16.9489 10.2789 17.2327L5.52154 20.6891C4.6483 21.3236 3.47335 20.4699 3.8069 19.4434L5.62407 13.8507C5.77323 13.3916 5.60982 12.8887 5.21929 12.605L0.461894 9.1485C-0.411352 8.51405 0.0374355 7.13281 1.11683 7.13281H6.9973C7.48002 7.13281 7.90784 6.82199 8.05701 6.36289L9.87417 0.770233Z" fill="<?php echo esc_attr($fillColor); ?>"/>
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

        <!-- Bottom Swiper (Left to Right) -->
        <div class="testimonials-swiper-wrapper testimonials-swiper-bottom">
            <!-- Swiper Container -->
            <div class="testimonials-swiper-container">
                <div class="swiper testimonials-swiper" data-testimonials-swiper-bottom>
                    <div class="swiper-wrapper">
                        <?php foreach ($testimonials as $testimonial): ?>
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
                                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M9.87417 0.770233C10.2077 -0.25633 11.66 -0.256332 11.9936 0.770231L13.8108 6.36289C13.9599 6.82199 14.3877 7.13281 14.8705 7.13281H20.7509C21.8303 7.13281 22.2791 8.51405 21.4059 9.1485L16.6485 12.605C16.2579 12.8887 16.0945 13.3916 16.2437 13.8507L18.0609 19.4434C18.3944 20.4699 17.2195 21.3236 16.3462 20.6891L11.5888 17.2327C11.1983 16.9489 10.6695 16.9489 10.2789 17.2327L5.52154 20.6891C4.6483 21.3236 3.47335 20.4699 3.8069 19.4434L5.62407 13.8507C5.77323 13.3916 5.60982 12.8887 5.21929 12.605L0.461894 9.1485C-0.411352 8.51405 0.0374355 7.13281 1.11683 7.13281H6.9973C7.48002 7.13281 7.90784 6.82199 8.05701 6.36289L9.87417 0.770233Z" fill="<?php echo esc_attr($fillColor); ?>"/>
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
        <div class="testimonials-overlay testimonials-overlay-right"></div>
    </div>
</section>