<!DOCTYPE html>
<html lang="zxx" style="scroll-behavior: smooth;">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Male_Fashion Template">
  <meta name="keywords" content="Male_Fashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title; ?></title>

  <!-- Google Font -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet"> -->

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/style.css" type="text/css">

  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>assets/extensions/sweetalert2/sweetalert2.min.css">
</head>

<body>
  <div id="alert-berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <div id="alert-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>

  <?php
  $tempnum = $this->db->join('buku', 'buku.id_buku=temp.id_buku')->where('id_user', $this->session->userdata('id_user'))->from('temp')->count_all_results();
  ?>

  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas-menu-overlay"></div>
  <div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
      <div class="offcanvas__links">
        <a href="<?= base_url('myprofile'); ?>">My Profile</a>
        <?php if (!$this->session->userdata('username')): ?>
          <a href="<?= base_url('auth'); ?>">Login / Register</a>
        <?php else: ?>
          <a href="<?= base_url('auth/logout'); ?>">Logout</a>
        <?php endif ?>
      </div>
    </div>
    <div class="offcanvas__nav__option">
      <a href="<?= base_url('favorit'); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/heart.png" alt=""></a>
      <a href="<?= base_url('keranjang'); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/cart.png" alt=""><span><?= $tempnum; ?></span></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
      <p>Budayakan Membaca.</p>
    </div>
  </div>
  <!-- Offcanvas Menu End -->

  <!-- Header Section Begin -->
  <!-- fixed-top -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7">
            <div class="header__top__left">
              <p>Budayakan Membaca.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="header__top__right">
              <div class="header__top__links">
                <a href="<?= base_url('myprofile'); ?>">My Profile</a>
                <?php if (!$this->session->userdata('username')): ?>
                  <a href="<?= base_url('auth'); ?>">Login / Register</a>
                <?php else: ?>
                  <a href="#"><?= $this->session->userdata('nama'); ?></a>
                  <a href="<?= base_url('auth/logout'); ?>" class="text-danger">Logout</a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="header__logo">
            <a href="<?= base_url(); ?>">
              <h2>Perpuskanda</h2>
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <nav class="header__menu mobile-menu">
            <?php $menu = $this->uri->segment(1); ?>
            <ul>
              <li class="<?= $menu == '' ? 'active' : ($menu == 'homepage' ? 'active' : ''); ?>"><a href="<?= base_url(); ?>">Home</a></li>
              <li class="<?= $menu == 'book' ? 'active' : ''; ?>"><a href="<?= base_url('book'); ?>">Book</a></li>
              <!-- <li><a href="#">Pages</a>
                <ul class="dropdown">
                  <li><a href="./about.html">About Us</a></li>
                  <li><a href="./shop-details.html">Shop Details</a></li>
                  <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                  <li><a href="./checkout.html">Check Out</a></li>
                  <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
              </li> -->
              <li class="<?= $menu == 'peminjaman-user' ? 'active' : ''; ?>"><a href=" <?= base_url('peminjaman-user'); ?>">Peminjaman</a></li>
              <li class="<?= $menu == 'contact' ? 'active' : ''; ?>"><a href="<?= base_url('contact'); ?>">Contacts</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="header__nav__option">
            <a href="<?= base_url('favorit'); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/heart.png" alt=""></a>
            <a href="<?= base_url('keranjang'); ?>"><img src="<?= base_url('assets/frontend/'); ?>img/icon/cart.png" alt=""><span><?= $tempnum; ?></span></a>
          </div>
        </div>
      </div>
      <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
  </header>
  <!-- Header Section End -->

  <?= $contents; ?>

  <!-- Footer Section Begin -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__logo">
              <a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/footer-logo.png" alt=""></a>
            </div>
            <p>The customer is at the heart of our unique business model, which includes design.</p>
            <a href="#"><img src="<?= base_url('assets/frontend/'); ?>img/payment.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6>Shopping</h6>
            <ul>
              <li><a href="#">Clothing Store</a></li>
              <li><a href="#">Trending Shoes</a></li>
              <li><a href="#">Accessories</a></li>
              <li><a href="#">Sale</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6>Shopping</h6>
            <ul>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Payment Methods</a></li>
              <li><a href="#">Delivary</a></li>
              <li><a href="#">Return & Exchanges</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6>NewLetter</h6>
            <div class="footer__newslatter">
              <p>Be the first to know about new arrivals, look books, sales & promos!</p>
              <form action="#">
                <input type="text" placeholder="Your email">
                <button type="submit"><span class="icon_mail_alt"></span></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="footer__copyright__text">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p>Copyright ©
              <script>
                document.write(new Date().getFullYear());
              </script>2020
              All rights reserved | This template is made with <i class="fa fa-heart-o"
                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here.....">
      </form>
    </div>
  </div>
  <!-- Search End -->

  <!-- Js Plugins -->
  <script src="<?= base_url('assets/frontend/'); ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/jquery.nice-select.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/jquery.countdown.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/jquery.slicknav.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/mixitup.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/'); ?>js/main.js"></script>

  <!-- sweetalert -->
  <script src="<?= base_url('assets/backend/'); ?>extensions/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/backend/'); ?>extensions/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url('assets/backend/'); ?>static/js/pages/sweetalert2.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>

  <script>
    const success = $('#alert-berhasil').data('flashdata'),
      gagal = $('#alert-gagal').data('flashdata');
    if (success) {
      Toast.fire({
        icon: 'success',
        title: success
      });
    }
    if (gagal) {
      Toast.fire({
        icon: 'error',
        title: gagal
      });
    }

    $(document).on("click", '#btn-hapus', function(e) {
      e.preventDefault();
      const href = $(this).attr("href");
      Swal2.fire({
        title: "Apakah anda yakin?",
        text: "Data akan dihapus",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cencelBunttonColor: '#d33',
        confirmButton: "Hapus Data!",
      }).then((result) => {
        if (result.isConfirmed) {
          document.location = href;
        }
      });
    });

    $(document).on("click", '#btn-yakin', function(e) {
      e.preventDefault();
      const href = $(this).attr("href");
      Swal2.fire({
        title: "Apakah anda yakin?",
        // text: "Data akan dihapus",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cencelBunttonColor: '#d33',
        confirmButton: "Yakin!",
      }).then((result) => {
        if (result.isConfirmed) {
          document.location = href;
        }
      });
    });

    $(document).on("click", '#btn-keranjang', function(e) {
      e.preventDefault();
      const href = $(this).attr("href");
      Swal2.fire({
        title: "Apakah anda yakin?",
        text: "Buku akan dimasukkan kekeranjang?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cencelBunttonColor: '#d33',
        confirmButton: "Yakin!",
      }).then((result) => {
        if (result.isConfirmed) {
          document.location = href;
        }
      });
    });
  </script>
</body>

</html>