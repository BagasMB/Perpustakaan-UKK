<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Peminjaman</h4>
          <div class="breadcrumb__links">
            <a href="<?= base_url(); ?>">Home</a>
            <span>Peminjaman</span>
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
            <th>#Kode Peminjaman</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($peminjaman as $jem) : ?>
            <tr>
              <td>#<?= $jem->kode_peminjaman; ?></td>
              <td><?= $jem->tanggal_peminjaman; ?></td>
              <td><?= $jem->tanggal_pengembalian; ?></td>
              <td>
                <a href="<?= base_url('pinjam/detail/' . $jem->kode_peminjaman); ?>" class="btn btn-primary">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php if ($peminjaman == null) : ?>
            <tr class="text-center">
              <td colspan="4">Kamu belum pernah melakukan peminjaman <a href="<?= base_url('book'); ?>">pilih buku</a></td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
</section>
<!-- Shopping Cart Section End -->