<section class="section">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h5 class="card-title"><?= $title; ?></h5>
      <a href="<?= base_url('buku'); ?>" type="button" class="btn btn-primary">
        Tambah
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive datatable-minimal">
        <table class="table" id="table2">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Penerbit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($datatemp as  $value): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->judul; ?></td>
                <td><?= $value->penulis; ?></td>
                <td><?= $value->penerbit; ?></td>
                <td>
                  <a href="<?= base_url('peminjaman/hapusKeranjang/' . $value->id_temp); ?>" id="btn-hapus" class="badge bg-danger">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php if ($datatemp != null) : ?>
        <form action="<?= base_url('peminjaman/prosesPeminjaman'); ?>" class="mt-2" method="post">
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+14 days')); ?>" name="tanggal_pengembalian">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ajukan Peminjam</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</section>