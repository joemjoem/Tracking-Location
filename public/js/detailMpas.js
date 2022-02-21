var detailmap = L.map('detail-maps').setView([51.505, -0.09], 13);
var tiles2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(detailmap);

var marker2 = L.marker([51.5, -0.09]).addTo(detailmap)
    .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

var popup2 = L.popup()
    .setLatLng([51.513, -0.09])
    .setContent('I am a standalone popup.')
    .openOn(detailmap);

function onMapClick2(e) {
    popup
        .setLatLng(e.latlng)
        .setContent('You clicked the map at ' + e.latlng.toString())
        .openOn(detailmap);
}
detailmap.on('click', onMapClick2);