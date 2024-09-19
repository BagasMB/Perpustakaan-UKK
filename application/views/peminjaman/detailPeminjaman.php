<section class="section">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h5 class="card-title"><?= $title; ?></h5>
      <a href="<?= base_url('peminjaman'); ?>" type="button" class="btn btn-secondary">
        Kembali
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
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
            foreach ($detail as  $value): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->judul; ?></td>
                <td><?= $value->penulis; ?></td>
                <td><?= $value->tanggal_pengembalian_real == '' ? '-' : $value->tanggal_pengembalian_real; ?></td>
                <td><span class="badge bg-light-<?= $value->status == 'Proses' ? 'warning' : ($value->status == 'Dipinjam' ? 'primary' : ($value->status == 'Dikembalikan' ? 'success' : ($value->status == 'Ditolak' ? 'danger' : ($value->status == 'Terlambat' ? 'danger' : 'secondary')))); ?>"><?= $value->status; ?></span></td>
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

                  <?php elseif ($this->session->userdata('role') != 'Peminjam') : ?>

                    <?php if ($value->status == 'Dipinjam') : ?>
                      <!-- Button Kembalikan -->
                      <a href="<?= base_url('peminjaman/kembali/' . $value->id_detail_peminjaman . '/' . $value->id_buku . '/' . $value->kode_peminjaman); ?>" class="badge bg-primary">Kembalikan</a>
                    <?php elseif ($value->status == 'Proses') : ?>
                      <!-- Button Persetujuan -->
                      <a href="<?= base_url('peminjaman/persetujuan/' . $value->id_detail_peminjaman); ?>" class="badge bg-success">Persetujuan</a>
                      <!-- Button Penolakan -->
                      <a href="<?= base_url('peminjaman/tolak/' . $value->id_detail_peminjaman . '/' . $value->id_buku); ?>" class="badge bg-danger">Ditolak</a>
                    <?php endif; ?>

                  <?php endif; ?>
                </td>
              </tr>

              <?php
              $ulasan = $this->db->where('id_ulasan', $value->id_ulasan)->get('ulasan')->row();
              $denda = $this->db->where('id_denda', $value->id_denda)->get('denda')->row();
              ?>

              <div class="modal fade text-left" id="modalDenda<?= $value->id_denda; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Modal Ulasan</h5>
                      <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                      </button>
                    </div>
                    <form action="<?= base_url('denda/assa'); ?>" method="post">
                      <input type="hidden" name="id_ulasan" value="<?= $value->id_ulasan; ?>">
                      <div class="modal-body">
                        <fieldset class="form-group">
                          <label for="rating" class="form-label">Rating</label>
                          <select class="form-select" id="rating" name="rating">
                            <option value="5" <?= $ulasan->rating == 5 ? 'selected' : ''; ?>>5</option>
                            <option value="4" <?= $ulasan->rating == 4 ? 'selected' : ''; ?>>4</option>
                            <option value="3" <?= $ulasan->rating == 3 ? 'selected' : ''; ?>>3</option>
                            <option value="2" <?= $ulasan->rating == 2 ? 'selected' : ''; ?>>2</option>
                            <option value="1" <?= $ulasan->rating == 1 ? 'selected' : ''; ?>>1</option>
                          </select>
                        </fieldset>
                        <div class="form-group">
                          <label for="ulasan" class="form-label">Sara atau Ulasan</label>
                          <textarea class="form-control" id="ulasan" name="ulasan" autocomplete="off" rows="3"><?= $ulasan->ulasan; ?></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Simpan</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="modal fade text-left" id="modalUlasan<?= $value->id_ulasan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Modal Ulasan</h5>
                      <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                      </button>
                    </div>
                    <form action="<?= base_url('ulasan/ulas'); ?>" method="post">
                      <input type="hidden" name="id_ulasan" value="<?= $value->id_ulasan; ?>">
                      <div class="modal-body">
                        <fieldset class="form-group">
                          <label for="rating" class="form-label">Rating</label>
                          <select class="form-select" id="rating" name="rating">
                            <option value="5" <?= $ulasan->rating == 5 ? 'selected' : ''; ?>>5</option>
                            <option value="4" <?= $ulasan->rating == 4 ? 'selected' : ''; ?>>4</option>
                            <option value="3" <?= $ulasan->rating == 3 ? 'selected' : ''; ?>>3</option>
                            <option value="2" <?= $ulasan->rating == 2 ? 'selected' : ''; ?>>2</option>
                            <option value="1" <?= $ulasan->rating == 1 ? 'selected' : ''; ?>>1</option>
                          </select>
                        </fieldset>
                        <div class="form-group">
                          <label for="ulasan" class="form-label">Sara atau Ulasan</label>
                          <textarea class="form-control" id="ulasan" name="ulasan" autocomplete="off" rows="3"><?= $ulasan->ulasan; ?></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Simpan</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>