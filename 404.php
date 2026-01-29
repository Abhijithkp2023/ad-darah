<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="error_404_section pt_150 pb_100">
		<div class="container">
			<div class="error_404_content">
				<div class="error_404_number">
					<h1 class="error_404_title">404</h1>
				</div>

				<div class="error_404_message">
					<h2 class="error_404_heading"><?php esc_html_e( 'Page not found', 'addarah' ); ?></h2>
					<p class="error_404_description">
						<?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'addarah' ); ?>
					</p>
				</div>

				<div class="error_404_actions">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="primary-button buttion">
						<?php esc_html_e( 'Back to Home', 'addarah' ); ?>
					</a>
				</div>

				<!-- <div class="error_404_search">
					<h4 class="error_404_search_title"><?php esc_html_e( 'Try searching our site', 'addarah' ); ?></h4>
					<?php get_search_form(); ?>
				</div> -->
			</div>
		</div>
	</section>
</main><!-- #primary -->

<?php
get_footer();
?>


