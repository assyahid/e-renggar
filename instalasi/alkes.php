<?php include 'header.php'; 
$pegawai  =mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$usulan_barang=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.id_usulan = '".$_GET['id_usulan']."' and usulan_barang.kategori='Alkes'")or die(mysql_error());

$id_usulan_barang=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.id_usulan = '".$_GET['id_usulan']."' and usulan_barang.kategori='Alkes'")or die(mysql_error());
$barang   =mysqli_query($koneksi,"SELECT * FROM barang where kategori='Alat Kesehatan' ORDER BY nama_barang ASC")or die(mysql_error());



$id_usulan = $_GET["id_usulan"];

$pegawai=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$surat=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan = $id_usulan")or die(mysql_error());


$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }

?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Alat Kesehatan</h4>
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
				<div class="col-sm-4 col-md-4">
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
										<p class="card-category">Data alat kesehatan</p>
										<h4 class="card-title"><?= mysqli_num_rows($usulan_barang); ?></h4>
										<!-- <a href="usulan_barang.php">lihat data</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-md-4">
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
										<p class="card-category">Data Perbaikan Alkes</p>
										<?php $perbaikan=mysqli_query($koneksi,"SELECT * FROM perbaikan_alkes where id_usulan='$_GET[id_usulan]'")or die(mysql_error()); ?>
										<h4 class="card-title"><?= mysqli_num_rows($perbaikan); ?></h4>
										<!-- <a href="usulan_barang.php">lihat data</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-md-4">
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
										<p class="card-category">Data Penghapusan Alkes</p>
											<?php $penghapusan=mysqli_query($koneksi,"SELECT * FROM penghapusan_alkes where id_usulan='$_GET[id_usulan]'")or die(mysql_error()); ?>
										<h4 class="card-title"><?= mysqli_num_rows($penghapusan); ?></h4>
										<!-- <a href="usulan_barang.php">lihat data</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<?php if(isset($_GET["message"]) && $_GET["message"] != ""){ 
						$message = $_GET['message'];
						if ($message == "input") { ?>
							<div class="alert alert-success" role="alert">
							<strong>Sukses!</strong> Data Berhasil di Input
						</div>
					<?php	} elseif($message == "update") { ?>
							<div class="alert alert-warning" role="alert">
							<strong>Sukses!</strong> Data Berhasil di Update
						</div>
					<?php	} elseif($message == "delete") { ?>
							<div class="alert alert-danger" role="alert">
							<strong>Sukses!</strong> Data Berhasil di Hapus
						</div>
					<?php	} }
					?>
					
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title"> Kebutuhan Alat Kesehatan
								<?php if ($data[0]['status']=="Pengajuan") { ?>
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
									<span class="fas fa-plus"></span> Input Data Alat Kesehatan</button>
							<?php	}  ?>
							
									<?php $xx=mysqli_fetch_array($id_usulan_barang); ?>
								<!-- 	<a type="button" target="_blank" href="../surat/cetak_usulan_barang.php?id_usulan=<?= $id_usulan; ?>&id_usulan_barang=<?= $xx['id_usulan_barang']; ?>" class="btn btn-sm btn-success" style="float: right;margin-right: 5px;">
										<span class="fas fa-print"></span> Cetak Surat</a> -->
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Alat</th>
													<th>Merek</th>
													<th>Jumlah Tersedia</th>
													<th>Kondisi</th>
													<th>Jumlah Kebutuhan</th>
													<th>Justifikasi</th>
													<th>Pengajuan</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=1;
												while($d=mysqli_fetch_array($usulan_barang)){ 
													?>
													<tr>
														<td><?=$no++;?></td>
														<td><?= $d["nama_barang"] ?></td>
														<td><?php $merek = mysqli_query($koneksi,"SELECT * FROM merek_barang where id_usulan_barang='$d[id_usulan_barang]'");
															while ($xm=mysqli_fetch_array($merek)) {
																echo "-".$xm['nama_merek']."<br>";
															}
														 ?>
														 	<!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleMerek" style="float: right;">
									<span class="fas fa-plus"></span> <?= mysqli_num_rows($merek); ?></button> -->
										<a href="tambah_merek.php?id_usulan_barang=<?=$d['id_usulan_barang']?>&id_usulan=<?=$id_usulan?>" class="btn btn-sm btn-primary"><span class="fas fa-plus"></span> <?= mysqli_num_rows($merek); ?></a>
														 </td>
														<td><?= $d["jumlah_tersedia"] ?></td>
														<td> 
													
															<?php if ($d["kondisi"]=='Rusak Ringan') { ?>
																<?php $perbaikan_alkes = mysqli_query($koneksi,"SELECT * FROM perbaikan_alkes where id_usulan_barang='$d[id_usulan_barang]'");
															while ($pa=mysqli_fetch_array($perbaikan_alkes)) { ?>
																<a href="../image/<?=$pa['file']?>" class="btn btn-sm btn-info" target="_BLANK"><i class="fa fa-file"></i> lihat surat</a>
															<?php }  ?>
															<?=$d["kondisi"]?>
																	<a href="perbaikan-alkes.php?id_usulan_barang=<?=$d['id_usulan_barang'];?>&id_usulan=<?php echo $d['id_usulan']; ?>"><button type="button" class="btn btn-sm btn-primary" title="Buat Usulan Surat Perbaikan">
															<i class="fa fa-plus"></i> <?= mysqli_num_rows($perbaikan_alkes); ?>
														</button></a>
														<?php } elseif ($d["kondisi"]=='Rusak Berat') { ?>
																<?php $penghapusan_alkes = mysqli_query($koneksi,"SELECT * FROM penghapusan_alkes where id_usulan_barang='$d[id_usulan_barang]'");
															while ($pha=mysqli_fetch_array($penghapusan_alkes)) { ?>
																<a href="../image/<?=$pha['file']?>" class="btn btn-sm btn-info" target="_BLANK"><i class="fa fa-file"></i> lihat surat</a>
															<?php }  ?>
															<?=$d["kondisi"]?>
															<a href="penghapusan-alkes.php?id_usulan_barang=<?=$d['id_usulan_barang'];?>&id_usulan=<?php echo $d['id_usulan']; ?>"><button type="button" class="btn btn-sm btn-primary" title="Buat Usulan Surat Penghapusan">
															<i class="fa fa-plus"></i> <?= mysqli_num_rows($penghapusan_alkes); ?>
														</button></a>
													<?php	} ?>  </td>
														<td><?= $d["jumlah_kebutuhan"] ?></td>
														<td><?= $d["justifikasi"] ?></td>
														<td><?= $d["persetujuan"] ?></td>
														<td>
															<?php if ($data[0]['status']=="Pengajuan") { ?>
															<button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_usulan_barang']; ?>">
															<i class="fa fa-edit"></i>
														</button>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_usulan_barang=<?php echo $d['id_usulan_barang']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a>
															<?php	} elseif($data[0]['status']=="Revisi") { ?>
															<button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_usulan_barang']; ?>">
															<i class="fa fa-edit"></i>
														</button>
													<?php } else { ?>
															<p>Sedang di Proses</p>
													<?php } ?>
													</td>
													</tr>	



	<!-- Modal Edit usulan_barang-->
		<div class="modal fade" id="exampleEdit_<?php echo $d['id_usulan_barang']; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data Kebutuhan Alat Kesehatan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_usulan']?>">
							<input type="hidden" name="id_usulan_barang" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_usulan_barang']?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="defaultSelect">Nama Barang</label>
									 <select name="id_barang" class="form-control" required>
                                                      <?php
                                                      $x="SELECT * from barang ";
                                                      $q=mysqli_query($koneksi,$x);
                                                      while ($rmodal=mysqli_fetch_array($q)) 
                                                        { 
                                                          if($rmodal['id_barang']==$d['id_barang']) { $sel = 'selected';} else { $sel = ''; }
                                                      ?>
                                                            <option <?php echo $sel; ?> value="<?php echo $rmodal['id_barang']; ?>"> <?php echo $rmodal['nama_barang'].''; ?></option>
                                                      <?php } ?>
                                                    </select>
								</div>
							</div>
						
						<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Tersedia</label>
									<input type="number" name="jumlah_tersedia" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['jumlah_tersedia']?>">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Kondisi</label>
									<select class="form-control form-control" name="kondisi" id="defaultSelect">
										<option <?php if ($d['kondisi'] == 'Baik') {
											echo "selected";
										} ?> value="Baik">Baik</option>
										<option <?php if ($d['kondisi'] == 'Rusak Ringan') {
											echo "selected";
										} ?> value="Rusak Ringan">Rusak Ringan</option>
										<option <?php if ($d['kondisi'] == 'Rusak Berat') {
											echo "selected";
										} ?> value="Rusak Berat">Rusak Berat</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Kebutuhan</label>
									<input type="number" name="jumlah_kebutuhan" class="form-control" id="email2" placeholder="Input Kebutuhan" value="<?=$d['jumlah_kebutuhan']?>">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan Justifikasi</label>
									<textarea input type="text" name="justifikasi" class="form-control" value="<?= $d["justifikasi"] ?>"><?= $d["justifikasi"] ?></textarea>
								</div>
							</div>
						<div class="modal-footer">
							<input type="submit" name="update" class="btn btn-primary" value="Update Usulan Barang">
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
	
<?php
		if(isset($_GET['hapus'])){
    $id_usulan_barang=$_GET['id_usulan_barang'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM usulan_barang WHERE id_usulan_barang='$id_usulan_barang'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="alkes.php?message=delete&id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='alkes.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>

  <?php
		if(isset($_GET['hapusmerek'])){
    $id_merek_barang=$_GET['id_merek_barang'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM merek_barang WHERE id_merek_barang='$id_merek_barang'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="alkes.php?id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='alkes.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>








		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Kebutuhan Alat Kesehatan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$_GET['id_usulan'];?>">
							<input type="hidden" name="id_user" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$_SESSION['id_user'];?>">
							<input type="hidden" name="kategori" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="alkes">
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
									<label for="email2">Merek</label>
									<input type="text" name="nama_merek" class="form-control" id="email2" placeholder="Input Merek">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Spesifikasi</label>
									<textarea input type="text" name="spesifikasi_merek" class="form-control" id="email2" placeholder="Input spesifikasi"></textarea>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Harga</label>
									<input type="number" name="harga_merek" class="form-control" id="email2" placeholder="Input Jumlah">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Tersedia</label>
									<input type="number" name="jumlah_tersedia" class="form-control" id="email2" placeholder="Input Jumlah">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Kondisi</label>
									<select class="form-control form-control" name="kondisi" id="defaultSelect">
										<option value="-">-</option>
										<option value="Baik">Baik</option>
										<option value="Rusak Ringan">Rusak Ringan</option>
										<option value="Rusak Berat">Rusak Berat</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Kebutuhan</label>
									<input type="number" name="jumlah_kebutuhan" class="form-control" id="email2" placeholder="Input Kebutuhan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan Justifikasi</label>
									<textarea input type="text" name="justifikasi" class="form-control" id="email2" placeholder="Input keterangan justifikasi"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Usulan Barang">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->

		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleMerek" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Merek</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<p align="center"><b>JUSTIFIKASI ALAT KESEHATAN<br>
					PERENCANAAN USULAN PEMBELIAN BARANG/ALAT MELALUI PENGGUNAAN SALDO AWAL BLU<br>
					UNTUK OPERASIONAL BBLK PALEMBANG<br>
					TAHUN 2022</b></p>
					<?php $usulan_barang=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());
					$show=mysqli_fetch_array($usulan_barang);
					?>
					<table class="table table-bordered">
						<tr>
							<td>Nama Alat</td>
							<td>: <?=$show['nama_barang']?></td>
							<td>Jumlah tersedia </td>
							<td>: <?=$show['jumlah_tersedia']?></td>
						</tr>
						<tr>
							<td>Kondisi</td>
							<td>: <?=$show['kondisi']?></td>
							<td>Jumlah Kebutuhan</td>
							<td>: <?=$show['jumlah_kebutuhan']?></td>
						</tr>
						<tr>
							<td colspan="2">Justifikasi</td>
							<td colspan="2">: <?=$show['justifikasi']?></td>
						</tr>
					</table>
					
					<table class="table table-responsive">
						<thead>
							<tr>
								<th width="15px">No</th>
								<th>Merek</th>
								<th>Spesifikasi</th>
								<th>Harga</th>
								<th width="100px">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$usulan_barang=mysqli_query($koneksi,"SELECT * FROM merek_barang inner join usulan_barang on merek_barang.id_usulan_barang=usulan_barang.id_usulan_barang")or die(mysql_error());
							$no=1;
							while($d=mysqli_fetch_array($usulan_barang)){ 
								?>
								<tr>
									<td><?=$no++;?></td>
									<td><?= $d["nama_merek"] ?></td>
									<td><?= $d["spesifikasi_merek"] ?></td>
									<td>Rp <?= number_format($d["harga_merek"],0) ?></td>
									<td><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapusmerek&id_merek_usulan_barang=<?php echo $d['id_merek_usulan_barang']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a></td>
								</tr>	

							<?php } ?>
						</tbody>
					</table>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan_barang" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$show['id_usulan_barang'];?>">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$show['id_usulan'];?>">
			
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Merek</label>
									<input type="text" name="nama_merek" class="form-control" id="email2" placeholder="Input Merek">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Spesifikasi</label>
									<textarea input type="text" name="spesifikasi_merek" class="form-control" id="email2" placeholder="Input Jumlah"></textarea>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Harga</label>
									<input type="text" name="harga_merek" class="form-control" id="email2" placeholder="Input Harga">
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Merek">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->


</form>
</div>
</div>


		<?php include 'footer.php';?>
