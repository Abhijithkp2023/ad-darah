<?php
/**
 * Wedding Packages Component Template
 * 
 * Displays wedding packages with images, headings, descriptions, and download buttons
 *
 * @package addarah
 * 
 * Usage:
 * $wedding_packages_heading = 'Wedding Packages';
 * $wedding_packages_description = 'AD-DARAH offers world-class facilities...';
 * $wedding_packages_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/package_01.png',
 *         'heading' => 'Pearl Package',
 *         'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
 *         'pdf_url' => '#', // Optional PDF download URL
 *     ),
 * );
 * include locate_template('template-parts/WeddingPackages.php');
 */

// Get variables with defaults
$wedding_packages_heading = isset($wedding_packages_heading) ? $wedding_packages_heading : 'Wedding Packages';
$wedding_packages_description = isset($wedding_packages_description) ? $wedding_packages_description : '';
$wedding_packages_items = isset($wedding_packages_items) && is_array($wedding_packages_items) ? $wedding_packages_items : array();
?>

<section class="wedding-packages-section pb_100">
	<div class="container">
		<div class="wedding-packages-header">
			<?php if ($wedding_packages_heading): ?>
				<h2 class="wedding-packages-heading"><?php echo esc_html($wedding_packages_heading); ?></h2>
			<?php endif; ?>
			
			<?php if ($wedding_packages_description): ?>
				<p class="wedding-packages-description"><?php echo esc_html($wedding_packages_description); ?></p>
			<?php endif; ?>
		</div>

		<?php if (!empty($wedding_packages_items)): ?>
			<div class="wedding-packages-cards">
				<?php foreach ($wedding_packages_items as $item): ?>
					<div class="wedding-packages-card">
						<?php if (!empty($item['image'])): ?>
							<div class="wedding-packages-card-image">
								<img src="<?php echo esc_url($item['image']); ?>" 
									alt="<?php echo esc_attr($item['heading'] ?? 'Package image'); ?>">
							</div>
						<?php endif; ?>
						
						<div class="wedding-packages-card-content">
							<?php if (!empty($item['heading'])): ?>
								<h3 class="wedding-packages-card-heading"><?php echo esc_html($item['heading']); ?></h3>
							<?php endif; ?>
							
							<?php if (!empty($item['description'])): ?>
								<p class="wedding-packages-card-description"><?php echo esc_html($item['description']); ?></p>
							<?php endif; ?>
							
							<?php if (!empty($item['pdf_url'])): ?>
								<a href="<?php echo esc_url($item['pdf_url']); ?>" 
									class="primary-button wedding-packages-card-button" 
									target="_blank" 
									rel="noopener noreferrer">
									Download PDF
								</a>
							<?php else: ?>
								<button type="button" class="primary-button wedding-packages-card-button">
									Download PDF
								</button>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

