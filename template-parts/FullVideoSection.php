<?php
/**
 * Full Video Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $full_video_thumbnail = get_template_directory_uri() . '/assets/images/wedding_detail_video_thump.png';
 * $full_video_url = 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4';
 * include locate_template('template-parts/FullVideoSection.php');
 */

// Get variables with defaults
$full_video_thumbnail = isset($full_video_thumbnail) ? $full_video_thumbnail : '';
$full_video_url = isset($full_video_url) ? $full_video_url : '';
?>

<?php if (!empty($full_video_thumbnail) && !empty($full_video_url)): ?>
    <section class="full-video-section">
        <div class="full-video-container">
            <img src="<?php echo esc_url($full_video_thumbnail); ?>" alt="Video thumbnail" class="full-video-thumbnail">
            <div class="full-video-overlay"></div>
            <button class="full-video-play-button" aria-label="Play video">
                <svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.80899e-08 1.96722V33.4339C-9.85183e-05 33.7838 0.0931705 34.1274 0.270184 34.4293C0.447197 34.7311 0.701543 34.9803 1.00698 35.1511C1.31242 35.3218 1.65789 35.408 2.00774 35.4007C2.35759 35.3934 2.69916 35.2929 2.9972 35.1095L28.5639 19.3762C28.8502 19.2002 29.0867 18.9538 29.2507 18.6605C29.4148 18.3671 29.5009 18.0366 29.5009 17.7006C29.5009 17.3645 29.4148 17.034 29.2507 16.7407C29.0867 16.4473 28.8502 16.2009 28.5639 16.025L2.9972 0.291621C2.69916 0.108258 2.35759 0.00773711 2.00774 0.00042904C1.65789 -0.00687903 1.31242 0.0792906 1.00698 0.250047C0.701543 0.420804 0.447197 0.669963 0.270184 0.971818C0.0931705 1.27367 -9.85183e-05 1.61729 7.80899e-08 1.96722Z"
                        fill="#F3EEEA" />
                </svg>
            </button>
            <video class="full-video-element" controls muted loop preload="metadata" style="display: none;">
                <source src="<?php echo esc_url($full_video_url); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
<?php endif; ?>

