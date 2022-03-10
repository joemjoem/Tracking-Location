var map = L.map('map').setView([<?= $detail["log"]; ?>, <?= $detail["lat"]; ?>], 13);
var api = "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU";
var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18,
  attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1
}).addTo(map);

var marker = L.marker([<?= $detail["log"]; ?>, <?= $detail["lat"]; ?>]).addTo(map)
  .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

var popup = L.popup()
  .setLatLng([<?= $detail["log"]; ?>, <?= $detail["lat"]; ?>])
  .setContent('I am here.')
  .openOn(map);

// tambahan


function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent('You clicked the map at ' + e.latlng.toString())
    .openOn(map);
}

map.on('click', onMapClick);