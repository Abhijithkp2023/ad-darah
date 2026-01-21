/**
 * RelatedNews Component JavaScript
 * 
 * Handles Swiper slider initialization for related news carousel
 */

(function () {
    'use strict';

    const initRelatedNewsSwiper = function () {
        const swiperElement = document.querySelector('[data-related-news-swiper]');
        
        if (!swiperElement) {
            return;
        }

        // Check if already initialized
        if (swiperElement.swiper) {
            return;
        }

        // Wait for Swiper to load
        if (typeof Swiper === 'undefined') {
            setTimeout(initRelatedNewsSwiper, 100);
            return;
        }

        new Swiper(swiperElement, {
            spaceBetween: 30,
            slidesPerView: 2,
            speed: 800,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        });
    };

    // Initialize when DOM and Swiper are ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initRelatedNewsSwiper, 300);
        });
    } else {
        setTimeout(initRelatedNewsSwiper, 300);
    }

})();

