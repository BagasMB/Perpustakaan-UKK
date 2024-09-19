<header>
  <?php
  $temp = $this->db->join('buku', 'buku.id_buku=temp.id_buku')->where('id_user', $this->session->userdata('id_user'))->limit(2)->get('temp')->result();
  $tempnum = $this->db->join('buku', 'buku.id_buku=temp.id_buku')->where('id_user', $this->session->userdata('id_user'))->from('temp')->count_all_results();

  $koleksi = $this->db->join('buku', 'buku.id_buku=koleksi.id_buku')->where('id_user', $this->session->userdata('id_user'))->limit(2)->get('koleksi')->result();
  $koleknum = $this->db->where('id_user', $this->session->userdata('id_user'))->from('koleksi')->count_all_results();
  ?>
  <nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0">
          <li class="nav-item dropdown me-1">
            <button class="nav-link active dropdown-toggle text-gray-600" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <i class='bi bi-bookmark-dash fs-4'></i>
              <span class="badge badge-notification bg-danger"><?= $koleknum; ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-header">
                <h6>Daftar Koleksi Buku</h6>
              </li>
              <?php foreach ($koleksi as $em) : ?>
                <li class="dropdown-item notification-item">
                  <a class="d-flex align-items-center" href="#">
                    <div class="notification-text ms-4">
                      <p class="notification-title font-bold"><?= $em->judul; ?></p>
                    </div>
                  </a>
                </li>
              <?php endforeach; ?>
              <li>
                <p class="text-center py-2 mb-0"><a href="<?= base_url('koleksi'); ?>">See all</a></p>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown me-3">
            <button class="nav-link active dropdown-toggle text-gray-600" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <i class='bi bi-cart-check fs-4'></i>
              <span class="badge badge-notification bg-danger"><?= $tempnum; ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-header">
                <h6>Daftar Buku</h6>
              </li>
              <?php foreach ($temp as $em) : ?>
                <li class="dropdown-item notification-item">
                  <a class="d-flex align-items-center" href="#">
                    <div class="notification-text ms-4">
                      <p class="notification-title font-bold"><?= $em->judul; ?></p>
                      <p class="notification-subtitle font-thin text-sm"><?= $em->penulis; ?></p>
                    </div>
                  </a>
                </li>
              <?php endforeach; ?>
              <li>
                <p class="text-center py-2 mb-0"><a href="<?= base_url('peminjaman/keranjang'); ?>">See all</a></p>
              </li>
            </ul>
          </li>
        </ul>

        <div class="dropdown">
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
              <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600"><?= $this->session->userdata('nama'); ?></h6>
                <p class="mb-0 text-sm text-gray-600"><?= $this->session->userdata('role'); ?></p>
              </div>
              <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                  <img src="<?= base_url(''); ?>/assets/compiled/jpg/1.jpg">
                </div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
            <li>
              <h6 class="dropdown-header">Hello, <?= $this->session->userdata('nama'); ?>!</h6>
            </li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                Wallet</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>