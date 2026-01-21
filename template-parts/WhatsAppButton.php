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
        <button class="form-floating-button" id="formFloatingButton" aria-label="Open booking form">
            <div class="form-button-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 5H21M3 12H21M3 19H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </button>
    </div>
</div>

<!-- Form Popup Modal -->
<div class="form-popup-overlay" id="formPopupOverlay">
    <div class="form-popup-modal">
        <button class="form-popup-close" id="formPopupClose" aria-label="Close form">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </button>
        <div class="form-popup-content">
            <form class="form-popup-form" action="#" method="post">
                <div class="form-popup-field">
                    <label for="popup-full-name" class="form-label">Full Name</label>
                    <input type="text" id="popup-full-name" name="full_name" placeholder="Enter Full Name"
                        class="form-input" required>
                </div>
                <div class="form-popup-field">
                    <label for="popup-email" class="form-label">Email Address</label>
                    <input type="email" id="popup-email" name="email" placeholder="xyz@mail.com" class="form-input"
                        required>
                </div>
                <div class="form-popup-field">
                    <label for="popup-phone" class="form-label">Phone No.</label>
                    <input type="tel" id="popup-phone" name="phone" placeholder="071 123 4567" class="form-input"
                        required>
                </div>
                <div class="form-popup-field">
                    <label for="popup-event-type" class="form-label">Event Type</label>
                    <select id="popup-event-type" name="event_type" class="form-input" required>
                        <option value="">Select Event Type</option>
                        <option value="wedding">Wedding</option>
                        <option value="corporate">Corporate</option>
                        <option value="social">Social</option>
                    </select>
                </div>
                <div class="form-popup-field">
                    <label for="popup-event-date" class="form-label">Event Date</label>
                    <input type="date" id="popup-event-date" name="event_date" class="form-input" required>
                </div>
                <div class="form-popup-field">
                    <label for="popup-contact-time" class="form-label">Preferred Contact Time</label>
                    <select id="popup-contact-time" name="contact_time" class="form-input" required>
                        <option value="">Select Time</option>
                        <option value="morning">Morning</option>
                        <option value="afternoon">Afternoon</option>
                        <option value="evening">Evening</option>
                    </select>
                </div>
                <button type="submit" class="primary-button">Book a Visit</button>
            </form>
        </div>
    </div>
</div>