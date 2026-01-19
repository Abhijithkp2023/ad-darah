<?php
/**
 * Template Name: Blog & Articles
 * The blog & articles template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'Blog & Articles');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/news-banner.jpg');
		get_template_part('template-parts/Banner');
		?>

		<?php
		// News Tabs Section
		set_query_var('active_tab', 'blog');
		get_template_part('template-parts/NewsTabs');
		?>

		<section class="news-page-content pt_120 pb_80">
			<div class="wrap">
<div class="news-list-title-block">
<h2 class="title_style_1 yello">Blog & Articles</h2>

<select name="news-list-select" id="news-list-select" class="news-list-select">
	<option value="1">2025</option>
	<option value="2">2024</option>
	<option value="3">2023</option>
	<option value="4">2022</option>
	<option value="5">2021</option>
	<option value="6">2020</option>
	<option value="7">2019</option>
	<option value="8">2018</option>
	<option value="9">2017</option>
	<option value="10">2016</option>
</select>
</div>

			<div class="news-list-section">
				<?php
				// Blog List Section
				get_template_part('template-parts/BlogList');
				?>
			</div>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();

