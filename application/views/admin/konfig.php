<section id="multiple-column-form">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"><?= $title; ?></h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form action="<?= base_url('konfig/update'); ?>" class="form" method="post">
          <input type="hidden" name="id_konfig" value="<?= $konfig->id_konfig; ?>">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label class="form-label" for="first-name-column">Nama CV</label>
                <input type="text" id="first-name-column" class="form-control" name="nama_cv" value="<?= $konfig->nama_cv; ?>" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label class="form-label" for="email-id-column">Email</label>
                <input type="email" id="email-id-column" class="form-control" name="email" value="<?= $konfig->email; ?>" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label class="form-label" for="last-name-column">Alamat</label>
                <input type="text" id="last-name-column" class="form-control" name="alamat" value="<?= $konfig->alamat; ?>" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label class="form-label" for="last-name-column">No Hp</label>
                <input type="text" id="last-name-column" class="form-control" name="no" value="<?= $konfig->no; ?>" autocomplete="off">
              </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
              <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>