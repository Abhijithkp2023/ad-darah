/**
 * PressReleases Component JavaScript
 * 
 * Handles Swiper slider initialization for press releases carousel
 */

(function () {
    'use strict';

    const initPressReleasesSwiper = function () {
        const swiperElement = document.querySelector('[data-press-releases-swiper]');
        if (!swiperElement || typeof Swiper === 'undefined') {
            return;
        }

        // Check if already initialized
        if (swiperElement.swiper) {
            return;
        }

        const sectionElement = swiperElement.closest('.press-releases-section');
        const prevButton = sectionElement ? sectionElement.querySelector('.press-releases-prev-btn') : null;
        const nextButton = sectionElement ? sectionElement.querySelector('.press-releases-next-btn') : null;

        const swiperConfig = {
            spaceBetween: 30,
            slidesPerView: 1,
            speed: 800,
            breakpoints: {
                576: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 2.5,
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 25,
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

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPressReleasesSwiper);
    } else {
        initPressReleasesSwiper();
    }

})();

