<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Keranjang</h4>
          <div class="breadcrumb__links">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url('pinjam'); ?>">Peminjaman</a>
            <span>Keranjang</span>
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
    <div class="row">
      <div class="col-lg-8">
        <div class="shopping__cart__table">
          <table>
            <thead>
              <tr>
                <th>Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datatemp as $tem) : ?>
                <tr>
                  <td class="product__cart__item">
                    <div class="product__cart__item__pic">
                      <img src="<?= base_url('assets/img/buku/' . $tem->foto); ?>" width="100" alt="">
                    </div>
                    <div class="product__cart__item__text">
                      <h5><?= $tem->judul; ?></h5>
                      <p><?= $tem->tahun_terbit; ?></p>
                    </div>
                  </td>
                  <td><?= $tem->penulis; ?></td>
                  <td><?= $tem->penerbit; ?></td>
                  <td class="cart__close"><a href="<?= base_url('hpskeranjang/' . $tem->id_temp); ?>" id="btn-hapus"><i class="fa fa-close"></i></a></td>
                </tr>
              <?php endforeach; ?>
              <?php if ($datatemp == null) : ?>
                <tr class="text-center">
                  <td colspan="4">Keranjang anda kosong silahkan <a href="<?= base_url('book'); ?>">pilih buku</a> terlebih dahulu</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-4">
        <form action="<?= base_url('peminjaman/proses'); ?>" method="post" class="cart__total">
          <h6>Ajukan Tanggal Pengembalian</h6>
          <div class="form-group">
            <input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+14 days')); ?>" required  name="tanggal_pengembalian">
          </div>
          <button type="submit" class="primary-btn">Ajukan</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Shopping Cart Section End -->