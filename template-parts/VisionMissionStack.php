<?php
/**
 * Vision Mission Stack Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/VisionMissionStack');
 */

// Vision and Mission data
$vision_mission = array(
	array(
		'title' => 'Our Vision',
		'description' => 'To be the Kingdom\'s leading venue for prestigious events, setting new benchmarks in hospitality and excellence.',
		'image' => get_template_directory_uri() . '/assets/images/vision.jpg',
	),
	array(
		'title' => 'Our Mission',
		'description' => 'To deliver exceptional experiences that honor Saudi heritage while embracing innovation, creating unforgettable moments for every event we host.',
		'image' => get_template_directory_uri() . '/assets/images/mision.jpg',
	),
);
?>

<section class="vision-mission-stack-container" ddata-services-stack>
	<div class="vision-mission-stack-cards">
		<?php foreach ($vision_mission as $index => $item): ?>
			<div class="vision-mission-stack-card" data-services-card="<?php echo esc_attr($index); ?>">
				<div class="vision-mission-stack-card-bg"
					style="background-image: url('<?php echo esc_url($item['image']); ?>');"></div>
				<div class="vision-mission-stack-card-content">
					<h2 class="vision-mission-stack-card-title"><?php echo esc_html($item['title']); ?></h2>
					<p class="vision-mission-stack-card-description"><?php echo esc_html($item['description']); ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
