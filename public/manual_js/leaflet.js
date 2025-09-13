

    document.addEventListener('DOMContentLoaded', function () {

      const DEFAULT_CENTER = [20.5937, 78.9629];
      const DEFAULT_ZOOM = 5;

      const map = L.map('venueMap').setView(DEFAULT_CENTER, DEFAULT_ZOOM);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
      }).addTo(map);

      const latInput = document.getElementById('latitude');
      const lngInput = document.getElementById('longitude');
      const addrInput = document.getElementById('venue_address');
      const cityInput = document.getElementById('venue_city');
      let marker;

      function setMarker(lat, lng, zoom=null){
        const latlng = L.latLng(lat, lng);
        if (!marker){
          marker = L.marker(latlng, { draggable: true }).addTo(map);
          marker.on('dragend', () => {
            const pos = marker.getLatLng();
            latInput.value = pos.lat.toFixed(6);
            lngInput.value = pos.lng.toFixed(6);
          });
        } else {
          marker.setLatLng(latlng);
        }
        latInput.value = latlng.lat.toFixed(6);
        lngInput.value = latlng.lng.toFixed(6);
        if (zoom) map.setView(latlng, zoom);
      }

      // Click on map to set marker
      map.on('click', (e) => setMarker(e.latlng.lat, e.latlng.lng));

      // 🔎 Geocoder search box on the map (Nominatim, no API key)
      L.Control.geocoder({
        defaultMarkGeocode: false,
        placeholder: 'Search location…',
        errorMessage: 'Nothing found.',
        showResultIcons: true
      })
      .on('markgeocode', function(e) {

        const c = e.geocode.center;      // LatLng
        const name = e.geocode.name || ''; // Display name / address line
        setMarker(c.lat, c.lng, 16);

        // Fill address fields (best-effort)
        console.log('hi')
        if (addrInput) addrInput.value = name;
        const p = e.geocode.properties || {};
        // console.log(p)
        const city = p.city || p.town || p.village || p.county || p.state || '';
        if (cityInput && city) cityInput.value = city;
      })
      .addTo(map);

      // Use my location
      document.getElementById('useMyLocation').addEventListener('click', () => {
        if (!navigator.geolocation) return alert('Geolocation not supported');
        navigator.geolocation.getCurrentPosition(
          (pos) => setMarker(pos.coords.latitude, pos.coords.longitude, 15),
          () => alert('Unable to fetch location')
        );
      });

      // Clear pin
      document.getElementById('clearPin').addEventListener('click', () => {
        if (marker) { map.removeLayer(marker); marker = null; }
        latInput.value = ''; lngInput.value = '';
        map.setView(DEFAULT_CENTER, DEFAULT_ZOOM);
      });

      // Prefill (edit/old values)
      const preLat = parseFloat(latInput.value);
      const preLng = parseFloat(lngInput.value);
      if (!isNaN(preLat) && !isNaN(preLng)) setMarker(preLat, preLng, 15);
    });

