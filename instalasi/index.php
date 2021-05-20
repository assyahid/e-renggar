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
									<div class="card-title">Detail Data</div>
									<div class="card-category">Segera lakukan update data anda</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<h6 class="fw-bold text-uppercase text-success op-8">Data Jabatan</h6>
											<?php $id_pegawai_pns = $_SESSION['id_pegawai_pns']; 
											        	$sql=mysqli_query($koneksi,"SELECT * FROM `riwayat_jabatan` where id_pegawai_pns='$id_pegawai_pns' ORDER BY id_riwayat_jabatan DESC");
											        	$data=mysqli_fetch_array($sql);
											        	if (isset($data['jabatan_eselon'])!=NULL) {
											        		echo $data['jabatan_eselon'];
											        	} else {
											        		echo "<span class='badge badge-warning'>Data belum di update</span>";
											        	}
											        	

											        ?> <br><br>
											        <a href="pegawai_pns.php?jabatan&id_pegawai_pns=<?=$id_pegawai_pns?>" class="btn btn-primary btn-sm">Update Jabatan</a>
											
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<h6 class="fw-bold text-uppercase text-success op-8">Data Pangkat</h6>
											<?php $id_pegawai_pns= $_SESSION['id_pegawai_pns']; 
											        	$sql=mysqli_query($koneksi,"SELECT * FROM `riwayat_pangkat` where id_pegawai_pns='$id_pegawai_pns' ORDER BY id_riwayat_pangkat DESC");
											        	$data=mysqli_fetch_array($sql);
											        	if (isset($data['golongan'])!=NULL) {
											        		echo $data['golongan'];
											        	} else {
											        		echo "<span class='badge badge-warning'>Data belum di update</span>";
											        	}
											        	

											        ?><br><br>
											        <a href="pegawai_pns.php?pangkat&id_pegawai_pns=<?=$id_pegawai_pns?>" class="btn btn-primary btn-sm">Update Pangkat</a>
											
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<h6 class="fw-bold text-uppercase text-success op-8">Data Pendidikan</h6>
											<?php $id_pegawai_pns= $_SESSION['id_pegawai_pns']; 
											        	$sql=mysqli_query($koneksi,"SELECT * FROM `riwayat_pendidikan` where id_pegawai_pns='$id_pegawai_pns' ORDER BY id_riwayat_pendidikan DESC");
											        	$data=mysqli_fetch_array($sql);
											        	if (isset($data['pendidikan'])!=NULL) {
											        		echo $data['pendidikan'];
											        	} else {
											        		echo "<span class='badge badge-warning'>Data belum di update</span>";
											        	}
											        	

											        ?><br><br>
											        <a href="pegawai_pns.php?pendidikan&id_pegawai_pns=<?=$id_pegawai_pns?>" class="btn btn-primary btn-sm">Update Pendidikan</a>
											
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
											<?php 
											if ($_SESSION['jk']=='Laki-laki') { ?>
												<img src="../image/user.png" alt="..." class="avatar-img rounded-circle">
											<?php } else { ?>
												<img src="../image/userw.png" alt="..." class="avatar-img rounded-circle">
											<?php }
											?>
										</div>
										<div class="col-md-8">
											<table>
												<tr>
													<td><?=$_SESSION['nip_baru']?></td>
												</tr>
												<tr>
													<td><?=$_SESSION['nama']?></td>
												</tr>
												<tr>
													<td><?=$_SESSION['jk']?></td>
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