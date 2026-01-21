/**
 * Full Video Section Component JavaScript
 */

(function () {
	"use strict";

	console.log("FullVideoSection: Script loaded");

	/**
	 * Initialize Full Video Section
	 */
	const initFullVideoSection = function () {
		const videoContainer = document.querySelector(".full-video-container");
		const playButton = document.querySelector(".full-video-play-button");
		const video = document.querySelector(".full-video-element");
		const thumbnail = document.querySelector(".full-video-thumbnail");

		if (!videoContainer || !video || !playButton) {
			return;
		}

		// Add error event listener to catch video loading errors
		video.addEventListener("error", function (e) {
			console.error("FullVideoSection: Video error:", e);
			console.error("FullVideoSection: Video error details:", {
				code: video.error ? video.error.code : "unknown",
				message: video.error ? video.error.message : "unknown",
				src: video.currentSrc || video.src
			});
		});

		// Handle play button click
		playButton.addEventListener("click", function () {
			// Hide thumbnail
			if (thumbnail) {
				thumbnail.style.display = "none";
			}

			// Hide play button
			playButton.classList.add("is-hidden");

			// Show video
			video.style.display = "block";

			// Set video properties
			video.muted = true;
			video.playsInline = true;

			// Check if video source is loaded
			if (video.readyState === 0) {
				// Video not loaded, wait for it to load
				video.addEventListener("loadeddata", function playVideo() {
					playVideoElement(video);
					video.removeEventListener("loadeddata", playVideo);
				}, { once: true });
				
				// Load the video
				video.load();
			} else {
				// Video already loaded or loading
				playVideoElement(video);
			}
		});

		// Function to play the video
		function playVideoElement(videoElement) {
			const playPromise = videoElement.play();
			if (playPromise !== undefined) {
				playPromise
					.then(function () {
						console.log("FullVideoSection: Video is playing");
					})
					.catch(function (error) {
						console.error("FullVideoSection: Video play error:", error);
						// Try unmuted play
						videoElement.muted = false;
						videoElement.play().catch(function (err) {
							console.error("FullVideoSection: Video still cannot play:", err);
							// Show play button again if video fails
							playButton.classList.remove("is-hidden");
						});
					});
			}
		}

		// Hide play button when video starts playing
		video.addEventListener("play", function () {
			playButton.classList.add("is-hidden");
		});

		// Show play button when video is paused (optional)
		video.addEventListener("pause", function () {
			// Keep it hidden as per requirement
		});
	};

	/**
	 * Wait for DOM to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initFullVideoSection, 100);
			});
		} else {
			setTimeout(initFullVideoSection, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();

