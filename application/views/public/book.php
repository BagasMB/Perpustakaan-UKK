<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Book</h4>
          <div class="breadcrumb__links">
            <?php $men = $this->uri->segment(2); ?>
            <a href="<?= base_url(); ?>">Home</a>
            <?php if ($men == "category") : ?>
              <a href="<?= base_url('book'); ?>">Book</a>
              <span>Categories</span>
            <?php else : ?>
              <span>Book</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="shop__sidebar">
          <div class="shop__sidebar__search">
            <form action="#">
              <input type="text" placeholder="Search...">
              <button type="submit"><span class="icon_search"></span></button>
            </form>
          </div>
          <div class="shop__sidebar__accordion">
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-heading">
                  <a href="<?= base_url('book'); ?>" data-toggle="collapse" data-target="#collapseOne">Categories</a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="shop__sidebar__categories">
                      <ul class="nice-scroll">
                        <?php foreach ($kategori as $kae) : ?>
                          <li><a href="<?= base_url('book/category/' . $kae->id_kategori); ?>"><?= $kae->nama_kategori; ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bagian Book -->
      <div class="col-lg-9">
        <div class="shop__product__option">
          <div class="section-title">
            <h2>Daftar Buku</h2>
            <span>Category : <?= $men == "category" ? $nama_kategori : 'All'; ?></span>
          </div>
        </div>
        <div class="row">
          <?php foreach ($buku as $buk) : ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product__item sale">
                <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/buku/' . $buk->foto); ?>">
                  <span class="label"><?= $buk->stok == 0 ? 'Tidak Tersedia' : 'Tersedia'; ?></span>
                  <ul class="product__hover">
                    <li>
                      <a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/icon/heart.png" alt=""><span>Favorit</span></a>
                    </li>
                    <li>
                      <a href="<?= base_url('add-keranjang/' . $buk->id_buku); ?>" id="btn-keranjang"><img src="<?= base_url('assets/frontend/'); ?>img/icon/cart.png" alt=""><span>Add Cart</span></a>
                    </li>
                    <li>
                      <a href="<?= base_url('book/detail/' . $buk->id_buku); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/search.png" alt=""><span>Detail</span></a>
                    </li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6><?= $buk->judul; ?></h6>
                  <a href="<?= base_url('book/category/' . $buk->id_kategori); ?>" class="add-cart">Category : <?= $buk->nama_kategori; ?></a>
                  <div class="rating">
                    <?= $buk->rating == null ? '' : 'Rating'; ?>
                    <span class="text-danger"><?= $buk->rating == null ? 'Belum di Rating' : $buk->rating . ' / 5'; ?></span>
                    <!-- <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i> -->
                  </div>
                  <h6>Penulis : <?= $buk->penulis; ?></h6>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="product__pagination">
              <a class="active" href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <span>...</span>
              <a href="#">21</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->