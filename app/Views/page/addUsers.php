<!-- load layout Template -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<!-- start content wrapper -->
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
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
      </div>
      <!-- Load Flasher -->
      <div class="alert-success">
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-6 mb-4">
          <!-- start: form Add Users -->
          <form action="/page/save" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama">
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="nomorid" class="form-label">Nomor ID Alat</label>
              <input type="text" class="form-control <?= ($validation->hasError('id')) ? 'is-invalid' : '' ?>" id="nomorid" name="nomorid">
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('id'); ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan:</label>
              <select id="jabatan" name="jabatan" class=" form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>">
                <option>.......</option>
                <option value="HRD">HRD</option>
                <option value="programer">Programer</option>
                <option value="bisnis manajer">Bisnis Manajer</option>
              </select>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <?= $validation->getError('jabatan'); ?>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <!-- end: form Add Users -->
        </div>
      </div>
    </div>
    <!-- end: Page Content -->
  </div>
  <!-- End: Main Content -->

  <!-- Load Footer -->
  <?= $this->include('layout/footer'); ?>

</div>
<!-- End: Content Wrapper -->
<?= $this->endsection(); ?>