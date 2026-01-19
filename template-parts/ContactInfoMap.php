<?php
/**
 * Contact Info and Map Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/ContactInfoMap');
 */

// Get contact info settings from theme mods or defaults
$contact_address = get_theme_mod( 'contact_address', '3138 Prince Muhammad Bin Abdulaziz <br/>Road Olaya, Riyadh 12241' );
$contact_phone = get_theme_mod( 'contact_phone', '+920 002 081' );
$contact_email = get_theme_mod( 'contact_email', 'infoaddarah.com' );
$contact_map_embed = get_theme_mod( 'contact_map_embed', '' );
$contact_map_latitude = get_theme_mod( 'contact_map_latitude', '24.7136' );
$contact_map_longitude = get_theme_mod( 'contact_map_longitude', '46.6753' );
?>

<section class="contact-info-map-section">
	<div class="container">
		<div class="contact-info-map-wrapper">
			<div class="contact-info-container">
				<h2 class="title_style_1 yello">Visit Our Office</h2>
                <p>
                Connect with our team and explore how we can support your project needs.
                </p>
				
				<ul class="contact-info-list">
					
                <li class="contact-info-item">
						<div class="contact-info-icon">
							 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sms.svg" alt="Write to us">
						</div>
						<div class="contact-info-content">
							<h3 class="contact-info-label">Write to us</h3>
							<p class="contact-info-value">
								<a href="mailto:<?php echo esc_attr( $contact_email ); ?>">
									<?php echo esc_html( $contact_email ); ?>
								</a>
							</p>
						</div>
					</li>
					<li class="contact-info-item">
						<div class="contact-info-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.svg" alt="Write to us">
						</div>
						<div class="contact-info-content">
							<h3 class="contact-info-label">Call us</h3>
							<p class="contact-info-value">
								<a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $contact_phone) ); ?>">
									<?php echo esc_html( $contact_phone ); ?>
								</a>
							</p>
						</div>
					</li>
					
					

                    <li class="contact-info-item">
						<div class="contact-info-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location.svg" alt="Write to us">
						</div>
						<div class="contact-info-content">
							<h3 class="contact-info-label">Visit us</h3>
							<p class="contact-info-value"><?php echo wp_kses_post( $contact_address ); ?></p>
						</div>
					</li>
				</ul>
			</div>
			
			<div class="contact-map-container">
				<?php if ( $contact_map_embed ) : ?>
					<div class="contact-map-embed">
						<?php echo wp_kses_post( $contact_map_embed ); ?>
					</div>
				<?php else : ?>
					<div class="contact_map_wrapper" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
						<div id="contactMap" class="contact_map_container"></div>
					</div>
					<?php
					// Map Configuration
					$map_api_key = get_theme_mod( 'google_maps_api_key', 'AIzaSyAZY9WW5ucJZLvBYxY4cAeZYY8AvmjZygg' );
					$marker_icon = get_template_directory_uri() . '/assets/images/map-marker.png';
					
					// Default marker for Riyadh
					$default_markers = array(
						array(
							'latitude' => $contact_map_latitude,
							'longitude' => $contact_map_longitude,
							'title' => 'AD-DARAH Office',
							'address' => $contact_address
						),
					);
					
					// Get markers from theme mods or use defaults
					$markers = get_theme_mod( 'contact_map_markers', $default_markers );
					if ( ! is_array( $markers ) || empty( $markers ) ) {
						$markers = $default_markers;
					}
					?>
					<script>
						window.contactMapConfig = {
							markers: <?php echo json_encode( $markers ); ?>,
							zoom: <?php echo esc_js( get_theme_mod( 'contact_map_zoom', '14' ) ); ?>,
							apiKey: '<?php echo esc_js( $map_api_key ); ?>',
							markerIcon: '<?php echo esc_url( $marker_icon ); ?>'
						};
					</script>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

