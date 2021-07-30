<?php 
include 'header.php'; ?>

<div class="main-panel">
	<div class="content">

		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">

				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="row" style="width: 100%;">
						<div class="col-8 col-md-8">
							
							
							<a class="btn btn-light" href="index.php">
								<i class="fa fa-flip-horizontal fa-share"></i>
							</a>
							<!-- <a class="btn btn-warning" href="permintaan-pembelian.php?id_usulan=<?=$_GET['id_usulan']?>">
								<i class="fa fa-laptop"></i>
							</a> -->
						</div>
						<div class="col-4 col-md-4">
							
							
						

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
						
							<div class="card-title"><b>Alat Kesehatan</b></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									
							<!-- 		<?= $xx['persetujuan']; ?> -->
								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>

								<form action="" method="post">
					          		<table hidden="">
					                <tr>
					                  <td><input type="text" name="id_user" class="form-control" value="<?php echo $_SESSION['id_user']; ?>"></td>
					                </tr>
					      			<tr>
					      				<td><input type="date" name="tgl_usulan_alkes" class="form-control" value="<?php echo date("Y-m-d") ?>"></td>
					      			</tr>
					      			<tr>
					      				<td><input type="text" name="posisi_usulan_alkes" class="form-control" value="Pengajuan"></td>
					      			</tr>
					      			</table>
					      			<button type="submit" class="btn btn-default" name="alkes">
                					<span class="fas fa-plus"></span> Tambah</button>
								</form>

							<?php
							if(isset($_POST['alkes'])){

							$query = mysqli_query($koneksi,"INSERT INTO usulan_alkes (id_usulan_alkes,id_user,tgl_usulan_alkes,posisi_usulan_alkes) VALUES ('','$_POST[id_user]','$_POST[tgl_usulan_alkes]','$_POST[posisi_usulan_alkes]')");
							if($query){ 
								$det=mysqli_query($koneksi,"SELECT * FROM usulan_alkes where id_usulan_alkes in (SELECT MAX(id_usulan_alkes) from usulan_alkes)");
								$x= mysqli_fetch_array($det);
								?>   
							<script type="text/javascript">
							    window.location="list-alkes.php?id_usulan_alkes=<?=$x['id_usulan_alkes']?>";
							  </script> 
							<?php }else{     
							echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
							echo "<br><a href='?data'>Kembali Ke Form</a>";  
							}
							}
							?>

								
								
								<a href="data-usulan-alkes.php?data&id_user=<?=$_SESSION['id_user']?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							
							<div class="card-title"><b>Pengelola Data</b></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									
									
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Peralatan Kantor</b></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
			<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Reagen</b></div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<!-- <div class="px-2 pb-2 pb-md-0 text-center">
									<a href="usulan-reagen.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-info">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>

								</div> -->
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								
								<a href="" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>ART / Alat Kebersihan</b></div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="art.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Pelatihan</b> </div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="pelatihan.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_pelatihan.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
	</div>

	<!-- Modal Tambah Peralatan-->
	<div class="modal fade" id="modalVerifikasiProker" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form method="POST" action="Controller/v1.php">
					<div class="modal-header">
						<h5 class="modal-title">Kirim Usulan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah anda sudah yakin untuk mengirim usulan anda ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_usulan" value="<?= $id_usulan ?>">
						<input type="submit" class="btn btn-primary" name="submit" value="Ya, Kirim Usulan Saya">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>

        
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

	<?php include'footer.php';?>