<?php
/**
 * Video Form Component Template
 * 
 * Video and form section for landing pages
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/VideoForm');
 */

$video_form_heading = get_query_var('video_form_heading', 'Plan Your Wedding with Us');
$video_form_video = get_query_var('video_form_video', get_template_directory_uri() . '/assets/images/form_video.mp4');
?>

<section class="video-form-section pb_100 pt_100" data-video-form-section>
	<div class="container">
		<div class="video-form-wrapper">
			<div class="video-form-video-wrapper">
				<video class="video-form-video" data-video-form-video playsinline muted loop preload="metadata">
					<source src="<?php echo esc_url($video_form_video); ?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>

			<div class="video-form-form-wrapper">
				<div class="video-form-form-container">
					<?php if ($video_form_heading): ?>
						<h2 class="video-form-heading"><?php echo esc_html($video_form_heading); ?></h2>
					<?php endif; ?>

					<form class="video-form-form" action="#" method="post">
						<div class="video-form-field video-form-field-full">
							<input type="text" id="video-form-name" name="name" placeholder="Name"
								class="video-form-input" required>
						</div>

						<div class="video-form-field video-form-field-full">
							<input type="email" id="video-form-email" name="email" placeholder="Email"
								class="video-form-input" required>
						</div>

						<div class="video-form-field video-form-field-full">
							<input type="tel" id="video-form-phone" name="phone" placeholder="Phone Number"
								class="video-form-input" required>
						</div>

						<div class="video-form-row">
							<div class="video-form-field video-form-field-half">
								<select id="video-form-event-type" name="event_type"
									class="video-form-select video-form-choices-select" required>
									<option value="">Event Type</option>
									<option value="wedding">Wedding</option>
									<option value="corporate">Corporate</option>
									<option value="social">Social</option>
									<option value="other">Other</option>
								</select>
							</div>

							<div class="video-form-field video-form-field-half">
								<input type="text" id="video-form-date" name="event_date"
									placeholder="Select or Type Event Date"
									class="video-form-input video-form-date-input" required>
							</div>
						</div>

						<div class="video-form-row">
							<div class="video-form-field video-form-field-half">
								<input id="video-form-guests" name="number_of_guests"
									placeholder="Number of Guests" class="video-form-input" required>
							</div>

							<div class="video-form-field video-form-field-half">
								<select id="video-form-time" name="time_to_communicate"
									class="video-form-select video-form-choices-select" required>
									<option value="">Time to Communicate or Visit</option>
									<option value="morning">Morning</option>
									<option value="afternoon">Afternoon</option>
									<option value="evening">Evening</option>
								</select>
							</div>
						</div>

						<div class="video-form-field video-form-field-full">
							<button type="submit" class="primary-button video-form-button">
								Book a Visit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>