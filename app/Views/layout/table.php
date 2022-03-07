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
  <!-- <tbody class="table-body"> -->
  <tbody>
    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
    <?php foreach ($user as $u) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $u["nama"]; ?></td>
        <td><?= $u["jabatan"]; ?></td>
        <td><?= $u["real_address"]; ?></td>
        <td><a href="/page/detailUser/<?= $u["nama"]; ?>" class="detail">Lihat Detail</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>