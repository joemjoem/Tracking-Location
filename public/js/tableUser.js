
$.getJSON('http://localhost:8080/page/getDataUsers', function(data){
var number = 1;
var api = "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU";

// menghubungkan dengan API geocodeSerice
var geocodeService = L.esri.Geocoding.geocodeService({
    apikey: "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU" // replace with your api key - https://developers.arcgis.com
});
    
      $.each(data, function(i, dat){

            geocodeService.reverse().latlng([data[i]['log'], data[i]['lat']]).run(function (error, result) {
              if (error) {
                return;
              }
              $('.table-body').append(`
                  <tr>
                    <td>`+(number++)+`</td>
                    <td>`+data[i]['nama']+`</td>
                    <td>`+data[i]['jabatan']+`</td>
                    <td>`+ result.address.Match_addr +`</td>
                    <td><a href="/page/detailUser/` + data[i]['nama'] +`" class="detail">Lihat Detail</a></td>
                  </tr>
              `);
            });
      });
    });
