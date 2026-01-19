<?php
/**
 * Press Release Detail Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/PressReleaseDetail');
 */

// Get post data
$post_id = get_the_ID();
$post_title = get_the_title();
$post_date = get_the_date('d F Y');
$post_content = get_the_content();
$post_excerpt = get_the_excerpt();
$featured_image = get_the_post_thumbnail_url($post_id, 'full');
?>

<section class="press-release-detail-section">
	<div class="container">
		<div class="press-release-detail-wrapper">
			<?php if ($post_date) : ?>
				<div class="press-release-detail-meta">
					<span class="press-release-detail-date"><?php echo esc_html($post_date); ?></span>
				</div>
			<?php endif; ?>

			<?php if ($post_title) : ?>
				<h1 class="press-release-detail-title"><?php echo esc_html($post_title); ?></h1>
			<?php endif; ?>

			<?php if ($featured_image) : ?>
				<div class="press-release-detail-image">
					<img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($post_title); ?>">
				</div>
			<?php endif; ?>

			<?php if ($post_content) : ?>
				<div class="press-release-detail-content">
					<?php echo wp_kses_post(wpautop($post_content)); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

