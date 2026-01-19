/**
 * AllNewsSwiper Component JavaScript
 * 
 * Handles Swiper slider initialization for all news carousel
 */

(function () {
    'use strict';

    const initAllNewsSwiper = function (attempt = 0) {
        const maxRetries = 10;
        const retryDelay = 500;

        // Only use data attribute to avoid conflicts with other swipers
        let swiperElement = document.querySelector('[data-all-news-swiper]');
        
        // Check if Swiper library is loaded
        if (typeof Swiper === 'undefined') {
            if (attempt < maxRetries) {
                console.warn('AllNewsSwiper: Swiper not loaded, retrying... (' + (attempt + 1) + '/' + maxRetries + ')');
                setTimeout(function () {
                    initAllNewsSwiper(attempt + 1);
                }, retryDelay);
            } else {
                console.error('AllNewsSwiper: Swiper library failed to load after multiple attempts');
            }
            return;
        }

        // Check if swiper element exists
        if (!swiperElement) {
            if (attempt < maxRetries) {
                setTimeout(function () {
                    initAllNewsSwiper(attempt + 1);
                }, retryDelay);
            } else {
                console.warn('AllNewsSwiper: Swiper element not found');
            }
            return;
        }

        // Check if already initialized
        if (swiperElement.swiper || swiperElement._swiperInstance) {
            console.log('AllNewsSwiper: Swiper already initialized');
            return;
        }

        // Check if wrapper and slides exist
        const wrapper = swiperElement.querySelector('.swiper-wrapper');
        if (!wrapper) {
            console.warn('AllNewsSwiper: Swiper wrapper not found');
            return;
        }

        const slides = wrapper.querySelectorAll('.swiper-slide');
        if (slides.length === 0) {
            console.warn('AllNewsSwiper: No Swiper slides found');
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
            
            console.log('AllNewsSwiper: Swiper initialized successfully with', slides.length, 'slides');
        } catch (error) {
            console.error('AllNewsSwiper: Error initializing Swiper', error);
        }
    };

    // Initialize with retry logic
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                initAllNewsSwiper();
            }, 500);
        });
    } else {
        setTimeout(function () {
            initAllNewsSwiper();
        }, 500);
    }

})();

