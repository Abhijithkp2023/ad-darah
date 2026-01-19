/**
 * Virtual Tour Component
 * 
 * Handles 360-degree panorama viewer using Marzipano
 */

(function() {
    'use strict';

    let viewer = null;
    let scene = null;
    let view = null;
    let geometry = null;

    /**
     * Initialize Virtual Tour
     */
    const initVirtualTour = function() {
        const viewerContainer = document.getElementById('virtualTourViewer');

        if (!viewerContainer) {
            console.warn('Virtual Tour: Container not found');
            return;
        }

        // Wait for Marzipano to be available
        if (typeof window.marzipano === 'undefined') {
            // Retry after a short delay
            setTimeout(initVirtualTour, 100);
            return;
        }

        // Get panorama image from data attribute or use default
        const panoramaImage = viewerContainer.getAttribute('data-panorama-image') || 
                              'https://raw.githubusercontent.com/google/marzipano/master/demos/equirectangular/equirectangular.jpg';

        // Initialize Marzipano viewer
        viewer = new marzipano.Viewer(viewerContainer, {
            controls: {
                mouseViewMode: 'drag'
            }
        });

        // Create view
        view = viewer.view();
        view.setYaw(0);
        view.setPitch(0);
        view.setFov(view.fov());

        // Create geometry
        geometry = new marzipano.EquirectangularGeometry([{ width: 4000 }]);

        // Create view limiter
        const limiter = marzipano.util.compose(
            marzipano.RectilinearView.limit.vfov(0.6981317007977318, 1.9198621771937625),
            marzipano.RectilinearView.limit.hfov(0.6981317007977318, 1.9198621771937625),
            marzipano.RectilinearView.limit.pitch(-0.6981317007977318, 0.6981317007977318)
        );

        view.setLimiter(limiter);

        // Load panorama
        loadPanorama(panoramaImage);
    };

    /**
     * Load a panorama
     */
    const loadPanorama = function(imageUrl) {
        if (!viewer) {
            return;
        }
        
        // Create source
        const source = marzipano.ImageUrlSource.fromString(imageUrl);

        // Create scene
        scene = viewer.createScene({
            source: source,
            geometry: geometry,
            view: view,
            pinFirstLevel: true
        });

        // Switch to scene
        scene.switchTo({
            transitionDuration: 1000
        });
    };

    /**
     * Initialize on DOM ready
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initVirtualTour);
    } else {
        initVirtualTour();
    }

})();
