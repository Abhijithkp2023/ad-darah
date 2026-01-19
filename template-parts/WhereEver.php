<?php
/**
 * Where Ever Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/WhereEver');
 * 
 * Optional query vars:
 * set_query_var('where_ever_title', 'Custom Title');
 * set_query_var('where_ever_content', 'Custom content here');
 * 
 * If no query vars provided, will use:
 * - Theme mods for front page
 * - Post content for page templates
 */

// Get parameters from query vars first
$where_ever_title = get_query_var('where_ever_title', '');
$where_ever_content = get_query_var('where_ever_content', '');

// If no query vars, check theme mods (for front page)
if (empty($where_ever_title) && empty($where_ever_content)) {
  $where_ever_title = get_theme_mod('where_ever_title', '');
  $where_ever_content = get_theme_mod('where_ever_content', '');
}

// Check if we should use post content (for page templates)
$use_post_content = empty($where_ever_title) && empty($where_ever_content);
?>

<section class="where-ever-content pb_80 pt_80">
  <div class="container">
    <div class="where_ever_text_wrapper">
      <div class="where-ever-left-block">
        <h2 class="where-ever-title">
          Where Every<br>
          Story Elevates Prestige
        </h2>
      </div>
      <div class="where-ever-right-block">
        <p class="where-ever-description">
          AD-DARAH is Riyadh's premier destination for iconic events, built on a strong Saudi heritage while embracing
          modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and
          cultural pride.
        </p>
        <a href="#" class="buttion primary-button">
          Learn More
        </a>
      </div>
    </div>
  </div>

  <div class="where-ever-video-wrapper">
    <div class="where-ever-video-container">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/intro_video_thump.png'); ?>"
        alt="Video thumbnail" class="where-ever-video-thumbnail">
      <button class="where-ever-play-button" aria-label="Play video">
        <svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M7.80899e-08 1.96722V33.4339C-9.85183e-05 33.7838 0.0931705 34.1274 0.270184 34.4293C0.447197 34.7311 0.701543 34.9803 1.00698 35.1511C1.31242 35.3218 1.65789 35.408 2.00774 35.4007C2.35759 35.3934 2.69916 35.2929 2.9972 35.1095L28.5639 19.3762C28.8502 19.2002 29.0867 18.9538 29.2507 18.6605C29.4148 18.3671 29.5009 18.0366 29.5009 17.7006C29.5009 17.3645 29.4148 17.034 29.2507 16.7407C29.0867 16.4473 28.8502 16.2009 28.5639 16.025L2.9972 0.291621C2.69916 0.108258 2.35759 0.00773711 2.00774 0.00042904C1.65789 -0.00687903 1.31242 0.0792906 1.00698 0.250047C0.701543 0.420804 0.447197 0.669963 0.270184 0.971818C0.0931705 1.27367 -9.85183e-05 1.61729 7.80899e-08 1.96722Z"
            fill="#F3EEEA" />
        </svg>
      </button>
      <video class="where-ever-video" controls muted loop preload="metadata" style="display: none;">
        <!-- External test video -->
        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
          type="video/mp4">
        <!-- Original video (commented for testing) -->
        <!-- <source src="<?php echo esc_url(get_template_directory_uri() . '/assets/videos/intro_video.mp4'); ?>" type="video/mp4"> -->
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</section>