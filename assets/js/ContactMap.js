/**
 * Contact Map Component
 * 
 * Handles Google Maps initialization with Snazzy Maps styling and multiple markers
 */

(function() {
    'use strict';

    let map = null;
    let markers = [];

    /**
     * Initialize Contact Map
     */
    const initContactMap = function() {
        const mapContainer = document.getElementById('contactMap');

        if (!mapContainer) {
            return;
        }

        // Check if config is available
        if (typeof window.contactMapConfig === 'undefined') {
            console.warn('ContactMap: Configuration not found');
            return;
        }

        const config = window.contactMapConfig;

        // Check if Google Maps API is loaded
        if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
            // Load Google Maps API
            const callbackName = 'initContactMapCallback_' + Date.now();
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=${config.apiKey}&callback=${callbackName}`;
            script.async = true;
            script.defer = true;
            
            // Set global callback
            window[callbackName] = function() {
                createMap(mapContainer, config);
                // Clean up callback
                delete window[callbackName];
            };
            
            document.head.appendChild(script);
        } else {
            // Google Maps already loaded
            createMap(mapContainer, config);
        }
    };

    /**
     * Create the map with markers
     */
    const createMap = function(container, config) {
        if (!config.markers || config.markers.length === 0) {
            console.warn('ContactMap: No markers configured');
            return;
        }

        // Get center from first marker or calculate center from all markers
        let centerLat = parseFloat(config.markers[0].latitude);
        let centerLng = parseFloat(config.markers[0].longitude);

        // If multiple markers, calculate center
        if (config.markers.length > 1) {
            let totalLat = 0;
            let totalLng = 0;
            config.markers.forEach(function(marker) {
                totalLat += parseFloat(marker.latitude);
                totalLng += parseFloat(marker.longitude);
            });
            centerLat = totalLat / config.markers.length;
            centerLng = totalLng / config.markers.length;
        }

        // Snazzy Maps style - Light theme
        const snazzyMapStyle = [
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e9e9e9"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 18
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#dedede"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "saturation": 36
                    },
                    {
                        "color": "#333333"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f2f2f2"
                    },
                    {
                        "lightness": 19
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            }
        ];

        // Map options
        const mapOptions = {
            zoom: parseInt(config.zoom) || 14,
            center: { lat: centerLat, lng: centerLng },
            styles: snazzyMapStyle,
            disableDefaultUI: false,
            zoomControl: true,
            mapTypeControl: false,
            scaleControl: true,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: true
        };

        // Create map
        map = new google.maps.Map(container, mapOptions);

        // Add markers
        config.markers.forEach(function(markerData) {
            const marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(markerData.latitude),
                    lng: parseFloat(markerData.longitude)
                },
                map: map,
                title: markerData.title || '',
                icon: config.markerIcon || null
            });

            // Add info window if address or title is provided
            if (markerData.title || markerData.address) {
                const infoWindow = new google.maps.InfoWindow({
                    content: '<div style="padding: 10px;"><h3 style="margin: 0 0 5px 0; font-size: 16px;">' + 
                             (markerData.title || '') + '</h3>' +
                             (markerData.address ? '<p style="margin: 0; font-size: 14px;">' + markerData.address + '</p>' : '') +
                             '</div>'
                });

                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            }

            markers.push(marker);
        });

        // Fit bounds if multiple markers
        if (markers.length > 1) {
            const bounds = new google.maps.LatLngBounds();
            markers.forEach(function(marker) {
                bounds.extend(marker.getPosition());
            });
            map.fitBounds(bounds);
        }
    };

    /**
     * Wait for DOM and initialize
     */
    const waitForReady = function() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(initContactMap, 100);
            });
        } else {
            setTimeout(initContactMap, 100);
        }
    };

    // Initialize when ready
    waitForReady();

})();

