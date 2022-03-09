<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<p><?= $no_alat; ?></p>
<p><?= $baterai; ?></p>
<p><?= $log; ?></p>
<p><?= $lat; ?></p>

<div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    let no_alat = <?= $no_alat; ?>;
    let baterai = <?= $baterai; ?>;
    let datalog = <?= $log; ?>;
    let datalat = <?= $lat; ?>;
    let status;
    // http://localhost:8080/Data/index?no_alat=0000000002&baterai=80&log=-7.334828527677&lat=112.8129251088566

    // leaflet API
    var api = "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU";

    // menghubungkan dengan API geocodeSerice
    var geocodeService = L.esri.Geocoding.geocodeService({
      apikey: "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU" // replace with your api key - https://developers.arcgis.com
    });

    geocodeService.reverse().latlng([datalog, datalat]).run(function(error, result) {
      if (error) {
        return;
      }
      let real = result.address.Match_addr;
      let dat = "no_alat=" + no_alat + "&baterai=" + baterai + "&status" + status + "&log=" + datalog + "&lat=" + datalat + "&real=" +
        real;
      window.location = "http://localhost:8080/Data/inputDataArduino?" + dat;
    });
  </script>
</div>
<?= $this->endsection(); ?>