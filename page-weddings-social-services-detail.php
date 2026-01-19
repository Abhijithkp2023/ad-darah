<?php
/**
 * The Weddings & Social Services Detail template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Weddings & Social Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/wedding_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <div class="pb_100 pt_100">
            <?php
            // Three Image Text Sections
            $three_image_text_section_1 = array(
                'image' => get_template_directory_uri() . '/assets/images/img_01.png',
                'items' => array(
                    array(
                        'heading' => '300+ Weddings Curated',
                        'description' => 'From intimate ceremonies to grand celebrations, planned.'
                    ),
                    array(
                        'heading' => '20+ Wedding Styles Delivered',
                        'description' => 'Traditional, modern, and themed weddings tailored to vision.'
                    ),
                    array(
                        'heading' => '10+ Years of Wedding Expertise',
                        'description' => 'A decade of creating timeless and memorable experiences.'
                    ),
                )
            );

            $three_image_text_section_2 = array(
                'image' => get_template_directory_uri() . '/assets/images/img_02.png',
                'paragraphs' => array(
                    'At AD-DARAH, we understand that every corporate event is an opportunity to create impact. Our versatile halls, premium amenities, and professional support ensure your event leaves a lasting impression.',
                    'AD-DARAH is Riyadh\'s premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride.'
                )
            );

            $three_image_text_section_3 = array(
                'image' => get_template_directory_uri() . '/assets/images/img_03.png',
                'paragraphs' => array(
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor. Vivamus diam libero, sollicitudin eu nisl vitae, gravida dapibus orci.'
                )
            );

            include locate_template('template-parts/ThreeImageText.php');
            ?>

        </div>

        <?php
        // Full Video Section
        $full_video_thumbnail = get_template_directory_uri() . '/assets/images/wedding_detail_video_thump.png';
        $full_video_url = 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4'; // Dummy video link
        
        include locate_template('template-parts/FullVideoSection.php');
        ?>


        <?php
        // Facilities Section
        $facilities_heading = 'Facilities';
        $facilities_description = 'AD-DARAH offers world-class facilities tailored for weddings and social celebrations. Every detail—from the grand halls to the private suites—is crafted to ensure your event unfolds seamlessly with elegance and ease.';
        $facilities_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/facility_01.png',
                'title' => 'Pearl Package',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'button_text' => 'Download PDF',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/facility_02.png',
                'title' => 'Diamond Package',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'button_text' => 'Download PDF',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/facility_03.png',
                'title' => 'Royal Package',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'button_text' => 'Download PDF',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/FacilitiesSection.php');
        ?>

        <?php
        // Related Services Section
        $related_services_heading = 'Our Related Services';
        $related_services_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor.';
        $related_services_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/related_01.png',
                'title' => 'Male Packages',
                'description' => 'Host your celebration in a grand setting that reflects Saudi tradition and modern sophistication. Our male halls offer spacious layouts, premium service, and refined details that ensure every moment feels exceptional.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/RelatedServicesSection.php');
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