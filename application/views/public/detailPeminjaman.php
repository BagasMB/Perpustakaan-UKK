<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Detail Peminjaman</h4>
          <div class="breadcrumb__links">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url('peminjaman-user'); ?>">Peminjaman</a>
            <span>Detail Peminjaman</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
  <div class="container">
    <div class="shopping__cart__table">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tanggal Dikembalikan</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($detail as $value) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value->judul; ?></td>
              <td><?= $value->penulis; ?></td>
              <td><?= $value->tanggal_pengembalian_real == '' ? '-' : $value->tanggal_pengembalian_real; ?></td>
              <td><span class="text-light badge bg-<?= $value->status == 'Proses' ? 'warning' : ($value->status == 'Dipinjam' ? 'primary' : ($value->status == 'Dikembalikan' ? 'success' : ($value->status == 'Ditolak' ? 'danger' : ($value->status == 'Terlambat' ? 'danger' : 'secondary')))); ?>"><?= $value->status; ?></span></td>
              <td>
                <?php if ($value->status == 'Dikembalikan') : ?>
                  <?php if ($this->session->userdata('role') == 'Peminjam') : ?>
                    <!-- Button Ulasan -->
                    <span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#modalUlasan<?= $value->id_ulasan; ?>">Ulasan</span>
                  <?php endif; ?>

                <?php elseif ($value->status == 'Terlambat') : ?>
                  <!-- Button Bayar Denda -->
                  <span data-bs-toggle="modal" data-bs-target="#modalDenda<?= $value->id_denda; ?>" class="badge bg-danger">Bayar Denda</span>

                  <!-- Button Ulasan jika buku sudah dikembalikan meskipun terlambat -->
                  <?php if ($this->session->userdata('role') == 'Peminjam' && $value->tanggal_pengembalian_real) : ?>
                    <span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#modalUlasan<?= $value->id_ulasan; ?>">Ulasan</span>
                  <?php endif; ?>

                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</section>
<!-- Shopping Cart Section End -->