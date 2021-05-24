<?php include 'header.php'; 
$pegawai  =mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$peralatan=mysqli_query($koneksi,"SELECT * FROM peralatan WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$barang   =mysqli_query($koneksi,"SELECT * FROM barang ORDER BY nama_barang ASC")or die(mysql_error());

$id_surat = $_GET["id_surat"];
$id_proker = $_GET["id_proker"];

$pegawai=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$surat=mysqli_query($koneksi,"SELECT * FROM surat_permohonan WHERE status_surat LIKE 'Telah divalidasi Kepala' AND id_surat_permohonan = $id_surat")or die(mysql_error());
$justifikasi = mysqli_query($koneksi,"SELECT * FROM justifikasi INNER JOIN barang ON barang.id_barang = justifikasi.id_barang WHERE justifikasi.id_proker = $id_proker AND justifikasi.id_user=".$_SESSION['id_user']."")or die(mysql_error());

$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }

?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Kerangka Acuan Kegiatan</h4>
				<ul class="breadcrumbs">

				</ul>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-users"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Pegawai</p>
										<h4 class="card-title"><?= mysqli_num_rows($pegawai); ?></h4>
										<a href="master_pegawai.php">lihat data</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-info bubble-shadow-small">
										<i class="flaticon-interface-6"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data peralatan</p>
										<h4 class="card-title"><?= mysqli_num_rows($peralatan); ?></h4>
										<a href="master_peralatan.php">lihat data</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">	Justifikasi Kebutuhan Alat Kesehatan
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
									<span class="fas fa-plus"></span> Input Data Justifikasi</button>
									<a type="button" target="_blank" href="../surat/cetak_kak.php?id_proker=<?= $id_proker; ?>" class="btn btn-sm btn-success" style="float: right;margin-right: 5px;">
										<span class="fas fa-print"></span> Cetak Surat</a>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Nama Alat</th>
													<th>Spesifikasi Umum</th>
													<th>Alasan Kebutuhan</th>
													<th>Manfaat</th>
													<th>Jumlah</th>
													<th>Keterangan</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												while($d=mysqli_fetch_array($justifikasi)){ 
													?>
													<tr>
														<td><?= $d["nama_barang"] ?></td>
														<td><?= $d["spesifikasi_umum"] ?></td>
														<td><?= $d["alasan_kebutuhan"] ?></td>
														<td><?= $d["manfaat"] ?></td>
														<td><?= $d["jumlah_unit"] ?></td>
														<td><?= $d["ket_justifikasi"] ?></td>
														<td><button type="button" class="btn btn-icon btn-round btn-primary">
															<i class="fa fa-edit"></i>
														</button>
														<button type="button" class="btn btn-icon btn-round btn-danger">
															<i class="fa fa-trash"></i>
														</button></td>
													</tr>	
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">

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
						<h5 class="modal-title">Tambah Data Kebutuhan Alat</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="defaultSelect">Nama Barang</label>
									<select name="id_barang" class="form-control form-control" id="defaultSelect">
										<?php 
										while($d=mysqli_fetch_array($barang)){
											?>
											<option value="<?= $d['id_barang'] ?>" ><?= $d['nama_barang'] ?></option>
										<?php  } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Spesifikasi Umum</label>
									<input type="text" name="spesifikasi_umum" class="form-control" id="email2" placeholder="Input spesifikasi umum">
								</div>
							</div>
							<input type="hidden" name="id_surat" class="form-control" id="email2"  value="<?= $id_surat ?>">
							<input type="hidden" name="id_proker" class="form-control" id="email2"  value="<?= $id_proker ?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Alasan Kebutuhan</label>
									<input type="text" name="alasan_kebutuhan" class="form-control" id="email2" placeholder="Input alasan kebutuhan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Manfaat</label>
									<input type="text" name="manfaat" class="form-control" id="email2" placeholder="Input manfaat">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Unit</label>
									<input type="number" name="jumlah_unit" class="form-control" id="email2" placeholder="Input jumlah unit">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan Justifikasi</label>
									<input type="text" name="ket_justifikasi" class="form-control" id="email2" placeholder="Input keterangan justifikasi">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Justifikasi">
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