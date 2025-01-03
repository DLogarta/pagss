function loadGoogleMapsAPI(apiKey, callbackName) {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=${callbackName}`;
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
}

function initMap() {
    // Philippines coordinates (center of the map)
    const philippinesCenter = {
        lat: 12.8797,
        lng: 121.7740
    };

    // Airport data (coordinates, name, and address)
    const airports = [
        {
            position: { lat: 15.1860, lng: 120.5586 },
            name: "Clark International Airport",
            address: "Clark International Airport Andres Bonifacio Avenue, Zone, Clark Freeport, Mabalacat, 2023 Pampanga"
        },
        {
            position: { lat: 14.5086, lng: 121.0193 },
            name: "Ninoy Aquino International Airport",
            address: "Pasay, 1300 Metro Manila"
        },
        {
            position: { lat: 11.6792, lng: 122.3763 },
            name: "Kalibo International Airport",
            address: "Kalibo International Airport Access Road, Kalibo, 5600 Aklan"
        },
        {
            position: { lat: 10.8336, lng: 122.4930 },
            name: "Iloilo International Airport",
            address: "Iloilo Airport Access Road, Cabatuan 5031, Iloilo"
        },
        {
            position: { lat: 9.7401, lng: 118.7587 },
            name: "Puerto Princesa International Airport",
            address: "Rizal Avenue, Barangay San Miguel, Puerto Princesa, 5300 Palawan"
        },
        {
            position: { lat: 10.3075, lng: 123.9790 },
            name: "Mactan-Cebu International Airport",
            address: "Lapu-Lapu Airport Rd, Lapu-Lapu City, 6016 Cebu"
        },
        {
            position: { lat: 7.1265, lng: 125.6463 },
            name: "Davao International Airport",
            address: "Daang Maharlika Hwy, Buhangin, Davao City, 8000 Davao del Sur"
        }
    ];

    // Map style for custom appearance
    const mapStyle = [
        {
            "elementType": "geometry",
            "stylers": [{ "color": "#4C4C4E" }]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [{ "color": "#000000" }]
        },
        {
            "featureType": "landscape",
            "stylers": [{ "color": "#ffffff" }]
        },
        {
            "featureType": "water",
            "stylers": [{ "color": "#4C4C4E" }]
        }
    ];

    // Create the map, centered on the Philippines
    const map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 6,
        center: philippinesCenter,
        styles: mapStyle,
        streetViewControl: false,
    });

    // Variable to store the currently active info window
    let activeInfoWindow = null;

    // Add markers and info windows for each airport
    airports.forEach(airport => {
        const marker = new google.maps.Marker({
            position: airport.position,
            map: map,
            title: airport.name
        });

        const infoContent = `
            <div>
                <h3>${airport.name}</h3>
                <p>${airport.address}</p>
            </div>
        `;

        const infoWindow = new google.maps.InfoWindow({
            content: infoContent
        });

        marker.addListener('click', () => {
            // Close the currently active info window if any
            if (activeInfoWindow) {
                activeInfoWindow.close();
            }
            // Open the clicked marker's info window
            infoWindow.open(map, marker);
            // Set this info window as the active one
            activeInfoWindow = infoWindow;
        });
    });
}

// Load Google Maps API
loadGoogleMapsAPI('AIzaSyBf6zPfPtIjoQeyD3pVi788U8PoFSPV0mw', 'initMap');