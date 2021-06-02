<?php include 'header.php'; ?>

<?php
$tglnow = date('d-m-Y');
$sql = "SELECT * FROM surat_permohonan";
$pns = mysqli_query($koneksi,$sql);
    //echo "$sql";
    $jmlsurat = mysqli_num_rows($pns);


$pegawai=mysqli_query($koneksi,"SELECT * FROM pegawai ")or die(mysql_error());
$peralatan=mysqli_query($koneksi,"SELECT * FROM peralatan ")or die(mysql_error());
$baru = mysqli_query($koneksi,"SELECT * FROM surat_permohonan LEFT JOIN proker ON proker.id_surat_permohonan = surat_permohonan.id_surat_permohonan WHERE (proker.status = 'baru' OR proker.status is null) AND (proker.id_user = ".$_SESSION['id_user']." OR proker.id_user IS NULL) AND surat_permohonan.status_surat = 'Telah divalidasi Kepala'")or die(mysql_error());
$proses = mysqli_query($koneksi,"SELECT * FROM `proker` WHERE proker.status = 'proses'")or die(mysql_error());
$revisi = mysqli_query($koneksi,"SELECT * FROM `proker` WHERE proker.status = 'revisi'")or die(mysql_error());
$verif = mysqli_query($koneksi,"SELECT * FROM `proker` WHERE proker.status = 'diverifikasi'")or die(mysql_error());     
?>


		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Halo <?php echo $_SESSION['nama']?>, Selamat datang di Sistem Informasi Rencana Anggaran BBLK Palembang</h5>
							</div>
							<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Surat Permohonan</div>
									<div class="card-category">Buat Surat Permohonan</div>
									
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
												<b><?=$jmlsurat;?></b>
										</div>
										<div class="col-md-8">
											<a href="surat_permohonan.php?data" class="btn btn-secondary">Buat Surat Permohonan</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Detail akun</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
												<img src="../image/user.png" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="col-md-8">
											<table>
												<tr>
													<td><?=$_SESSION['nama']?></td>
												</tr>
												<tr>
													<td><?=$_SESSION['level']?></td>
												</tr>
												
											</table>
										</div>
									</div>
									<a href="user.php?edit&id_user=<?=$_SESSION['id_user']?>" class='btn btn-secondary btn-sm'>Update Akun</a>
								</div>
							</div>
						</div>
					</div>
					

	<div class="col-md-12">
							<div class="row row-card-no-pd">
								<div class="col-sm-6 col-md-3">
									<div class="card card-stats card-round">
										<div class="card-body ">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="flaticon-chart-pie text-warning"></i>
													</div>
												</div>
												<div class="col-7 col-stats">
													<div class="numbers">
														<p class="card-category">Baru</p>
														<h4 class="card-title"><?= mysqli_num_rows($baru); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="card card-stats card-round">
										<div class="card-body ">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="flaticon-coins text-success"></i>
													</div>
												</div>
												<div class="col-7 col-stats">
													<div class="numbers">
														<p class="card-category">Proses</p>
														<h4 class="card-title"><?= mysqli_num_rows($proses); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="flaticon-error text-danger"></i>
													</div>
												</div>
												<div class="col-7 col-stats">
													<div class="numbers">
														<p class="card-category">Revisi</p>
														<h4 class="card-title"><?= mysqli_num_rows($revisi); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row">
												<div class="col-5">
													<div class="icon-big text-center">
														<i class="flaticon-twitter text-primary"></i>
													</div>
												</div>
												<div class="col-7 col-stats">
													<div class="numbers">
														<p class="card-category">Diverifikasi</p>
														<h4 class="card-title"><?= mysqli_num_rows($verif); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>





				</div>
			</div>
			
<?php include'footer.php';?>