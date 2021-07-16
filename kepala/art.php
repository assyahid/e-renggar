<?php include 'header.php'; 
$pegawai  =mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$art=mysqli_query($koneksi,"SELECT * FROM art inner join barang on art.id_barang=barang.id_barang WHERE art.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());
$barang   =mysqli_query($koneksi,"SELECT * FROM barang where kategori='ART' ORDER BY nama_barang ASC")or die(mysql_error());

$id_usulan = $_GET["id_usulan"];
$surat=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan = $id_usulan")or die(mysql_error());


$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }

?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">ART / Alat Kebersihan</h4>
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
										<p class="card-category">Data ART / Alat Kebersihan</p>
										<h4 class="card-title"><?= mysqli_num_rows($art); ?></h4>
										<!-- <a href="art.php">lihat data</a> -->
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
							<h4 class="card-title"> Kebutuhan ART / Alat Kebersihan
									<?php if ($data[0]['status']=="Pengajuan") { ?>
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
									<span class="fas fa-plus"></span> Input Data Alat Pengelola Data</button>
									<?php	}  ?>
									<a type="button" target="_blank" href="../surat/cetak_art.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-sm btn-success" style="float: right;margin-right: 5px;">
										<span class="fas fa-print"></span> Cetak Surat</a>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Alat</th>
													<th>Satuan</th>
													<th>Jumlah Kebutuhan</th>
													<th>Keterangan</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=1;
												while($d=mysqli_fetch_array($art)){ 
													?>
													<tr>
														<td><?=$no++;?></td>
														<td><?= $d["nama_barang"] ?></td>
														<td><?= $d["satuan"] ?></td>
														<td><?= $d["jumlah_kebutuhan"] ?></td>
														<td><?= $d["ket_art"] ?></td>
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



	<!-- Modal Edit art-->
		<div class="modal fade" id="exampleEdit_<?php echo $d['id_art']; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data Kebutuhan ART / Alat Kebersihan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_usulan']?>">
							<input type="hidden" name="id_art" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_art']?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="defaultSelect">Nama Barang</label>
									 <select name="id_barang" class="form-control" required>
                                                      <?php
                                                      $x="SELECT * from barang where kategori='ART' ";
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
									<label for="email2">Jumlah Kebutuhan</label>
									<input type="number" name="jumlah_kebutuhan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['jumlah_kebutuhan']?>">
								</div>
							</div>
						
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan</label>
									<textarea input type="text" name="ket_art" class="form-control" id="email2" placeholder="Input Kebutuhan" value="<?=$d['ket_art']?>"><?=$d['ket_art']?></textarea>
								</div>
							</div>
						
						<div class="modal-footer">
							<input type="submit" name="update" class="btn btn-primary" value="Update Usulan Barang ART">
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
    $id_art=$_GET['id_art'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM art WHERE id_art='$id_art'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="art.php?id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='art.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>

  

		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Kebutuhan ART / Alat Kebersihan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$_GET['id_usulan'];?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="defaultSelect">Nama Barang</label>
									<select name="id_barang" class="form-control form-control" id="defaultSelect">
										<?php 
										while($d=mysqli_fetch_array($barang)){
											?>
											<option value="<?= $d['id_barang'] ?>" ><?= $d['nama_barang'] ?> (<?= $d['satuan'] ?>)</option>
										<?php  } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Kebutuhan</label>
									<input type="number" name="jumlah_kebutuhan" class="form-control" id="email2" placeholder="Input Jumlah">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan</label>
									<textarea input type="text" name="ket_art" class="form-control" id="email2" placeholder="Input keterangan justifikasi"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Usulan Barang ART">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->







		<?php include 'footer.php';?>

