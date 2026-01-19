<?php
/**
 * The Catering Services template file
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

        <?php
        // Image Text Section
        $image_text_image = get_template_directory_uri() . '/assets/images/catering_01.png';
        $image_text_headline_1 = 'Exceptional Culinary Experiences by';
        $image_text_headline_2 = 'AD-DARAH';
        $image_text_paragraphs = array(
            "From intimate gatherings to grand banquets, our catering team delivers world-class dining that celebrates Saudi flavors and global excellence.",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor."
        );
        $image_text_button_text = 'Explore Catering Services';
        $image_text_button_link = '#';

        include locate_template('template-parts/ImageTextSection.php');
        ?>

        <?php
        // Container Slider Section
        $container_slider_heading = 'Catering Services';
        $container_slider_paragraph = 'Our culinary team delivers memorable dining experiences with menus tailored to your event.';
        $container_slider_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/cater_01.png',
                'heading' => 'On-site Catering',
                'paragraph' => 'Professional catering services delivered directly to your venue with full service support.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/cater_02.png',
                'heading' => 'Off-site Catering',
                'paragraph' => 'Expert culinary services for events at external locations with customized menu options.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/cater_03.png',
                'heading' => 'Seasonal & Ramadan Packages',
                'paragraph' => 'Specially curated menus for seasonal celebrations and Ramadan with authentic flavors.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/ContainerSlider.php');
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

<!-- Direct script load for Container Slider (fallback) -->
<script>
    // Also load ContainerSlider.js directly
    (function () {
        console.log("Loading ContainerSlider.js directly from template...");
        var script = document.createElement('script');
        script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/ContainerSlider.js?v=<?php echo _S_VERSION; ?>';
        script.onload = function () {
            console.log("ContainerSlider.js loaded successfully!");
        };
        script.onerror = function () {
            console.error("Failed to load ContainerSlider.js from:", script.src);
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