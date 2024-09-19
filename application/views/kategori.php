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
								<th>Nama Kategori</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($kategori as  $value): ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $value['nama_kategori']; ?></td>
									<td>
										<span class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $value['id_kategori']; ?>">Edit</span>
										<a href="<?= base_url('kategori/hapus/' . $value['id_kategori']); ?>" id="btn-hapus" class="badge bg-danger">Delete</a>
									</td>
								</tr>
								<!--Basic Modal -->
								<div class="modal fade text-left" id="modal-edit<?= $value['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="myModalLabel1">Edit Kategori</h5>
												<button type="button" class="close rounded-pill" data-bs-dismiss="modal"
													aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<form action="<?= base_url('kategori/edit'); ?>" method="post">
												<input type="hidden" name="id_kategori" value="<?= $value['id_kategori']; ?>">
												<div class="modal-body">
													<div class="form-group">
														<label for="nama_kategori" class="form-label">Nama Kategori</label>
														<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $value['nama_kategori']; ?>" placeholder="Nama Kategori" autocomplete="off">
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
					<h5 class="modal-title" id="myModalLabel1">Tambah Kategori</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal"
						aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<form action="<?= base_url('kategori/simpan'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama_kategori" class="form-label">Nama Kategori</label>
							<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" autocomplete="off">
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