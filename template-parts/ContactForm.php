<?php
/**
 * Contact Form Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/ContactForm');
 */

// Get contact form settings from theme mods or defaults
$form_title = get_theme_mod( 'contact_form_title', 'Plan Your Event with Us' );
$form_image = get_theme_mod( 'contact_form_image', get_template_directory_uri() . '/assets/images/contact-img.jpg' );
?>

<section class="contact-form-section">
	<div class="container">
        <div class="contact-form-wrapper">
            <div class="contact-form-image">
                <?php if ( $form_image ) : ?>
                    <img src="<?php echo esc_url( $form_image ); ?>" alt="<?php echo esc_attr( $form_title ); ?>">
                <?php endif; ?>
            </div>
            
            <div class="contact-form-container">
                <?php if ( $form_title ) : ?>
                    <h2 class="contact-form-title"><?php echo esc_html( $form_title ); ?></h2>
                <?php endif; ?>
                
                <form class="contact-form" method="post" action="">
                    <ul class="contact-form-list">
                        <li class="contact-form-item">
                            <input type="text" id="contact-name" name="name" class="contact-form-input" placeholder="Name" required>
                        </li>
                        
                        <li class="contact-form-item">
                            <input type="email" id="contact-email" name="email" class="contact-form-input" placeholder="Email" required>
                        </li>
                        
                        <li class="contact-form-item">
                            <input type="tel" id="contact-phone" name="phone" class="contact-form-input" placeholder="Phone Number" required>
                        </li>
                        
                        <li class="contact-form-item contact-form-item-message">
                            <textarea id="contact-message" name="message" class="contact-form-input contact-form-textarea" rows="5" placeholder="Message" required></textarea>
                        </li>
                        
                        <li class="contact-form-item contact-form-item-submit">
                            <button type="submit" class="primary-button">Submit</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
	</div>
</section>

