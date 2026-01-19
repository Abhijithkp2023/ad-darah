/**
 * WhereEver Component JavaScript
 * Handles video auto-play on scroll (40% visibility) and hover play
 */

(function () {
	"use strict";

	let hasPlayed = false;
	let isAutoPlaying = false;

	/**
	 * Start video playback
	 * @param {HTMLElement} video - Video element
	 * @param {HTMLElement} thumbnail - Thumbnail image
	 * @param {HTMLElement} playButton - Play button
	 * @param {boolean} hidePlayButton - Whether to hide play button (true for hover/click, false for autoplay)
	 */
	const startVideo = function (video, thumbnail, playButton, hidePlayButton) {
		if (hasPlayed && !isAutoPlaying) {
			return;
		}

		// Hide thumbnail
		if (thumbnail) {
			thumbnail.style.display = "none";
		}

		// Hide play button only if hidePlayButton is true (hover/click)
		if (playButton && hidePlayButton) {
			playButton.classList.add("is-hidden");
		}

		// Show video
		video.style.display = "block";
		
		// Set video properties
		video.muted = true; // Mute for autoplay compatibility
		video.playsInline = true; // Important for mobile
		
		// Check if video source is loaded
		if (video.readyState === 0) {
			// Video not loaded, wait for it to load
			video.addEventListener('loadeddata', function() {
				playVideo(video);
			}, { once: true });
			video.load();
		} else {
			// Video already loaded or loading
			playVideo(video);
		}
	};

	/**
	 * Play the video
	 */
	const playVideo = function (video) {
		const playPromise = video.play();
		if (playPromise !== undefined) {
			playPromise
				.then(function () {
					// Video is playing
					hasPlayed = true;
					isAutoPlaying = false;
					console.log("Video is playing");
				})
				.catch(function (error) {
					console.error("Video play error:", error);
					// Try unmuted play
					video.muted = false;
					video.play().catch(function(err) {
						console.error("Video still cannot play:", err);
					});
				});
		}
	};

	/**
	 * Initialize WhereEver Component
	 */
	const initWhereEver = function () {
		const videoContainer = document.querySelector(".where-ever-video-container");
		const playButton = document.querySelector(".where-ever-play-button");
		const video = document.querySelector(".where-ever-video");
		const thumbnail = document.querySelector(".where-ever-video-thumbnail");

		if (!videoContainer || !video) {
			return;
		}

		// Handle play button click - hide play button on click
		if (playButton) {
			playButton.addEventListener("click", function () {
				startVideo(video, thumbnail, playButton, true);
			});
		}

		// Initialize auto-play on scroll (when 40% visible) - keep play button visible
		initAutoPlay(videoContainer, video, thumbnail, playButton);

		// Initialize hover play - hide play button on hover
		initHoverPlay(videoContainer, video, thumbnail, playButton);
	};

	/**
	 * Initialize auto-play when 40% of video is in viewport
	 */
	const initAutoPlay = function (container, video, thumbnail, playButton) {
		const observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					const rect = entry.boundingClientRect;
					const viewportHeight = window.innerHeight;
					const visibleHeight =
						Math.min(rect.bottom, viewportHeight) - Math.max(rect.top, 0);
					const visiblePercent = (visibleHeight / rect.height) * 100;

					if (visiblePercent >= 40 && !hasPlayed && video.paused) {
						isAutoPlaying = true;
						// Autoplay - keep play button visible (pass false)
						startVideo(video, thumbnail, playButton, false);
					}
				});
			},
			{
				threshold: [0, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 1],
				rootMargin: "0px",
			}
		);

		observer.observe(container);
	};

	/**
	 * Initialize hover play
	 * Plays video when hovering over the container
	 */
	const initHoverPlay = function (container, video, thumbnail, playButton) {
		container.addEventListener("mouseenter", function () {
			if (video.paused) {
				// Hover play - hide play button (pass true)
				startVideo(video, thumbnail, playButton, true);
			}
		});
	};

	/**
	 * Wait for DOM to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				initWhereEver();
			});
		} else {
			initWhereEver();
		}
	};

	// Initialize when ready
	waitForReady();
})();
