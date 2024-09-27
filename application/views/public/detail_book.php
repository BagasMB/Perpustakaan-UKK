<!-- Shop Details Section Begin -->
<section class="shop-details">
  <div class="product__details__pic">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="product__details__breadcrumb">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url('book'); ?>">Book</a>
            <span>Book Details</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                <div class="product__thumb__pic set-bg" data-setbg="<?= base_url('assets/img/buku/' . $book->foto); ?>">
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                <div class="product__thumb__pic set-bg" data-setbg="<?= base_url('assets/img/buku/' . $book->foto); ?>">
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="product__details__pic__item">
                <img src="<?= base_url('assets/img/buku/' . $book->foto); ?>" alt="">
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="product__details__pic__item">
                <img src="<?= base_url('assets/img/buku/' . $book->foto); ?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="product__details__content">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="product__details__text">
            <h4><?= $book->judul; ?></h4>
            <div class="rating">
              Rating <span class="text-danger"><?= $book->rating == null ? 0 : $book->rating; ?> / 5</span>
              <!-- <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i> -->
              <span>(<?= $jmlOrgRating; ?>) Reviews</span>
              <h6><span>Categories:</span> <?= $book->nama_kategori; ?></h6>
            </div>
            <p><?= $book->sinopsis; ?></p>
            <div class="product__details__cart__option">
              <a href="#" class="primary-btn">add to cart</a>
              <a href="#" class="btn btn-danger"><i class="fa fa-heart"></i> add to wishlist</a>
            </div>
            <!-- <div class="product__details__btns__option">
              <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
            </div> -->
            <div class="product__details__last__option">
              <h5><span>Guarante ed Safe Checkout</span></h5>
              <ul>
                <li><span>SKU:</span> 3812912</li>
                <li><span>Categories:</span> Clothes</li>
                <li><span>Tag:</span> Clothes, Skin, Body</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                  role="tab">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                  Previews(5)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                  information</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-5" role="tabpanel">
                <div class="product__details__tab__content">
                  <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                    solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                    ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                    pharetras loremos.</p>
                  <div class="product__details__tab__content__item">
                    <h5>Products Infomation</h5>
                    <p>A Pocket PC is a handheld computer, which features many of the same
                      capabilities as a modern PC. These handy little devices allow
                      individuals to retrieve and store e-mail messages, create a contact
                      file, coordinate appointments, surf the internet, exchange text messages
                      and more. Every product that is labeled as a Pocket PC must be
                      accompanied with specific software to operate the unit and must feature
                      a touchscreen and touchpad.</p>
                    <p>As is the case with any new technology product, the cost of a Pocket PC
                      was substantial during it’s early release. For approximately $700.00,
                      consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                      These days, customers are finding that prices have become much more
                      reasonable now that the newness is wearing off. For approximately
                      $350.00, a new Pocket PC can now be purchased.</p>
                  </div>
                  <div class="product__details__tab__content__item">
                    <h5>Material used</h5>
                    <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                      from synthetic materials, not natural like wool. Polyester suits become
                      creased easily and are known for not being breathable. Polyester suits
                      tend to have a shine to them compared to wool and cotton suits, this can
                      make the suit look cheap. The texture of velvet is luxurious and
                      breathable. Velvet is a great choice for dinner party jacket and can be
                      worn all year round.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tabs-6" role="tabpanel">
                <div class="product__details__tab__content">
                  <div class="product__details__tab__content__item">
                    <h5>Products Infomation</h5>
                    <p>A Pocket PC is a handheld computer, which features many of the same
                      capabilities as a modern PC. These handy little devices allow
                      individuals to retrieve and store e-mail messages, create a contact
                      file, coordinate appointments, surf the internet, exchange text messages
                      and more. Every product that is labeled as a Pocket PC must be
                      accompanied with specific software to operate the unit and must feature
                      a touchscreen and touchpad.</p>
                    <p>As is the case with any new technology product, the cost of a Pocket PC
                      was substantial during it’s early release. For approximately $700.00,
                      consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                      These days, customers are finding that prices have become much more
                      reasonable now that the newness is wearing off. For approximately
                      $350.00, a new Pocket PC can now be purchased.</p>
                  </div>
                  <div class="product__details__tab__content__item">
                    <h5>Material used</h5>
                    <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                      from synthetic materials, not natural like wool. Polyester suits become
                      creased easily and are known for not being breathable. Polyester suits
                      tend to have a shine to them compared to wool and cotton suits, this can
                      make the suit look cheap. The texture of velvet is luxurious and
                      breathable. Velvet is a great choice for dinner party jacket and can be
                      worn all year round.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tabs-7" role="tabpanel">
                <div class="product__details__tab__content">
                  <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                    solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                    ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                    pharetras loremos.</p>
                  <div class="product__details__tab__content__item">
                    <h5>Products Infomation</h5>
                    <p>A Pocket PC is a handheld computer, which features many of the same
                      capabilities as a modern PC. These handy little devices allow
                      individuals to retrieve and store e-mail messages, create a contact
                      file, coordinate appointments, surf the internet, exchange text messages
                      and more. Every product that is labeled as a Pocket PC must be
                      accompanied with specific software to operate the unit and must feature
                      a touchscreen and touchpad.</p>
                    <p>As is the case with any new technology product, the cost of a Pocket PC
                      was substantial during it’s early release. For approximately $700.00,
                      consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                      These days, customers are finding that prices have become much more
                      reasonable now that the newness is wearing off. For approximately
                      $350.00, a new Pocket PC can now be purchased.</p>
                  </div>
                  <div class="product__details__tab__content__item">
                    <h5>Material used</h5>
                    <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                      from synthetic materials, not natural like wool. Polyester suits become
                      creased easily and are known for not being breathable. Polyester suits
                      tend to have a shine to them compared to wool and cotton suits, this can
                      make the suit look cheap. The texture of velvet is luxurious and
                      breathable. Velvet is a great choice for dinner party jacket and can be
                      worn all year round.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="related-title">Related Product</h3>
      </div>
    </div>
    <div class="row">
      <?php foreach ($bookbykate as $value) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/img/buku/' . $value->foto); ?>">
              <!-- <span class="label">New</span> -->
              <ul class="product__hover">
                <li>
                  <a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/icon/heart.png" alt=""></a>
                </li>
                <li>
                  <a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/icon/cart.png" alt=""><span>Add Cart</span></a>
                </li>
                <li>
                  <a href="<?= base_url('book/detail/' . $value->id_buku); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/search.png" alt=""><span>Deatil</span></a>
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
<!-- Related Section End -->