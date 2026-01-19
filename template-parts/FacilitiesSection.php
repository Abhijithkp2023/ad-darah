<?php
/**
 * Facilities Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $facilities_heading = 'Facilities';
 * $facilities_description = 'AD-DARAH offers world-class facilities...';
 * $facilities_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/facility_01.png',
 *         'title' => 'Pearl Package',
 *         'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
 *         'button_text' => 'Download PDF',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/FacilitiesSection.php');
 */

// Get variables with defaults
$facilities_heading = isset($facilities_heading) ? $facilities_heading : '';
$facilities_description = isset($facilities_description) ? $facilities_description : '';
$facilities_items = isset($facilities_items) && is_array($facilities_items) ? $facilities_items : array();
?>

<?php if (!empty($facilities_heading) || !empty($facilities_items)): ?>
    <section class="facilities-section pb_100 pt_100">
        <div class="container">
            <div class="facilities-header">
                <?php if (!empty($facilities_heading)): ?>
                    <h2 class="facilities-heading"><?php echo esc_html($facilities_heading); ?></h2>
                <?php endif; ?>

                <?php if (!empty($facilities_description)): ?>
                    <p class="facilities-description"><?php echo esc_html($facilities_description); ?></p>
                <?php endif; ?>
            </div>

            <?php if (!empty($facilities_items)): ?>
                <div class="facilities-cards">
                    <?php foreach ($facilities_items as $item): ?>
                        <div class="facilities-card">
                            <?php if (!empty($item['image'])): ?>
                                <div class="facilities-card-image">
                                    <img src="<?php echo esc_url($item['image']); ?>" 
                                         alt="<?php echo esc_attr($item['title'] ?? 'Facility image'); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="facilities-card-content">
                                <?php if (!empty($item['title'])): ?>
                                    <h3 class="facilities-card-title"><?php echo esc_html($item['title']); ?></h3>
                                <?php endif; ?>

                                <?php if (!empty($item['description'])): ?>
                                    <p class="facilities-card-description"><?php echo esc_html($item['description']); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
                                    <a href="<?php echo esc_url($item['button_link']); ?>" 
                                       class="primary-button facilities-card-button">
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

