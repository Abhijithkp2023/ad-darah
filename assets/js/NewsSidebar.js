/**
 * NewsSidebar Component JavaScript
 * 
 * Handles copy link functionality for the share section
 */

(function () {
    'use strict';

    const initCopyLink = function () {
        const copyButton = document.querySelector('[data-copy-link]');
        if (!copyButton) {
            return;
        }

        copyButton.addEventListener('click', function (e) {
            e.preventDefault();
            
            const currentUrl = window.location.href;
            
            // Copy to clipboard
            navigator.clipboard.writeText(currentUrl).then(function () {
                // Visual feedback
                const originalHTML = copyButton.innerHTML;
                copyButton.innerHTML = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="currentColor"/></svg>';
                copyButton.style.color = '#28a745';
                
                setTimeout(function () {
                    copyButton.innerHTML = originalHTML;
                    copyButton.style.color = '';
                }, 2000);
            }).catch(function (err) {
                console.error('Failed to copy link:', err);
                // Fallback: show alert
                alert('Failed to copy link. Please copy manually: ' + currentUrl);
            });
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            initCopyLink();
        });
    } else {
        initCopyLink();
    }

})();

