/**
 * VideoGallery Component JavaScript
 * 
 * Handles Swiper slider initialization and video playback for video gallery
 */

(function () {
    'use strict';

    const initVideoGallerySwiper = function () {
        const swiperElement = document.querySelector('[data-video-gallery-swiper]');
        if (!swiperElement || typeof Swiper === 'undefined') {
            return;
        }

        // Check if already initialized
        if (swiperElement.swiper) {
            return;
        }

        const sectionElement = swiperElement.closest('.video-gallery-section');
        const prevButton = sectionElement ? sectionElement.querySelector('.video-gallery-prev-btn') : null;
        const nextButton = sectionElement ? sectionElement.querySelector('.video-gallery-next-btn') : null;

        const swiperConfig = {
            spaceBetween: 10,
            slidesPerView: 1.3,
            speed: 800,
            centeredSlides: true,
            initialSlide: 1,
            loop: false,
            breakpoints: {
                768: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 1.5,
                    spaceBetween: 25,
                },
                1200: {
                    slidesPerView: 1.8,
                    spaceBetween: 30,
                },
            },
        };

        if (prevButton && nextButton) {
            swiperConfig.navigation = {
                nextEl: nextButton,
                prevEl: prevButton,
            };
        }

        new Swiper(swiperElement, swiperConfig);
    };

    const initVideoPlayback = function () {
        const videoCards = document.querySelectorAll('[data-video-card]');
        
        videoCards.forEach(function(card) {
            const playButton = card.querySelector('[data-video-play]');
            const iframe = card.querySelector('.video-gallery-iframe');
            const videoElement = card.querySelector('.video-gallery-video-element');
            
            if (!playButton) {
                return;
            }

            playButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isPlaying = card.classList.contains('playing');
                
                // Stop all other videos
                videoCards.forEach(function(otherCard) {
                    if (otherCard !== card) {
                        otherCard.classList.remove('playing');
                        const otherIframe = otherCard.querySelector('.video-gallery-iframe');
                        const otherVideo = otherCard.querySelector('.video-gallery-video-element');
                        if (otherIframe) {
                            otherIframe.src = '';
                        }
                        if (otherVideo) {
                            otherVideo.pause();
                            otherVideo.currentTime = 0;
                        }
                    }
                });
                
                // Toggle play/pause for this video
                if (isPlaying) {
                    // Pause the video
                    card.classList.remove('playing');
                    
                    // Handle YouTube iframe - pause by removing src
                    if (iframe) {
                        const currentSrc = iframe.src;
                        iframe.src = '';
                        iframe.setAttribute('data-paused-src', currentSrc);
                        iframe.style.display = 'none';
                    }
                    
                    // Handle local video
                    if (videoElement) {
                        videoElement.pause();
                    }
                } else {
                    // Play the video
                    card.classList.add('playing');
                    
                    // Handle YouTube iframe
                    if (iframe) {
                        const embedUrl = iframe.getAttribute('data-embed-url') || iframe.getAttribute('data-paused-src');
                        if (embedUrl) {
                            iframe.src = embedUrl;
                            iframe.style.display = 'block';
                            iframe.removeAttribute('data-paused-src');
                        }
                    }
                    
                    // Handle local video
                    if (videoElement) {
                        videoElement.style.display = 'block';
                        videoElement.play().catch(function(error) {
                            console.warn('Video autoplay failed:', error);
                        });
                    }
                }
            });
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                initVideoGallerySwiper();
                initVideoPlayback();
            }, 100);
        });
    } else {
        setTimeout(function() {
            initVideoGallerySwiper();
            initVideoPlayback();
        }, 100);
    }

})();

