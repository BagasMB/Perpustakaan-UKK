<section class="section">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h5 class="card-title"><?= $title; ?></h5>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
        Tambah
      </button>
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
              <th>Tahun Terbit</th>
              <th>Kategori</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($koleksi as  $value): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->judul; ?></td>
                <td><?= $value->penulis; ?></td>
                <td><?= $value->penerbit; ?></td>
                <td><?= $value->tahun_terbit; ?></td>
                <td><?= $value->nama_kategori; ?></td>
                <td>
                  <a href="<?= base_url('peminjaman/peminjaman-buku/' . $value->id_buku); ?>" class="badge bg-warning">Pinjam</a>
                  <a href="<?= base_url('koleksi/hapus/' . $value->id_koleksi); ?>" id="btn-hapus" class="badge bg-danger">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>