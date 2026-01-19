<?php
/**
 * Statistics Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/Statistics');
 * 
 * Optional query vars:
 * set_query_var('stat_1_title', 'Projects Completed');
 * set_query_var('stat_1_value', '350');
 * set_query_var('stat_2_title', 'Years of Experience');
 * set_query_var('stat_2_value', '15');
 */

// Get statistics from query vars or use defaults
$stat_1_title = get_query_var('stat_1_title', 'Projects Completed');
$stat_1_value = get_query_var('stat_1_value', '350');
$stat_2_title = get_query_var('stat_2_title', 'Years of Experience');
$stat_2_value = get_query_var('stat_2_value', '15');
$stat_3_title = get_query_var('stat_3_title', 'Clients & Partners');
$stat_3_value = get_query_var('stat_3_value', '100');
$stat_4_title = get_query_var('stat_4_title', 'Countries Served');
$stat_4_value = get_query_var('stat_4_value', '12');
?>

<section class="statistics-container">
	<div class="container">
		<div class="statistics-wrapper" data-statistics-container>
			<div class="statistics-grid">
				<!-- Stat Item 1 -->
				<div class="stat-item" data-stat-item data-stat-value="<?php echo esc_attr($stat_1_value); ?>"
					data-stat-decimals="0" data-stat-index="0">
					<div class="stat-title"><?php echo esc_html($stat_1_title); ?></div>
					<div class="stat-value">
						<span class="statNumber">0</span>
						<span class="stat-plus">+</span>
					</div>
				</div>

				<!-- Stat Item 2 -->
				<div class="stat-item" data-stat-item data-stat-value="<?php echo esc_attr($stat_2_value); ?>"
					data-stat-decimals="0" data-stat-index="1">
					<div class="stat-title"><?php echo esc_html($stat_2_title); ?></div>
					<div class="stat-value">
						<span class="statNumber">0</span>
						<span class="stat-plus">+</span>
					</div>
				</div>

				<!-- Stat Item 3 -->
				<div class="stat-item" data-stat-item data-stat-value="<?php echo esc_attr($stat_3_value); ?>"
					data-stat-decimals="0" data-stat-index="2">
					<div class="stat-title"><?php echo esc_html($stat_3_title); ?></div>
					<div class="stat-value">
						<span class="statNumber">0</span>
						<span class="stat-plus">+</span>
					</div>
				</div>

				<!-- Stat Item 4 -->
				<div class="stat-item" data-stat-item data-stat-value="<?php echo esc_attr($stat_4_value); ?>"
					data-stat-decimals="0" data-stat-index="3">
					<div class="stat-title"><?php echo esc_html($stat_4_title); ?></div>
					<div class="stat-value">
						<span class="statNumber">0</span>
						<span class="stat-plus">+</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>