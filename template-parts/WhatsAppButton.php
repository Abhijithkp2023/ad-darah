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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M21 8.5V13.63C20.11 12.92 18.98 12.5 17.75 12.5C16.52 12.5 15.37 12.93 14.47 13.66C13.26 14.61 12.5 16.1 12.5 17.75C12.5 18.73 12.78 19.67 13.26 20.45C13.63 21.06 14.11 21.59 14.68 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                        stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M7 11H13" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7 16H9.62" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M23 17.75C23 18.73 22.72 19.67 22.24 20.45C21.96 20.93 21.61 21.35 21.2 21.69C20.28 22.51 19.08 23 17.75 23C16.6 23 15.54 22.63 14.68 22C14.11 21.59 13.63 21.06 13.26 20.45C12.78 19.67 12.5 18.73 12.5 17.75C12.5 16.1 13.26 14.61 14.47 13.66C15.37 12.93 16.52 12.5 17.75 12.5C18.98 12.5 20.11 12.92 21 13.63C22.22 14.59 23 16.08 23 17.75Z"
                        stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M17.75 20.25C17.75 18.87 18.87 17.75 20.25 17.75C18.87 17.75 17.75 16.63 17.75 15.25C17.75 16.63 16.63 17.75 15.25 17.75C16.63 17.75 17.75 18.87 17.75 20.25Z"
                        stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>
                    Book a Visit
                </span>
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
                    <div class="form-field-wrapper form-date-wrapper">
                        <span class="form-field-display">Select Event Date</span>
                        <input type="text" id="popup-event-date" name="event_date" class="form-input"
                            placeholder="Select Event Date" required>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header_calendar.svg'); ?>"
                            alt="Calendar" class="form-calendar-icon">
                    </div>
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