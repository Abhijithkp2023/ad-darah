<?php
/**
 * The Weddings & Social Services template file
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

        <?php
        $image_text_image = get_template_directory_uri() . '/assets/images/wedding_img_01.png';
        $image_text_headline_1 = 'Celebrate Life\'s Most Precious Moments at AD-DARAH';
        // $image_text_headline_2 = 'AD-DARAH';
        $image_text_paragraphs = array(
            "AD-DARAH is Riyadh's premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor."
        );
        $image_text_button_text = 'Explore Weddings & Social Services';
        $image_text_button_link = '#';

        include locate_template('template-parts/ImageTextSection.php'); ?>
        ?>


        <?php
        // Perfect Day Section
        $perfect_day_bg_image = get_template_directory_uri() . '/assets/images/perfect_day_bg.png';
        $perfect_day_heading = 'Everything for Your Perfect Day';
        $perfect_day_paragraph = 'From intimate engagements to royal weddings, AD-DARAH creates timeless celebrations that honor heritage and style. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor.';
        $perfect_day_slider_items = array(
            array(
                'heading' => 'Weddings & Engagements',
                'paragraph' => 'Celebrate in a setting that reflects elegance and Saudi tradition.'
            ),
            array(
                'heading' => 'Facilities',
                'paragraph' => 'Fully segregated male & female halls with premium amenities.'
            ),
            array(
                'heading' => 'Wedding Packages',
                'paragraph' => 'Pearl - Elegant and intimate setting | Diamond - Luxury with added services | Royal - The ultimate wedding experience'
            ),
            array(
                'heading' => 'Bridal Services',
                'paragraph' => 'Luxury consultation and more'
            ),
        );

        include locate_template('template-parts/PerfectDaySection.php');
        ?>

        <?php
        // Two Image Text Section
        $two_image_text_heading = 'Weddings & Social Services';
        $two_image_text_description = 'From intimate engagements to royal weddings. AD-DARAH creates timeless celebrations that honor heritage and style.';
        $two_image_text_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/wedding_01.png',
                'heading' => 'Female Packages',
                'paragraph' => 'Experience an atmosphere of elegance and grace designed exclusively for brides and their guests. From exquisite décor and lighting to luxurious bridal suites, every element is crafted to make the celebration truly unforgettable.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/wedding_02.png',
                'heading' => 'Male Packages',
                'paragraph' => 'Host your celebration in a grand setting that reflects Saudi tradition and modern sophistication. Our male halls offer spacious layouts, premium service, and refined details that ensure every moment feels exceptional.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/TwoImageText.php');
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

<!-- Direct script load for SingleTestimonial (fallback) -->
<script>
    console.log("Template loaded: page-weddings-social-services.php");
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

    // Also load PerfectDaySlider.js directly
    (function () {
        console.log("Loading PerfectDaySlider.js directly from template...");
        var script = document.createElement('script');
        script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/PerfectDaySlider.js?v=<?php echo _S_VERSION; ?>';
        script.onload = function () {
            console.log("PerfectDaySlider.js loaded successfully!");
        };
        script.onerror = function () {
            console.error("Failed to load PerfectDaySlider.js from:", script.src);
        };
        document.head.appendChild(script);
    })();
</script>