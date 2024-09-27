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
								<th>Username</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Foto</th>
								<th>Alamat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($user as  $value): ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $value['username']; ?></td>
									<td><?= $value['nama']; ?></td>
									<td><?= $value['email']; ?></td>
									<td><?= $value['role']; ?></td>
									<td>
										<div class="avatar">
											<img src="<?= base_url('assets/backend/'); ?>/compiled/jpg/1.jpg" alt="" srcset="">
										</div>
									</td>
									<td><?= $value['alamat']; ?></td>
									<td>
										<span class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $value['id_user']; ?>">Edit</span>
										<?php if ($this->session->userdata('username') != $value['username']): ?>
											<a href="<?= base_url('user/hapus/' . $value['id_user']); ?>" id="btn-hapus" class="badge bg-danger">Delete</a>
										<?php endif; ?>
										<a href="<?= base_url('user/reset/' . $value['id_user']); ?>" id="btn-pw" class="badge bg-warning">Reset</a>
									</td>
								</tr>

								<!--Basic Modal -->
								<div class="modal fade text-left" id="modal-edit<?= $value['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="myModalLabel1">Edit User</h5>
												<button type="button" class="close rounded-pill" data-bs-dismiss="modal"
													aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<form action="<?= base_url('user/edit'); ?>" method="post">
												<input type="hidden" name="id_user" value="<?= $value['id_user']; ?>">
												<div class="modal-body">
													<div class="form-group">
														<label for="username" class="form-label">Username</label>
														<input type="text" class="form-control" id="username" name="username" value="<?= $value['username']; ?>" placeholder="Username" autocomplete="off">
													</div>
													<div class="form-group">
														<label for="nama" class="form-label">Nama</label>
														<input type="text" class="form-control" id="nama" name="nama" value="<?= $value['nama']; ?>" placeholder="Nama" autocomplete="off">
													</div>
													<div class="form-group">
														<label for="email" class="form-label">Email</label>
														<input type="email" class="form-control" id="email" name="email" value="<?= $value['email']; ?>" placeholder="Email" autocomplete="off">
													</div>
													<fieldset class="form-group">
														<label for="role" class="form-label">Role</label>
														<select class="form-select" id="role" name="role">
															<option value="Peminjam" <?= $value['role'] == 'Peminjam' ? 'selected' : ''; ?>>Peminjam</option>
															<option value="Petugas" <?= $value['role'] == 'Petugas' ? 'selected' : ''; ?>>Petugas</option>
															<option value="Admin" <?= $value['role'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
														</select>
													</fieldset>
													<div class="form-group">
														<label for="alamat" class="form-label">Alamat</label>
														<textarea class="form-control" id="alamat" name="alamat" autocomplete="off" rows="3"><?= $value['alamat']; ?></textarea>
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
					<h5 class="modal-title" id="myModalLabel1">Tambah User</h5>
					<button type="button" class="close rounded-pill" data-bs-dismiss="modal"
						aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<form action="<?= base_url('user/simpan'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="username" class="form-label">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
						</div>
						<fieldset class="form-group">
							<label for="role" class="form-label">Role</label>
							<select class="form-select" id="role" name="role">
								<option value="Peminjam">Peminjam</option>
								<option value="Petugas">Petugas</option>
								<option value="Admin">Admin</option>
							</select>
						</fieldset>
						<div class="form-group">
							<label for="alamat" class="form-label">Alamat</label>
							<textarea class="form-control" id="alamat" name="alamat" autocomplete="off" rows="3"></textarea>
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