<?php
/**
 * Related Services Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $related_services_heading = 'Our Related Services';
 * $related_services_description = 'Lorem ipsum dolor sit amet...';
 * $related_services_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/related_service_01.png',
 *         'title' => 'Male Packages',
 *         'description' => 'Host your celebration in a grand setting...',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/RelatedServicesSection.php');
 */

// Get variables with defaults
$related_services_heading = isset($related_services_heading) ? $related_services_heading : '';
$related_services_description = isset($related_services_description) ? $related_services_description : '';
$related_services_items = isset($related_services_items) && is_array($related_services_items) ? $related_services_items : array();
?>

<?php if (!empty($related_services_heading) || !empty($related_services_items)): ?>
    <section class="related-services-section pb_100 pt_100">
        <div class="container">
            <?php if (!empty($related_services_heading)): ?>
                <h2 class="related-services-heading"><?php echo esc_html($related_services_heading); ?></h2>
            <?php endif; ?>

            <?php if (!empty($related_services_description)): ?>
                <p class="related-services-description"><?php echo esc_html($related_services_description); ?></p>
            <?php endif; ?>

            <?php if (!empty($related_services_items)): ?>
                <div class="related-services-cards">
                    <?php foreach ($related_services_items as $item): ?>
                        <div class="related-services-card">
                            <?php if (!empty($item['image'])): ?>
                                <div class="related-services-card-image">
                                    <img src="<?php echo esc_url($item['image']); ?>" 
                                         alt="<?php echo esc_attr($item['title'] ?? 'Service image'); ?>">
                                    <div class="related-services-card-overlay"></div>
                                </div>
                            <?php endif; ?>

                            <div class="related-services-card-content">
                                <?php if (!empty($item['title'])): ?>
                                    <h3 class="related-services-card-title"><?php echo esc_html($item['title']); ?></h3>
                                <?php endif; ?>

                                <?php if (!empty($item['description'])): ?>
                                    <p class="related-services-card-description"><?php echo esc_html($item['description']); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
                                    <a href="<?php echo esc_url($item['button_link']); ?>" 
                                       class="primary-button related-services-card-button">
                                        <?php echo esc_html($item['button_text']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

