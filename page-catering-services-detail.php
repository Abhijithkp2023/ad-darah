<?php
/**
 * The Catering Services Detail template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Catering Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/catering_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <div class="pb_100 pt_100">
            <?php
            // Three Image Text Sections
            $three_image_text_section_1 = array(
                'image' => get_template_directory_uri() . '/assets/images/cat_01.png',
                'items' => array(
                    array(
                        'heading' => '500+ Events Catered',
                        'description' => 'Exceptional catering for corporate, social, and private events.'
                    ),
                    array(
                        'heading' => '100+ Customized Menus',
                        'description' => 'Curated menus to suit diverse tastes and requirements.'
                    ),
                    array(
                        'heading' => '10+ Years of Culinary Excellence',
                        'description' => 'Consistently delivering quality, taste, and professional service.'
                    ),
                )
            );

            $three_image_text_section_2 = array(
                'image' => get_template_directory_uri() . '/assets/images/cat_02.png',
                'paragraphs' => array(
                    'At AD-DARAH, we understand that every corporate event is an opportunity to create impact. Our versatile halls, premium amenities, and professional support ensure your event leaves a lasting impression.',
                    'AD-DARAH is Riyadh\'s premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride.'
                )
            );

            $three_image_text_section_3 = array(
                'image' => get_template_directory_uri() . '/assets/images/cat_03.png',
                'paragraphs' => array(
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor. Vivamus diam libero, sollicitudin eu nisl vitae, gravida dapibus orci.'
                )
            );

            include locate_template('template-parts/ThreeImageText.php');
            ?>

        </div>

        <?php
        // Full Video Section
        $full_video_thumbnail = get_template_directory_uri() . '/assets/images/cater_thumb.png';
        $full_video_url = 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4'; // Dummy video link
        
        include locate_template('template-parts/FullVideoSection.php');
        ?>

        <?php
        // Two Image Text Section
        $two_image_text_heading = 'Our Catering Services';
        $two_image_text_description = 'Our culinary team delivers memorable dining experiences with menus tailored to your event.';
        $two_image_text_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/ca_01.png',
                'heading' => 'On-site Catering',
                'paragraph' => 'World-class menus prepared and served within the venue.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/ca_02.png',
                'heading' => 'Off-site Catering',
                'paragraph' => 'Bring the AD-DARAH culinary experience to <br /> your chosen location.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/TwoImageText.php');
        ?>

        <?php
        // Contact Us Section
        set_query_var('contact_title', 'Your Event, Our Venue — Excellence Awaits');
        set_query_var('contact_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
        set_query_var('contact_button_text', 'Contact Us');
        set_query_var('contact_button_link', '#');
        set_query_var('contact_bg_image', get_template_directory_uri() . '/assets/images/contact-bg.jpg');
        get_template_part('template-parts/ContactUs');
        ?>

    </div>
</main><!-- #main -->

<?php
get_footer();
?>

<!-- Direct script load for Full Video Section (fallback) -->
<script>
    // Also load FullVideoSection.js directly
    (function () {
        console.log("Loading FullVideoSection.js directly from template...");
        var script = document.createElement('script');
        script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/FullVideoSection.js?v=<?php echo _S_VERSION; ?>';
        script.onload = function () {
            console.log("FullVideoSection.js loaded successfully!");
        };
        script.onerror = function () {
            console.error("Failed to load FullVideoSection.js from:", script.src);
        };
        document.head.appendChild(script);
    })();
</script>