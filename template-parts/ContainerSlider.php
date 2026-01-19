<?php
/**
 * Container Slider Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $container_slider_heading = 'Catering Services';
 * $container_slider_paragraph = 'Our culinary team delivers memorable dining experiences...';
 * $container_slider_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/cater_01.png',
 *         'heading' => 'On-site Catering',
 *         'paragraph' => 'Professional catering services at your venue.',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/ContainerSlider.php');
 */

// Get variables with defaults
$container_slider_heading = isset($container_slider_heading) ? $container_slider_heading : '';
$container_slider_paragraph = isset($container_slider_paragraph) ? $container_slider_paragraph : '';
$container_slider_items = isset($container_slider_items) && is_array($container_slider_items) ? $container_slider_items : array();
?>

<section class="container-slider-section pb_100 pt_100">
    <div class="container">
        <?php if ($container_slider_heading): ?>
            <h2 class="container-slider-section-heading"><?php echo esc_html($container_slider_heading); ?></h2>
        <?php endif; ?>

        <?php if ($container_slider_paragraph): ?>
            <p class="container-slider-section-paragraph"><?php echo esc_html($container_slider_paragraph); ?></p>
        <?php endif; ?>
    </div>

    <div class="container">
        <?php if (!empty($container_slider_items)): ?>
            <div class="container-slider-swiper-container">
                <div class="swiper container-slider-swiper" data-container-slider-swiper>
                    <div class="swiper-wrapper">
                        <?php foreach ($container_slider_items as $item): ?>
                            <div class="swiper-slide">
                                <div class="container-slider-card">
                                    <?php if (!empty($item['image'])): ?>
                                        <div class="container-slider-card-image">
                                            <img src="<?php echo esc_url($item['image']); ?>"
                                                alt="<?php echo esc_attr($item['heading'] ?? 'Service image'); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="container-slider-card-overlay">
                                        <?php if (!empty($item['heading'])): ?>
                                            <h3 class="container-slider-card-heading"><?php echo esc_html($item['heading']); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($item['paragraph'])): ?>
                                            <p class="container-slider-card-paragraph"><?php echo esc_html($item['paragraph']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
                                            <a href="<?php echo esc_url($item['button_link']); ?>"
                                                class="primary-button container-slider-card-button">
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

