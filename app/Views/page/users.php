<!-- load layout Template -->
<?= $this->extend('/layout/template'); ?>

<?= $this->section('content') ?>
<!-- start: content wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- start: Main Content -->
  <div id="content">

    <!-- start: Topbar -->
    <?= $this->include('layout/topBar'); ?>
    <!-- End of Topbar -->

    <!-- start: Page Content -->
    <div class="container-fluid">

      <!-- start: Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="/page/addUsers" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus fa-sm text-white-50"></i> Add Users</a>
      </div>
      <!-- end: Page Heading -->

      <!-- Content Row -->
      <div class="row">

        <!-- All Admin Card -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    All Admin</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                  <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- All Users card -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    All Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Online Users card -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Online Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $online; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fa-solid fa-globe fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Offline Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Offline Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $offline; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fa-solid fa-exclamation fa-2x text-gray-300"></i>
                </div>
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
              <h6 class="m-0 font-weight-bold text-primary"> Users</h6>
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
                      <th>Status</th>
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
                        <td><?= $u["status"]; ?></td>
                        <td><a href="/page/detailUser/<?= $u["nama"]; ?>/users" class="detail">Lihat Detail</a></td>
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
  <!-- End: Main Content -->

  <!-- Load Footer -->
  <?= $this->include('/layout/footer'); ?>
</div>
<!-- End: Content Wrapper -->
<?= $this->endsection(); ?>