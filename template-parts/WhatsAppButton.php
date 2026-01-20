<?php
/**
 * WhatsApp Floating Button Component Template
 * 
 * Floating WhatsApp button that appears on all pages
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/WhatsAppButton');
 * 
 */

// Get WhatsApp number from theme mods or use default
$whatsapp_number = get_theme_mod('whatsapp_number', '966501234567'); // Default format: country code + number (no + or spaces)
$whatsapp_message = get_theme_mod('whatsapp_message', 'Hello! I would like to know more about your services.');

// Format WhatsApp URL
$whatsapp_url = 'https://wa.me/' . esc_attr($whatsapp_number) . '?text=' . urlencode($whatsapp_message);
?>

<div class="whatsapp-button-container">
    <div class="container">
        <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer"
            class="whatsapp-floating-button" aria-label="Contact us on WhatsApp">
            <div class="whatsapp-button-icon">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/whatsapp.svg'); ?>"
                    alt="WhatsApp" class="whatsapp-icon">
            </div>
        </a>
    </div>
</div>