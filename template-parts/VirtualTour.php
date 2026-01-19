<?php
/**
 * Virtual Tour Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/VirtualTour');
 */

// Single panorama image - using free online 360-degree image for demonstration
// Replace with your actual 360-degree image when available
$panorama_image = 'https://raw.githubusercontent.com/google/marzipano/master/demos/equirectangular/equirectangular.jpg';
?>

<section class="virtual-tour-container">
    <!-- 360 Image -->
    <div class="virtual-tour-image-wrapper">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/360_image.png'); ?>" alt="360 Virtual Tour" class="virtual-tour-image">
    </div>

    <!-- Overlay Content -->
    <div class="virtual-tour-overlay">
        <div class="virtual-tour-overlay-content">
            <h2 class="virtual-tour-title">Walk Through the Space</h2>
            <p class="virtual-tour-subtitle">Step inside AD-DARAH from anywhere in the world</p>
            
            <div class="virtual-tour-line">
                <div class="virtual-tour-arrow virtual-tour-arrow-left">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow_360.svg'); ?>" alt="Arrow">
                </div>
                <div class="virtual-tour-icon">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/360.svg'); ?>" alt="360">
                </div>
                <div class="virtual-tour-arrow virtual-tour-arrow-right">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/arrow_360.svg'); ?>" alt="Arrow">
                </div>
            </div>
        </div>
    </div>
</section>
