<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Book</h4>
          <div class="breadcrumb__links">
            <a href="<?= base_url(); ?>">Home</a>
            <span>Book</span>
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
                  <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="shop__sidebar__categories">
                      <ul class="nice-scroll">
                        <?php foreach ($kategori as $kae) : ?>
                          <li><a href="<?= base_url('book'); ?>"><?= $kae->nama_kategori; ?></a></li>
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
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="shop__product__option__left">
                <p>Showing 1–12 of 126 results</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="shop__product__option__right">
                <p>Sort by Price:</p>
                <select>
                  <option value="">Low To High</option>
                  <option value="">$0 - $55</option>
                  <option value="">$55 - $100</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($buku as $buk) : ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product__item sale">
                <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/buku/' . $buk->foto); ?>">
                  <span class="label">Sale</span>
                  <ul class="product__hover">
                    <li><a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/icon/heart.png" alt=""><span>Favorit</span></a></li>
                    <li><a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/icon/compare.png" alt=""><span>Compare</span></a>
                    </li>
                    <li><a href="<?= base_url('book/detail/' . $buk->id_buku); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/search.png" alt=""><span>Detail</span></a></li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6><?= $buk->judul; ?></h6>
                  <a href="#" class="add-cart">Categories : <?= $buk->nama_kategori; ?></a>
                  <div class="rating">
                    Rating
                    <span class="text-danger"><?= $buk->rating == null ? 0 : $buk->rating; ?> / 5</span>
                    <!-- <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i> -->
                  </div>
                  <!-- <h5>$43.48</h5> -->
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