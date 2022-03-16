<!-- load layout Template -->
<?=
$this->extend('layout/template');
?>

<?= $this->section('content')  ?>
<!-- start content wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <?= $this->include('layout/topBar'); ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail User</h1>
        <a href="/page/<?= $back; ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fa-solid fa-angle-left fa-sm text-white-50"></i> Kembali</a>
      </div>

      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Lokasi User</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="display-maps">
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <!-- pesan sukses update data -->
            <div class="card-body">
              <div class="alert-success">
                <?php if (session()->getFlashdata('update')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('update'); ?>
                  </div>
                <?php endif; ?>
              </div>
              <!-- akhir pesan sukses update data -->

              <div class="user d-flex justify-content-between align-items-center">
                <h5 class="card-title">Nama : <?= $detail["nama"]; ?></h5>
                <p>Status: <?= $detail["status"]; ?></p>
              </div>
              <p>Jabatan : <?= $detail["jabatan"]; ?></p>
              <div class="status-bateray d-flex align-items-center">
                <p>Status Baterai : <?= $detail["baterai"]; ?>% </p>
                <i class="fa-solid fa-battery-full mb-3 mx-2"></i>
              </div>
              <div class="look-location d-flex justify-content-between align-items-end">
                <p class="card-text mb-0">Lokasi : <?= $detail["real_address"]; ?></p>
                <div class="btn-aksi">
                  <a href="/page/edit/<?= $detail["nama"]; ?>" class="btn btn-warning btn-icon-split px-3">Edit</a>
                  <form action="/data/delete/<?= $detail["id"]; ?>" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-icon-split px-3" onclick="return confirm('apakah anda yakin?')"> Delete</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- coba -->
      <p class="statusRyan"></p>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->


  <!-- Footer -->
  <?= $this->include('layout/footer'); ?>
  <!-- End of Footer -->

</div>
<!-- end: content wrapper -->
<script>
  // <!-- uji coba javascript -->

  let link = "http://localhost:8080/page/statusUser/Ryan_Nala_Kusuma";
  let link2 = "http://localhost:8080/page/statusUser/bagus" + " " + "jumantoro";
  setInterval(function() {
    $('.statusRyan').load(link2);
  }, 1000);
</script>


<?= $this->endsection(); ?>