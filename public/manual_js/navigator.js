// Requires <div id="locationplace"></div> in your HTML
const location_place = document.getElementById("locationplace");

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(show_position, error_position, {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0,
  });
} else {
  location_place.insertAdjacentText("beforeend", "Geolocation not supported");
}

async function show_position(position) {
  const lat = position.coords.latitude;
  const lon = position.coords.longitude;

  console.log(`latitude: ${lat}, longitude: ${lon}`);

  try {
    const response = await fetch(
      `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&addressdetails=1&zoom=10`,
      {
        headers: { "Accept-Language": "en", "User-Agent": "location-script" },
      }
    );

    const data = await response.json();

    // ✅ Console log the entire API response
    console.log("API response:", data);

    // Extract readable parts
    const a = data.address || {};
    const city =
      a.city || a.town || a.village || a.suburb || a.neighbourhood || "";
    const region = a.state || a.county || "";
    const country = a.country || "";

    const locationText = [city, region, country].filter(Boolean).join(", ");
    location_place.insertAdjacentText(
      "beforeend",
      locationText || "Location not found"
    );
  } catch (err) {
    console.error("Reverse geocode error:", err);
    location_place.insertAdjacentText("beforeend", "not found");
  }
}

function error_position(err) {
  console.warn("Geolocation error:", err);
  location_place.insertAdjacentText("beforeend", "not found");
}
