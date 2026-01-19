<?php
/**
 * The Corporate Services template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Corporate Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/Corporate_Services_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <?php
        // Image Text Section
        $image_text_image = get_template_directory_uri() . '/assets/images/cop_service_01.png';
        $image_text_headline_1 = 'Comprehensive Event Services Under One Roof';
        $image_text_paragraphs = array(
            "AD-DARAH offers tailored solutions for every occasion — from corporate summits and government events to weddings, social gatherings, and world-class catering.",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor."
        );
        $image_text_button_text = 'Explore Corporate Services';
        $image_text_button_link = '#';

        include locate_template('template-parts/ImageTextSection.php');
        ?>

        <?php
        // Overflow Slider Section
        $overflow_slider_heading = 'Corporate Services';
        $overflow_slider_paragraph = 'Our culinary team delivers memorable dining experiences with menus tailored to your event.';
        $overflow_slider_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_01.png',
                'heading' => 'Conferences & Exhibitions',
                'paragraph' => 'Grand halls with advanced AV and staging for large-scale events.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_02.png',
                'heading' => 'Meeting Rooms & Workshops',
                'paragraph' => 'Professional spaces designed for productive meetings and collaborative workshops.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_03.png',
                'heading' => 'Government Events (B2G)',
                'paragraph' => 'Elegant venues for official government functions and formal ceremonies.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_04.png',
                'heading' => 'Corporate Events',
                'paragraph' => 'Sophisticated settings for corporate gatherings and business events.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/OverflowSlider.php');
        ?>

        <?php
        // Single Testimonial Section
        $single_testimonial_title = 'Featured Clients';
        $single_testimonial_items = array(
            array(
                'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
                'name' => 'Sarah Mitchell',
                'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
                'rating' => 4,
            ),
            array(
                'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
                'name' => 'Ryan Lee',
                'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
                'rating' => 4,
            ),
            array(
                'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
                'name' => 'Emma Algunaibet',
                'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
                'rating' => 4,
            ),
            array(
                'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
                'name' => 'Sarah Mitchell',
                'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
                'rating' => 4,
            ),
            array(
                'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
                'name' => 'Ryan Lee',
                'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
                'rating' => 4,
            ),
            array(
                'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
                'name' => 'Emma Algunaibet',
                'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.png',
                'rating' => 4,
            ),
        );

        include locate_template('template-parts/SingleTestimonial.php');
        ?>

                <?php
                // Contact Us Section
                set_query_var('contact_title', 'Your Event, Our Venue — Excellence Awaits');
                set_query_var('contact_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');
                set_query_var('contact_button_text', 'Explore Corporate Services');
                set_query_var('contact_button_link', home_url('/corporate-services'));
                set_query_var('contact_bg_image', get_template_directory_uri() . '/assets/images/contact-bg.jpg');
                get_template_part('template-parts/ContactUs');
                ?>

    </div>
</main><!-- #main -->

<?php
get_footer();
?>

<!-- Direct script load for Corporate Services Slider (fallback) -->
<script>
    // Also load OverflowSlider.js directly
    (function () {
        console.log("Loading OverflowSlider.js directly from template...");
        var script = document.createElement('script');
        script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/OverflowSlider.js?v=<?php echo _S_VERSION; ?>';
        script.onload = function () {
            console.log("OverflowSlider.js loaded successfully!");
        };
        script.onerror = function () {
            console.error("Failed to load OverflowSlider.js from:", script.src);
        };
        document.head.appendChild(script);
    })();

    // Also load SingleTestimonial.js directly
    (function () {
        console.log("Loading SingleTestimonial.js directly from template...");
        var script = document.createElement('script');
        script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/SingleTestimonial.js?v=<?php echo _S_VERSION; ?>';
        script.onload = function () {
            console.log("SingleTestimonial.js loaded successfully!");
        };
        script.onerror = function () {
            console.error("Failed to load SingleTestimonial.js from:", script.src);
        };
        document.head.appendChild(script);
    })();
</script>