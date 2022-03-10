<!-- load layout Template -->
<?=
$this->extend('layout/template');
?>

<?= $this->section('content')  ?>
<!-- start: content wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- start: Main Content -->
  <div id="content">

    <!-- start: Topbar -->
    <?= $this->include('layout/topBar'); ?>
    <!-- End: Topbar -->

    <!-- start: Page Content -->
    <div class="container-fluid">

      <!-- start: Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      </div>
      <!-- end: Page Heading -->

      <!-- Content Row -->
      <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
          <!-- Project Card -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Online Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- start: table -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Lokasi</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- load data online user from database -->
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($user as $u) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $u["nama"]; ?></td>
                        <td><?= $u["jabatan"]; ?></td>
                        <td><?= $u["real_address"]; ?></td>
                        <td><a href="/page/detailUser/<?= $u["nama"]; ?>/" class="detail">Lihat Detail</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- end: table -->
              </div>
            </div>
            <!-- Load pagination -->
            <?= $pager->links('userdata', 'user_pagination') ?>
          </div>
        </div>
      </div>
    </div>
    <!-- end: Page Content -->
  </div>
  <!-- End :  Main Content -->

  <!-- Load Footer -->
  <?= $this->include('layout/footer'); ?>
</div>
<!-- end : content wrapper -->
<?= $this->endsection(); ?>