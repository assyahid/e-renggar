<?php include 'header.php'; 

$usulan=mysqli_query($koneksi,"SELECT * FROM usulan INNER JOIN users ON users.id_user = usulan.id_user WHERE status != 'pengajuan' ORDER BY usulan.id_usulan DESC ")or die(mysql_error());

?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Usulan Belanja</h4>
				<ul class="breadcrumbs">

				</ul>
			</div>
			
			<div class="row">

				<div class="col-12">
					<?php if(isset($_GET["message"]) && $_GET["message"] != ""){ ?>
						<div class="alert alert-primary" role="alert">
							<?= $_GET["message"]; ?>
						</div>
					<?php } ?>

					<div class="card">
						
						<div class="card-body">
							<div class="table-responsive">
								<table id="multi-filter-select" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>Nomor Usulan</th>
											<th>Pengusul</th>
											<th>Tanggal Kirim</th>
											<th>Status</th>
											<th ><center>Opsi</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$index = 0;
										while($d=mysqli_fetch_array($usulan)){ 
											?>
											<tr>
												<td><?= $index+1; ?></td>
												<td><?= $d["no_usulan"]; ?></td>
												<td><?= $d["nama"]; ?></td>
												<td><?= date_format(new DateTime($d['tgl_usulan']),"d-m-Y") ?></td>
												<td><?= $d["status"]; ?></td>
												<td>
													<div class="btn-group" role="group" aria-label="Basic example">
														<a href="detail-usulan.php?id_usulan=<?= $d['id_usulan']; ?>" type="button" class="btn btn-secondary">Detail</a>&nbsp;

														<!-- <button type="button" class="btn btn-secondary">Cetak Surat</button> -->
													</div>
												</td>
											</tr>
											<?php $index++; } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
					<!-- 	<div class="card">
							<div class="card-header">
								<h4 class="card-title">Master data pegawai <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
									<span class="fas fa-plus"></span> Input Data Pegawai</button></h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th width="250px">NIP</th>
													<th>Nama</th>
													<th>Jabatan</th>
													<th>Pendidikan</th>
													<th>Keterangan</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>

											<tbody>

												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td>
														<button type="button" class="btn btn-icon btn-round btn-primary">
															<i class="fa fa-edit"></i>
														</button>
														<button type="button" class="btn btn-icon btn-round btn-danger">
															<i class="fa fa-trash"></i>
														</button>

													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Pegawai</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">NIP</label>
									<input type="number" name="nip" class="form-control" id="email2" placeholder="Input nama peralatan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Nama</label>
									<input type="text" name="nama" class="form-control" id="email2" placeholder="Input jenis peralatan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jabatan</label>
									<input type="text" name="jabatan" class="form-control" id="email2" placeholder="Input satuan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Pendidikan</label>
									<input type="text" name="pendidikan" class="form-control" id="email2" placeholder="Input jumlah">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan</label>
									<input type="text" name="keterangan" class="form-control" id="email2" placeholder="Input jumlah">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Pegawai">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->


		<!-- Modal Tambah Peralatan-->
		<div class="modal fade" id="modalPeralatan" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Peralatan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form>
						<div class="modal-body">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Nama Peralatan</label>
									<input type="text" class="form-control" id="email2" placeholder="Input nama peralatan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jenis Peralatan</label>
									<input type="text" class="form-control" id="email2" placeholder="Input jenis peralatan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">satuan</label>
									<input type="number" class="form-control" id="email2" placeholder="Input satuan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah</label>
									<input type="number" class="form-control" id="email2" placeholder="Input jumlah">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Tambah</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Peralatan-->

		<?php include 'footer.php';?>