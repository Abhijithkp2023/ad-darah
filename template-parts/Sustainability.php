<?php
/**
 * Sustainability Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $sustainability_tag = 'Sustainability & Vision 2030';
 * $sustainability_heading = 'Our Commitment to the Future';
 * $sustainability_paragraph = 'At AD-DARAH, sustainability is not an option—it is our responsibility. In alignment with Saudi Arabia\'s Vision 2030, we have integrated eco-conscious practices and innovative solutions that reduce environmental impact while elevating guest experiences.';
 * $sustainability_image = get_template_directory_uri() . '/assets/images/future.png';
 * $sustainability_items = array(
 *     array(
 *         'icon' => get_template_directory_uri() . '/assets/images/energy.svg',
 *         'text' => 'Smart energy management system',
 *     ),
 *     array(
 *         'icon' => get_template_directory_uri() . '/assets/images/catering.svg',
 *         'text' => 'Sustainable catering solutions',
 *     ),
 *     array(
 *         'icon' => get_template_directory_uri() . '/assets/images/food.svg',
 *         'text' => 'Locally sourced materials and food',
 *     ),
 *     array(
 *         'icon' => get_template_directory_uri() . '/assets/images/recycle.svg',
 *         'text' => 'Waste reduction & recycling initiatives',
 *     ),
 * );
 * set_query_var('sustainability_tag', $sustainability_tag);
 * set_query_var('sustainability_heading', $sustainability_heading);
 * set_query_var('sustainability_paragraph', $sustainability_paragraph);
 * set_query_var('sustainability_image', $sustainability_image);
 * set_query_var('sustainability_items', $sustainability_items);
 * get_template_part('template-parts/Sustainability');
 */

// Get variables from query var with defaults
$sustainability_tag = get_query_var('sustainability_tag', '');
$sustainability_heading = get_query_var('sustainability_heading', '');
$sustainability_paragraph = get_query_var('sustainability_paragraph', '');
$sustainability_image = get_query_var('sustainability_image', '');
$sustainability_items = get_query_var('sustainability_items', array());
?>

<section class="sustainability-container">
    <div class="container">
        <?php if (!empty($sustainability_tag)): ?>
            <span class="sustainability-tag"><?php echo esc_html($sustainability_tag); ?></span>
        <?php endif; ?>
        <div class="sustainability-header">

            <div class="sustainability-header-left">


                <?php if (!empty($sustainability_heading)): ?>
                    <h2 class="sustainability-heading">
                        <?php
                        // Split heading at "to" if it exists
                        $heading_parts = explode(' to ', $sustainability_heading);
                        if (count($heading_parts) > 1) {
                            echo wp_kses_post($heading_parts[0] . '<br />to ' . $heading_parts[1]);
                        } else {
                            echo esc_html($sustainability_heading);
                        }
                        ?>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="sustainability-header-right">
                <?php if (!empty($sustainability_paragraph)): ?>
                    <p class="sustainability-paragraph"><?php echo esc_html($sustainability_paragraph); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="sustainability-content">
            <?php if (!empty($sustainability_image)): ?>
                <div class="sustainability-image-wrapper">
                    <img src="<?php echo esc_url($sustainability_image); ?>"
                        alt="<?php echo esc_attr($sustainability_heading); ?>" class="sustainability-image">
                </div>
            <?php endif; ?>

            <?php if (!empty($sustainability_items)): ?>
                <div class="sustainability-cards">
                    <?php foreach ($sustainability_items as $item): ?>
                        <div class="sustainability-card">
                            <?php if (!empty($item['icon'])): ?>
                                <div class="sustainability-card-icon">
                                    <img src="<?php echo esc_url($item['icon']); ?>"
                                        alt="<?php echo esc_attr($item['text'] ?? 'Icon'); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($item['text'])): ?>
                                <p class="sustainability-card-text"><?php echo esc_html($item['text']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>