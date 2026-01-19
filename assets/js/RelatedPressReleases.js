/**
 * RelatedPressReleases Component JavaScript
 * 
 * Handles Swiper slider initialization for related press releases
 */

(function () {
    'use strict';

    const initRelatedPressReleasesSwiper = function (attempt = 0) {
        const maxRetries = 10;
        const retryDelay = 500;

        // Try data attribute first, then fallback to class
        let swiperElement = document.querySelector('[data-related-press-releases-swiper]');
        if (!swiperElement) {
            swiperElement = document.querySelector('.related-press-releases-carousel');
        }
        
        // Check if Swiper library is loaded
        if (typeof Swiper === 'undefined') {
            if (attempt < maxRetries) {
                console.warn('RelatedPressReleases: Swiper not loaded, retrying... (' + (attempt + 1) + '/' + maxRetries + ')');
                setTimeout(function () {
                    initRelatedPressReleasesSwiper(attempt + 1);
                }, retryDelay);
            } else {
                console.error('RelatedPressReleases: Swiper library failed to load after multiple attempts');
            }
            return;
        }

        // Check if swiper element exists
        if (!swiperElement) {
            if (attempt < maxRetries) {
                setTimeout(function () {
                    initRelatedPressReleasesSwiper(attempt + 1);
                }, retryDelay);
            } else {
                console.warn('RelatedPressReleases: Swiper element not found');
            }
            return;
        }

        // Check if already initialized
        if (swiperElement.swiper || swiperElement._swiperInstance) {
            console.log('RelatedPressReleases: Swiper already initialized');
            return;
        }

        // Check if wrapper and slides exist
        const wrapper = swiperElement.querySelector('.swiper-wrapper');
        if (!wrapper) {
            console.warn('RelatedPressReleases: Swiper wrapper not found');
            return;
        }

        const slides = wrapper.querySelectorAll('.swiper-slide');
        if (slides.length === 0) {
            console.warn('RelatedPressReleases: No Swiper slides found');
            return;
        }

        const sectionElement = swiperElement.closest('.related-press-releases-section');
        const prevButton = sectionElement ? sectionElement.querySelector('.related-press-releases-prev-btn') : null;
        const nextButton = sectionElement ? sectionElement.querySelector('.related-press-releases-next-btn') : null;

        const swiperConfig = {
            spaceBetween: 30,
            slidesPerView: 1,
            speed: 800,
            loop: false,
            watchOverflow: true,
            allowTouchMove: true,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1025: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        };

        // Only add navigation if buttons exist and there are multiple slides
        if (prevButton && nextButton && slides.length > 1) {
            swiperConfig.navigation = {
                nextEl: nextButton,
                prevEl: prevButton,
            };
        } else {
            // Hide navigation buttons if they exist but not needed
            if (prevButton) {
                prevButton.style.display = 'none';
            }
            if (nextButton) {
                nextButton.style.display = 'none';
            }
        }

        try {
            const swiperInstance = new Swiper(swiperElement, swiperConfig);
            swiperElement._swiperInstance = swiperInstance;
            
            // Force update to ensure styles are applied - use setTimeout to ensure DOM is ready
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
            
            console.log('RelatedPressReleases: Swiper initialized successfully with', slides.length, 'slides');
            console.log('RelatedPressReleases: Swiper config:', swiperConfig);
        } catch (error) {
            console.error('RelatedPressReleases: Error initializing Swiper', error);
        }
    };

    // Initialize with retry logic
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                initRelatedPressReleasesSwiper();
            }, 500);
        });
    } else {
        setTimeout(function () {
            initRelatedPressReleasesSwiper();
        }, 500);
    }

})();
