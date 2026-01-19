/**
 * RelatedNews Component JavaScript
 * 
 * Handles Swiper slider initialization for related news carousel
 */

(function () {
    'use strict';

    const initRelatedNewsSwiper = function (attempt = 0) {
        const maxRetries = 10;
        const retryDelay = 500;

        // Try data attribute first, then fallback to class
        let swiperElement = document.querySelector('[data-related-news-swiper]');
        if (!swiperElement) {
            swiperElement = document.querySelector('.related-news-carousel');
        }
        
        // Check if Swiper library is loaded
        if (typeof Swiper === 'undefined') {
            if (attempt < maxRetries) {
                console.warn('RelatedNews: Swiper not loaded, retrying... (' + (attempt + 1) + '/' + maxRetries + ')');
                setTimeout(function () {
                    initRelatedNewsSwiper(attempt + 1);
                }, retryDelay);
            } else {
                console.error('RelatedNews: Swiper library failed to load after multiple attempts');
            }
            return;
        }

        // Check if swiper element exists
        if (!swiperElement) {
            if (attempt < maxRetries) {
                setTimeout(function () {
                    initRelatedNewsSwiper(attempt + 1);
                }, retryDelay);
            } else {
                console.warn('RelatedNews: Swiper element not found');
            }
            return;
        }

        // Check if already initialized
        if (swiperElement.swiper || swiperElement._swiperInstance) {
            console.log('RelatedNews: Swiper already initialized');
            return;
        }

        // Check if wrapper and slides exist
        const wrapper = swiperElement.querySelector('.swiper-wrapper');
        if (!wrapper) {
            console.warn('RelatedNews: Swiper wrapper not found');
            return;
        }

        const slides = wrapper.querySelectorAll('.swiper-slide');
        if (slides.length === 0) {
            console.warn('RelatedNews: No Swiper slides found');
            return;
        }

        const swiperConfig = {
            spaceBetween: 30,
            slidesPerView: 1,
            speed: 800,
            loop: false,
            watchOverflow: true,
            allowTouchMove: true,
            breakpoints: {
                576: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        };

        try {
            const swiperInstance = new Swiper(swiperElement, swiperConfig);
            swiperElement._swiperInstance = swiperInstance;
            
            // Force update to ensure styles are applied
            setTimeout(function() {
                swiperInstance.update();
                swiperInstance.updateSlides();
                swiperInstance.updateSlidesClasses();
                swiperInstance.updateSize();
            }, 100);
            
            // Update on window resize
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    swiperInstance.update();
                    swiperInstance.updateSize();
                }, 250);
            });
            
            console.log('RelatedNews: Swiper initialized successfully with', slides.length, 'slides');
        } catch (error) {
            console.error('RelatedNews: Error initializing Swiper', error);
        }
    };

    // Initialize with retry logic
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                initRelatedNewsSwiper();
            }, 500);
        });
    } else {
        setTimeout(function () {
            initRelatedNewsSwiper();
        }, 500);
    }

})();

