<?php
/**
 * Overflow Slider Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $overflow_slider_heading = 'Corporate Services';
 * $overflow_slider_paragraph = 'Our culinary team delivers memorable dining experiences...';
 * $overflow_slider_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/corp_ser_01.png',
 *         'heading' => 'Conferences & Exhibitions',
 *         'paragraph' => 'Grand halls with advanced AV and staging for large-scale events.',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/OverflowSlider.php');
 */

// Get variables with defaults
$overflow_slider_heading = isset($overflow_slider_heading) ? $overflow_slider_heading : '';
$overflow_slider_paragraph = isset($overflow_slider_paragraph) ? $overflow_slider_paragraph : '';
$overflow_slider_items = isset($overflow_slider_items) && is_array($overflow_slider_items) ? $overflow_slider_items : array();
?>

<section class="overflow-slider-section pb_100 pt_100">
    <div class="container">
        <?php if ($overflow_slider_heading): ?>
            <h2 class="overflow-slider-section-heading"><?php echo esc_html($overflow_slider_heading); ?></h2>
        <?php endif; ?>

        <?php if ($overflow_slider_paragraph): ?>
            <p class="overflow-slider-section-paragraph"><?php echo esc_html($overflow_slider_paragraph); ?></p>
        <?php endif; ?>

        <?php if (!empty($overflow_slider_items)): ?>
            <div class="overflow-slider-swiper-container">
                <div class="swiper overflow-slider-swiper" data-overflow-slider-swiper>
                    <div class="swiper-wrapper">
                        <?php foreach ($overflow_slider_items as $item): ?>
                            <div class="swiper-slide">
                                <div class="overflow-slider-card">
                                    <?php if (!empty($item['image'])): ?>
                                        <div class="overflow-slider-card-image">
                                            <img src="<?php echo esc_url($item['image']); ?>"
                                                alt="<?php echo esc_attr($item['heading'] ?? 'Service image'); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="overflow-slider-card-overlay">
                                        <?php if (!empty($item['heading'])): ?>
                                            <h3 class="overflow-slider-card-heading"><?php echo esc_html($item['heading']); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($item['paragraph'])): ?>
                                            <p class="overflow-slider-card-paragraph"><?php echo esc_html($item['paragraph']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
                                            <a href="<?php echo esc_url($item['button_link']); ?>"
                                                class="primary-button overflow-slider-card-button">
                                                <?php echo esc_html($item['button_text']); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

