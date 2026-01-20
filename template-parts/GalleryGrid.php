<?php
/**
 * Gallery Grid Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/GalleryGrid');
 * 
 * Optional query vars:
 * set_query_var('gallery_items', array(
 *     array('image' => 'url', 'title' => 'Title', 'link' => '#')
 * ));
 */

// Get gallery items from query vars
$gallery_items = get_query_var('gallery_items', array());
?>

<section class="gallery-grid-section">
	<div class="container">
		<div class="gallery-grid">
			<?php foreach ($gallery_items as $item): ?>
				<div class="gallery-grid-item">
					<a href="<?php echo esc_url($item['link']); ?>" class="gallery-grid-link">
						<div class="gallery-grid-image">
							<img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
							<div class="gallery-grid-overlay">
								<h3 class="gallery-grid-title"><?php echo esc_html($item['title']); ?></h3>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>