<section class="section">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h5 class="card-title"><?= $title; ?></h5>
    </div>
    <div class="card-body">
      <div class="table-responsive datatable-minimal">
        <table class="table" id="table2">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Peminjaman</th>
              <th>Nama Peminjam</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($peminjaman as  $value): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['kode_peminjaman']; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['tanggal_peminjaman']; ?></td>
                <td><?= $value['tanggal_pengembalian']; ?></td>
                <td>
                  <a href="<?= base_url('peminjaman/detail/' . $value['kode_peminjaman']); ?>" class="badge bg-primary">Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>