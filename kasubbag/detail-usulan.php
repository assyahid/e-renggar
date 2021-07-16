<?php 
include 'header.php'; 
$id_usulan = $_GET["id_usulan"];
$usulan=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan = ".$id_usulan)or die(mysql_error());
$data_usulan = mysqli_fetch_array($usulan);

$usulan_barang=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.kategori='alkes' and usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pdata=mysqli_query($koneksi,"SELECT * FROM pdata inner join barang on pdata.id_barang=barang.id_barang WHERE pdata.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pkantor=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.kategori='Peralatan Kantor' and usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$art=mysqli_query($koneksi,"SELECT * FROM art inner join barang on art.id_barang=barang.id_barang WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$reagen=mysqli_query($koneksi,"SELECT * FROM reagen  WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pelatihan=mysqli_query($koneksi,"SELECT * FROM pelatihan WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pengusul = mysqli_query($koneksi,"SELECT * FROM users WHERE id_user = ".$data_usulan['id_user'])or die(mysql_error());
$data_pengusul = mysqli_fetch_array($pengusul);
?>
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="row" style="width: 100%;">
						<div class="col-8 col-md-8">
							<h2 class="text-white pb-2 fw-bold">Usulan dari <?= $data_pengusul['nama']; ?></h2>
							<!-- <h6 class="text-white pb-2 fw-bold">Diusulkan oleh : <?= $data_pengusul['nama']; ?></h6> -->
							<table>
								<tr>
									<td class="text-white op-7 mb-2">No Usulan</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data_usulan['no_usulan'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Anggaran</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data_usulan['anggaran'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Tanggal Pengajuan</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data_usulan['tgl_usulan'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Status</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data_usulan['status'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Posisi usulan sekarang</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data_usulan['posisi'] ?></td>
								</tr>
							</table>
						</div>

						<?php 
						if($data_usulan['status'] != 'revisi' and $data_usulan['status']== 'diverifikasi kasi / sub koordinator'){ ?>
							<div class="col-2 col-md-2">
								<button class="btn btn-success" data-toggle="modal" data-target="#modalSetujuiusulan" style="float: right;"><span class="btn-label">
									<i class="far fa-paper-plane"></i>&nbsp;
								</span>Verifikasi Usulan Ini</button>


							</div>
							<div class="col-2 col-md-2" style="    margin-left: 0px;">
								<button class="btn btn-danger" data-toggle="modal" data-target="#modalTolakusulan" style="float: right;"><span class="btn-label">
									<i class="fas fa-long-arrow-alt-left"></i>&nbsp;
								</span>Revisi Usulan Ini</button>


							</div>
						<?php } elseif($data_usulan['status'] =='diverifikasi oleh Kasubbag Administrasi Umum'){ ?>
							<div class="col-4 col-md-4" style="    margin-left: 0px;">
							<button class="btn btn-primary" style="float: right;"><span class="btn-label">
									<i class="far fa-paper-plane"></i>&nbsp;
								</span> Telah terkirim pada <?= date_format(new DateTime($data_usulan['tgl_kirim']),'d-m-Y') ?></button>
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
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Alat Kesehatan</b> <span class="badge badge-danger"> <?= mysqli_num_rows($usulan_barang); ?></span></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="alkes.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<?php $xx=mysqli_fetch_array($usulan_barang); ?>
								<a href="../surat/cetak_usulan_barang.php?id_usulan=<?= $id_usulan; ?>&id_usulan_barang=<?= $xx['id_usulan_barang']; ?>" target="_blank" class="btn btn-default">
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
							<div class="card-title"><b>Pengelola Data</b> <span class="badge badge-danger"> <?= mysqli_num_rows($pdata); ?></span></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="p-data.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_pengolah_data.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
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
							<div class="card-title"><b>Peralatan Kantor</b> <span class="badge badge-danger"> <?= mysqli_num_rows($pkantor); ?></span></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="p-kantor.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_alat_kantor.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
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
							<div class="card-title"><b>Reagen</b> <span class="badge badge-danger"> <?= mysqli_num_rows($reagen); ?></span></div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="reagen.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_reagen.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
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
							<div class="card-title"><b>ART / Alat Kebersihan</b> <span class="badge badge-danger"> <?= mysqli_num_rows($art); ?></span></div>
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
								<a href="../surat/cetak_art.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
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
							<div class="card-title"><b>Pelatihan</b> <span class="badge badge-danger"> <?= mysqli_num_rows($pelatihan); ?></span></div>
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
	<div class="modal fade" id="modalSetujuiusulan" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form method="POST" action="Controller/KasubagController.php">
					<div class="modal-header">
						<h5 class="modal-title">Verifikasi usulan belanja</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h2>Verifikasi usulan belanja ini ? </h2>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_usulan" value="<?= $id_usulan ?>">
						<input type="submit" class="btn btn-primary" name="submit" value="Verifikasi usulan ini">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

	<!-- Modal Tambah Peralatan-->
	<div class="modal fade" id="modalTolakusulan" tabindex="-1" role="dialog">
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
							<label for="comment">Catatan Revisi untuk usulan ini</label>
							<textarea name="catatan" class="form-control" id="comment" rows="5">
							</textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_usulan" value="<?= $id_usulan ?>">
						
						<input type="submit" class="btn btn-danger" name="submit" value="Revisi usulan ini">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

<?php include'footer.php' ?>