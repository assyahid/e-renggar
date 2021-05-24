<?php include 'header.php'; ?>

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
									<a href="pegawai_pns.php?edit&id_pegawai_pns=<?=$_SESSION['id_pegawai_pns']?>" class='btn btn-secondary btn-sm'>Update Akun</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
<?php include'footer.php';?>