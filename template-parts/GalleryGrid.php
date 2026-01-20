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

// Get gallery items from query vars or use defaults
$gallery_items = get_query_var('gallery_items', array());

// Default gallery items if none provided
if (empty($gallery_items)) {
	$gallery_items = array(
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-01.jpg',
			'title' => 'Elegant Meeting Room',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-02.jpg',
			'title' => 'Grand Exterior Architecture',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-03.jpg',
			'title' => 'Professional Table Setting',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-04.jpg',
			'title' => 'Golden Architectural Details',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-05.jpg',
			'title' => 'Traditional Dining Experience',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-06.jpg',
			'title' => 'Business Presentation',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-07.jpg',
			'title' => 'Modern Conference Room',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-08.jpg',
			'title' => 'Luxurious Event Setup',
			'link' => '#'
		),
		array(
			'image' => get_template_directory_uri() . '/assets/images/gallery-09.jpg',
			'title' => 'Culinary Presentation',
			'link' => '#'
		)
	);
}
?>

<section class="gallery-grid-section">
	<div class="container">
		<div class="gallery-grid">
			<?php foreach ($gallery_items as $item) : ?>
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

