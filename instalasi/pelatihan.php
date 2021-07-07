<?php include 'header.php'; 
$pegawai  =mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$pelatihan=mysqli_query($koneksi,"SELECT * FROM pelatihan WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());
$id_usulan = $_GET["id_usulan"];
$surat=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan = $id_usulan")or die(mysql_error());


$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }

?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Usulan Pelatihan</h4>
				<ul class="breadcrumbs">
					<a href="detail-usulan.php?id_usulan=<?=$_GET['id_usulan'];?>" class="btn btn-info">Kembali ke menu usulan</a>
				</ul>
			</div>
			<div class="row">
				<!-- <div class="col-sm-6 col-md-6">
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
				</div> -->
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
										<p class="card-category">Data Usulan Pelatihan</p>
										<h4 class="card-title"><?= mysqli_num_rows($pelatihan); ?></h4>
										<!-- <a href="pelatihan.php">lihat data</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<?php if(isset($_GET["message"]) && $_GET["message"] != ""){ ?>
						<div class="alert alert-success" role="alert">
							<strong>Sukses!</strong> <?= $_GET["message"]; ?>
						</div>
					<?php } ?>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title"> Kebutuhan pelatihan
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
									<span class="fas fa-plus"></span> Input Data pelatihan</button>
									<a type="button" target="_blank" href="../surat/cetak_pelatihan.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-sm btn-success" style="float: right;margin-right: 5px;">
										<span class="fas fa-print"></span> Cetak Surat</a>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Pelatihan</th>
													<th>Lokasi</th>
													<th>Penyelenggara</th>
													<th>Jumlah Peserta</th>
													<th>Waktu Pelaksanaan</th>
													<th>Biaya Penyelenggara</th>
													<th>Status Pelatihan</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=1;
												while($d=mysqli_fetch_array($pelatihan)){ 
													?>
													<tr>
														<td><?=$no++;?></td>
														<td><?= $d["nama_pelatihan"] ?></td>
														<td><?= $d["lokasi"] ?></td>
														<td><?= $d["penyelenggara"] ?></td>
														<td><?= $d["jumlah_peserta"] ?></td>
														<td><?= $d["waktu_pelaksanaan"] ?></td>
														<td><?= $d["biaya_penyelenggara"] ?></td>
														<td><?= $d["status_pelatihan"] ?></td>
														<td><button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_pelatihan']; ?>">
															<i class="fa fa-edit"></i>
														</button>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_pelatihan=<?php echo $d['id_pelatihan']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a>
													</td>
													</tr>	



	<!-- Modal Edit pelatihan-->
		<div class="modal fade" id="exampleEdit_<?php echo $d['id_pelatihan']; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data Usulan Pelatihan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_usulan']?>">
							<input type="hidden" name="id_pelatihan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_pelatihan']?>">
							
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Nama Pelatihan</label>
									<input type="text" name="nama_pelatihan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['nama_pelatihan']?>">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Lokasi</label>
									<input type="text" name="lokasi" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['lokasi']?>">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Penyelenggara</label>
									<input type="text" name="penyelenggara" class="form-control" id="email2" placeholder="Input Penyelenggara" value="<?=$d['penyelenggara']?>">
								</div>
							</div>
						
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Peserta</label>
									<input type="text" name="jumlah_peserta" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['jumlah_peserta']?>">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Waktu Pelaksanaan</label>
									<input type="text" name="waktu_pelaksanaan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['jumlah_peserta']?>">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Biaya Penyelenggara</label>
									<input type="text" name="biaya_penyelenggara" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['biaya_penyelenggara']?>">
								</div>
							</div>
							
					
						
						<div class="modal-footer">
							<input type="submit" name="update" class="btn btn-primary" value="Update Usulan Pelatihan">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->




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
<?php
		if(isset($_GET['hapus'])){
    $id_pelatihan=$_GET['id_pelatihan'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM pelatihan WHERE id_pelatihan='$id_pelatihan'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="pelatihan.php?id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='pelatihan.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>

  

		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Kebutuhan pelatihan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$_GET['id_usulan'];?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Nama Pelatihan</label>
									<input type="text" name="nama_pelatihan" class="form-control" id="email2" placeholder="Input Nama Pelatihan">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Lokasi</label>
									<input type="text" name="lokasi" class="form-control" id="email2" placeholder="Input Lokasi Pelatihan">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Penyelenggara</label>
									<input type="text" name="penyelenggara" class="form-control" id="email2" placeholder="Input Penyelenggara">
								</div>
							</div>
						
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Peserta</label>
									<input type="text" name="jumlah_peserta" class="form-control" id="email2" placeholder="Input Jumlah">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Waktu Pelaksanaan</label>
									<input type="text" name="waktu_pelaksanaan" class="form-control" id="email2" placeholder="Input waktu">
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Biaya Penyelenggara</label>
									<input type="text" name="biaya_penyelenggara" class="form-control" id="email2" placeholder="Input Biaya">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Usulan Pelatihan">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->







		<?php include 'footer.php';?>

