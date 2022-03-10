<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>tambah data</title>

  <!-- Load file icon-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Load link font nonito  -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Load file css-->
  <link rel="stylesheet" href="/css/style.css">


  <!-- leaflet reverse -->
  <!-- Load Leaflet from CDN -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" /> -->
  <!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@3.0.4/dist/esri-leaflet.js" integrity="sha512-oUArlxr7VpoY7f/dd3ZdUL7FGOvS79nXVVQhxlg6ij4Fhdc4QID43LUFRs7abwHNJ0EYWijiN5LP2ZRR2PY4hQ==" crossorigin=""></script>

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css" integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g==" crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.js" integrity="sha512-enHceDibjfw6LYtgWU03hke20nVTm+X5CRi9ity06lGQNtC9GkBNl/6LoER6XzSudGiXy++avi1EbIg9Ip4L1w==" crossorigin=""></script>
</head>

<body id="page-top">

  <!-- start: Page Wrapper -->
  <div id="wrapper">

    <p><?= $no_alat; ?></p>
    <p><?= $baterai; ?></p>
    <p><?= $log; ?></p>
    <p><?= $lat; ?></p>


  </div>
  <!-- End : Page Wrapper -->

  <!-- Load Bootstrap and JavaScript-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/vendor/bootstrap/js/bootstrap.js">

  <!-- Load plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script src="/js/sb-admin-2.min.js"></script> -->
  <script src="/js/sb-admin-2.js"></script>

  <!-- Load kit for icon -->
  <script src="https://kit.fontawesome.com/0e63b91b89.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- get data from arduino -->
  <script>
    let no_alat = <?= $no_alat; ?>;
    let baterai = <?= $baterai; ?>;
    let datalog = <?= $log; ?>;
    let datalat = <?= $lat; ?>;
    let status;
    // http://localhost:8080/Data/index?no_alat=0000000002&baterai=80&log=-7.334828527677&lat=112.8129251088566

    // leaflet API
    var api = "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU";

    // connect to API geocodeSerice
    var geocodeService = L.esri.Geocoding.geocodeService({
      apikey: "AAPKddb5110a35434ebda889e935236b017f7qiPwFxID6UHxUg4gv3bRAdyTM9VVdQmJxNglXUbvwWEL37CU7CdybpwH1Qt4WwU" // replace with your api key - https://developers.arcgis.com
    });

    // convert longitude and latitude to real address
    geocodeService.reverse().latlng([datalog, datalat]).run(function(error, result) {
      if (error) {
        return;
      }
      let real = result.address.Match_addr;
      // create link
      let dat = "no_alat=" + no_alat + "&baterai=" + baterai + "&status" + status + "&log=" + datalog + "&lat=" + datalat + "&real=" +
        real;
      // send link for update data in databasse
      window.location = "http://localhost:8080/Data/inputDataArduino?" + dat;
    });
  </script>
</body>

</html>