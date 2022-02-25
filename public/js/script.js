// var map = L.map('map').setView([51.505, -0.09], 13);
// var api = "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU";
// var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
//     maxZoom: 18,
//     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
//         'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
//     id: 'mapbox/streets-v11',
//     tileSize: 512,
//     zoomOffset: -1
// }).addTo(map);

// var marker = L.marker([-7.3184099093611, 112.79936398244331]).addTo(map)
//     .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

// var popup = L.popup()
//     .setLatLng([-7.3184099093611, 112.79936398244331])
//     .setContent('I am a standalone popup.')
//     .openOn(map);

// function onMapClick(e) {
//     popup
//         .setLatLng(e.latlng)
//         .setContent('You clicked the map at ' + e.latlng.toString())
//         .openOn(map);
// }

// map.on('click', onMapClick);

var map = L.map('map').setView([51.505, -0.09], 13);
var api = "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU";
var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);

var geocodeService = L.esri.Geocoding.geocodeService({
    apikey: "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU" // replace with your api key - https://developers.arcgis.com
});

// var marker = L.marker([-7.3184099093611, 112.79936398244331]).addTo(map)
//     .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

// var popup = L.popup()
//     .setLatLng([-7.3184099093611, 112.79936398244331])
//     .setContent('I am a standalone popup.')
//     .openOn(map);
    
    // tambahan
    $.getJSON('http://localhost:8080/page/getDataUsers', function(data){
      $.each(data, function(i, dat){
        var marker = L.marker([data[i]['log'], data[i]['lat']]).addTo(map)
        // .bindPopup(result.address.Match_addr).openPopup(); 

        var popup = L.popup()
            .setLatLng([data[i]['log'], data[i]['lat']])
            .setContent('I am a standalone popup.')
            .openOn(map);
        
            geocodeService.reverse().latlng([data[i]['log'], data[i]['lat']]).run(function (error, result) {
              if (error) {
                return;
              }
              
              console.log(result.address.Match_addr);
            });
      });
    });

// function onMapClick(e) {
//     popup
//         .setLatLng(e.latlng)
//         .setContent('You clicked the map at ' + e.latlng.toString())
//         .openOn(map);
// }

// map.on('click', onMapClick);

map.on('click', function (e) {
    geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
      if (error) {
        return;
      }

      L.marker(result.latlng).addTo(map).bindPopup(result.address.Match_addr).openPopup();
      console.log(result.address.Match_addr);
    });
  });

