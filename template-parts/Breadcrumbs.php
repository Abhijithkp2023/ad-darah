<?php
/**
 * Breadcrumbs Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/Breadcrumbs');
 * 
 * Optional query vars:
 * set_query_var('breadcrumbs_items', array(
 *     array('label' => 'Home', 'url' => home_url('/')),
 *     array('label' => 'Category', 'url' => '#'),
 *     array('label' => 'Current Page', 'url' => '')
 * ));
 */

// Get breadcrumbs items from query vars or generate automatically
$breadcrumbs_items = get_query_var('breadcrumbs_items', array());

// If no items provided, generate automatically
if (empty($breadcrumbs_items)) {
	$breadcrumbs_items = array();
	
	// Always start with Home
	$breadcrumbs_items[] = array(
		'label' => 'Home',
		'url' => home_url('/')
	);
	
	// Check if we're on a single post/page
	if (is_single() || is_page()) {
		$post_type = get_post_type();
		$post_type_obj = get_post_type_object($post_type);
		
		// Add post type archive if it exists
		if ($post_type_obj && $post_type_obj->has_archive) {
			$breadcrumbs_items[] = array(
				'label' => $post_type_obj->labels->name,
				'url' => get_post_type_archive_link($post_type)
			);
		} else {
			// Fallback to News & Press Releases for posts
			if ($post_type === 'post') {
				$breadcrumbs_items[] = array(
					'label' => 'News & Press Releases',
					'url' => get_permalink(get_option('page_for_posts')) ?: '#'
				);
			}
		}
		
		// Add current post/page title
		$breadcrumbs_items[] = array(
			'label' => get_the_title(),
			'url' => ''
		);
	} elseif (is_category()) {
		// Category page
		$breadcrumbs_items[] = array(
			'label' => 'News & Press Releases',
			'url' => get_permalink(get_option('page_for_posts')) ?: '#'
		);
		$breadcrumbs_items[] = array(
			'label' => single_cat_title('', false),
			'url' => ''
		);
	} elseif (is_archive()) {
		// Archive page
		$post_type = get_post_type();
		if ($post_type) {
			$post_type_obj = get_post_type_object($post_type);
			if ($post_type_obj) {
				$breadcrumbs_items[] = array(
					'label' => $post_type_obj->labels->name,
					'url' => ''
				);
			}
		}
	} elseif (is_search()) {
		// Search page
		$breadcrumbs_items[] = array(
			'label' => 'Search Results',
			'url' => ''
		);
	} elseif (is_404()) {
		// 404 page
		$breadcrumbs_items[] = array(
			'label' => '404 - Page Not Found',
			'url' => ''
		);
	}
}
?>

<?php if (!empty($breadcrumbs_items)) : ?>
	<nav class="breadcrumbs" aria-label="Breadcrumb">
		<div class="container">
			<ul class="breadcrumbs-list">
				<?php foreach ($breadcrumbs_items as $index => $item) : ?>
					<li class="breadcrumbs-item">
						<?php if (!empty($item['url']) && $index < count($breadcrumbs_items) - 1) : ?>
							<a href="<?php echo esc_url($item['url']); ?>" class="breadcrumbs-link">
								<?php echo esc_html($item['label']); ?>
							</a>
						<?php else : ?>
							<span class="breadcrumbs-current">
								<?php echo esc_html($item['label']); ?>
							</span>
						<?php endif; ?>
						
						<?php if ($index < count($breadcrumbs_items) - 1) : ?>
							<span class="breadcrumbs-separator">/</span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</nav>
<?php endif; ?>

