  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="hero__slider owl-carousel">
      <div class="hero__items set-bg" data-setbg="<?= base_url('assets/img/hero/library.jpg'); ?>">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-7 col-md-8">
              <div class="hero__text">
                <h6>Perpuskanda</h6>
                <h2 class="text-light">Perpustakaan Skandakra</h2>
                <p class="text-light">Buku adalah jendela dunia. Semakin banyak kamu membaca, semakin luas dunia yang kamu jelajahi..</p>
                <a href="#buku" class="primary-btn">Buku Baru <span class="arrow_right"></span></a>
                <div class="hero__social">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Product Section Begin -->
  <section id="buku" class="product spad pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <span>Daftar Buku</span>
            <h2>Perpuskanda</h2>
          </div>
        </div>
      </div>
      <div class="row product__filter">
        <?php foreach ($buku as $value) : ?>
          <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/buku/' . $value->foto); ?>">
                <span class="label">New</span>
                <ul class="product__hover">
                  <li>
                    <a href="<?= base_url('favorit/tambah/' . $value->id_buku); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/heart.png" alt=""><span>Favorit</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url('add-keranjang/' . $value->id_buku); ?>" id="btn-keranjang"><img src="<?= base_url('assets/frontend/'); ?>img/icon/cart.png" alt=""><span>Add Cart</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url('book/detail/' . $value->id_buku); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/search.png" alt=""><span>Detail</span></a>
                  </li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><?= $value->judul; ?></h6>
                <a href="<?= base_url('book/category/' . $value->id_kategori); ?>" class="add-cart">Category : <?= $value->nama_kategori; ?></a>
                <div class="rating">
                  <?= $value->rating == null ? '' : 'Rating'; ?>
                  <span class="text-danger"><?= $value->rating == null ? 'Belum di rating' : $value->rating . ' / 5'; ?></span>
                  <!-- <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i> -->
                </div>
                <h6>Penulis : <?= $value->penulis; ?></h6>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- Product Section End -->

  <!-- Instagram Section Begin -->
  <section class="categories spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="instagram__pic">
            <div class="instagram__pic__item set-bg" data-setbg="<?= base_url('assets/img/instagram/1.jpeg'); ?>"></div>
            <div class="instagram__pic__item set-bg" data-setbg="<?= base_url('assets/img/instagram/2.jpeg'); ?>"></div>
            <div class="instagram__pic__item set-bg" data-setbg="<?= base_url('assets/img/instagram/3.jpeg'); ?>"></div>
            <div class="instagram__pic__item set-bg" data-setbg="<?= base_url('assets/img/instagram/4.jpeg'); ?>"></div>
            <div class="instagram__pic__item set-bg" data-setbg="<?= base_url('assets/img/instagram/5.jpeg'); ?>"></div>
            <div class="instagram__pic__item set-bg" data-setbg="<?= base_url('assets/img/instagram/6.jpeg'); ?>"></div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="instagram__text">
            <h2>Ayoo</h2>
            <p>"Ada banyak cerita yang menunggu untuk ditemukan. Siap memulai petualanganmu hari ini?"</p>
            <h3>#48</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Instagram Section End -->