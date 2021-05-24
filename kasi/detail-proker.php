<?php 
include 'header.php'; 
$id_proker = $_GET["id_proker"];
$proker=mysqli_query($koneksi,"SELECT * FROM proker WHERE id_proker = ".$id_proker)or die(mysql_error());
$data_proker = mysqli_fetch_array($proker);

$pengusul = mysqli_query($koneksi,"SELECT * FROM users WHERE id_user = ".$data_proker['id_user'])or die(mysql_error());
$data_pengusul = mysqli_fetch_array($pengusul);
?>

<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="row" style="width: 100%;">
						<div class="col-8 col-md-8">
							<h2 class="text-white pb-2 fw-bold">Usulan Program Kerja</h2>
							<h6 class="text-white pb-2 fw-bold">Diusulkan oleh : <?= $data_pengusul['nama']; ?></h6>
						</div>

						<?php 
						if($data_proker['status'] != 'revisi'){ ?>
							<div class="col-2 col-md-2">
								<button class="btn btn-default" data-toggle="modal" data-target="#modalSetujuiProker" style="float: right;"><span class="btn-label">
									<i class="far fa-paper-plane"></i>&nbsp;
								</span>Verifikasi Usulan Ini</button>


							</div>
							<div class="col-2 col-md-2" style="    margin-left: 0px;">
								<button class="btn btn-danger" data-toggle="modal" data-target="#modalTolakProker" style="float: right;"><span class="btn-label">
									<i class="fas fa-long-arrow-alt-left"></i>&nbsp;
								</span>Revisi Usulan Ini</button>


							</div>
						<?php }else{ ?>
							<div class="col-4 col-md-4" style="    margin-left: 0px;">
								<button class="btn btn-danger" style="float: right;"><span class="btn-label">
									<i class="fas fa-asterisk"></i>&nbsp;
								</span>Program kerja ini direvisi</button>
								

							</div>
						<?php }
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Kerangka Acuan Kegiatan</div>
							<div class="card-category">Periksa dan verifikasi usulan program kerja</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="../surat/cetak_kak.php?id_proker=<?= $id_proker; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">RAB</div>
							<div class="card-category">Periksa dan verifikasi usulan program kerja</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt--2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Justifikasi</div>
							<div class="card-category">Periksa dan verifikasi usulan program kerja</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Penawaran Harga</div>
							<div class="card-category">Periksa dan verifikasi usulan program kerja</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt--2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Manajemen Resiko</div>
							<div class="card-category">Periksa dan verifikasi usulan program kerja</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Surat usulan penghapusan alat rusak</div>
							<div class="card-category">Periksa dan verifikasi usulan program kerja</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Tambah Peralatan-->
	<div class="modal fade" id="modalSetujuiProker" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form method="POST" action="Controller/KasiController.php">
					<div class="modal-header">
						<h5 class="modal-title">Verifikasi program kerja</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h2>Verifikasi Program Kerja ini ? </h2>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_proker" value="<?= $id_proker ?>">
						<input type="hidden" name="id_surat" value="<?= $id_surat ?>">
						<input type="submit" class="btn btn-primary" name="submit" value="Verifikasi  Proker ini">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

	<!-- Modal Tambah Peralatan-->
	<div class="modal fade" id="modalTolakProker" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form method="POST" action="Controller/KasiController.php">
					<div class="modal-header">
						<h5 class="modal-title">Revisi program kerja</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="comment">Catatan Revisi untuk proker ini</label>
							<textarea name="catatan" class="form-control" id="comment" rows="5">
							</textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_proker" value="<?= $id_proker ?>">
						<input type="hidden" name="id_surat" value="<?= $id_surat ?>">
						<input type="submit" class="btn btn-danger" name="submit" value="Revisi Proker ini">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->


	<?php include'footer.php';?>