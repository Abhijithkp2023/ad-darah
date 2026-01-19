<?php
/**
 * Three Image Text Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $three_image_text_section_1 = array(
 *     'image' => get_template_directory_uri() . '/assets/images/img_01.png',
 *     'items' => array(
 *         array('heading' => '300+ Weddings Curated', 'description' => 'From intimate ceremonies to grand celebrations, planned.'),
 *         array('heading' => '20+ Wedding Styles Delivered', 'description' => 'Traditional, modern, and themed weddings tailored to vision.'),
 *         array('heading' => '10+ Years of Wedding Expertise', 'description' => 'A decade of creating timeless and memorable experiences.'),
 *     )
 * );
 * $three_image_text_section_2 = array(
 *     'image' => get_template_directory_uri() . '/assets/images/img_02.png',
 *     'paragraphs' => array('Paragraph 1', 'Paragraph 2')
 * );
 * $three_image_text_section_3 = array(
 *     'image' => get_template_directory_uri() . '/assets/images/img_03.png',
 *     'paragraphs' => array('Paragraph 1')
 * );
 * include locate_template('template-parts/ThreeImageText.php');
 */

// Get variables with defaults
$three_image_text_section_1 = isset($three_image_text_section_1) && is_array($three_image_text_section_1) ? $three_image_text_section_1 : array();
$three_image_text_section_2 = isset($three_image_text_section_2) && is_array($three_image_text_section_2) ? $three_image_text_section_2 : array();
$three_image_text_section_3 = isset($three_image_text_section_3) && is_array($three_image_text_section_3) ? $three_image_text_section_3 : array();
?>

<?php if (!empty($three_image_text_section_1) || !empty($three_image_text_section_2) || !empty($three_image_text_section_3)): ?>
    <?php
    // Section 1: Image left, Text right (with headings and descriptions)
    if (!empty($three_image_text_section_1) && !empty($three_image_text_section_1['image'])): ?>
        <section class="three-image-text-section">
            <div class="container">
                <div class="three-image-text-wrapper three-image-text-wrapper-image-left">
                    <div class="three-image-text-image">
                        <img src="<?php echo esc_url($three_image_text_section_1['image']); ?>" alt="Image Text">
                    </div>
                    <div class="three-image-text-text">
                        <?php if (!empty($three_image_text_section_1['items']) && is_array($three_image_text_section_1['items'])): ?>
                            <?php foreach ($three_image_text_section_1['items'] as $item): ?>
                                <div class="three-image-text-item">
                                    <?php if (!empty($item['heading'])): ?>
                                        <h3 class="three-image-text-heading"><?php echo esc_html($item['heading']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($item['description'])): ?>
                                        <p class="three-image-text-description"><?php echo esc_html($item['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    // Section 2: Image right, Text left (paragraphs only)
    if (!empty($three_image_text_section_2) && !empty($three_image_text_section_2['image'])): ?>
        <section class="three-image-text-section">
            <div class="container">
                <div class="three-image-text-wrapper three-image-text-wrapper-image-right">
                    <div class="three-image-text-text">
                        <?php if (!empty($three_image_text_section_2['paragraphs']) && is_array($three_image_text_section_2['paragraphs'])): ?>
                            <?php foreach ($three_image_text_section_2['paragraphs'] as $paragraph): ?>
                                <p class="three-image-text-paragraph"><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="three-image-text-image">
                        <img src="<?php echo esc_url($three_image_text_section_2['image']); ?>" alt="Image Text">
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    // Section 3: Image left, Text right (paragraphs only, text aligned to bottom)
    if (!empty($three_image_text_section_3) && !empty($three_image_text_section_3['image'])): ?>
        <section class="three-image-text-section">
            <div class="container">
                <div class="three-image-text-wrapper three-image-text-wrapper-image-left three-image-text-wrapper-text-bottom">
                    <div class="three-image-text-image">
                        <img src="<?php echo esc_url($three_image_text_section_3['image']); ?>" alt="Image Text">
                    </div>
                    <div class="three-image-text-text three-image-text-text-last">
                        <?php if (!empty($three_image_text_section_3['paragraphs']) && is_array($three_image_text_section_3['paragraphs'])): ?>
                            <?php foreach ($three_image_text_section_3['paragraphs'] as $paragraph): ?>
                                <p class="three-image-text-paragraph"><?php echo esc_html($paragraph); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

