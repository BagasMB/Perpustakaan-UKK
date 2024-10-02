<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4>Detail Peminjaman</h4>
          <div class="breadcrumb__links">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url('peminjaman-user'); ?>">Peminjaman</a>
            <span>Detail Peminjaman</span>
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
          foreach ($detail as $value) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value->judul; ?></td>
              <td><?= $value->penulis; ?></td>
              <td><?= $value->tanggal_pengembalian_real == '' ? '-' : $value->tanggal_pengembalian_real; ?></td>
              <td><span class="text-light badge bg-<?= $value->status == 'Proses' ? 'warning' : ($value->status == 'Dipinjam' ? 'primary' : ($value->status == 'Dikembalikan' ? 'success' : ($value->status == 'Ditolak' ? 'danger' : ($value->status == 'Terlambat' ? 'danger' : 'secondary')))); ?>"><?= $value->status; ?></span></td>
              <td>
                <?php if ($value->status == 'Dikembalikan') : ?>
                  <?php if ($this->session->userdata('role') == 'Peminjam') : ?>
                    <span class="btn btn-success" data-toggle="modal" data-target="#modalUlasan<?= $value->id_ulasan; ?>">Ulasan</span>
                  <?php endif; ?>

                <?php elseif ($value->status == 'Terlambat') : ?>
                  <!-- Button Bayar Denda -->
                  <span data-toggle="modal" data-target="#modalDenda<?= $value->id_denda; ?>" class="btn btn-danger">Denda</span>
                  <span class="btn btn-success" data-toggle="modal" data-target="#modalUlasan<?= $value->id_ulasan; ?>">Ulasan</span>
                <?php endif; ?>
              </td>
            </tr>


            <?php
            if ($value->id_ulasan != null) {
              $ulasan = $this->db->where('id_ulasan', $value->id_ulasan)->get('ulasan')->row();
            }
            if ($value->id_denda != null) {
              $denda = $this->db->where('id_denda', $value->id_denda)->get('denda')->row();
            }
            ?>

            <?php if (isset($denda) && $denda != null) : ?>
              <div class="modal fade" id="modalDenda<?= $value->id_denda; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ulasan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-lg-6">
                          <label for="total_denda" class="form-label">Total Denda</label>
                          <input type="text" class="form-control" id="total_denda" name="total_denda" value="<?= $denda->total_denda; ?>" autocomplete="off" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="sudah_dibayar" class="form-label">Sudah Dibayar</label>
                          <input type="text" class="form-control" id="sudah_dibayar" name="sudah_dibayar" value="<?= $denda->sudah_dibayar; ?>" autocomplete="off" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="sisa_denda" class="form-label">Sisa Denda</label>
                          <input type="text" class="form-control" id="sisa_denda" name="sisa_denda" value="<?= $denda->total_denda - $denda->sudah_dibayar; ?>" autocomplete="off" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="bayar_denda" class="form-label">Status Denda</label>
                          <input type="text" class="form-control" id="bayar_denda" name="bayar_denda" autocomplete="off" value="<?= $denda->status_denda == 'Lunas' ? 'LUNAS' : 'BELUM LUNAS'; ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (isset($ulasan) && $ulasan != null) : ?>
              <div class="modal fade" id="modalUlasan<?= $value->id_ulasan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ulasan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="<?= base_url('ulasan/ulas'); ?>" method="post">
                      <input type="hidden" name="id_ulasan" value="<?= $value->id_ulasan; ?>">
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="ulasan" class="form-label">Saran atau Ulasan</label>
                          <textarea class="form-control" id="ulasan" name="ulasan" autocomplete="off" rows="3"><?= $ulasan->ulasan; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="rating" class="form-label">Rating</label>
                          <div class="card p-2">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1" <?= $ulasan->rating == 1 ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2" <?= $ulasan->rating == 2 ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3" <?= $ulasan->rating == 3 ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rating" id="inlineRadio4" value="4" <?= $ulasan->rating == 4 ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="rating" id="inlineRadio5" value="5" <?= $ulasan->rating == 5 ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio5">5</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</section>
<!-- Shopping Cart Section End -->