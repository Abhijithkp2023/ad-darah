<?php
/**
 * Services Stack Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $services_stack_services = array(
 *     array(
 *         'title' => 'Corporate Events',           // Required
 *         'description' => 'Description...',       // Required
 *         'image' => get_template_directory_uri() . '/assets/images/stack_img_01.png', // Required
 *         'tag' => 'OUR SERVICES',                // Optional - shows tag if provided
 *         'link' => home_url('/corporate-services'), // Optional - shows link and arrow if provided
 *     ),
 * );
 * set_query_var('services_stack_services', $services_stack_services);
 * get_template_part('template-parts/ServicesStack');
 */

// Get services data from query var with default
$services = get_query_var('services_stack_services', array());
?>

<section class="services-stack-container" data-services-stack>
	<div class="services-stack-cards">
		<?php foreach ($services as $index => $service): ?>
			<div class="services-stack-card" data-services-card="<?php echo esc_attr($index); ?>">
				<?php if (!empty($service['link'])): ?>
					<a href="<?php echo esc_url($service['link']); ?>" class="services-stack-card-link"
						aria-label="View <?php echo esc_attr(isset($service['title']) ? $service['title'] : 'Service'); ?>">
					<?php endif; ?>
					<?php if (!empty($service['image'])): ?>
						<div class="services-stack-card-bg"
							style="background-image: url('<?php echo esc_url($service['image']); ?>');"></div>
					<?php endif; ?>
					<div class="services-stack-card-content">
						<?php if (!empty($service['tag'])): ?>
							<span class="services-stack-card-tag"><?php echo esc_html($service['tag']); ?></span>
						<?php endif; ?>
						<?php if (!empty($service['title'])): ?>
							<h2 class="services-stack-card-title"><?php echo wp_kses_post($service['title']); ?></h2>
						<?php endif; ?>
						<?php if (!empty($service['description'])): ?>
							<p class="services-stack-card-description"><?php echo esc_html($service['description']); ?></p>
						<?php endif; ?>
					</div>
					<?php if (!empty($service['link'])): ?>
					</a>
				<?php endif; ?>
				<?php if (!empty($service['link'])): ?>
					<a href="<?php echo esc_url($service['link']); ?>" class="services-stack-arrow-link"
						aria-label="View <?php echo esc_attr(isset($service['title']) ? $service['title'] : 'Service'); ?>">
						<svg width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M25.4268 21.4658L35.9915 10.901L25.4268 0.33625" stroke="currentColor" stroke-width="0.950845"
								stroke-linejoin="round" />
							<path d="M0 11.0898L36.1321 11.0898" stroke="currentColor" stroke-width="0.950845" />
						</svg>
					</a>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>