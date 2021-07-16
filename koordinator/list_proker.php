<?php 
include 'header.php'; 
// Cari id_usulan berdasarkan surat_permohonannya
$id_usulan = $_GET["id_usulan"];
$usulan = mysqli_query($koneksi,"SELECT * FROM `usulan`INNER JOIN users ON users.id_user = usulan.id_user WHERE id_usulan = ".$id_usulan." AND status='diverifikasi'")or die(mysql_error());

?>

<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="row" style="width: 100%;">
						<div class="col-8 col-md-8">
							<h2 class="text-white pb-2 fw-bold">Instalasi pengaju program kerja</h2>
							<h5 class="text-white pb-2 fw-bold">Ada <?= mysqli_num_rows($usulan); ?> instalasi yang telah mengajukan</h5>
							
						</div>
						<div class="col-4 col-md-4">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<?php 
				while($data_usulan = mysqli_fetch_array($usulan)) {?>
					<div class="col-md-12">
						<div class="card full-height">
							<div class="card-body">
								<div class="card-title"><?= $data_usulan["nama_instalasi"] ?></div>
								<div class="card-category">Di kirim pada : <?= $data_usulan['tanggal_kirim'] ?></div>
								<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
									<a target="_blank" href="../surat/cetak_kak.php?id_usulan=<?= $data_usulan['id_usulan'] ?>" class="btn btn-primary btn-border">
										<span class="btn-label">
											<i class="fas fa-feather-alt"></i>
										</span>
										Kak
									</a>
									<a href="kak.php?id_surat=<?= $id_surat ?>&id_usulan=<?= $id_usulan ?>" class="btn btn-primary btn-border">
										<span class="btn-label">
											<i class="fas fa-fire"></i>
										</span>
										RAB
									</a>
									<a href="kak.php?id_surat=<?= $id_surat ?>&id_usulan=<?= $id_usulan ?>" class="btn btn-primary btn-border">
										<span class="btn-label">
											<i class="fas fa-eye"></i>
										</span>
										Justifikasi
									</a>
									<div style="float: right;">
										<a href="kak.php?id_surat=<?= $id_surat ?>&id_usulan=<?= $id_usulan ?>" class="btn btn-primary btn-border">
											<span class="btn-label">
												<i class="fas fa-genderless"></i>
											</span>
											Penawaran Harga
										</a>
										<a href="kak.php?id_surat=<?= $id_surat ?>&id_usulan=<?= $id_usulan ?>" class="btn btn-primary btn-border">
											<span class="btn-label">
												<i class="fas fa-eye"></i>
											</span>
											Manajemen Resiko
										</a>
										<a  href="kak.php?id_surat=<?= $id_surat ?>&id_usulan=<?= $id_usulan ?>" class="btn btn-primary btn-border">
											<span class="btn-label">
												<i class="fas fa-archive"></i>
											</span>
											Surat usulan penghapusan barang rusak
										</a>
									</div>
									
									<div class="px-2 pb-2 pb-md-0 text-center">


									</div>

								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- Modal Tambah Peralatan-->
	<div class="modal fade" id="modalVerifikasiusulan" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form method="POST" action="Controller/v1.php">
					<div class="modal-header">
						<h5 class="modal-title">Kirim program kerja saya</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h2>Kirim Program Kerja Anda ? </h2>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_usulan" value="<?= $id_usulan ?>">
						<input type="hidden" name="id_surat" value="<?= $id_surat ?>">
						<input type="submit" class="btn btn-primary" name="submit" value="Ya, Kirim usulan saya">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

	<?php include'footer.php';?>