<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Favorit</h4>
          <div class="breadcrumb__links">
            <a href="<?= base_url(); ?>">Home</a>
            <span>Favorit</span>
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
      <div class="col-lg-12">
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
              <?php foreach ($koleksi as $kolek) : ?>
                <tr>
                  <td class="product__cart__item">
                    <div class="product__cart__item__pic">
                      <img src="<?= base_url('assets/img/buku/' . $kolek->foto); ?>" width="100" alt="">
                    </div>
                    <div class="product__cart__item__text">
                      <h5><?= $kolek->judul; ?></h5>
                      <p><?= $kolek->tahun_terbit; ?></p>
                    </div>
                  </td>
                  <td><?= $kolek->penulis; ?></td>
                  <td><?= $kolek->penerbit; ?></td>
                  <td class="cart__close">
                    <a href="<?= base_url('favorit/hapus/' . $kolek->id_koleksi); ?>" id="btn-hapus"><i class="fa fa-close"></i></a>
                    <a href="<?= base_url('add-keranjang/' . $kolek->id_buku); ?>" id="btn-keranjang"><i class="fa fa-shopping-cart"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shopping Cart Section End -->