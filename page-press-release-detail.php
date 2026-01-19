<?php
/**
 * Template Name: Press Release Detail
 * The press release detail template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		
	 
		<?php
		// Banner Section
		set_query_var('banner_title', get_the_title());
		$banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
		if (!$banner_image) {
			$banner_image = get_template_directory_uri() . '/assets/images/press-banner-detail.jpg';
		}
		set_query_var('banner_bg_image', $banner_image);
		get_template_part('template-parts/Banner');
		?>

		<?php
		// Breadcrumbs Section
		$breadcrumbs_items = array(
			array(
				'label' => 'Home',
				'url' => home_url('/')
			),
			array(
				'label' => 'News & Press Releases',
				'url' => get_permalink(get_option('page_for_posts')) ?: '#'
			),
			array(
				'label' => 'Article Details',
				'url' => ''
			)
		);
		set_query_var('breadcrumbs_items', $breadcrumbs_items);
		get_template_part('template-parts/Breadcrumbs');
		?>

		<section class="press-release-detail-content ">
			<div class="wrap">
				 <div class="press-release-detail-content-wrapper">
                    <p>26 MAR 2025</p>
                    <ul class="share-links">
                        <li>Share :</li>
                        <li><a href="">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="Facebook">
                        </a> </li>
                        <li><a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/x.svg" alt="Facebook">
                        </a> </li>
                        <li><a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="Facebook">
                        </a> </li>
                        <li><a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedIn.svg" alt="Facebook">
                        </a> </li>

                        <li><a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.svg" alt="Facebook">
                        </a> </li>
                                             </ul>
                 </div>

 
                 <div class="press-release-detail-wrap">
                    <h1 class="title_style_1 yello">Inside ADDarah’s vision for transformative hospitality</h1>
<div class="press-release-detail-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/press-image-01.jpg" alt="Inside ADDarah’s vision for transformative hospitality">
     </div>

     <div class="press-release-detail-content-block">
 
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin elementum justo quis tempor elementum. Cras dapibus, ante non egestas viverra, mi ante venenatis est, non feugiat sem elit eu nisl. Vivamus efficitur luctus rutrum. Nulla nisi turpis, elementum in cursus venenatis, vehicula non ante. Maecenas fermentum odio ut nisi tempus interdum. Sed posuere, mi eu tempor accumsan, mi sem consectetur quam, vel ultrices sapien enim sit amet felis. Phasellus mattis nulla ac condimentum scelerisque. Etiam accumsan non neque eget mattis. Vestibulum luctus fermentum sodales. Vivamus finibus cursus mollis. Integer condimentum finibus nibh id egestas. Curabitur efficitur nibh eros, in interdum risus ultrices at. Mauris neque lorem, fringilla sit amet elementum vitae, posuere a velit. Proin ac neque non nisi bibendum tincidunt id et neque.</p>

<p>Donec pellentesque orci tincidunt, ultricies dui at, pharetra metus. In in dolor egestas, lacinia enim vel, congue turpis. Nam in ligula lobortis, ultrices purus ut, sodales orci. Donec nulla nibh, condimentum in mauris quis, molestie luctus diam. Sed eget enim quis sapien fermentum consequat. Morbi dictum molestie lorem, ut faucibus enim sodales quis. Quisque nec augue consectetur justo facilisis laoreet. Nunc vulputate interdum nunc, nec tincidunt felis pellentesque fringilla. Sed elementum sed sem tempus tempus. Cras dapibus efficitur diam vitae finibus. Sed nec metus dolor. Praesent consequat eget purus id laoreet. Sed luctus, nibh sit amet ultricies placerat, orci dui imperdiet nibh, a porta arcu nisi eget nisl. Pellentesque quis rhoncus velit. Mauris pellentesque dui sed orci efficitur lobortis. Proin aliquet fringilla </p>

<p>accumsan.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin elementum justo quis tempor elementum. Cras dapibus, ante non egestas viverra, mi ante venenatis est, non feugiat sem elit eu nisl. Vivamus efficitur luctus rutrum. Nulla nisi turpis, elementum in cursus venenatis, vehicula non ante. Maecenas fermentum odio ut nisi tempus interdum. Sed posuere, mi eu tempor accumsan, mi sem consectetur quam, vel ultrices sapien enim sit amet felis. Phasellus mattis nulla ac condimentum scelerisque. Etiam accumsan non neque eget mattis. Vestibulum luctus fermentum sodales. Vivamus finibus cursus mollis. Integer condimentum finibus nibh id egestas. Curabitur efficitur nibh eros, in interdum risus ultrices at. Mauris neque lorem, fringilla sit amet elementum vitae, posuere a velit. Proin ac neque non nisi bibendum tincidunt id et neque.</p>
      
    </div>
                </div>
			</div>
		</section>

 

		<?php
		// Related News Section
		get_template_part('template-parts/RelatedNews');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();

