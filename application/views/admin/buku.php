	<section class="section">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h5 class="card-title"><?= $title; ?></h5>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
					Tambah
				</button>
			</div>
			<div class="card-body">
				<div class="table-responsive datatable-minimal">
					<table class="table" id="table2">
						<thead>
							<tr>
								<th>#</th>
								<th>Judul</th>
								<th>Penulis</th>
								<th>Penerbit</th>
								<th>Tahun Terbit</th>
								<th>Kategori</th>
								<th>Jumlah Buku</th>
								<th>Stok</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($buku as  $value): ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $value['judul']; ?></td>
									<td><?= $value['penulis']; ?></td>
									<td><?= $value['penerbit']; ?></td>
									<td><?= $value['tahun_terbit']; ?></td>
									<td><?= $value['nama_kategori']; ?></td>
									<td><?= $value['jumlah']; ?></td>
									<td><?= $value['stok']; ?></td>
									<td>
										<?php if ($this->session->userdata('role') != 'Peminjam') :  ?>
											<span class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $value['id_buku']; ?>">Edit</span>
											<a href="<?= base_url('buku/hapus/' . $value['foto']); ?>" id="btn-hapus" class="badge bg-danger">Delete</a>
										<?php elseif ($this->session->userdata('role') == 'Peminjam') : ?>
											<a href="<?= base_url('peminjaman/peminjaman-buku/' . $value['id_buku']); ?>" class="badge bg-warning">Pinjam</a>
											<a href="<?= base_url('koleksi/simpan/' . $value['id_buku']); ?>" class="badge bg-success">Favorit</a>
										<?php endif; ?>
									</td>
								</tr>

								<!--Basic Modal -->
								<div class="modal fade text-left" id="modal-edit<?= $value['id_buku']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="myModalLabel1">Edit Buku</h5>
												<button type="button" class="close rounded-pill" data-bs-dismiss="modal"
													aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<form action="<?= base_url('buku/edit'); ?>" method="post" enctype="multipart/form-data">
												<input type="hidden" name="namafoto" value="<?= $value['foto']; ?>">
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-sm-6">
															<label for="Judul" class="form-label">Judul</label>
															<input type="text" class="form-control" id="Judul" name="judul" value="<?= $value['judul']; ?>" placeholder="Judul" autocomplete="off">
														</div>
														<fieldset class="form-group col-sm-6">
															<label for="role" class="form-label">Kategori</label>
															<select class="form-select" id="role" name="id_kategori">
																<?php foreach ($kategori as $gori) : ?>
																	<option value="<?= $gori->id_kategori; ?>" <?= $gori->id_kategori == $value['tahun_terbit'] ? 'selected' : ''; ?>><?= $gori->nama_kategori; ?></option>
																<?php endforeach; ?>
															</select>
														</fieldset>
													</div>
													<div class="row">
														<div class="form-group col-sm-6">
															<label for="penulis" class="form-label">Penulis</label>
															<input type="text" class="form-control" id="penulis" name="penulis" value="<?= $value['penulis']; ?>" placeholder="Penulis" autocomplete="off">
														</div>
														<div class="form-group col-sm-6">
															<label for="penerbit" class="form-label">Penerbit</label>
															<input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $value['penerbit']; ?>" placeholder="Penerbit" autocomplete="off">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-sm-6">
															<label for="tahun_terbit" class="form-label">Tahun Terbit</label>
															<input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $value['tahun_terbit']; ?>" placeholder="Tahun Terbit" autocomplete="off">
														</div>
														<div class="form-group col-sm-6">
															<label for="jumlah" class="form-label">Jumlah</label>
															<input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $value['jumlah']; ?>" placeholder="Jumlah Buku" autocomplete="off">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-12">
															<label for="foto" class="form-label">Foto</label>
															<input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-12">
															<label for="sinopsis" class="form-label">Sinopsis</label>
															<textarea class="form-control" id="sinopsis" name="sinopsis" autocomplete="off" rows="4"><?= $value['sinopsis']; ?></textarea>
														</div>
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

	<!-- Modal Tambah -->
	<div class="modal fade text-left" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel1">Tambah Buku</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal"
						aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<form action="<?= base_url('buku/simpan'); ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="Judul" class="form-label">Judul</label>
								<input type="text" class="form-control" id="Judul" name="judul" placeholder="Judul" autocomplete="off">
							</div>
							<fieldset class="form-group col-sm-6">
								<label for="role" class="form-label">Kategori</label>
								<select class="form-select" id="role" name="id_kategori">
									<?php foreach ($kategori as $gori) : ?>
										<option value="<?= $gori->id_kategori; ?>"><?= $gori->nama_kategori; ?></option>
									<?php endforeach; ?>
								</select>
							</fieldset>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="penulis" class="form-label">Penulis</label>
								<input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis" autocomplete="off">
							</div>
							<div class="form-group col-sm-6">
								<label for="penerbit" class="form-label">Penerbit</label>
								<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="tahun_terbit" class="form-label">Tahun Terbit</label>
								<input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit" autocomplete="off">
							</div>
							<div class="form-group col-sm-6">
								<label for="jumlah" class="form-label">Jumlah</label>
								<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Buku" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="foto" class="form-label">Foto</label>
								<input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="sinopsis" class="form-label">Sinopsis</label>
								<textarea class="form-control" id="sinopsis" name="sinopsis" autocomplete="off" rows="4"></textarea>
							</div>
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