const location_place=document.getElementById('locationplace')
if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(show_position, error_position, { enableHighAccuracy: true, timeout: 5000, maximumAge: 0 });
}
async function show_position(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    console.log(`latitude: ${latitude}, longitude: ${longitude}`);
    try{
    const response=await fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`)
    const data=await response.json()
    console.log(data)
    location_place.insertAdjacentText("beforeend",data.locality)}
    catch(err){
        console.log(`naviagator error ${err}`)
    }
}
function error_position(){
    document.getElementById("locationplace").insertAdjacentText("beforeend", "not found");
}
